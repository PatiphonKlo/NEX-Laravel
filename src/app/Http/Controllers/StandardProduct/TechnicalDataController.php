<?php

namespace App\Http\Controllers\StandardProduct;

use App\Http\Controllers\Controller;
use App\Services\Firebase;
use Barryvdh\DomPDF\Facade\Pdf;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class TechnicalDataController extends Controller
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

    public function view($group, $model)
    {
        try {

            $productRef = $this->firestore->collection(config('firebase.collection.product'))->where('product_model', '=', $model)->documents()->rows()[0];

            $bucketName = config('firebase.projects.app.storage.default_bucket');
            $expiresAt = new DateTime('15 min');


            $subname = [
                'front',
                'side',
                'top'
            ];

            foreach ($subname as $subname) {
                $pathRef = config('firebase.storage_path.product_images') . '/' . $model . '-' . $subname . '.jpg';
                $bucket = $this->storage->getBucket($bucketName)->object($pathRef);
                $imageURL[] = $bucket->signedUrl($expiresAt, ['version' => 'v4']);
            }

            $technicalData = [];
            $productTechnical = $productRef->data()['technical_data'];
            if (isset($productTechnical)) {
                foreach ($productTechnical as $item) {
                    $technicalDocument = $this->firestore->collection(config('firebase.collection.technical_data'))->orderBy('technical_component')->documents();
                    if (empty($technicalDocument)) {
                        return view('pages/user/technical-data', compact('imageURL', 'model', 'group', 'technicalData'));
                    } else {
                        $data = $this->firestore->collection(config('firebase.collection.technical_data'))->document($item)->snapshot()->data();
                        $technicalData[] = [
                            'technical_component' => $data['technical_component'],
                            'specification' => $data['specification'],
                        ];
                    }
                }
            }
            return view('pages/user/technical-data', compact('imageURL', 'model', 'group', 'technicalData'));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('error', 'Error occurred.');
        }
    }

    public function sendPDF(Request $request, $group, $model)
    {
        try {
            $productRef = $this->firestore->collection(config('firebase.collection.product'))->where('product_model', '=', $model)->documents()->rows()[0];
            $key = $productRef->id();

            $messages = [
                'required' => 'This field is required.',
            ];

            $validator = Validator::make($request->all(), [
                'email' => 'required|max:30|email',
                'name' => 'required|max:30',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput()->with('error', 'Error, email is not sent');
            }

            $document = $this->firestore->collection(config('firebase.collection.product'))->document($key);
            $model = $document->snapshot()->data()['product_model'];
            $bucketName = config('firebase.projects.app.storage.default_bucket');
            $bucket = $this->storage->getBucket($bucketName);
            $expiresAt = new DateTime('15 minutes');

            $pathRef = config('firebase.storage_path.product_spec') . '/' . $model . '-spec-sheet.pdf';
            $sheetRef = $bucket->object($pathRef);

            if ($sheetRef->exists()) {
                $tempPath = tempnam(sys_get_temp_dir(), 'pdf');
                $pdfStream = $sheetRef->downloadAsStream();
                file_put_contents($tempPath, $pdfStream->getContents());
                $data["email"] = $request->email;
                $data["name"] = $request->name;
            
                Mail::send('layouts.mail', compact('data'), function ($message) use ($data, $tempPath) {
                    $message->to($data["email"], $data["name"])
                            ->subject('Specification Sheet')
                            ->attach($tempPath, ['as' => 'Specification-Sheet.pdf']);
                });
            
                unlink($tempPath); 
                return redirect('standard-product')->with('status', 'Email has been successfully sent');
            } else {
                return redirect()->back()->with('error', 'PDF not found.');
            }
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            return redirect('standard-product')->withInput()->with('error', 'Error occurred.');
        }
    }
}
