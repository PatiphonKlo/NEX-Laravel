<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Firebase;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Kreait\Firebase\Exception\Auth\UserNotFound;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Google\Cloud\Core\Timestamp;
use DateTime;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Exists;

// use Faker\Factory;

class ProductActionController extends Controller
{
    protected $firestore;
    protected $storage;
    protected $realtime;
    protected $auth;

    public function __construct()
    {
        $this->firestore = (new Firebase)->firestoreDb;
        $this->storage = (new Firebase)->cloudstorage;
        $this->realtime = (new Firebase)->realtimeDb;
        $this->auth = (new Firebase)->authentication;
    }

    public function view()
    {
        try {
            $productGroups = [];
            $technicalData = [];
            $productGroupDocuments = $this->firestore->collection(config('firebase.collection.product_group'))->documents();

            foreach ($productGroupDocuments as $productGroupDocument) {
                $productGroups[] = $productGroupDocument->data()['product_group'];
            }

            $assemblyParts = $this->realtime->getReference(config('firebase.reference.assembly_part'))->getValue() ?? [];

            $technicalDatas = $this->firestore->collection(config('firebase.collection.technical_data'))->documents();

            foreach ($technicalDatas as $item) {
                $technicalData[] =  [
                    $item->data(),
                    $item->id()
                ];
            }

            if (Cache::has('product_data')) {
                $productData = Cache::get('product_data');
                error_log('Data loaded from cache');
            } else {
                $productDocuments = $this->firestore->collection(config('firebase.collection.product'))->orderBy('product_model')->documents();
                error_log('Data loaded from server');

                if ($productDocuments->isEmpty()) {
                    return view('pages/admin/product/cms', compact('productGroups', 'assemblyParts', 'technicalData'))->with('message', 'No Data Available ');
                }

                $bucketName = config('firebase.projects.app.storage.default_bucket');
                $bucket = $this->storage->getBucket($bucketName);
                $expiresAt = new DateTime('15 min');

                $userDisplayNames = [];

                foreach ($productDocuments as $document) {
                    $documentData = $document->data();
                    $pathRef = [
                        config('firebase.storage_path.product_images') . '/' . $documentData['product_model'] . '-picture.jpg',
                        config('firebase.storage_path.product_images') . '/' . $documentData['product_model'] . '-front.jpg',
                        config('firebase.storage_path.product_images') . '/' . $documentData['product_model'] . '-side.jpg',
                        config('firebase.storage_path.product_images') . '/' . $documentData['product_model'] . '-top.jpg',
                    ];

                    $imageURL = array_map(function ($path) use ($bucket, $expiresAt) {
                        return $bucket->object($path)->signedUrl($expiresAt, ['version' => 'v4']);
                    }, $pathRef);

                    if (isset($documentData['created_at']) && $documentData['created_at'] instanceof Timestamp) {
                        $createdTimestamp = $documentData['created_at']->get()->format('U');
                        $documentData['created_at'] = 'Time: ' . date('H:i:s', $createdTimestamp) . ' Date: ' . date('d/m/Y', $createdTimestamp);
                    }

                    if (isset($documentData['edited_at']) && $documentData['edited_at'] instanceof Timestamp) {
                        $editedTimestamp = $documentData['edited_at']->get()->format('U');
                        $documentData['edited_at'] = 'Time: ' . date('H:i:s', $editedTimestamp) . ' Date: ' . date('d/m/Y', $editedTimestamp);
                    }

                    if (isset($documentData['created_by']) && isset($documentData['edited_by'])) {
                        if (!isset($userDisplayNames[$documentData['created_by']])) {
                            try {
                                $userDisplayNames[$documentData['created_by']] = $this->auth->getUser($documentData['created_by'])->email;
                            } catch (UserNotFound $e) {
                                echo $e->getMessage();
                            }
                        }

                        if (!isset($userDisplayNames[$documentData['edited_by']])) {
                            try {
                                $userDisplayNames[$documentData['edited_by']] = $this->auth->getUser($documentData['edited_by'])->email;
                            } catch (UserNotFound $e) {
                                echo $e->getMessage();
                            }
                        }

                        $documentData['created_by'] = $userDisplayNames[$documentData['created_by']];
                        $documentData['edited_by'] = $userDisplayNames[$documentData['edited_by']];
                    }

                    $documentData['image_url'] = $imageURL;
                    $productId = array('product_id' => $document->id());
                    $productData[] = array_merge($documentData, $productId);
                }
                Cache::put('product_data', $productData, config('cache.cache_duration'));
            }
            return view('pages/admin/product/cms', compact('productData', 'productGroups', 'assemblyParts', 'technicalData'));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('error', 'Error occurred.');
        }
    }

    public function add(Request $request)
    {
        try {

            $messages = [
                'required' => 'This field is required.',
                'mimes' => 'file extension not valid',
            ];

            $validator = Validator::make($request->all(), [
                'product_name' => 'required|max:50',
                'product_group' => 'required|max:20',
                'product_model' => 'required|max:20',
                'product_price' => 'required|numeric|min:0|digits_between:1,8',
                'product_logistic_cost' => 'required|numeric|min:0|digits_between:1,6',
                'product_warranty' => 'required|numeric|min:0|max:20',
                'product_down_payment' => 'required|numeric|min:0|max:100',
                'product_after_install' => 'required|numeric|min:0|max:100',
                'product_final_check' => 'required|numeric|min:0|max:100',
                'product_price_validity' => 'required|numeric|min:0|digits_between:1,3',
                'assembly_part' => 'array|min:1',
                'technical_data' => 'array|min:1',
                'product_delivery_term' => 'required|numeric|min:0|digits_between:1,3',
                'product_credit_day' => 'required|numeric|min:0|digits_between:1,3',
                'product_discount' => 'required|numeric|min:0|max:100',
                'product_picture' => 'required|mimes:jpg|max:3072|dimensions:min_width=120,min_height=160,max_width=1200,max_height=1600',
                'product_front_view' => 'mimes:jpg|max:3072|dimensions:min_width=120,min_height=160,max_width=1200,max_height=1600',
                'product_side_view' => 'mimes:jpg|max:3072|dimensions:min_width=120,min_height=160,max_width=1200,max_height=1600',
                'product_top_view' => 'mimes:jpg|max:3072|dimensions:min_width=160,min_height=120,max_width=1600,max_height=1200',
                'spec_sheet' => 'required|mimes:pdf|max:3072'
            ], $messages);

            $validator->after(function ($validator) {
                if ($validator->getData()['product_down_payment'] + $validator->getData()['product_after_install'] + $validator->getData()['product_final_check'] !== 100) {
                    $validator->errors()->add('product_down_payment', 'The sum of down payment, after install, final check fields must be equal to 100%.');
                    $validator->errors()->add('product_after_install', 'The sum of down payment, after install, final check fields must be equal to 100%.');
                    $validator->errors()->add('product_final_check', 'The sum of down payment, after install, final check fields must be equal to 100%.');
                }
                $modelSearch = $this->firestore->collection(config('firebase.collection.product'))->where('product_model', '=', $validator->getData()['product_model'])->documents()->rows();
                if ($modelSearch) {
                    $validator->errors()->add('product_model', 'Model exists, please create another model.');
                }
            });

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput()->with('error', 'Error, can not add');
            }

            $postData = [
                'spec_password' => Str::random(10),
                'created_at' => new Timestamp(new DateTime()),
                'created_by' => Session::get('uid'),
                'edited_at' => new Timestamp(new DateTime()),
                'edited_by' => Session::get('uid'),
                'product_name' => $request->product_name,
                'product_group' => $request->product_group,
                'product_model' => $request->product_model,
                'product_price' => (int)($request->product_price),
                'product_logistic_cost' => (int)($request->product_logistic_cost),
                'product_down_payment' => (int)($request->product_down_payment),
                'product_after_install' => (int)($request->product_after_install),
                'product_final_check' => (int)($request->product_final_check),
                'product_price_validity' => (int)($request->product_price_validity),
                'product_delivery_term' => (int)($request->product_delivery_term),
                'product_credit_day' => (int)($request->product_credit_day),
                'product_discount' => (int)($request->product_discount),
                'product_warranty' => (int)($request->product_warranty),
                'assembly_part' => $request->assembly_part,
                'technical_data' => $request->technical_data,
            ];

            $newDocument = $this->firestore->collection(config('firebase.collection.product'))->newDocument();
            $documentKey = $newDocument->id();
            $postDocument = $this->firestore->collection(config('firebase.collection.product'))->document($documentKey)->set($postData);

            $image = [
                $request->file('product_picture'),
                $request->file('product_front_view'),
                $request->file('product_side_view'),
                $request->file('product_top_view'),
            ];

            $subPath = [
                'picture',
                'front',
                'side',
                'top',
            ];

            $firebase_storage_path = config('firebase.storage_path.product_images');
            for ($i = 0; $i <= (count($image)); $i++) {
                if (isset($image[$i])) {
                    $localfolder = public_path('firebase-temp-uploads/' . $i);
                    $name = $request->product_model . '-' . $subPath[$i] . '.jpg';
                    $image[$i]->move($localfolder, $name);
                    $uploadedfile = fopen($localfolder . '/' . $name, 'r');
                    $upload = $this->storage->getBucket()->upload($uploadedfile, ['name' => $firebase_storage_path . '/' . $name]);
                    unlink($localfolder . '/' . $name);
                }
            }

            $file = $request->file('spec_sheet');
            $firebase_storage_path = config('firebase.storage_path.product_spec');
            $localfolder = public_path('firebase-temp-uploads/4');
            $name = $request->product_model . '-spec-sheet.pdf';
            $file->move($localfolder, $name);
            $uploadedfile = fopen($localfolder . '/' . $name, 'r');
            $upload = $this->storage->getBucket()->upload($uploadedfile, ['name' => $firebase_storage_path . '/' . $name]);
            unlink($localfolder . '/' . $name);

            return back()->with('status', $request->model . ' added successfully');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('error', 'Error occurred.');
        }
    }

    public function update(Request $request, $key)
    {
        try {
            $document = $this->firestore->collection(config('firebase.collection.product'))->document($key);
            $model = $document->snapshot()->data()['product_model'];
            $messages = [
                'required' => 'This field is required.',
                'mimes' => 'file extension not valid',
                'max' => 'maximum file size is 2MB'
            ];


            $validatorUpdate = Validator::make($request->all(), [], $messages);
            $validatorUpdate->addRules([
                'product_name_update' . $request->get('update_id') => 'required|max:50',
                'product_group_update' . $request->get('update_id') => 'required|max:20',
                'product_model_update' . $request->get('update_id') => 'required|max:20',
                'product_price_update' . $request->get('update_id') => 'required|numeric|min:0|digits_between:1,8',
                'product_logistic_cost_update' . $request->get('update_id') => 'required|numeric|min:0|digits_between:1,6',
                'product_warranty_update' . $request->get('update_id') => 'required|numeric|min:0|max:20',
                'product_down_payment_update' . $request->get('update_id') => 'required|numeric|min:0|max:100',
                'product_after_install_update' . $request->get('update_id') => 'required|numeric|min:0|max:100',
                'product_final_check_update' . $request->get('update_id') => 'required|numeric|min:0|max:100',
                'product_price_validity_update' . $request->get('update_id') => 'required|numeric|min:0|digits_between:1,3',
                'assembly_part_update' . $request->get('update_id') => 'required|array|min:1',
                'technical_data_update' . $request->get('update_id') => 'required|array|min:1',
                'product_delivery_term_update' . $request->get('update_id') => 'required|numeric|min:0|digits_between:1,3',
                'product_credit_day_update' . $request->get('update_id') => 'required|numeric|min:0|digits_between:1,3',
                'product_discount_update' . $request->get('update_id') => 'required|numeric|min:0|max:100',
                'product_picture_update' . $request->get('update_id') => 'mimes:jpg|max:3072|dimensions:min_width=100,min_height=100,max_width=1200,max_height=1600',
                'product_front_view_update' . $request->get('update_id') => 'mimes:jpg|max:3072|dimensions:min_width=100,min_height=100,max_width=1200,max_height=1600',
                'product_side_view_update' . $request->get('update_id') => 'mimes:jpg|max:3072|dimensions:min_width=100,min_height=100,max_width=1200,max_height=1600',
                'product_top_view_update' . $request->get('update_id') => 'mimes:jpg|max:3072|dimensions:min_width=160,min_height=120,max_width=1600,max_height=1200',
                'spec_sheet_update' . $request->get('update_id') => 'mimes:pdf|max:3072',
                'update_id' => 'required',
            ]);


            $validatorUpdate->after(function ($validatorUpdate) {
                if ($validatorUpdate->getData()['product_down_payment_update' . $validatorUpdate->getData()['update_id']] + $validatorUpdate->getData()['product_after_install_update' . $validatorUpdate->getData()['update_id']] + $validatorUpdate->getData()['product_final_check_update' . $validatorUpdate->getData()['update_id']] !== 100) {
                    $validatorUpdate->errors()->add('product_down_payment_update' . $validatorUpdate->getData()['update_id'], 'The sum of down payment, after install, final check fields must be equal to 100%.');
                    $validatorUpdate->errors()->add('product_after_install_update' . $validatorUpdate->getData()['update_id'], 'The sum of down payment, after install, final check fields must be equal to 100%.');
                    $validatorUpdate->errors()->add('product_final_check_update' . $validatorUpdate->getData()['update_id'], 'The sum of down payment, after install, final check fields must be equal to 100%.');
                }
            });

            if ($validatorUpdate->fails()) {
                return back()->withErrors($validatorUpdate)->withInput()->with('error', 'Error, can not update ' . $model);
            }

            $postData = [
                'product_name' => $request->get('product_name_update' . $request->update_id),
                'product_group' => $request->get('product_group_update' . $request->update_id),
                'product_model' => $request->get('product_model_update' . $request->update_id),
                'product_price' => (int)($request->get('product_price_update' . $request->update_id)),
                'product_logistic_cost' => (int)($request->get('product_logistic_cost_update' . $request->update_id)),
                'product_down_payment' => (int)($request->get('product_down_payment_update' . $request->update_id)),
                'product_after_install' => (int)($request->get('product_after_install_update' . $request->update_id)),
                'product_final_check' => (int)($request->get('product_final_check_update' . $request->update_id)),
                'product_price_validity' => (int)($request->get('product_price_validity_update' . $request->update_id)),
                'product_delivery_term' => (int)($request->get('product_delivery_term_update' . $request->update_id)),
                'product_credit_day' => (int)($request->get('product_credit_update' . $request->update_id)),
                'product_discount' => (int)($request->get('product_discount_update' . $request->update_id)),
                'product_warranty' => (int)($request->get('product_warranty_update' . $request->update_id)),
                'assembly_part' => $request->get('assembly_part_update' . $request->update_id),
                'technical_data' => $request->get('technical_data_update' . $request->update_id),
                'edited_at' => new Timestamp(new DateTime()),
                'edited_by' => Session::get('uid')
            ];

            $updateDocument = $document->set($postData, ['merge' => true]);

            $image = [
                $request->file('product_picture_update' . $request->update_id),
                $request->file('product_front_view_update' . $request->update_id),
                $request->file('product_side_view_update' . $request->update_id),
                $request->file('product_top_view_update' . $request->update_id),
            ];

            $subPath = [
                'picture',
                'front',
                'side',
                'top',
            ];

            for ($i = 0; $i <= (count($image)); $i++) {
                if (isset($image[$i])) {
                    $firebase_storage_path = config('firebase.storage_path.product_images');
                    $localfolder = public_path('firebase-temp-uploads/' . $i);
                    $name = $request->get('product_model_update' . $request->update_id) . '-' . $subPath[$i] . '.jpg';
                    $image[$i]->move($localfolder, $name);
                    $uploadedfile = fopen($localfolder . '/' . $name, 'r');
                    $upload = $this->storage->getBucket()->upload($uploadedfile, ['name' => $firebase_storage_path . '/' . $name]);
                    unlink($localfolder . '/' . $name);
                }
            }

            $file = $request->file('spec_sheet_update' . $request->update_id);

            if ($file !== null) {
                $firebase_storage_path = config('firebase.storage_path.product_spec');
                $localfolder = public_path('firebase-temp-uploads/4');
                $name = $request->get('product_model_update' . $request->update_id) . '-spec-sheet.pdf';
                $file->move($localfolder, $name);
                $uploadedfile = fopen($localfolder . '/' . $name, 'r');
                $upload = $this->storage->getBucket()->upload($uploadedfile, ['name' => $firebase_storage_path . '/' . $name]);
                unlink($localfolder . '/' . $name);
            }

            return back()->with('status', $model . ' Updated successfully');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('error', 'Error occurred.');
        }
    }

    public function delete($key)
    {
        try {
            $document = $this->firestore->collection(config('firebase.collection.product'))->document($key);
            $model = $document->snapshot()->data()['product_model'];

            $firebase_storage_image_path = config('firebase.storage_path.product_images');
            $subPath = [
                'picture',
                'front',
                'side',
                'top',
            ];

            $bucketName = config('firebase.projects.app.storage.default_bucket');
            for ($i = 0; $i <= (count($subPath) - 1); $i++) {
                $imageName = $model . '-' . $subPath[$i] . '.jpg';
                $imageRef = $this->storage->getBucket($bucketName)->object($firebase_storage_image_path . '/' . $imageName);
                if ($imageRef->exists()) {
                    $imageRef->delete();
                }
            }

            $firebase_storage_sheet_path = config('firebase.storage_path.product_spec');
            $sheetName =  $model . '-spec-sheet.pdf';
            $sheetRef = $this->storage->getBucket($bucketName)->object($firebase_storage_sheet_path . '/' . $sheetName);
            if ($sheetRef->exists()) {
                $sheetRef->delete();
            }

            $deleteDocument = $document->delete();
            return back()->with('status', 'Product deleted successfully');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('error', 'Error occurred.');
        }
    }

    public function viewSpecPDF($key)
    {
        try {
            $document = $this->firestore->collection(config('firebase.collection.product'))->document($key);
            $model = $document->snapshot()->data()['product_model'];
            $bucketName = config('firebase.projects.app.storage.default_bucket');
            $bucket = $this->storage->getBucket($bucketName);
            $expiresAt = new DateTime('15 minutes');

            $sheetRef = $bucket->object(config('firebase.storage_path.product_spec') . '/' . $model . '-spec-sheet.pdf');
            if ($sheetRef->exists()) {
                $pathRef = config('firebase.storage_path.product_spec') . '/' . $model . '-spec-sheet.pdf';
                $pdfURL = $bucket->object($pathRef)->signedUrl($expiresAt, [
                    'version' => 'v4',
                ]);
                return redirect()->away($pdfURL);
            } else {
                return redirect()->back()->with('error', 'PDF not found.');
            }
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return response()->json(['error' => 'Error occurred'], 500);
        }
    }
}
