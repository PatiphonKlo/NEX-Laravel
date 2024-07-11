<?php

namespace App\Http\Controllers\StandardProduct;

use App\Http\Controllers\Controller;
use App\Services\Firebase;
use Barryvdh\DomPDF\Facade\Pdf;
use DateTime;
use Exception;
use Google\Cloud\Core\Timestamp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class QuotationController extends Controller
{
    protected $firestore;
    protected $realtime;
    protected $storage;

    public function __construct()
    {
        $this->firestore = (new Firebase)->firestoreDb;
        $this->realtime = (new Firebase)->realtimeDb;
        $this->storage = (new Firebase)->cloudstorage;
    }

    private function quotationData($group, $model)
    {
        $productDocument = $this->firestore->collection(config('firebase.collection.product'))->where('product_model', '=', $model)->documents()->rows()[0];
        $productId = $productDocument->id();
        $productData = $productDocument->data();

        $bucketName = config('firebase.projects.app.storage.default_bucket');
        $expiresAt = new DateTime('15 min');
        $pathRef = config('firebase.storage_path.product_images') . '/' . $model . '-picture.jpg';
        $bucket = $this->storage->getBucket($bucketName)->object($pathRef);
        $imageURL = $bucket->signedUrl($expiresAt, ['version' => 'v4']);

        $technicalData = [];
        $productTechnical = $productDocument->data()['technical_data'];

        if (!empty($productTechnical)) {
            $technicalData = $this->fetchTechnicalData($productTechnical);
            if (empty($technicalData)) {
                return $this->handleEmptyTechnicalData($model, $group);
            }
        }

        return [
            'productData' => $productData,
            'imageURL' => $imageURL,
            'model' => $model,
            'group' => $group,
            'technicalData' => $technicalData
        ];
    }

    private function fetchTechnicalData($productTechnical)
    {
        $technicalData = [];
        foreach ($productTechnical as $item) {
            $technicalDocument = $this->firestore->collection(config('firebase.collection.technical_data'))->orderBy('technical_component')->documents();
            if (!empty($technicalDocument)) {
                $data = $this->firestore->collection(config('firebase.collection.technical_data'))->document($item)->snapshot()->data();
                $technicalData[] = [
                    'technical_component' => $data['technical_component'],
                    'specification' => $data['specification'],
                ];
            }
        }
        return $technicalData;
    }

    private function handleEmptyTechnicalData($model, $group)
    {
        return back()->with('error', 'technical data not found.');
    }

    public function viewPreQuotation($group, $model)
    {
        try {
            $data = $this->quotationData($group, $model);
            if (empty($data)) {
                return back()->with('error', 'No data available for the provided parameters.');
            }
            $productData = $data['productData'] ?? [];
            $imageURL = $data['imageURL'] ?? null;
            $technicalData = $data['technicalData'] ?? [];
            return view('pages/user/quotation-request', compact('productData', 'imageURL', 'model', 'group', 'technicalData'));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('error', 'Error occurred.');
        }
    }

    public function viewQuotationForm($group, $model)
    {
        try {
            $data = $this->quotationData($group, $model);
            if (empty($data)) {
                return back()->with('error', 'No data available for the provided parameters.');
            }
            $productData = $data['productData'] ?? [];
            $technicalData = $data['technicalData'] ?? [];
            return view('pages/user/quotation-form', compact('productData', 'model', 'group', 'technicalData'));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('error', 'Error occurred.');
        }
    }

    private function addClient(Request $request)
    {
        $postData = [
            'created_at' => new Timestamp(new DateTime()),
            'created_by' => Session::get('uid') ?? null,
            'edited_at' => new Timestamp(new DateTime()),
            'edited_by' => Session::get('uid') ?? null,
            'client_contact_name' => $request->name,
            'client_phone_number' => $request->phone,
            'client_email' => $request->email,
            'client_company' => $request->company
        ];

        $newDocument = $this->firestore->collection(config('firebase.collection.client'))->newDocument();
        $clientId = $newDocument->id();
        $setDocument = $this->firestore->collection(config('firebase.collection.client'))->document($clientId)->set($postData);

        return [
            'clientId' => $clientId
        ];
    }

    public function addQuotation(Request $request, $group, $model)
    {
        try {
            $productDocument = $this->firestore->collection(config('firebase.collection.product'))->where('product_model', '=', $model)->documents()->rows()[0];
            $productData = $productDocument->data();
            $productId = $productDocument->id();
            $newDocument = $this->firestore->collection(config('firebase.collection.quotation'))->newDocument();
            $quotationId = $newDocument->id();

            $messages = [
                'required' => 'This field is required.',
            ];

            $validator = Validator::make($request->all(), [
                'name' => 'required|max:35',
                'email' => 'required|email',
                'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'company' => 'required|max:50',
                'product_amount' => 'nullable|numeric|min:0|digits_between:1,3',
                'product_price' => 'nullable|numeric|min:0|digits_between:1,8',
                'product_down_payment' => 'nullable|numeric|min:0|max:100',
                'product_after_install' => 'nullable|numeric|min:0|max:100',
                'product_final_check' => 'nullable|numeric|min:0|max:100',
                'product_price_validity' => 'nullable|numeric|min:0|digits_between:1,3',
                'product_delivery_term' => 'nullable|numeric|min:0|digits_between:1,3',
                'product_credit_day' => 'nullable|numeric|min:0|digits_between:1,3'
            ]);

            $validator->after(function ($validator) {
                if ($validator->getData()['product_down_payment'] + $validator->getData()['product_after_install'] + $validator->getData()['product_final_check'] !== 100) {
                    $validator->errors()->add('product_down_payment', 'The sum of down payment, after install, final check fields must be equal to 100%.');
                    $validator->errors()->add('product_after_install', 'The sum of down payment, after install, final check fields must be equal to 100%.');
                    $validator->errors()->add('product_final_check', 'The sum of down payment, after install, final check fields must be equal to 100%.');
                }
            });

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            $clientId = $this->addClient($request)['clientId'];

            $postData = array(
                'product_id' => $productId,
                'client_id' => $clientId,
                'quotation_password' => Str::random(10),
                'created_by' => Session::get('uid'),
                'created_at' => new Timestamp(new DateTime()),
                'edited_by' => Session::get('uid'),
                'edited_at' => new Timestamp(new DateTime()),
                'quotation_layout_name' => 'default',
                'product_amount' => (int)($request->product_amount) ?? (int)(1),
                'product_price' => (int)($request->product_price) ?? $productData['product_price'],
                'product_down_payment' => (int)($request->product_down_payment) ?? $productData['product_down_payment'],
                'product_after_install' => (int)($request->product_after_install) ?? $productData['product_after_install'],
                'product_final_check' => (int)($request->product_final_check) ?? $productData['product_final_check'],
                'product_price_validity' => (int)($request->product_price_validity) ?? $productData['product_price_validity'],
                'product_delivery_term' => (int)($request->product_delivery_term) ?? $productData['product_delivery_term'],
                'product_credit_day' => (int)($request->product_credit_day) ?? $productData['product_credit_day'],
                'product_discount' => $productData['product_discount'],
                'product_warranty' => $productData['product_warranty'],
            );

            $createQuotation = $this->firestore->collection(config('firebase.collection.quotation'))->document($quotationId)->set($postData);
            return redirect()->route('view.quotation', compact('group', 'model', 'clientId', 'quotationId'))->with('status', 'Added successfully.');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('error', 'Error occurred.');
        }
    }

    private function fetchQuotationData($quotationId)
    {
        $quotationData = $this->firestore->collection(config('firebase.collection.quotation'))->document($quotationId)->snapshot()->data();
        $productData = $this->firestore->collection(config('firebase.collection.product'))->document($quotationData['product_id'])->snapshot()->data();
        $model = $productData['product_model'];
        $group = $productData['product_group'];
        $clientId = $quotationData['client_id'];
        $clientData = $this->firestore->collection(config('firebase.collection.client'))->document($quotationData['client_id'])->snapshot()->data();

        $productTechnical = $productData['technical_data'];

        if (!empty($productTechnical)) {
            $technicalData = $this->fetchTechnicalData($productTechnical);
            if (empty($technicalData)) {
                return $this->handleEmptyTechnicalData($model, $group);
            }
        }

        return [
            'productData' => $productData,
            'technicalData' => $technicalData,
            'model' => $model,
            'clientId' => $clientId,
            'clientData' => $clientData,
            'quotationData' => $quotationData
        ];
    }

    public function viewQuotation($group, $model, $clientId, $quotationId)
    {
        try {
            $data = $this->fetchQuotationData($quotationId);
            if (empty($data)) {
                return back()->with('error', 'No data available for the provided parameters.');
            }
            $productData = $data['productData'] ?? [];
            $technicalData = $data['technicalData'] ?? [];
            $clientId = $data['clientId'] ?? [];
            $clientData = $data['clientData'] ?? [];
            $quotationData = $data['quotationData'] ?? [];

            return view('pages/user/quotation-view', compact('productData', 'group', 'model', 'technicalData', 'clientId', 'clientData', 'quotationData', 'quotationId'));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return redirect()->route('form.quotation')->with('error', 'Error occurred.');
        }
    }

    private function updateClient(Request $request, $clientId)
    {
        $updateData = [
            'edited_at' => new Timestamp(new DateTime()),
            'edited_by' => Session::get('uid') ?? null,
            'client_contact_name' => $request->name,
            'client_phone_number' => $request->phone,
            'client_email' => $request->email,
            'client_company' => $request->company
        ];

        $setDocument = $this->firestore->collection(config('firebase.collection.client'))->document($clientId)->set($updateData, ['merge' => true]);
    }

    public function updateQuotation(Request $request, $group, $model, $clientId, $quotationId)
    {
        try {
            $productDocument = $this->firestore->collection(config('firebase.collection.product'))->where('product_model', '=', $model)->documents()->rows()[0];
            $productData = $productDocument->data();

            $messages = [
                'required' => 'This field is required.',
            ];

            $validator = Validator::make($request->all(), [
                'name' => 'required|max:35',
                'email' => 'required|email',
                'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'company' => 'required|max:50',
                'product_amount' => 'nullable|numeric|min:0|digits_between:1,3',
                'product_price' => 'nullable|numeric|min:0|digits_between:1,8',
                'product_down_payment' => 'nullable|numeric|min:0|max:100',
                'product_after_install' => 'nullable|numeric|min:0|max:100',
                'product_final_check' => 'nullable|numeric|min:0|max:100',
                'product_price_validity' => 'nullable|numeric|min:0|digits_between:1,3',
                'product_delivery_term' => 'nullable|numeric|min:0|digits_between:1,3',
                'product_credit_day' => 'nullable|numeric|min:0|digits_between:1,3'
            ]);

            $validator->after(function ($validator) {
                if ($validator->getData()['product_down_payment'] + $validator->getData()['product_after_install'] + $validator->getData()['product_final_check'] !== 100) {
                    $validator->errors()->add('product_down_payment', 'The sum of down payment, after install, final check fields must be equal to 100%.');
                    $validator->errors()->add('product_after_install', 'The sum of down payment, after install, final check fields must be equal to 100%.');
                    $validator->errors()->add('product_final_check', 'The sum of down payment, after install, final check fields must be equal to 100%.');
                }
            });

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            $this->updateClient($request, $clientId);

            $updateData = array(
                'edited_by' => Session::get('uid'),
                'edited_at' => new Timestamp(new DateTime()),
                'quotation_layout_name' => 'default',
                'product_amount' => (int)($request->product_amount) ?? (int)(1),
                'product_price' => (int)($request->product_price) ?? $productData['product_price'],
                'product_down_payment' => (int)($request->product_down_payment) ?? $productData['product_down_payment'],
                'product_after_install' => (int)($request->product_after_install) ?? $productData['product_after_install'],
                'product_final_check' => (int)($request->product_final_check) ?? $productData['product_final_check'],
                'product_price_validity' => (int)($request->product_price_validity) ?? $productData['product_price_validity'],
                'product_delivery_term' => (int)($request->product_delivery_term) ?? $productData['product_delivery_term'],
                'product_credit_day' => (int)($request->product_credit_day) ?? $productData['product_credit_day'],
            );

            $updateQuotation = $this->firestore->collection(config('firebase.collection.quotation'))->document($quotationId)->set($updateData, ['merge' => true]);
            return redirect()->route('view.quotation', compact('group', 'model', 'clientId', 'quotationId'))->with('status', 'Updated successfully.');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return redirect()->route('form.quotation')->with('error', 'Error occurred.');
        }
    }

    public function sendQuotation($group, $model, $clientId, $quotationId)
    {
        $quotationData = $this->firestore->collection(config('firebase.collection.quotation'))->document($quotationId)->snapshot()->data();

        $productData = ['product_data' => $this->firestore->collection(config('firebase.collection.product'))->document($quotationData['product_id'])->snapshot()->data()];
        if (!empty($productData['product_data']['technical_data']) && isset($productData['product_data'])) {
            foreach ($productData['product_data']['technical_data'] as $technicalData) {
                $technicalInfo[] = $this->firestore->collection(config('firebase.collection.technical_data'))->document($technicalData)->snapshot()->data();
            }
            $productData['product_data']['technical_data'] = $technicalInfo;
        }

        $clientData = ['client_data' => $this->firestore->collection(config('firebase.collection.client'))->document($clientId)->snapshot()->data()];

        $createdTimestamp = $quotationData['created_at']->get()->format('U');
        $quotationData['created_at'] = 'Time: ' . date('H:i:s', $createdTimestamp) . ' Date: ' . date('d/m/Y', $createdTimestamp);

        $editedTimestamp = $quotationData['edited_at']->get()->format('U');
        $quotationData['edited_at'] = 'Time: ' . date('H:i:s', $editedTimestamp) . ' Date: ' . date('d/m/Y', $editedTimestamp);

        $quotationData['quotation_code'] = 'MQ-' . date('His', $createdTimestamp) . '-' . date('dmY', $createdTimestamp);

        $firebase_storage_path = config('firebase.storage_path.quotation_signature') . '/Signature.svg';
        $bucketName = config('firebase.projects.app.storage.default_bucket');
        $bucket = $this->storage->getBucket($bucketName);
        $expiresAt = new DateTime('15 min');
        $signature =  ['signature' => $bucket->object($firebase_storage_path)->signedUrl($expiresAt, ['version' => 'v4'])];

        $quotation = array_merge($quotationData, $clientData, $productData, $signature);

        $pdf = Pdf::loadView('layouts.pdf.quotation', compact('quotation'))->setPaper('A4', 'portrait');
        $data["email"] = $clientData['client_data']['client_email'];
        $data["name"] = $clientData['client_data']['client_contact_name'];
        $data["subject"] = 'Quotation of Product Model : ' . $productData['product_data']['product_model'];

        Mail::send('layouts.mail', compact('data'), function ($message) use ($data, $pdf) {
            $message->to($data["email"], $data["name"])
                ->subject($data["subject"])
                ->attachData($pdf->output(), "Quotation.pdf");
        });
        return back()->with('status', 'Email has been successfully sent');
        
    }
}
