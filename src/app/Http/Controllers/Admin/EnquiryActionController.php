<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Firebase;
use Barryvdh\DomPDF\Facade\Pdf;
use DateTime;
use DateTimeZone;
use Exception;
use Google\Cloud\Core\Timestamp;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Kreait\Firebase\Exception\Auth\UserNotFound;

class EnquiryActionController extends Controller
{
    protected $realtime;
    protected $firestore;
    protected $auth;
    protected $storage;
    public function __construct()
    {
        $this->realtime = (new Firebase)->realtimeDb;
        $this->firestore = (new Firebase)->firestoreDb;
        $this->auth = (new Firebase)->authentication;
        $this->storage = (new Firebase)->cloudstorage;
    }

    public function view()
    {
        try {
            $enquiriesDocuments = $this->firestore->collection(config('firebase.collection.enquiry'))->documents();
            $enquiryData = [];
            if ($enquiriesDocuments->isEmpty()) {
                return view('pages/admin/enquiry/cms', compact('enquiryData'))->with('message', 'Data not available ');
            }

            $userDisplayNames = [];

            foreach ($enquiriesDocuments as $enquiriesDocument) {
                $documentData = $enquiriesDocument->data();

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
                $enquiryId = ['enquiry_id' => $enquiriesDocument->id()];
                $clientData = ['client_data' => $this->firestore->collection(config('firebase.collection.client'))->document($documentData['client_id'])->snapshot()->data()];
                $enquiryData[] = array_merge($enquiryId, $documentData, $clientData);
            }


            return view('pages/admin/enquiry/cms', compact('enquiryData'));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('error', 'Error occurred.');
        }
    }

    public function edit($key)
    {
        try {
            $documentData = $this->firestore->collection(config('firebase.collection.enquiry'))->document($key)->snapshot()->data();
            if (empty($documentData)) {
                return back()->with('error', 'Data not available ');
            }

            $userDisplayNames = [];

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
            $enquiryId = ['enquiry_id' => $key];
            $clientData = ['client_data' => $this->firestore->collection(config('firebase.collection.client'))->document($documentData['client_id'])->snapshot()->data()];
            $enquiryData = array_merge($enquiryId, $documentData, $clientData);

            return view('pages/admin/enquiry/edit', compact('enquiryData'));
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
                'email'    => 'email must be a valid email address.',
            ];

            $rules = [
                'company' => 'required|max:50',
                'contact_name' => 'required|max:50',
                'email_address' => 'required|email|max:50',
                'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:20',
                'chemical_substances' => 'required|max:200',
                'base_type' => 'required|max:20',
                'base_type_other' => 'max:30',
                'amount_of_liquid_liquid_type' => 'required|numeric|min:0|max:20',
                'amount_of_solid_liquid_type' => 'required|numeric|min:0|max:20',
                'liquid_liquid_miscible' => 'max:20',
                'liquid_liquid_miscible_other' => 'max:30',
                'solid_particle' => 'nullable|numeric|min:0|max:100',
                'solid_liquid_miscible' => 'max:20',
                'solid_liquid_miscible_other' => 'max:20',
                'slurry_storage' => 'nullable|numeric|min:0|max:100',
                'solid_liquid_dispersion' => 'nullable|numeric|min:0|max:100',
                'mixing_reaction' => 'required|max:100',
                'mixing_annotation' => 'max:100',
                'max_viscosity' => 'required|numeric|min:0|max:99999',
                'max_density' => 'required|numeric|min:0|max:99999',
                'heating' => 'required|max:20',
                'heating_other' => 'max:30',
                'heater' => 'max:20',
                'heater_other' => 'max:30',
                'heating_temperature' => 'nullable|numeric|min:0|max:999',
                'heating_pressure' => 'nullable|numeric|min:0|max:99',
                'cooling' => 'required|max:20',
                'cooling_other' => 'max:30',
                'cooler' => 'max:20',
                'cooler_other' => 'max:30',
                'cooling_temperature' => 'nullable|numeric|min:0|max:999',
                'cooling_pressure' => 'nullable|numeric|min:0|max:99',
                'properties_annotation' => 'max:100',
                'material' => 'required|max:20',
                'material_other' => 'max:50',
                'layer' => 'required|numeric|integer|min:1|max:3',
                'first_layer_diameter' => 'required|numeric|min:0|max:99999',
                'first_layer_thickness' => 'required|numeric|min:0|max:999',
                'first_layer_bottom' => 'required|numeric|min:0|max:9999',
                'first_layer_shell' => 'required|numeric|min:0|max:9999',
                'second_layer' => 'max:20',
                'second_layer_other' => 'max:30',
                'second_layer_thickness' => 'nullable|numeric|min:0|max:999',
                'insulator' => 'max:20',
                'insulator_other' => 'max:30',
                'insulator_thickness' => 'nullable|numeric|min:0|max:999',
                'vessel_head' => 'required|max:20',
                'vessel_head_other' => 'max:30',
                'vessel_bottom' => 'required|max:20',
                'vessel_bottom_other' => 'max:30',
                'overlay' => 'max:20',
                'overlay_other' => 'max:30',
                'overlay_thickness' => 'nullable|numeric|min:0|max:999',
                'more_information' => 'max:100',
                'motor_type' => 'required|max:20',
                'motor_type_other' => 'max:30',
                'power_system' => 'required|max:20',
                'power_system_other' => 'max:30',
                'RPM' => 'required|max:20',
                'RPM_other' => 'max:30',
                'motor_brand' => 'required|max:20',
                'motor_brand_other' => 'max:30',
                'inverter_brand' => 'required|max:20',
                'inverter_brand_other' => 'max:30',
                'drawing_file' => 'required|max:20',
            ];

            if ($request->input('drawing_file') == 'yes') {
                $rules['upload_drawing_file'] = 'required|file|mimes:jpg,jpeg,png,pdf,xlsx,doc,docx|max:5120';
            }

            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            $postClientRef = $this->firestore->collection(config('firebase.collection.client'))->newDocument();

            $clientId = $postClientRef->id();

            $postClientData = [
                'client_company' => $request->company,
                'client_contact_name' => $request->contact_name,
                'client_email' => $request->email_address,
                'client_phone_number' => $request->phone,
                'created_by' => Session::get('uid'),
                'created_at' => new Timestamp(new DateTime()),
                'edited_by' => Session::get('uid'),
                'edited_at' => new Timestamp(new DateTime()),
            ];

            $postData =  $postClientRef->set($postClientData);

            $postRef = $this->firestore->collection(config('firebase.collection.enquiry'))->newDocument();
            $postKey = $postRef->id();

            $baseType = $request->input('base_type') === 'others' ? $request->input('base_type_other') : $request->input('base_type');
            $liquidLiquidMiscible = $request->input('liquid_liquid_miscible') === 'others' ? $request->input('liquid_liquid_miscible_other') : $request->input('liquid_liquid_miscible');
            $solidLiquidMiscible = $request->input('solid_liquid_miscible') === 'others' ? $request->input('solid_liquid_miscible_other') : $request->input('solid_liquid_miscible');
            $heating = $request->input('heating') === 'others' ? $request->input('heating_other') : $request->input('heating');
            $heater = $request->input('heater') === 'others' ? $request->input('heater_other') : $request->input('heater');
            $cooling = $request->input('cooling') === 'others' ? $request->input('cooling_other') : $request->input('cooling');
            $cooler = $request->input('cooler') === 'others' ? $request->input('cooler_other') : $request->input('cooler');
            $material = $request->input('material') === 'others' ? $request->input('material_other') : $request->input('material');
            $layer = $request->input('layer') === 'others' ? $request->input('layer_other') : $request->input('layer');
            $secondLayer = $request->input('second_layer') === 'others' ? $request->input('second_layer_other') : $request->input('second_layer');
            $insulator = $request->input('insulator') === 'others' ? $request->input('insulator_other') : $request->input('insulator');
            $vesselHead = $request->input('vessel_head') === 'others' ? $request->input('vessel_head_other') : $request->input('vessel_head');
            $vesselBottom = $request->input('vessel_bottom') === 'others' ? $request->input('vessel_bottom_other') : $request->input('vessel_bottom');
            $overlay = $request->input('overlay') === 'others' ? $request->input('overlay_other') : $request->input('overlay');
            $motorType = $request->input('motor_type') === 'others' ? $request->input('motor_type_other') : $request->input('motor_type');
            $powerSystem = $request->input('power_system') === 'others' ? $request->input('power_system_other') : $request->input('power_system');
            $RPM = $request->input('RPM') === 'others' ? $request->input('RPM_other') : $request->input('RPM');
            $motorBrand = $request->input('motor_brand') === 'others' ? $request->input('motor_brand_other') : $request->input('motor_brand');
            $inverterBrand = $request->input('inverter_brand') === 'others' ? $request->input('inverter_brand_other') : $request->input('inverter_brand');

            $postData = [
                'enquiry_password' => Str::random(10),
                'created_at' => new Timestamp(new DateTime()),
                'created_by' => Session::get('uid'),
                'edited_at' => new Timestamp(new DateTime()),
                'edited_by' => Session::get('uid'),
                'client_id' => $clientId,
                'chemical substances' => $request->chemical_substances,
                'base type' => $baseType,
                'liquid-liquid' => $request->amount_of_liquid_liquid_type,
                'liquid-liquid miscible' => $liquidLiquidMiscible,
                'solid-liquid' => $request->amount_of_solid_liquid_type,
                'solid particle' => $request->solid_particle,
                'solid-liquid miscible' => $solidLiquidMiscible,
                'slurry storage' => $request->slurry_storage,
                'solid-liquid dispersion' => $request->solid_liquid_dispersion,
                'mixing reaction' => $request->mixing_reaction,
                'mixing annotation' => $request->mixing_annotation,
                'max viscosity' => $request->max_viscosity,
                'max density' => $request->max_density,
                'heating' => $heating,
                'heater' => $heater,
                'heating temperature' => $request->heating_temperature,
                'heating pressure' => $request->heating_pressure,
                'cooling' => $cooling,
                'cooler' => $cooler,
                'cooling temperature' => $request->cooling_temperature,
                'cooling pressure' => $request->cooling_pressure,
                'properties annotation' => $request->properties_annotation,
                'material' => $material,
                'layer' => $layer,
                'first layer diameter' => $request->first_layer_diameter,
                'first layer thickness' => $request->first_layer_thickness,
                'first layer bottom' => $request->first_layer_bottom,
                'first layer shell' => $request->first_layer_shell,
                'second layer' => $secondLayer,
                'second layer thickness' => $request->second_layer_thickness,
                'insulator' => $insulator,
                'insulator thickness' => $request->insulator_thickness,
                'vessel head' => $vesselHead,
                'vessel bottom' => $vesselBottom,
                'overlay' => $overlay,
                'overlay thickness' => $request->overlay_thickness,
                'more information' => $request->more_information,
                'motor type' => $motorType,
                'power system' => $powerSystem,
                'RPM' => $RPM,
                'motor brand' => $motorBrand,
                'inverter brand' => $inverterBrand,
                'drawing_file' => $request->drawing_file,
            ];

            if ($request->hasFile('upload_drawing_file')) {
                $file = $request->file('upload_drawing_file');
                if ($file->isValid()) {
                    $originalFileName = $file->getClientOriginalName();
                    $firebase_storage_path = config('firebase.storage_path.enquiry_drawing');
                    $localfolder = public_path('firebase-temp-uploads/5');

                    $file->move($localfolder, $originalFileName);

                    $uploadedfile = null;

                    try {
                        $uploadedfile = fopen($localfolder . '/' . $originalFileName, 'r');
                        if ($uploadedfile === false) {
                            throw new Exception('Failed to open the file for reading.');
                        }

                        $upload = $this->storage->getBucket()->upload($uploadedfile, ['name' => $firebase_storage_path . '/' . $originalFileName]);

                        $postData['drawing_file_name'] = $originalFileName;
                    } catch (Exception $e) {
                        $postData['drawing_file_name'] = null;
                        return back()->with('error', 'File upload failed: ' . $e->getMessage());
                    } finally {
                        if (is_resource($uploadedfile)) {
                            fclose($uploadedfile);
                        }
                        unlink($localfolder . '/' . $originalFileName);
                    }
                } else {
                    $postData['drawing_file_name'] = null;
                }
            } else {
                $postData['drawing_file_name'] = null;
            }

            $post = $postRef->set($postData);
            return redirect()->route('enquiry.view')->with('success', 'Added successfully.');
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('error', 'Error occurred.');
        }
    }

    public function update(Request $request, $key)
    {
        try {
            $messages = [
                'required' => 'This field is required.',
                'email'    => 'email must be a valid email address.',
            ];

            $rules = [
                'company' => 'required|max:50',
                'contact_name' => 'required|max:50',
                'email_address' => 'required|email|max:50',
                'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:20',
                'chemical_substances' => 'required|max:200',
                'base_type' => 'required|max:20',
                'base_type_other' => 'max:30',
                'amount_of_liquid_liquid_type' => 'required|numeric|min:0|max:20',
                'amount_of_solid_liquid_type' => 'required|numeric|min:0|max:20',
                'liquid_liquid_miscible' => 'max:20',
                'liquid_liquid_miscible_other' => 'max:30',
                'solid_particle' => 'nullable|numeric|min:0|max:100',
                'solid_liquid_miscible' => 'max:20',
                'solid_liquid_miscible_other' => 'max:20',
                'slurry_storage' => 'nullable|numeric|min:0|max:100',
                'solid_liquid_dispersion' => 'nullable|numeric|min:0|max:100',
                'mixing_reaction' => 'required|max:100',
                'mixing_annotation' => 'max:100',
                'max_viscosity' => 'required|numeric|min:0|max:99999',
                'max_density' => 'required|numeric|min:0|max:99999',
                'heating' => 'required|max:20',
                'heating_other' => 'max:30',
                'heater' => 'max:20',
                'heater_other' => 'max:30',
                'heating_temperature' => 'nullable|numeric|min:0|max:999',
                'heating_pressure' => 'nullable|numeric|min:0|max:99',
                'cooling' => 'required|max:20',
                'cooling_other' => 'max:30',
                'cooler' => 'max:20',
                'cooler_other' => 'max:30',
                'cooling_temperature' => 'nullable|numeric|min:0|max:999',
                'cooling_pressure' => 'nullable|numeric|min:0|max:99',
                'properties_annotation' => 'max:100',
                'material' => 'required|max:20',
                'material_other' => 'max:50',
                'layer' => 'required|numeric|integer|min:1|max:3',
                'first_layer_diameter' => 'required|numeric|min:0|max:99999',
                'first_layer_thickness' => 'required|numeric|min:0|max:999',
                'first_layer_bottom' => 'required|numeric|min:0|max:9999',
                'first_layer_shell' => 'required|numeric|min:0|max:9999',
                'second_layer' => 'max:20',
                'second_layer_other' => 'max:30',
                'second_layer_thickness' => 'nullable|numeric|min:0|max:999',
                'insulator' => 'max:20',
                'insulator_other' => 'max:30',
                'insulator_thickness' => 'nullable|numeric|min:0|max:999',
                'vessel_head' => 'required|max:20',
                'vessel_head_other' => 'max:30',
                'vessel_bottom' => 'required|max:20',
                'vessel_bottom_other' => 'max:30',
                'overlay' => 'max:20',
                'overlay_other' => 'max:30',
                'overlay_thickness' => 'nullable|numeric|min:0|max:999',
                'more_information' => 'max:100',
                'motor_type' => 'required|max:20',
                'motor_type_other' => 'max:30',
                'power_system' => 'required|max:20',
                'power_system_other' => 'max:30',
                'RPM' => 'required|max:20',
                'RPM_other' => 'max:30',
                'motor_brand' => 'required|max:20',
                'motor_brand_other' => 'max:30',
                'inverter_brand' => 'required|max:20',
                'inverter_brand_other' => 'max:30',
                'drawing_file' => 'required|max:20',
            ];

            if ($request->input('drawing_file') == 'yes') {
                $rules['upload_drawing_file'] = 'required|file|mimes:jpg,jpeg,png,pdf,xlsx,doc,docx|max:5120';
            }

            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            $enquiryRef = $this->firestore->collection(config('firebase.collection.enquiry'))->document($key);
            $clientId = $enquiryRef->snapshot()->data()['client_id'];

            $postClientRef = $this->firestore->collection(config('firebase.collection.client'))->document($clientId);
            $postClientData = [
                'client_company' => $request->company,
                'client_contact_name' => $request->contact_name,
                'client_email' => $request->email_address,
                'client_phone_number' => $request->phone,
                'edited_by' => Session::get('uid'),
                'edited_at' => new Timestamp(new DateTime()),
            ];

            $postData =  $postClientRef->set($postClientData, ['merge' => true]);


            $baseType = $request->input('base_type') === 'others' ? $request->input('base_type_other') : $request->input('base_type');
            $liquidLiquidMiscible = $request->input('liquid_liquid_miscible') === 'others' ? $request->input('liquid_liquid_miscible_other') : $request->input('liquid_liquid_miscible');
            $solidLiquidMiscible = $request->input('solid_liquid_miscible') === 'others' ? $request->input('solid_liquid_miscible_other') : $request->input('solid_liquid_miscible');
            $heating = $request->input('heating') === 'others' ? $request->input('heating_other') : $request->input('heating');
            $heater = $request->input('heater') === 'others' ? $request->input('heater_other') : $request->input('heater');
            $cooling = $request->input('cooling') === 'others' ? $request->input('cooling_other') : $request->input('cooling');
            $cooler = $request->input('cooler') === 'others' ? $request->input('cooler_other') : $request->input('cooler');
            $material = $request->input('material') === 'others' ? $request->input('material_other') : $request->input('material');
            $layer = $request->input('layer') === 'others' ? $request->input('layer_other') : $request->input('layer');
            $secondLayer = $request->input('second_layer') === 'others' ? $request->input('second_layer_other') : $request->input('second_layer');
            $insulator = $request->input('insulator') === 'others' ? $request->input('insulator_other') : $request->input('insulator');
            $vesselHead = $request->input('vessel_head') === 'others' ? $request->input('vessel_head_other') : $request->input('vessel_head');
            $vesselBottom = $request->input('vessel_bottom') === 'others' ? $request->input('vessel_bottom_other') : $request->input('vessel_bottom');
            $overlay = $request->input('overlay') === 'others' ? $request->input('overlay_other') : $request->input('overlay');
            $motorType = $request->input('motor_type') === 'others' ? $request->input('motor_type_other') : $request->input('motor_type');
            $powerSystem = $request->input('power_system') === 'others' ? $request->input('power_system_other') : $request->input('power_system');
            $RPM = $request->input('RPM') === 'others' ? $request->input('RPM_other') : $request->input('RPM');
            $motorBrand = $request->input('motor_brand') === 'others' ? $request->input('motor_brand_other') : $request->input('motor_brand');
            $inverterBrand = $request->input('inverter_brand') === 'others' ? $request->input('inverter_brand_other') : $request->input('inverter_brand');

            $updateData = [
                'edited_at' => new Timestamp(new DateTime()),
                'edited_by' => Session::get('uid'),
                'client_id' => $clientId,
                'chemical substances' => $request->chemical_substances,
                'base type' => $baseType,
                'liquid-liquid' => $request->amount_of_liquid_liquid_type,
                'liquid-liquid miscible' => $liquidLiquidMiscible,
                'solid-liquid' => $request->amount_of_solid_liquid_type,
                'solid particle' => $request->solid_particle,
                'solid-liquid miscible' => $solidLiquidMiscible,
                'slurry storage' => $request->slurry_storage,
                'solid-liquid dispersion' => $request->solid_liquid_dispersion,
                'mixing reaction' => $request->mixing_reaction,
                'mixing annotation' => $request->mixing_annotation,
                'max viscosity' => $request->max_viscosity,
                'max density' => $request->max_density,
                'heating' => $heating,
                'heater' => $heater,
                'heating temperature' => $request->heating_temperature,
                'heating pressure' => $request->heating_pressure,
                'cooling' => $cooling,
                'cooler' => $cooler,
                'cooling temperature' => $request->cooling_temperature,
                'cooling pressure' => $request->cooling_pressure,
                'properties annotation' => $request->properties_annotation,
                'material' => $material,
                'layer' => $layer,
                'first layer diameter' => $request->first_layer_diameter,
                'first layer thickness' => $request->first_layer_thickness,
                'first layer bottom' => $request->first_layer_bottom,
                'first layer shell' => $request->first_layer_shell,
                'second layer' => $secondLayer,
                'second layer thickness' => $request->second_layer_thickness,
                'insulator' => $insulator,
                'insulator thickness' => $request->insulator_thickness,
                'vessel head' => $vesselHead,
                'vessel bottom' => $vesselBottom,
                'overlay' => $overlay,
                'overlay thickness' => $request->overlay_thickness,
                'more information' => $request->more_information,
                'motor type' => $motorType,
                'power system' => $powerSystem,
                'RPM' => $RPM,
                'motor brand' => $motorBrand,
                'inverter brand' => $inverterBrand,
                'drawing_file' => $request->drawing_file,
            ];

            if ($request->hasFile('upload_drawing_file')) {
                $file = $request->file('upload_drawing_file');
                if ($file->isValid()) {
                    $originalFileName = $file->getClientOriginalName();
                    $firebase_storage_path = config('firebase.storage_path.enquiry_drawing');
                    $localfolder = public_path('firebase-temp-uploads/5');

                    $file->move($localfolder, $originalFileName);

                    $uploadedfile = null;

                    try {
                        $uploadedfile = fopen($localfolder . '/' . $originalFileName, 'r');
                        if ($uploadedfile === false) {
                            throw new Exception('Failed to open the file for reading.');
                        }

                        $upload = $this->storage->getBucket()->upload($uploadedfile, ['name' => $firebase_storage_path . '/' . $originalFileName]);

                        $updateData['drawing_file_name'] = $originalFileName;
                    } catch (Exception $e) {
                        $updateData['drawing_file_name'] = null;
                        return back()->with('error', 'File upload failed: ' . $e->getMessage());
                    } finally {
                        if (is_resource($uploadedfile)) {
                            fclose($uploadedfile);
                        }
                        unlink($localfolder . '/' . $originalFileName);
                    }
                } else {
                    $updateData['drawing_file_name'] = null;
                }
            } else {
                $updateData['drawing_file_name'] = null;
            }

            $post = $enquiryRef->set($updateData, ['merge' => true]);
            return back()->with('status', 'Updated successfully.');
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('error', 'Error occurred.');
        }
    }

    public function viewPDF($key)
    {
        try {
            $documentData = $this->firestore->collection(config('firebase.collection.enquiry'))->document($key)->snapshot()->data();
            if (!isset($documentData)) {
                return back()->with('error', 'Data not available ');
            }

            $userDisplayNames = [];

            $enquiryId = ['enquiry_id' => $key];
            $clientData = ['client_data' => $this->firestore->collection(config('firebase.collection.client'))->document($documentData['client_id'])->snapshot()->data()];
            $enquiryData[] = array_merge($enquiryId, $documentData, $clientData);

            $pdf = Pdf::loadView('layouts/pdf/enquiry', compact('enquiryData'));
            return $pdf->setPaper('A4', 'portrait')->stream('Enquiry-Sheet.pdf');
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('error', 'Error occurred.');
        }
    }

    public function sendPDF(Request $request, $key)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|max:30|email',
                'name' => 'required|max:30',
                'subject' => 'required|max:50',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput()->with('error', 'Error, email is not sent');
            }

            $documentData = $this->firestore->collection(config('firebase.collection.enquiry'))->document($key)->snapshot()->data();
            if (!isset($documentData)) {
                return back()->with('error', 'Data not available ');
            }

            $userDisplayNames = [];
            $enquiryId = ['enquiry_id' => $key];
            $clientData = ['client_data' => $this->firestore->collection(config('firebase.collection.client'))->document($documentData['client_id'])->snapshot()->data()];
            $enquiryData[] = array_merge($enquiryId, $documentData, $clientData);

            $pdf = Pdf::loadView('layouts/pdf/enquiry', compact('enquiryData'))->setPaper('A4', 'portrait');

            $data["email"] = $request->email;
            $data["name"] = $request->name;
            $data["subject"] = $request->subject;


            Mail::send('layouts/mail', compact('data'), function ($message) use ($data, $pdf) {
                $message->to($data["email"], $data["name"])
                    ->subject($data["subject"])
                    ->attachData($pdf->output(), "Enquiry Sheet.pdf");
            });
            return redirect('admin/enquiry')->with('status', 'Email has been successfully sent');
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            return redirect('admin/enquiry')->withInput()->with('error', 'Error, email is not sent');
        }
    }

    public function delete($key)
    {
        try {
            $document = $this->firestore->collection(config('firebase.collection.enquiry'))->document($key);
            $drawingFileName = $document->snapshot()->data()['drawing_file_name'];
            $deleteDocument = $document->delete();

            $bucketName = config('firebase.projects.app.storage.default_bucket');
            $firebase_storage_path = config('firebase.storage_path.enquiry_drawing');
            $fileName =  $drawingFileName;
            $drawingFile = $this->storage->getBucket($bucketName)->object($firebase_storage_path . '/' . $fileName);
            if ($drawingFile->exists()) {
                $drawingFile->delete();
            }

            return back()->with('status', 'Deleted Successfully');
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('error', 'Error occurred.');
        }
    }

    public function viewDrawing($key)
    {
        $drawingFileName = $this->firestore->collection(config('firebase.collection.enquiry'))->document($key)->snapshot()->data()['drawing_file_name'];

        $bucketName = config('firebase.projects.app.storage.default_bucket');
        $bucket = $this->storage->getBucket($bucketName);
        $expiresAt = new DateTime('15 minutes');
        $sheetRef = $bucket->object(config('firebase.storage_path.enquiry_drawing') . '/' . $drawingFileName);
        if ($sheetRef->exists()) {
            $pathRef = config('firebase.storage_path.enquiry_drawing') . '/' . $drawingFileName;
            $URL = $bucket->object($pathRef)->signedUrl($expiresAt, [
                'version' => 'v4',
            ]);
            return redirect()->away($URL);
        } else {
            return redirect()->back()->with('error', 'file not found.');
        }
    }
}
