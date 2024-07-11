<?php

namespace App\Http\Controllers\StandardProduct;

use App\Http\Controllers\Controller;
use App\Services\Firebase;
use DateTime;
use Google\Cloud\Core\Timestamp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
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

            return view('pages/user/client-add', compact('productData', 'model', 'group', 'technicalData'));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('error', 'Error occurred.');
        }
    }

    public function add(Request $request, $model)
    {
        try {
            $messages = [
                'required' => 'This field is required.',
            ];
            $validator = Validator::make($request->all(), [], $messages);
            $validator->addRules([
                'name' => 'required|max:35',
                'email' => 'required|email',
                'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'company' => 'required|max:50'
            ]);
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            $postData = [
                'created_at' => new Timestamp(new DateTime()),
                'created_by' => Session::get('uid') ?? null,
                'edited_at' => new Timestamp(new DateTime()),
                'edited_by' => Session::get('uid') ?? null ,
                'client_contact_name' => $request->name,
                'client_phone_number' => $request->phone,
                'client_email' => $request->email,
                'client_company' => $request->company
            ];

            $newDocument = $this->firestore->collection(config('firebase.collection.client'))->newDocument();
            $postKey = $newDocument->id();
            $setDocument = $this->firestore->collection(config('firebase.collection.client'))->document($postKey)->set($postData);

            return redirect()->route('view.request', [$model, $postKey]);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('error', 'Error occurred.');
        }
    }

    public function edit($model, $postKey)
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


            return view('pages/user/client-edit', compact('productData', 'model', 'technicalData', 'clientData', 'postKey'));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('error', 'Error occurred.');
        }
    }

    public function update(Request $request, $model)
    {
        try {
            $messages = [
                'required' => 'This field is required.',
            ];
            $validator = Validator::make($request->all(), [], $messages);
            $validator->addRules([
                'name' => 'required|max:35',
                'email' => 'required|email',
                'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'company' => 'required|max:50'
            ]);
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            $postData = [
                'edited_at' => new Timestamp(new DateTime()),
                'edited_by' => Session::get('uid') ?? null ,
                'client_contact_name' => $request->name,
                'client_phone_number' => $request->phone,
                'client_email' => $request->email,
                'client_company' => $request->company
            ];

            $newDocument = $this->firestore->collection(config('firebase.collection.client'))->newDocument();
            $postKey = $newDocument->id();
            $setDocument = $this->firestore->collection(config('firebase.collection.client'))->document($postKey)->set($postData, ['merge' => true]);

            return redirect()->route('view.request', [$model, $postKey])->with('status', 'Edited successfully');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('error', 'Error occurred.');
        }
    }
}
