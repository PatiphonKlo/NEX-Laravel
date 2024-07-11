<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Firebase;
use Illuminate\Support\Facades\Cache;
use Google\Cloud\Core\Timestamp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Kreait\Firebase\Exception\Auth\UserNotFound;
use DateTime;
use Illuminate\Support\Facades\Log;

class TechnicalDataActionController extends Controller
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
            if (Cache::has('technical_data')) {
                $technicalData = Cache::get('technical_data');
                error_log('Data loaded from cache');
            } else {
                $technicalDataDocuments = $this->firestore->collection(config('firebase.collection.technical_data'))->documents();
                error_log('Data loaded from server');

                if ($technicalDataDocuments->isEmpty()) {
                    return view('pages/admin/technical-data/cms')->with('message', 'No Data Available ');
                }

                $userDisplayNames = [];

                foreach ($technicalDataDocuments as $technicalDataDocument) {
                    $documentData = $technicalDataDocument->data();
                    if (isset($documentData['created_at']) && $documentData['created_at'] instanceof Timestamp) {
                        $createdTimestamp = $documentData['created_at']->get()->format('U');
                        $documentData['created_at'] = 'Time: ' . date('H:i:s', $createdTimestamp) . ' Date: ' . date('d/m/Y', $createdTimestamp);
                    }

                    if (isset($documentData['edited_at']) && $documentData['edited_at'] instanceof Timestamp) {
                        $editedTimestamp = $documentData['edited_at']->get()->format('U');
                        $documentData['edited_at'] = 'Time: ' . date('H:i:s', $editedTimestamp) . ' Date: ' . date('d/m/Y', $editedTimestamp);
                    }

                    if (isset($documentData['created_by']) && isset($documentData['edited_by'])) {
                        if (!isset($userDisplayNames[$documentData['created_by']])) {
                            try {
                                $userDisplayNames[$documentData['created_by']] = $this->auth->getUser($documentData['created_by'])->email;
                            } catch (UserNotFound $e) {
                                echo $e->getMessage();
                            }
                        }

                        if (!isset($userDisplayNames[$documentData['edited_by']])) {
                            try {
                                $userDisplayNames[$documentData['edited_by']] = $this->auth->getUser($documentData['edited_by'])->email;
                            } catch (UserNotFound $e) {
                                echo $e->getMessage();
                            }
                        }

                        $documentData['created_by'] = $userDisplayNames[$documentData['created_by']];
                        $documentData['edited_by'] = $userDisplayNames[$documentData['edited_by']];
                    }

                    $key = array('technical_data_id' => $technicalDataDocument->id());
                    $technicalData[] = array_merge($documentData, $key);
                }
                Cache::put('technical_data', $technicalData, config('cache.cache_duration'));
            }

            return view('pages/admin/technical-data/cms', compact('technicalData'));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('error', 'Error occurred.');
        }
    }

    public function add(Request $request)
    {
        try {
            $messages = [
                'required' => 'This field is required.',
            ];

            $validator = Validator::make($request->all(), [
                'technical_component' => 'required|max:50',
                'energy_consumption' => 'required|numeric|min:0|max:24',
                'specification' => 'required|max:100',
            ], $messages);

            # If validator not as required return with error and user input
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput()->with('error', 'Error, can not add data');
            }

            $newDocument = $this->firestore->collection(config('firebase.collection.technical_data'))->newDocument();
            $documentKey = $newDocument->id();

            $postData = [
                'technical_component' => $request->technical_component,
                'energy_consumption' => $request->energy_consumption,
                'specification' => $request->specification,
                'created_at' => new Timestamp(new DateTime()),
                'created_by' => Session::get('uid'),
                'edited_at' => new Timestamp(new DateTime()),
                'edited_by' => Session::get('uid'),
            ];

            $setDocument = $this->firestore->collection(config('firebase.collection.technical_data'))->document($documentKey)->set($postData);
            return back()->with('status', $request->technical_component . ' added successfully');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('error', 'Error, can not add data');
        }
    }
    public function update(Request $request, $key)
    {
        try {
            $messages = [
                'required' => 'This field is required.',
            ];
            $validator = Validator::make($request->all(), [
                'technical_component_update' . $request->update_id => 'required|max:50',
                'energy_consumption_update' . $request->update_id => 'required|numeric|min:0|max:24',
                'specification_update' . $request->update_id => 'required|max:100',
                'update_id' => 'required'
            ], $messages);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput()->with('error', 'Error, can not update data');
            }

            $postData = [
                'technical_component' => $request->get('technical_component_update' . $request->update_id),
                'energy_consumption' => $request->get('energy_consumption_update' . $request->update_id),
                'specification' => $request->get('specification_update' . $request->update_id),
                'edited_at' => new Timestamp(new DateTime()),
                'edited_by' => Session::get('uid')
            ];

            $updateDocument = $this->firestore->collection(config('firebase.collection.technical_data'))->document($key)->set($postData, ['merge' => true]);
            return back()->with('status', 'Technical data updated successfully');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('error', 'Error, can not update data');
        }
    }

    public function delete($key)
    {
        try {
            $technicalDocument = $this->firestore->collection(config('firebase.collection.technical_data'))->document($key);
            $productDocument = $this->firestore->collection(config('firebase.collection.product'))->where('technical_data', 'array-contains', $key)->documents();

            $collection = config('firebase.collection.product');
            $field = 'technical_data';
            $member = $key;

            // Call the removeMemberFromArray method
            $this->removeMemberFromArray($productDocument, $collection, $field, $member);

            // Delete the technicalDocument
            $technicalDocument->delete();

            return back()->with('status', 'Technical data deleted successfully');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('error', 'Error, can not delete data');
        }
    }

    private function removeMemberFromArray($documents, $collection, $field, $member)
    {
        foreach ($documents as $document) {
            if ($document->exists()) {
                $data = $document->data();
                if (isset($data[$field]) && is_array($data[$field])) {
                    $array = $data[$field];
                    $key = array_search($member, $array);
                    if ($key !== false) {
                        unset($array[$key]);
                        $array = array_values($array); // Reindex the array
                        $documentRef = $document->reference();
                        $documentRef->update([
                            ['path' => $field, 'value' => $array]
                        ]);
                    }
                }
            }
        }
    }
}
