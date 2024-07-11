<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Firebase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Google\Cloud\Core\Timestamp;
use Datetime;
use DateTimeZone;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Kreait\Firebase\Exception\Auth\UserNotFound;

class AssemblyPartActionController extends Controller
{
    protected $firestore;
    protected $storage;
    protected $realtime;
    protected $auth;

    public function __construct()
    {
        $this->firestore = (new Firebase)->firestoreDb;
        $this->storage = (new Firebase)->cloudstorage;
        $this->realtime = (new Firebase)->realtimeDb;
        $this->auth = (new Firebase)->authentication;
    }

    public function view()
    {
        try {
            if (Cache::has('assembly_parts_data')) {
                $assemblyPartsData = Cache::get('assembly_parts_data');
                error_log('Data loaded from cache');
            } else {
                $assemblyParts = $this->realtime->getReference('ASSEMBLY_PARTS')->getValue();
                error_log('Data loaded from server');

                if (!isset($assemblyParts)) {
                    return view('pages/admin/assembly-part/cms')->with('message', 'No Data Available ');
                }

                $userDisplayNames = [];

                foreach ($assemblyParts as $documentData) {

                    if (isset($documentData['edited_at'])) {
                        $date = new DateTime($documentData['edited_at']);
                        $date->setTimezone(new DateTimeZone('Etc/GMT-7'));
                        $documentData['edited_at'] = 'Time: ' . $date->format('H:i:s') . ' Date: ' . $date->format('d/m/Y');
                    }

                    if (isset($documentData['edited_by'])) {
                        if (!isset($userDisplayNames[$documentData['edited_by']])) {
                            try {
                                $userDisplayNames[$documentData['edited_by']] = $this->auth->getUser($documentData['edited_by'])->email;
                            } catch (UserNotFound $e) {
                                echo $e->getMessage();
                            }
                        }
                        $documentData['edited_by'] = $userDisplayNames[$documentData['edited_by']];
                    }

                    $assemblyPartsData[] = $documentData;
                }

                Cache::put('assembly_parts_data', $assemblyPartsData, config('cache.cache_duration'));
            }
            return view('pages/admin/assembly-part/cms', ['partData' => $assemblyPartsData]);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('error', 'Error occurred.');
        }
    }

    // public function add(Request $request)
    // {
    //     # same Category and ID input
    //     # search ID in Category
    //     $part_array = $this->realtime->getReference('ASSEMBLY_PARTS')->getValue();
    //     foreach($part_array as $key=>$Part_data)
    //     {
    //         $allKey[] = $key;
    //     }

    //     if(!array_key_exists($request->part_id,$allKey)){

    //     $newDocument = $this->realtime->getReference('ASSEMBLY_PARTS/'.$request->id)->push();
    //     $documentKey = $newDocument->getKey();

    //     if(isset($request->part_image)){
    //     $firebase_storage_path = 'IMAGES/ASSEMBLY_PARTS/';  
    //     $name = $request->id;  
    //     $localfolder = public_path('firebase-temp-uploads/4');  
    //     $file      = $name.'.jpg';  
    //     $request->part_image->move($localfolder, $file); 
    //     $uploadedfile = fopen($localfolder.'/'.$file, 'r');  
    //     # The name for the bucket
    //     $bucketName = 'striking-domain-409402.appspot.com';
    //     # Upload 
    //     $upload = $this->storage->getBucket()->upload($uploadedfile, ['name' => $firebase_storage_path.$file]); 
    //     # Will remove from local laravel folder  
    //     unlink($localfolder.'/'.$file);  
    //     }
    //     $postData = [
    //         'PART_NAME' => $request->name,
    //         'SPARE_PARTS' => (int)($request->SPARE_PARTS),
    //         'part_id' => $request->id,
    //         'NOTE' => $request->description
    //     ];

    //     try {
    //         $setDocument = $this->realtime->getReference('ASSEMBLY_PARTS/'.$request->id)->update($postData);
    //     } 
    //     catch (\Exception $exception)
    //     {
    //         return view('error_page');
    //     }
    //         return redirect('admin/assembly_part')->with('status','Part Added Successfully');
    //     }else
    //     {
    //         return redirect('admin/assembly_part')->with('error','ID exists, please use another ID');
    //     }
    // }
    public function update(Request $request, $key)
    {
        try {
            $part_array = $this->realtime->getReference('ASSEMBLY_PARTS')->getValue();
            foreach ($part_array as $key => $part_data) {
                $allKey[] = $key;
            }
            if (!array_key_exists($request->part_id, $allKey)) {

                // if(isset($request->part_image)){
                // $firebase_storage_path = 'IMAGES/ASSEMBLY_PARTS/';  
                // $name = $request->id;  
                // $localfolder = public_path('firebase-temp-uploads/4');  
                // $file      = $name.'.jpg';  
                // $request->part_image->move($localfolder, $file); 
                // $uploadedfile = fopen($localfolder.'/'.$file, 'r');  
                // $bucketName = 'striking-domain-409402.appspot.com';
                // $upload = $this->storage->getBucket()->upload($uploadedfile, ['name' => $firebase_storage_path.$file]); 
                // unlink($localfolder.'/'.$file);  
                // }}

                $messages = [
                    'required' => 'This field is required.',
                ];
                $validatorUpdate = Validator::make($request->all(), [], $messages);
                $validatorUpdate->addRules([
                    'part_price_update' . $request->get('update_key') => 'required|numeric|min:0|digits_between:1,7',
                    'part_id' => 'required|max:20',
                    'update_key' => 'required'
                ]);

                if ($validatorUpdate->fails()) {
                    return back()->withErrors($validatorUpdate)->withInput()->with('error', 'Error, can not update ' . $request->part_id);
                }

                $postData = [
                    'part_price' => $request->get('part_price_update' . $request->update_key),
                    'edited_at' => new Timestamp(new DateTime()),
                    'edited_by' => Session::get('uid')
                ];
                $setDocument = $this->realtime->getReference(config('firebase.reference.assembly_part') . '/' . $request->part_id)->update($postData);
            }
            return back()->with('status', 'Part Updated Successfully');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('error', 'Error occurred.');
        }
    }

    // public function delete($key)
    // {   

    //         $objectName = 'IMAGES/ASSEMBLY_PARTS/'.'/'.$key.'.jpg';
    //         $bucketName = 'striking-domain-409402.appspot.com';

    //         try {
    //             $deleteObject = $this->storage->getBucket($bucketName)->object($objectName)->delete(); 
    //         }
    //         catch (\Exception $exception)
    //         {

    //         }

    //     $deleteRef = $this->realtime->getReference('ASSEMBLY_PARTS')->getChild($key)->remove();

    //     return redirect('admin/assembly_part')->with('status','Part Deleted Successfully');
    // }
}
