<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Firebase;
use DateTime;
use Google\Cloud\Core\Timestamp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Kreait\Firebase\Exception\Auth\UserNotFound;

class CostEstimateActionController extends Controller
{
    protected $firestore;
    protected $auth;

    public function __construct()
    {
        $this->firestore = (new Firebase)->firestoreDb;
        $this->auth = (new Firebase)->authentication;
    }
    public function view()
    {
        try {
            $productGroupDocs = $this->firestore->collection(config('firebase.collection.product_group'))->documents();
            if ($productGroupDocs->isEmpty()) {
                return view('pages/admin/cost-estimation/cms')->with('message', 'No data avaliable');
            }
            foreach ($productGroupDocs as $productGroupDoc) {
                $data = $productGroupDoc->data();

                if (isset($data['created_at']) && $data['created_at'] instanceof Timestamp) {
                    $createdTimestamp = $data['created_at']->get()->format('U');
                    $data['created_at'] = 'Time: ' . date('H:i:s', $createdTimestamp) . ' Date: ' . date('d/m/Y', $createdTimestamp);
                }

                if (isset($data['edited_at']) && $data['edited_at'] instanceof Timestamp) {
                    $editedTimestamp = $data['edited_at']->get()->format('U');
                    $data['edited_at'] = 'Time: ' . date('H:i:s', $editedTimestamp) . ' Date: ' . date('d/m/Y', $editedTimestamp);
                }

                if (isset($data['created_by']) && isset($data['edited_by'])) {
                    try {
                        $createdUser = $this->auth->getUser($data['created_by']);
                        $editedUser = $this->auth->getUser($data['edited_by']);
                    } catch (UserNotFound $e) {
                        echo $e->getMessage();
                    }
                    $data['created_by'] = $createdUser->email;
                    $data['edited_by'] = $editedUser->email;
                }
                $productGroupId = [
                    'product_group_id' => $productGroupDoc->id()
                ];
                $productGroupData[] = array_merge($productGroupId, $data);
            }

            return view('pages/admin/cost-estimation/cms', compact('productGroupData'));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('error', 'Error, Can not update data');
        }
    }

    public function add(Request $request)
    {
        try {
            $messages = [
                'required' => 'This field is required.',
                'max' => 'This field must not be greater than 9999999.',
                'min' => 'This field must not be less than 0.'
            ];

            $validator = Validator::make($request->all(), [], $messages);
            $validator->addRules([
                'product_group' => 'required|max:50',
                'product_group_name' => 'required|max:50',
                'product_min_cost' => 'required|numeric|min:0|max:9999999',
                'product_max_cost' => 'required|numeric|min:0|max:9999999',
            ], $messages);

            $validator->after(function ($validator) {
                if ($validator->getData()['product_min_cost'] >= $validator->getData()['product_max_cost']) {
                    $validator->errors()->add('product_min_cost', 'The minnimum value can not be equal or greater than maximum value');
                    $validator->errors()->add('product_max_cost', 'The maximum value can not be equal or less than minimum value');
                }
            });

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput()->with('error', 'Error, can not add data');
            }

            $postData = [
                'created_at' => new Timestamp(new DateTime()),
                'created_by' => Session::get('uid'),
                'edited_at' => new Timestamp(new DateTime()),
                'edited_by' => Session::get('uid'),
                'product_group' => $request->get('product_group' . $request->update_key),
                'product_group_name' => $request->get('product_group_name' . $request->update_key),
                'product_min_cost' => $request->get('product_min_cost' . $request->update_key),
                'product_max_cost' => $request->get('product_max_cost' . $request->update_key),
            ];

            $newDocument = $this->firestore->collection(config('firebase.collection.product_group'))->newDocument();
            $documentKey = $newDocument->id();
            $setDocument = $this->firestore->collection(config('firebase.collection.product_group'))->document($documentKey)->set($postData);

            return back()->with('status', 'Add updated successfully');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('error', 'Error, Can not update data');
        }
    }

    public function update(Request $request, $key)
    {
        try {
            $document = $this->firestore->collection(config('firebase.collection.product_group'))->document($key);
            $group = $document->snapshot()->data()['product_group'];
            $messages = [
                'required' => 'This field is required.',
                'max' => 'This field must not be greater than 9999999.',
                'min' => 'This field must not be less than 0.'
            ];

            $validatorUpdate = Validator::make($request->all(), [], $messages);
            $validatorUpdate->addRules([
                'product_group_update' . $request->get('update_key') => 'required|max:50',
                'product_group_name_update' . $request->get('update_key') => 'required|max:50',
                'product_min_cost_update' . $request->get('update_key') => 'required|numeric|min:0|max:9999999',
                'product_max_cost_update' . $request->get('update_key') => 'required|numeric|min:0|max:9999999',
                'update_key' => 'required'
            ], $messages);

            $validatorUpdate->after(function ($validatorUpdate) {
                if ($validatorUpdate->getData()['product_min_cost_update' . $validatorUpdate->getData()['update_key']] >= $validatorUpdate->getData()['product_max_cost_update' . $validatorUpdate->getData()['update_key']]) {
                    $validatorUpdate->errors()->add('product_min_cost_update' . $validatorUpdate->getData()['update_key'], 'The minnimum value can not be equal or greater than maximum value');
                    $validatorUpdate->errors()->add('product_max_cost_update' . $validatorUpdate->getData()['update_key'], 'The maximum value can not be equal or less than minimum value');
                }
            });

            if ($validatorUpdate->fails()) {
                return back()->withErrors($validatorUpdate)->withInput()->with('error', 'Error, can not update ' . $group);
            }

            $postData = [
                'product_group' => $request->get('product_group_update' . $request->update_key),
                'product_group_name' => $request->get('product_group_name_update' . $request->update_key),
                'product_min_cost' => $request->get('product_min_cost_update' . $request->update_key),
                'product_max_cost' => $request->get('product_max_cost_update' . $request->update_key),
            ];
            $document = $this->firestore->collection(config('firebase.collection.product_group'))->document($key);
            $updateDocument = $document->set($postData, ['merge' => true]);

            return back()->with('status', $request->get('product_group_update' . $request->update_key) . ' updated successfully');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('error', 'Error, Can not update data');
        }
    }
    public function delete($key)
    {
        try {
            $document = $this->firestore->collection(config('firebase.collection.product_group'))->document($key);
            $deleteDocument = $document->delete();
            return back()->with('status', 'Deleted sucessfully');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('error', 'Error, can not delete data');
        }
    }
}
