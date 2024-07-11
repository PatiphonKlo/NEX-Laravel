<?php

namespace App\Http\Controllers\StandardProduct;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Services\Firebase;
use DateTime;

class ProductController extends Controller
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

    public function view(Request $request)
    {
        try {
            $documents = $this->firestore->collection(config('firebase.collection.product'))->orderBy('product_model')->documents();
            $groupedModel = [];
            $currentGroup = $request->group ?? '';
            $currentModel = $request->model ?? '';

            if (!empty($documents)) {
                $bucketName = config('firebase.projects.app.storage.default_bucket');
                $expiresAt = new DateTime('15 min');

                foreach ($documents as $document) {
                    $data = $document->data();

                    if (isset($data['product_group'], $data['product_model'])) {
                        $groupedModel[$data['product_group']][$data['product_model']] = [
                            'image_url' => null,
                        ];

                        $pathRef = config('firebase.storage_path.product_images') . '/' . $data['product_model'] . '-picture.jpg';

                        $bucket = $this->storage->getBucket($bucketName)->object($pathRef);
                        $imageURL = $bucket->signedUrl($expiresAt, ['version' => 'v4']);
                        $groupedModel[$data['product_group']][$data['product_model']]['image_url'] = $imageURL;
                    }
                }
            }
            return view('pages/user/standard-product', compact('groupedModel', 'currentGroup', 'currentModel'));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('error', 'Error occurred.');
        }
    }
}
