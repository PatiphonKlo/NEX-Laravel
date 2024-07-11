<?php

namespace App\Http\Controllers\StandardProduct;

use App\Http\Controllers\Controller;
use App\Services\Firebase;
use DateTime;
use Illuminate\Support\Facades\Log;

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

    public function view($group, $model)
    {
        try {
            $productDocument = $this->firestore->collection(config('firebase.collection.product'))->where('product_model', '=', $model)->documents()->rows()[0];
            $productId = $productDocument->id();
            $productData = $productDocument->data() ?? [];

            if (!empty($productData)) {
                $bucketName = config('firebase.projects.app.storage.default_bucket');
                $expiresAt = new DateTime('15 min');
                $pathRef = config('firebase.storage_path.product_images') . '/' . $model . '-picture.jpg';

                $bucket = $this->storage->getBucket($bucketName)->object($pathRef);
                $imageURL = $bucket->signedUrl($expiresAt, ['version' => 'v4']);
            }

            $technicalData = [];
            $productTechnical = $productDocument->data()['technical_data'];
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

            return view('pages/user/quotation-request', compact('productData', 'imageURL', 'model', 'group', 'technicalData'));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('error', 'Error occurred.');
        }
    }

    public function viewRequest($model, $postKey)
    {
        try {
            $productDocument = $this->firestore->collection(config('firebase.collection.product'))->where('product_model', '=', $model)->documents()->rows()[0];
            $productId = $productDocument->id();
            $productData = $productDocument->data() ?? [];

            $technicalData = [];
            $productTechnical = $productDocument->data()['technical_data'];
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

            $clientData = $this->firestore->collection(config('firebase.collection.client'))->document($postKey)->snapshot()->data();
            return view('pages/user/quotation-confirm-request', compact('productData', 'model', 'technicalData', 'postKey', 'clientData'));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('error', 'Error occurred.');
        }
    }
}
