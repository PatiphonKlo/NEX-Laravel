<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Firebase;
use Barryvdh\DomPDF\Facade\Pdf;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Kreait\Firebase\Exception\Auth\UserNotFound;
use Google\Cloud\Core\Timestamp;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class QuotationActionController extends Controller
{
    protected $realtime;
    protected $firestore;
    protected $auth;
    protected $storage;
    public function __construct()
    {
        $this->realtime = (new Firebase)->realtimeDb;
        $this->firestore = (new Firebase)->firestoreDb;
        $this->auth = (new Firebase)->authentication;
        $this->storage = (new Firebase)->cloudstorage;
    }

    public function view()
    {
        try {
            if (Cache::has('quotation_data') && Cache::has('product_list') && Cache::has('client_list')) {
                $quotationData = Cache::get('quotation_data');
                $productList = Cache::get('product_list');
                $clientList = Cache::get('client_list');
                error_log('Data loaded from cache');
            } else {
                error_log('Data loaded from server');
                $productDocuments = $this->firestore->collection(config('firebase.collection.product'))->orderBy('product_model')->documents();
                $clientDocuments  = $this->firestore->collection(config('firebase.collection.client'))->documents();
                $quotationDocuments = $this->firestore->collection(config('firebase.collection.quotation'))->documents();

                $productList = [];
                $clientList = [];

                foreach ($clientDocuments as $clientDocument) {
                    $clientList[] = [
                        'client_contact_name' => $clientDocument->data()['client_contact_name'],
                        'client_company' => $clientDocument->data()['client_company'],
                        'client_id' => $clientDocument->id()
                    ];
                }

                if ($productDocuments->isEmpty()) {
                    $message = 'Data not available';
                    return view('pages/admin/quotation/cms', compact('clientList'))->with('message', $message);
                }

                foreach ($productDocuments as $productDocument) {
                    $productData = $productDocument->data();
                    $productId = ['product_id' => $productDocument->id()];
                    $productList[] = array_merge($productData, $productId);
                }

                $quotationData = [];
                $userDisplayNames = [];
                foreach ($quotationDocuments as $document) {
                    $documentData = $document->data();

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

                    $productData = ['product_data' => $this->firestore->collection(config('firebase.collection.product'))->document($documentData['product_id'])->snapshot()->data()];
                    if (!empty($productData['product_data']['technical_data'])) {
                        $technicalInfo = [];
                        foreach ($productData['product_data']['technical_data'] as $technicalData) {
                            $technicalInfo[$technicalData] = $this->firestore->collection(config('firebase.collection.technical_data'))->document($technicalData)->snapshot()->data();
                        }
                        $productData['product_data']['technical_data'] = $technicalInfo;
                    }

                    $clientData = ['client_data' => $this->firestore->collection(config('firebase.collection.client'))->document($documentData['client_id'])->snapshot()->data()];

                    $documentData['quotation_code'] = 'MQ-' . date('His', $createdTimestamp) . '-' . date('dmY', $createdTimestamp);

                    $firebase_storage_path = config('firebase.storage_path.quotation_signature') . '/Signature.jpg';
                    $bucketName = config('firebase.projects.app.storage.default_bucket');
                    $bucket = $this->storage->getBucket($bucketName);
                    $expiresAt = new DateTime('15 min');
                    $signature =  ['signature' => $bucket->object($firebase_storage_path)->signedUrl($expiresAt, ['version' => 'v4'])];

                    $groupName = ['group_name' => $this->firestore->collection(config('firebase.collection.product_group'))->where('product_group', '=', $productData['product_data']['product_group'])->documents()->rows()[0]->data()['product_group_name']];

                    $quotationId = ['quotation_id' => $document->id()];

                    $quotationData[] = array_merge($documentData, $quotationId, $clientData, $productData, $signature, $groupName);
                }

                Cache::put('quotation_data', $quotationData, config('cache.cache_duration'));
                Cache::put('product_list', $productList, config('cache.cache_duration'));
                Cache::put('client_list', $clientList, config('cache.cache_duration'));
            }
            return view('pages/admin/quotation/cms', compact('quotationData', 'productList', 'clientList'));
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
            ];

            $validator = Validator::make($request->all(), [
                'product_id' => 'required|max:50',
                'client_id' => 'required|max:50',
                'product_price' => 'required|numeric|min:0|digits_between:1,8',
                'product_assurance' => 'required|numeric|min:0|max:20',
                'product_down_payment' => 'required|numeric|min:0|max:100',
                'product_after_install' => 'required|numeric|min:0|max:100',
                'product_final_check' => 'required|numeric|min:0|max:100',
                'product_price_validity' => 'required|numeric|min:0|digits_between:1,3',
                'product_delivery_term' => 'required|numeric|min:0|digits_between:1,3',
                'product_credit_day' => 'required|numeric|min:0|digits_between:1,3',
                'product_discount' => 'required|numeric|min:0|max:100',
            ], $messages);


            $validator->after(function ($validator) {
                if ($validator->getData()['product_down_payment'] + $validator->getData()['product_after_install'] + $validator->getData()['product_final_check'] !== 100) {
                    $validator->errors()->add('product_down_payment', 'The sum of down payment, after install, final check fields must be equal to 100%.');
                    $validator->errors()->add('product_after_install', 'The sum of down payment, after install, final check fields must be equal to 100%.');
                    $validator->errors()->add('product_final_check', 'The sum of down payment, after install, final check fields must be equal to 100%.');
                }
            });

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput()->with('error', 'Error, can not add');
            }

            $newDocument = $this->firestore->collection(config('firebase.collection.quotation'))->newDocument();
            $newDocumentId = $newDocument->id();
            $postData = array(
                'quotation_password' => Str::random(10),
                'product_id' => $request->product_id,
                'client_id' => $request->client_id,
                'created_by' => Session::get('uid'),
                'created_at' => new Timestamp(new DateTime()),
                'edited_by' => Session::get('uid'),
                'edited_at' => new Timestamp(new DateTime()),
                'quotation_layout_name' => 'default',
                'product_price' => (int)($request->product_price),
                'product_down_payment' => (int)($request->product_down_payment),
                'product_after_install' => (int)($request->product_after_install),
                'product_final_check' => (int)($request->product_final_check),
                'product_price_validity' => (int)($request->product_price_validity),
                'product_delivery_term' => (int)($request->product_delivery_term),
                'product_credit_day' => (int)($request->product_credit_day),
                'product_discount' => (int)($request->product_discount),
                'product_assurance' => (int)($request->product_assurance),
            );
            $createQuotation = $this->firestore->collection(config('firebase.collection.quotation'))->document($newDocumentId)->set($postData);
            return back()->with('status', 'Added successfully.');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('error', 'Error occurred.');
        }
    }

    public function request($model, $postKey)
    {
        try {
            $productDocument = $this->firestore->collection(config('firebase.collection.product'))->where('product_model', '=', $model)->documents()->rows()[0];
            $productData = $productDocument->data();
            $productId = $productDocument->id();
            $newDocument = $this->firestore->collection(config('firebase.collection.quotation'))->newDocument();
            $newDocumentId = $newDocument->id();
            $postData = array(
                'product_id' => $productId,
                'client_id' => $postKey,
                'quotation_password' => Str::random(10),
                'created_by' => Session::get('uid'),
                'created_at' => new Timestamp(new DateTime()),
                'edited_by' => Session::get('uid'),
                'edited_at' => new Timestamp(new DateTime()),
                'quotation_layout_name' => 'default',
                'product_price' => $productData['product_price'],
                'product_down_payment' => $productData['product_down_payment'],
                'product_after_install' => $productData['product_after_install'],
                'product_final_check' => $productData['product_final_check'],
                'product_price_validity' => $productData['product_price_validity'],
                'product_delivery_term' => $productData['product_delivery_term'],
                'product_credit_day' => $productData['product_credit_day'],
                'product_discount' => $productData['product_discount'],
                'product_assurance' => $productData['product_assurance'],
            );

            $createQuotation = $this->firestore->collection(config('firebase.collection.quotation'))->document($newDocumentId)->set($postData);
            Session::forget('url.intended');
            return redirect('admin/quotation')->with('status', 'Added successfully.');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('error', 'Error occurred.');
        }
    }

    public function update(Request $request, $key)
    {
        try {
            $messages = [
                'required' => 'This field is required.',
            ];

            $validator = Validator::make($request->all(), [
                'product_price_update' . $request->update_id => 'required|numeric|min:0|digits_between:1,8',
                'product_assurance_update' . $request->update_id => 'required|numeric|min:0|max:20',
                'product_down_payment_update' . $request->update_id => 'required|numeric|min:0|max:100',
                'product_after_install_update' . $request->update_id => 'required|numeric|min:0|max:100',
                'product_final_check_update' . $request->update_id => 'required|numeric|min:0|max:100',
                'product_price_validity_update' . $request->update_id => 'required|numeric|min:0|digits_between:1,3',
                'product_delivery_term_update' . $request->update_id => 'required|numeric|min:0|digits_between:1,3',
                'product_credit_day_update' . $request->update_id => 'required|numeric|min:0|digits_between:1,3',
                'product_discount_update' . $request->update_id => 'required|numeric|min:0|max:100',
                'update_id' => 'required'
            ], $messages);


            $validator->after(function ($validator) {
                if ($validator->getData()['product_down_payment_update' . $validator->getData()['update_id']] + $validator->getData()['product_after_install_update' . $validator->getData()['update_id']] + $validator->getData()['product_final_check_update' . $validator->getData()['update_id']] !== 100) {
                    $validator->errors()->add('product_down_payment_update' . $validator->getData()['update_id'], 'The sum of down payment, after install, final check fields must be equal to 100%.');
                    $validator->errors()->add('product_after_install_update' . $validator->getData()['update_id'], 'The sum of down payment, after install, final check fields must be equal to 100%.');
                    $validator->errors()->add('product_final_check_update' . $validator->getData()['update_id'], 'The sum of down payment, after install, final check fields must be equal to 100%.');
                }
            });

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput()->with('error', 'Error, can not add');
            }

            $postData = array(
                'edited_by' => Session::get('uid'),
                'edited_at' => new Timestamp(new DateTime()),
                'product_price' => (int)($request->get('product_price_update' . $request->update_id)),
                'product_down_payment' => (int)($request->get('product_down_payment_update' . $request->update_id)),
                'product_after_install' => (int)($request->get('product_after_install_update' . $request->update_id)),
                'product_final_check' => (int)($request->get('product_final_check_update' . $request->update_id)),
                'product_price_validity' => (int)($request->get('product_price_validity_update' . $request->update_id)),
                'product_delivery_term' => (int)($request->get('product_delivery_term_update' . $request->update_id)),
                'product_credit_day' => (int)($request->get('product_credit_update' . $request->update_id)),
                'product_discount' => (int)($request->get('product_discount_update' . $request->update_id)),
                'product_assurance' => (int)($request->get('product_assurance_update' . $request->update_id))
            );

            $updateQuotation = $this->firestore->collection(config('firebase.collection.quotation'))->document($key)->set($postData, ['merge' => true]);
            return back()->with('status', 'Updated successfully.');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('error', 'Error occurred.');
        }
    }

    public function pdfView($key)
    {
        // try {
            $documentData = $this->firestore->collection(config('firebase.collection.quotation'))->document($key)->snapshot()->data();


            if (!isset($documentData)) {
                return back()->with('error', 'No data available ');
            }

            $userDisplayNames = [];

            $createdTimestamp = $documentData['created_at']->get()->format('U');
            $documentData['created_at'] = 'Time: ' . date('H:i:s', $createdTimestamp) . ' Date: ' . date('d/m/Y', $createdTimestamp);

            $editedTimestamp = $documentData['edited_at']->get()->format('U');
            $documentData['edited_at'] = 'Time: ' . date('H:i:s', $editedTimestamp) . ' Date: ' . date('d/m/Y', $editedTimestamp);

            $productData = ['product_data' => $this->firestore->collection(config('firebase.collection.product'))->document($documentData['product_id'])->snapshot()->data()];
            if (isset($productData['product_data'])) {
                foreach ($productData['product_data']['technical_data'] as $technicalData) {
                    $technicalInfo[] = $this->firestore->collection(config('firebase.collection.technical_data'))->document($technicalData)->snapshot()->data();
                }
                $productData['product_data']['technical_data'] = $technicalInfo;
            } else {
                $productData = ['product_data' => null];
            }

            $clientData = ['client_data' => $this->firestore->collection(config('firebase.collection.client'))->document($documentData['client_id'])->snapshot()->data()];

            $documentData['quotation_code'] = 'MQ-' . date('His', $createdTimestamp) . '-' . date('dmY', $createdTimestamp);

            $firebase_storage_path = config('firebase.storage_path.quotation_signature') . '/Signature.jpg';
            $bucketName = config('firebase.projects.app.storage.default_bucket');
            $bucket = $this->storage->getBucket($bucketName);
            $expiresAt = new DateTime('15 min');
            $signature =  ['signature' => $bucket->object($firebase_storage_path)->signedUrl($expiresAt, ['version' => 'v4'])];

            $groupName = ['group_name' => $this->firestore->collection(config('firebase.collection.product_group'))->where('product_group', '=', $productData['product_data']['product_group'])->documents()->rows()[0]->data()['product_group_name']];

            $quotation = array_merge($documentData, $clientData, $productData, $groupName, $signature);

            $pdf = Pdf::loadView('layouts/pdf/quotation', compact('quotation'));
            return $pdf->stream('Quotation.pdf', ['Attachment' => false]);
        // } catch (\Exception $exception) {
        //     Log::error($exception->getMessage());
        //     return back()->with('error', 'Error occurred.');
        // }
    }

    public function sendPDF(Request $request, $key)
    {
        // try {
            $messages = [
                'required' => 'This field is required.',
            ];

            $validator = Validator::make($request->all(), [
                'email' => 'required|max:30|email',
                'name' => 'required|max:30',
                'subject' => 'required|max:50',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput()->with('error', 'Error, email is not sent');
            }
            $quotationData = $this->firestore->collection(config('firebase.collection.quotation'))->document($key)->snapshot()->data();

            $productData = ['product_data' => $this->firestore->collection(config('firebase.collection.product'))->document($quotationData['product_id'])->snapshot()->data()];
            if (!empty($productData['product_data']['technical_data']) && isset($productData['product_data'])) {
                foreach ($productData['product_data']['technical_data'] as $technicalData) {
                    $technicalInfo[] = $this->firestore->collection(config('firebase.collection.technical_data'))->document($technicalData)->snapshot()->data();
                }
                $productData['product_data']['technical_data'] = $technicalInfo;
            }

            $clientData = ['client_data' => $this->firestore->collection(config('firebase.collection.client'))->document($quotationData['client_id'])->snapshot()->data()];

            $createdTimestamp = $quotationData['created_at']->get()->format('U');
            $quotationData['created_at'] = 'Time: ' . date('H:i:s', $createdTimestamp) . ' Date: ' . date('d/m/Y', $createdTimestamp);

            $editedTimestamp = $quotationData['edited_at']->get()->format('U');
            $quotationData['edited_at'] = 'Time: ' . date('H:i:s', $editedTimestamp) . ' Date: ' . date('d/m/Y', $editedTimestamp);

            $quotationData['quotation_code'] = 'MQ-' . date('His', $createdTimestamp) . '-' . date('dmY', $createdTimestamp);

            $firebase_storage_path = config('firebase.storage_path.quotation_signature') . '/Signature.jpg';
            $bucketName = config('firebase.projects.app.storage.default_bucket');
            $bucket = $this->storage->getBucket($bucketName);
            $expiresAt = new DateTime('15 min');
            $signature =  ['signature' => $bucket->object($firebase_storage_path)->signedUrl($expiresAt, ['version' => 'v4'])];

            $quotation = array_merge($quotationData, $clientData, $productData, $signature);

            $pdf = Pdf::loadView('layouts.pdf.quotation', compact('quotation'))->setPaper('A4', 'portrait');
            $data["email"] = $request->email;
            $data["name"] = $request->name;
            $data["subject"] = $request->subject;

            Mail::send('layouts.mail', compact('data'), function ($message) use ($data, $pdf) {
                $message->to($data["email"], $data["name"])
                    ->subject($data["subject"])
                    ->attachData($pdf->output(), "Quotation.pdf");
            });
            return redirect('admin/quotation')->with('status', 'Email has been successfully sent');
        // } catch (Exception $exception) {
        //     Log::error($exception->getMessage());
        //     return redirect('admin/quotation')->withInput()->with('error', 'Error occurred.');
        // }
    }
    public function delete($key)
    {
        try {
            $deleteDocument = $this->firestore->collection(config('firebase.collection.quotation'))->document($key)->delete();
            return back()->with('status', 'Deleted Successfully');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('error', 'Error occurred.');
        }
    }
}
