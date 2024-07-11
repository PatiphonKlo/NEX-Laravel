<?php

namespace App\Http\Controllers\StandardProduct;

use App\Http\Controllers\Controller;
use App\Services\Firebase;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
}
