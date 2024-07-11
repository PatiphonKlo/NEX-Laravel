<?php

namespace App\Http\Controllers\StandardProduct;

use App\Http\Controllers\Controller;
use App\Services\Firebase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CostEstimationController extends Controller
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

    public function view()
    {
        try {
            $productGroupDocuments = $this->firestore->collection(config('firebase.collection.product_group'))->documents();
            $costEstimation = [];

            if ($productGroupDocuments->isEmpty()) {
                return view('pages/user/cost-estimation', compact('costEstimation'));
            }

            foreach ($productGroupDocuments as $productGroupDocument) {
                $costEstimation[] = $productGroupDocument->data();
            }
            return view('pages/user/cost-estimation', compact('costEstimation'));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('error', 'Error occurred.');
        }
    }
}
