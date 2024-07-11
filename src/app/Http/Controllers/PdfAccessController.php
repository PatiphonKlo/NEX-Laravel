<?php

namespace App\Http\Controllers;

use App\Services\Firebase;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use DateTime;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;
use Illuminate\Support\Str;

class PdfAccessController extends Controller
{
    protected $firestore;
    protected $storage;
    public function __construct()
    {
        $this->firestore = (new Firebase)->firestoreDb;
        $this->storage = (new Firebase)->cloudstorage;
    }

    function validatePassword($type, $key, $password)
    {
        $collection = match ($type) {
            'enquiry' => config('firebase.collection.enquiry'),
            'quotation' => config('firebase.collection.quotation'),
            'spec' => config('firebase.collection.product'),
            default => null,
        };

        if (is_null($collection)) {
            return abort(404);
        }

        $pdfPassword = $this->firestore->collection($collection)->document($key)->snapshot()->data()[$type . '_password'];
        return $password === $pdfPassword;
    }

    function generateEncryptedToken($type, $key, $password, $minutes = 30)
    {
        if (!$this->validatePassword($type, $key, $password)) {
            throw new InvalidArgumentException('Invalid password');
        }

        $encryptionKey = Hash::make($password);
        $token = Str::random(40);
        $expiration = now()->addMinutes($minutes);

        $encryptedToken = encrypt([
            'token' => $token,
            'expires_at' => $expiration->getTimestamp(),
        ], [
            'driver' => 'argon2id',
            'key' => $encryptionKey
        ]);
        return $encryptedToken;
    }

    public function validatePasswordAndGenerateLink($type, $key, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'max:50'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $password = $request->password;

        if (!$this->validatePassword($type, $key, $password)) {
            return back()->withErrors(['password' => 'Invalid password']);
        }
        $pdfId = $key;
        $token = $this->generateEncryptedToken($type, $key, $password);
        Session::put('pdf_access', $pdfId);
        return redirect()->route($type . '.pdf', compact('key', 'token'));
    }

    public function viewEnquiryPDF($key)
    {
        try {

            $documentData = $this->firestore->collection(config('firebase.collection.enquiry'))->document($key)->snapshot()->data();
            if (!isset($documentData)) {
                return back()->with('error', 'Data not available ');
            }

            // ตรวจสอบ `expires_at` ของโทเค็น
            $token = request()->route('token');
            $decryptedToken = decrypt($token);
            $expirationTimestamp = $decryptedToken['expires_at'];
            if (time() > $expirationTimestamp) {
                return back()->with('error', 'Token has expired');
            }

            $userDisplayNames = [];

            $enquiryId = ['enquiry_id' => $key];
            $clientData = ['client_data' => $this->firestore->collection(config('firebase.collection.client'))->document($documentData['client_id'])->snapshot()->data()];
            $enquiryData[] = array_merge($enquiryId, $documentData, $clientData);

            $pdf = Pdf::loadView('layouts/pdf/enquiry', compact('enquiryData'));
            return $pdf->setPaper('A4', 'portrait')->stream('Enquiry-Sheet.pdf');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return response()->json(['error' => 'Error occurred'], 500);
        }
    }

    public function viewQuotationPDF($key)
    {
        try {

            $documentData = $this->firestore->collection(config('firebase.collection.quotation'))->document($key)->snapshot()->data();
            if (!isset($documentData)) {
                return back()->with('error', 'Data not available ');
            }

            // ตรวจสอบ `expires_at` ของโทเค็น
            $token = request()->route('token');
            $decryptedToken = decrypt($token);
            $expirationTimestamp = $decryptedToken['expires_at'];
            if (time() > $expirationTimestamp) {
                return back()->with('error', 'Token has expired');
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

            $firebase_storage_path = config('firebase.storage_path.quotation_signature') . '/Signature.svg';
            $bucketName = config('firebase.projects.app.storage.default_bucket');
            $bucket = $this->storage->getBucket($bucketName);
            $expiresAt = new DateTime('15 min');
            $signature =  ['signature' => $bucket->object($firebase_storage_path)->signedUrl($expiresAt, ['version' => 'v4'])];

            $groupName = ['group_name' => $this->firestore->collection(config('firebase.collection.product_group'))->where('product_group', '=', $productData['product_data']['product_group'])->documents()->rows()[0]->data()['product_group_name']];

            $quotation = array_merge($documentData, $clientData, $productData, $signature, $groupName);
            // dd($quotation);

            $pdf = Pdf::loadView('layouts/pdf/quotation', compact('quotation'));
            return $pdf->setPaper('A4', 'portrait')->stream('Quotation.pdf');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return response()->json(['error' => 'Error occurred'], 500);
        }
    }
}
