<?php

namespace App\Http\Controllers\StandardProduct;

use App\Http\Controllers\Controller;
use App\Services\Firebase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AssemblyPartController extends Controller
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
            $productId = $productRef->id();
            $productPart = $productRef->data()['assembly_part'];
            $assemblyData = [];
            if (isset($productPart)) {
                for ($i = 0; $i < count($productPart); $i++) {
                    $assemblyParts = $this->realtime->getReference(config('firebase.reference.assembly_part') . '/' . $productPart[$i])->getValue();
                    if (!isset($assemblyParts)) {
                        return view('pages/user/assembly-part', compact('model', 'assemblyData', 'group'));
                    }
                    $assemblyData[] = [
                        'part_image' => $assemblyParts['part_image'],
                        'part_name' => $assemblyParts['part_name'],
                        'part_id' => $assemblyParts['part_id'],
                        'spare_part' => $assemblyParts['spare_part']
                    ];
                }
            }
            return view('pages/user/assembly-part', compact('model', 'assemblyData', 'group'));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('error', 'Error occurred.');
        }
    }
}
