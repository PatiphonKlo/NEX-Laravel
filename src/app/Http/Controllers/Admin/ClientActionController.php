<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Firebase;
use Google\Cloud\Core\Timestamp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Kreait\Firebase\Exception\Auth\UserNotFound;
use DateTime;
use Illuminate\Support\Facades\Log;

class ClientActionController extends Controller
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
            $clientDocuments = $this->firestore->collection(config('firebase.collection.client'))->documents();
            if ($clientDocuments->isEmpty()) {
                return view('pages/admin/client/cms')->with('message', 'No Data Available');
            }
            foreach ($clientDocuments as $clientDocument) {
                $data = $clientDocument->data();
                if (isset($data['created_at']) && $data['created_at'] instanceof Timestamp) {
                    $createdTimestamp = $data['created_at']->get()->format('U');
                    $data['created_at'] = 'Time: ' . date('H:i:s', $createdTimestamp) . ' Date: ' . date('d/m/Y', $createdTimestamp);
                }

                if (isset($data['edited_at']) && $data['edited_at'] instanceof Timestamp) {
                    $editedTimestamp = $data['edited_at']->get()->format('U');
                    $data['edited_at'] = 'Time: ' . date('H:i:s', $editedTimestamp) . ' Date: ' . date('d/m/Y', $editedTimestamp);
                }

                if (isset($data['edited_by'])) {
                    try {
                        $editedUser = $this->auth->getUser($data['edited_by']);
                    } catch (UserNotFound $e) {
                        echo $e->getMessage();
                    }
                    $data['edited_by'] = $editedUser->email;
                }

                if (isset($data['created_by'])) {
                    try {
                        $editedUser = $this->auth->getUser($data['created_by']);
                    } catch (UserNotFound $e) {
                        echo $e->getMessage();
                    }
                    $data['created_by'] = $editedUser->email;
                }

                $key = array('client_id' => $clientDocument->id());
                $clientData[] = array_merge($data, $key);
            }

            return view('pages/admin/client/cms', compact('clientData'));
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
                'client_contact_name' => 'required|max:50',
                'client_phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'client_email' => 'required|max:50|email',
                'client_company' => 'required|max:100',
            ], $messages);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput()->with('error', 'Error, can not add');
            }

            $newDocument = $this->firestore->collection(config('firebase.collection.client'))->newDocument();
            $documentKey = $newDocument->id();

            $postData = [
                'client_contact_name' => $request->client_contact_name,
                'client_phone_number' => $request->client_phone_number,
                'client_email' => $request->client_email,
                'client_company' => $request->client_company,
                'created_at' => new Timestamp(new DateTime()),
                'created_by' => Session::get('uid'),
                'edited_at' => new Timestamp(new DateTime()),
                'edited_by' => Session::get('uid'),
            ];

            $setDocument = $this->firestore->collection(config('firebase.collection.client'))->document($documentKey)->set($postData);
            return redirect('admin/client')->with('status', 'Added successfully');
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
                'client_email' => 'email format invalid',
                'regex' => 'format invalid'
            ];
            $validator = Validator::make($request->all(), [
                'client_contact_name_update' . $request->update_id => 'required|max:50',
                'client_phone_number_update' . $request->update_id => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'client_email_update' . $request->update_id => 'required|max:50|email',
                'client_company_update' . $request->update_id => 'required|max:100',
                'update_id' => 'required'
            ], $messages);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput()->with('error', 'Error, can not update');
            }

            $postData = [
                'client_contact_name' => $request->get('client_contact_name_update' . $request->update_id),
                'client_phone_number' => $request->get('client_phone_number_update' . $request->update_id),
                'client_email' => $request->get('client_email_update' . $request->update_id),
                'client_company' => $request->get('client_company_update' . $request->update_id),
                'edited_at' => new Timestamp(new DateTime()),
                'edited_by' => Session::get('uid')
            ];

            $updateDocument = $this->firestore->collection(config('firebase.collection.client'))->document($key)->set($postData, ['merge' => true]);
            return redirect('admin/client')->with('status', 'Updated successfully');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('error', 'Error, can not update data');
        }
    }
    public function delete($key)
    {
        try {
            $document = $this->firestore->collection(config('firebase.collection.client'))->document($key);
            $deleteDocument = $document->delete();
            return redirect('admin/client')->with('status', 'Deleted sucessfully');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('error', 'Error, can not delete data');
        }
    }
}
