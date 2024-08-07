@extends('layouts/admin', ['title' => 'Enquiry Form'])

@section('content')
<a href="{{ route('enquiry.view') }}">
    <button class="bg-gray-400 uppercase text-white px-4 py-2 rounded-md font-semibold">
        Back
    </button>
</a>
<section class="block w-full p-2 bg-yellow-500 rounded-md mt-3 shadow-md">
    <h2 class="text-lg font-semibold uppercase text-center text-white">Enquiry Form Edit</h2>
</section>
<form method="POST"
    action="{{ config('app.env') == 'production' ? secure('admin/enquiry-update/' . $enquiryData['enquiry_id']) : url('admin/enquiry-update/' . $enquiryData['enquiry_id']) }}"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <section class="bg-gray-50 rounded-md mt-4 shadow-md">
        <div class="flex bg-gray-100 rounded-t-md py-2 px-6 shadow-sm">
            <h2 class="flex-1 text-base font-semibold uppercase">Contact Information</h2>
            <p class="mt-1 text-gray-500 font-normal uppercase">Complete all field</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-6">
            <div>
                <x-label for="company" value="Company Name"></x-label>
                <x-input id="company" type="text" name="company"
                    value="{{ $enquiryData['client_data']['client_company'] ?? old('company') }}" />
            </div>
            <div>
                <x-label for="contact_name" value="Contactor Name"></x-label>
                <x-input id="contact_name" type="text" name="contact_name"
                    value="{{ $enquiryData['client_data']['client_contact_name'] ?? old('contact_name') }}" />
            </div>
            <div>
                <x-label for="email_address" value="Contact Email"></x-label>
                <x-input id="email_address" type="text" name="email_address"
                    value="{{ $enquiryData['client_data']['client_email'] ?? old('email_address') }}" />
            </div>
            <div>
                <x-label for="phone" value="Phone Number"></x-label>
                <x-input id="phone" type="text" name="phone"
                    value="{{ $enquiryData['client_data']['client_phone_number'] ?? old('phone') }}" />
            </div>
        </div>
    </section>

    <section class="bg-gray-50 rounded-md mt-8 shadow-md">
        <div class="flex bg-gray-100 rounded-t-md py-2 px-6 shadow-sm">
            <h2 class="flex-1 text-base font-semibold uppercase">Mixing Tasks</h2>
        </div>
        <div class="grid grid-cols-2 gap-4 p-6">
            <div class="col-span-2">
                <x-label for="chemical_substances" value="Chemical Feed"></x-label>
                <x-input id="chemical_substances" type="text" name="chemical_substances"
                    value="{{ $enquiryData['chemical substances'] ?? old('chemical_substances') }}"
                    placeholder="test" />
            </div>
            <div class="col-span-2 md:col-span-1 bg-gray-50 shadow-sm rounded-md">
                @php
                $options = [
                ['id' => 'water_base', 'value' => 'water base', 'label' => 'Water Base'],
                ['id' => 'oil_base', 'value' => 'oil base', 'label' => 'Oil Base'],
                ['id' => 'solvent_base', 'value' => 'solvent base', 'label' => 'Solvent Base'],
                ['id' => 'others', 'value' => 'others', 'label' => 'Others'],
                ];
                @endphp
                <x-radio-input-edit name="base_type" otherInputName="base_type_other" :options="$options"
                    :data="$enquiryData['base type']">
                    Base Type
                </x-radio-input-edit>
            </div>
            <div class="col-span-2 md:col-span-1 grid grid-rows-2 gap-y-4">
                <div>
                    <x-label for="amount_of_liquid_liquid_type" value="Amount of liquid-liquid type"></x-label>
                    <x-input id="amount_of_liquid_liquid_type" type="number" name="amount_of_liquid_liquid_type"
                        value="{{ $enquiryData['liquid-liquid'] ?? old('amount_of_liquid_liquid_type') }}" />
                </div>
                <div>
                    <x-label for="amount_of_solid_liquid_type" value="Amount of solid-liquid type"></x-label>
                    <x-input id="amount_of_solid_liquid_type" type="number" name="amount_of_solid_liquid_type"
                        value="{{ $enquiryData['solid-liquid'] ?? old('amount_of_solid_liquid_type') }}" />
                </div>
            </div>
            <div class="col-span-2 md:col-span-1 bg-gray-50 shadow-sm rounded-md">
                @php
                $options = [
                ['id' => 'miscible', 'value' => 'miscible', 'label' => 'Miscible'],
                ['id' => 'immiscible', 'value' => 'immiscible', 'label' => 'Immiscible'],
                ['id' => 'others', 'value' => 'others', 'label' => 'Others'],
                ];
                @endphp
                <x-radio-input-edit name="liquid_liquid_miscible" otherInputName="liquid_liquid_miscible_other"
                    :options="$options" :data="$enquiryData['liquid-liquid miscible']">
                    Liquid-liquid miscible
                </x-radio-input-edit>
            </div>
            <div class="col-span-2 md:col-span-1 bg-gray-50 shadow-sm rounded-md">
                @php
                $options = [
                ['id' => 'miscible', 'value' => 'miscible', 'label' => 'Miscible'],
                ['id' => 'immiscible', 'value' => 'immiscible', 'label' => 'Immiscible'],
                ['id' => 'others', 'value' => 'others', 'label' => 'Others'],
                ];
                @endphp
                <x-radio-input-edit name="solid_liquid_miscible" otherInputName="solid_liquid_miscible_other"
                    :options="$options" :data="$enquiryData['solid-liquid miscible']">
                    Solid-liquid miscible
                </x-radio-input-edit>
            </div>
            <div class="col-span-2 md:col-span-1">
                <x-label for="solid_particle" value="Solid particle in process (%)"></x-label>
                <x-input id="solid_particle" type="number" name="solid_particle"
                    value="{{ $enquiryData['solid particle'] ?? old('solid_particle') }}" />
            </div>
            <div class="col-span-2 md:col-span-1">
                <x-label for="slurry_storage" value="Slurry storage (%)"></x-label>
                <x-input id="slurry_storage" type="number" name="slurry_storage"
                    value="{{ $enquiryData['slurry storage'] ?? old('slurry_storage') }}" />
            </div>
            <div class="col-span-2 md:col-span-1">
                <x-label for="solid_liquid_dispersion" value="Solid-liquid dispersion (%)"></x-label>
                <x-input id="solid_liquid_dispersion" type="number" name="solid_liquid_dispersion"
                    value="{{ $enquiryData['solid-liquid dispersion'] ?? old('solid_liquid_dispersion') }}" />
            </div>
            <div class="col-span-2">
                <x-label for="mixing_reaction" value="Mixing reaction"></x-label>
                <x-input id="mixing_reaction" type="text" name="mixing_reaction"
                    value="{{ $enquiryData['mixing reaction'] ?? old('mixing_reaction') }}" />
            </div>
            <div class="col-span-2">
                <x-label for="mixing_annotation" value="Annotation"></x-label>
                <x-text-area-input id="mixing_annotation" name="mixing_annotation"
                    value="{{ $enquiryData['mixing annotation'] ?? old('mixing_annotation') }}" />
            </div>
        </div>
    </section>

    <section class="bg-gray-50 rounded-md mt-8 shadow-md">
        <div class="flex bg-gray-100 rounded-t-md py-2 px-6 shadow-sm">
            <h2 class="flex-1 text-base font-semibold uppercase">Liquid properties</h2>
        </div>
        <div class="grid grid-cols-2 gap-4 p-6">
            <div class="col-span-2 md:col-span-1">
                <x-label for="max_viscosity" value="Max viscosity"></x-label>
                <x-input id="max_viscosity" type="number" name="max_viscosity"
                    value="{{ $enquiryData['max viscosity'] ?? old('max_viscosity') }}" />
            </div>
            <div class="col-span-2 md:col-span-1">
                <x-label for="max_density" value="Max density"></x-label>
                <x-input id="max_density" type="number" name="max_density"
                    value="{{ $enquiryData['max density'] ?? old('max_density') }}" />
            </div>
            <div class="col-span-2 md:col-span-1 bg-gray-50 shadow-sm rounded-md">
                @php
                $options = [
                ['id' => 'heating_required', 'value' => 'heating required', 'label' => 'Heating required'],
                [
                'id' => 'no_heating_required',
                'value' => 'no heating required',
                'label' => 'No heating required',
                ],
                ['id' => 'others', 'value' => 'others', 'label' => 'Others'],
                ];
                @endphp
                <x-radio-input-edit name="heating" otherInputName="heating_other" :options="$options"
                    :data="$enquiryData['heating']">
                    Heating
                </x-radio-input-edit>
            </div>
            <div class="col-span-2 md:col-span-1 bg-gray-50 shadow-sm rounded-md">
                @php
                $options = [
                ['id' => 'steam', 'value' => 'steam', 'label' => 'Steam'],
                ['id' => 'heater', 'value' => 'heater', 'label' => 'Heater'],
                ['id' => 'gas', 'value' => 'gas', 'label' => 'Gas'],
                ['id' => 'others', 'value' => 'others', 'label' => 'Others'],
                ];
                @endphp
                <x-radio-input-edit name="heater" otherInputName="heater_other" :options="$options"
                    :data="$enquiryData['heater']">
                    Heater
                </x-radio-input-edit>
            </div>
            <div class="col-span-2 md:col-span-1">
                <x-label for="heating_temperature" value="Heating Temperature (°C)"></x-label>
                <x-input id="heating_temperature" type="number" name="heating_temperature"
                    value="{{ $enquiryData['heating temperature'] ?? old('heating_temperature') }}" />
            </div>
            <div class="col-span-2 md:col-span-1">
                <x-label for="heating_pressure" value="Heating Pressure (Bar)"></x-label>
                <x-input id="heating_pressure" type="number" name="heating_pressure"
                    value="{{ $enquiryData['heating pressure'] ?? old('heating_pressure') }}" />
            </div>
            <div class="col-span-2 md:col-span-1 bg-gray-50 shadow-sm rounded-md">
                @php
                $options = [
                ['id' => 'cooling_required', 'value' => 'cooling required', 'label' => 'Cooling required'],
                [
                'id' => 'no_cooling_required',
                'value' => 'no cooling required',
                'label' => 'No cooling required',
                ],
                ['id' => 'others', 'value' => 'others', 'label' => 'Others'],
                ];
                @endphp
                <x-radio-input-edit name="cooling" otherInputName="cooling_other" :options="$options"
                    :data="$enquiryData['cooling']">
                    Cooling
                </x-radio-input-edit>
            </div>
            <div class="col-span-2 md:col-span-1 bg-gray-50 shadow-sm rounded-md">
                @php
                $options = [
                ['id' => 'water', 'value' => 'water', 'label' => 'Water'],
                ['id' => 'chiller', 'value' => 'chiller', 'label' => 'Chiller'],
                ['id' => 'others', 'value' => 'others', 'label' => 'Others'],
                ];
                @endphp
                <x-radio-input-edit name="cooler" otherInputName="cooler_other" :options="$options"
                    :data="$enquiryData['cooler']">
                    Cooler
                </x-radio-input-edit>
            </div>
            <div class="col-span-2 md:col-span-1">
                <x-label for="cooling_temperature" value="Cooling Temperature (°C)"></x-label>
                <x-input id="cooling_temperature" type="number" name="cooling_temperature"
                    value="{{ $enquiryData['cooling temperature'] ?? old('cooling_temperature') }}" />
            </div>
            <div class="col-span-2 md:col-span-1">
                <x-label for="cooling_pressure" value="Cooling Pressure (Bar)"></x-label>
                <x-input id="cooling_pressure" type="number" name="cooling_pressure"
                    value="{{ $enquiryData['cooling pressure'] ?? old('cooling_pressure') }}" />
            </div>
            <div class="col-span-2">
                <x-label for="properties_annotation" value="Annotation"></x-label>
                <x-text-area-input id="properties_annotation" name="properties_annotation"
                    value="{{ $enquiryData['properties annotation'] ?? old('properties_annotation') }}" />
            </div>
        </div>
    </section>

    <section class="bg-gray-50 rounded-md mt-8 shadow-md">
        <div class="flex bg-gray-100 rounded-t-md py-2 px-6 shadow-sm">
            <h2 class="flex-1 text-base font-semibold uppercase">Vessel</h2>
        </div>
        <div class="grid grid-cols-2 gap-4 p-6">
            <div class="col-span-2 md:col-span-1 bg-gray-50 shadow-sm rounded-md">
                @php
                $options = [
                ['id' => 'SUS304', 'value' => 'SUS304', 'label' => 'SUS304'],
                ['id' => 'SUS316', 'value' => 'SUS316', 'label' => 'SUS316'],
                ['id' => 'steel', 'value' => 'steel', 'label' => 'steel'],
                ['id' => 'FRP_Coating', 'value' => 'FRP coating', 'label' => 'FRP Coating'],
                ['id' => 'others', 'value' => 'others', 'label' => 'Others'],
                ];
                @endphp
                <x-radio-input-edit name="material" otherInputName="material_other" :options="$options"
                    :data="$enquiryData['material']">
                    Material
                </x-radio-input-edit>
            </div>
            <div class="col-span-2 md:col-span-1">
                <x-label for="layer" value="Number of Vessel's Layer"></x-label>
                <x-input id="layer" type="number" name="layer" value="{{ $enquiryData['layer'] ?? old('layer') }}" />
            </div>
            <div class="col-span-2 md:col-span-1">
                <x-label for="first_layer_diameter" value="Diameter (mm)"></x-label>
                <x-input id="first_layer" type="number" name="first_layer_diameter"
                    value="{{ $enquiryData['first layer diameter'] ?? old('first_layer_diameter') }}" />
            </div>
            <div class="col-span-2 md:col-span-1">
                <x-label for="first_layer_thickness" value="Thickness (mm)"></x-label>
                <x-input id="first_layer" type="number" name="first_layer_thickness"
                    value="{{ $enquiryData['first layer thickness'] ?? old('first_layer_thickness') }}" />
            </div>
            <div class="col-span-2 md:col-span-1">
                <x-label for="first_layer_bottom" value="Bottom Thickness (mm)"></x-label>
                <x-input id="first_layer" type="number" name="first_layer_bottom"
                    value="{{ $enquiryData['first layer bottom'] ?? old('first_layer_bottom') }}" />
            </div>
            <div class="col-span-2 md:col-span-1">
                <x-label for="first_layer_shell" value="Shell Thickness (mm)"></x-label>
                <x-input id="first_layer" type="number" name="first_layer_shell"
                    value="{{ $enquiryData['first layer shell'] ?? old('first_layer_shell') }}" />
            </div>
            <div id="second_layer" class="hidden col-span-2 md:col-span-1 bg-gray-50 shadow-sm rounded-md">
                @php
                $options = [
                ['id' => 'double_jacket', 'value' => 'double jacket', 'label' => 'Double Jacket'],
                ['id' => 'haft_coll', 'value' => 'haft coll', 'label' => 'Haft Coll'],
                ['id' => 'others', 'value' => 'others', 'label' => 'Others'],
                ];
                @endphp
                <x-radio-input-edit name="second_layer" otherInputName="second_layer_other" :options="$options"
                    :data="$enquiryData['second layer']">
                    Second Layer Type
                </x-radio-input-edit>
            </div>
            <div id="second_layer_thickness" class="hidden col-span-2 md:col-span-1">
                <x-label for="second_layer_thickness" value="Second Layer Thickness (mm)"></x-label>
                <x-input id="second_layer_thickness" type="number" name="second_layer_thickness"
                    value="{{ $enquiryData['second layer thickness'] ?? old('second_layer_thickness') }}" />
            </div>
            <div class="col-span-2 md:col-span-1 bg-gray-50 shadow-sm rounded-md">
                @php
                $options = [
                ['id' => 'rock_wool', 'value' => 'rock wool', 'label' => 'Rock wool'],
                ['id' => 'Pu_Foam', 'value' => 'PU foam', 'label' => 'PU foam'],
                ['id' => 'others', 'value' => 'others', 'label' => 'Others'],
                ];
                @endphp
                <x-radio-input-edit name="insulator" otherInputName="insulator_other" :options="$options"
                    :data="$enquiryData['insulator']">
                    Insulator Type
                </x-radio-input-edit>
            </div>
            <div class="col-span-2 md:col-span-1">
                <x-label for="insulator_thickness" value="Insulator Thickness (mm)"></x-label>
                <x-input id="insulator_thickness" type="number" name="insulator_thickness"
                    value="{{ $enquiryData['insulator thickness'] ?? old('insulator_thickness') }}" />
            </div>
            <div class="col-span-2 md:col-span-1 bg-gray-50 shadow-sm rounded-md">
                @php
                $options = [
                ['id' => 'flat', 'value' => 'flat head', 'label' => 'Flat Head'],
                ['id' => 'dish', 'value' => 'dish head', 'label' => 'Dish Head'],
                ['id' => 'cone', 'value' => 'cone head', 'label' => 'Cone Head'],
                ['id' => 'open', 'value' => 'open head', 'label' => 'Open Head'],
                ['id' => 'others', 'value' => 'others', 'label' => 'Others'],
                ];
                @endphp
                <x-radio-input-edit name="vessel_head" otherInputName="vessel_head_other" :options="$options"
                    :data="$enquiryData['vessel head']">
                    Head of Vessel
                </x-radio-input-edit>
            </div>
            <div class="col-span-2 md:col-span-1 bg-gray-50 shadow-sm rounded-md">
                @php
                $options = [
                ['id' => 'flat', 'value' => 'flat head', 'label' => 'Flat Head'],
                ['id' => 'dish', 'value' => 'dish head', 'label' => 'Dish Head'],
                ['id' => 'cone', 'value' => 'cone head', 'label' => 'Cone Head'],
                // ['id' => 'open', 'value' => 'open head', 'label' => 'Open Head'],
                ['id' => 'others', 'value' => 'others', 'label' => 'Others'],
                ];
                @endphp
                <x-radio-input-edit name="vessel_bottom" otherInputName="vessel_bottom_other" :options="$options"
                    :data="$enquiryData['vessel bottom']">
                    Buttom of Vessel
                </x-radio-input-edit>
            </div>
            <div class="col-span-2 md:col-span-1 bg-gray-50 shadow-sm rounded-md">
                @php
                $options = [
                ['id' => 'stainless', 'value' => 'stainless', 'label' => 'Stainless'],
                ['id' => 'aluminum', 'value' => 'aluminum', 'label' => 'Aluminum'],
                ['id' => 'others', 'value' => 'others', 'label' => 'Others'],
                ];
                @endphp
                <x-radio-input-edit name="overlay" otherInputName="overlay_other" :options="$options"
                    :data="$enquiryData['overlay']">
                    Overlay of Vessel
                </x-radio-input-edit>
            </div>
            <div class="col-span-2 md:col-span-1">
                <x-label for="overlay_thickness" value="Overlay Thickness (mm)"></x-label>
                <x-input id="overlay_thickness" type="number" name="overlay_thickness"
                    value="{{ $enquiryData['overlay thickness'] ?? old('overlay_thickness') }}" />
            </div>
            <div class="col-span-2">
                <x-label for="more_information" value="More Information"></x-label>
                <x-text-area-input id="more_information" name="more_information"
                    value="{{ $enquiryData['more information'] ?? old('more_information') }}" />
            </div>
        </div>
    </section>

    <section class="bg-gray-50 rounded-md mt-8 shadow-md">
        <div class="flex bg-gray-100 rounded-t-md py-2 px-6 shadow-sm">
            <h2 class="flex-1 text-base font-semibold uppercase">more important information</h2>
        </div>
        <div class="grid grid-cols-2 gap-4 p-6">
            <div class="col-span-2 md:col-span-1 bg-gray-50 shadow-sm rounded-md">
                @php
                $options = [
                ['id' => 'electric_motor', 'value' => 'electric motor', 'label' => 'Electric Motor'],
                ['id' => 'air_motor', 'value' => 'air motor', 'label' => 'Air Motor'],
                ['id' => 'others', 'value' => 'others', 'label' => 'Others'],
                ];
                @endphp
                <x-radio-input-edit name="motor_type" otherInputName="motor_type_other" :options="$options"
                    :data="$enquiryData['motor type']">
                    Motor Type
                </x-radio-input-edit>
            </div>
            <div class="col-span-2 md:col-span-1 bg-gray-50 shadow-sm rounded-md">
                @php
                $options = [
                ['id' => '220V', 'value' => '220V', 'label' => '220V'],
                ['id' => '380V', 'value' => '380V', 'label' => '380V'],
                ['id' => 'others', 'value' => 'others', 'label' => 'Others'],
                ];
                @endphp
                <x-radio-input-edit name="power_system" otherInputName="power_system_other" :options="$options"
                    :data="$enquiryData['power system']">
                    Power System
                </x-radio-input-edit>
            </div>
            <div class="col-span-2 md:col-span-1 bg-gray-50 shadow-sm rounded-md">
                @php
                $options = [
                ['id' => 'fixed', 'value' => 'fixed', 'label' => 'Fixed'],
                ['id' => 'adjustable', 'value' => 'adjustable', 'label' => 'Adjustable'],
                ['id' => 'others', 'value' => 'others', 'label' => 'Others'],
                ];
                @endphp
                <x-radio-input-edit name="RPM" otherInputName="RPM_other" :options="$options"
                    :data="$enquiryData['RPM']">
                    Revolution per Minute (RPM)
                </x-radio-input-edit>
            </div>
            <div class="col-span-2 md:col-span-1 bg-gray-50 shadow-sm rounded-md">
                @php
                $options = [
                ['id' => 'ABB', 'value' => 'ABB', 'label' => 'ABB'],
                ['id' => 'SIEMENS', 'value' => 'SIEMENS', 'label' => 'SIEMENS'],
                ['id' => 'others', 'value' => 'others', 'label' => 'Others'],
                ];
                @endphp
                <x-radio-input-edit name="motor_brand" otherInputName="motor_brand_other" :options="$options"
                    :data="$enquiryData['motor brand']">
                    Motor's Brand
                </x-radio-input-edit>
            </div>
            <div class="col-span-2 md:col-span-1 bg-gray-50 shadow-sm rounded-md">
                @php
                $options = [
                ['id' => 'ABB', 'value' => 'ABB', 'label' => 'ABB'],
                ['id' => 'MITSUBISHI', 'value' => 'MITSUBISHI', 'label' => 'MITSUBISHI'],
                ['id' => 'others', 'value' => 'others', 'label' => 'Others'],
                ];
                @endphp
                <x-radio-input-edit name="inverter_brand" otherInputName="inverter_brand_other" :options="$options"
                    :data="$enquiryData['inverter brand']">
                    Inverter's Brand
                </x-radio-input-edit>
            </div>
            <div class="col-span-2 md:col-span-1 bg-gray-50 shadow-sm rounded-md">
                <div class="pl-6 bg-white rounded-t-md py-2 mb-2 flex">
                    <label for="drawing_file">Drawing Flie</label>
                    @error('drawing_file')
                    <span id="error-message" class="text-red-600 pl-2">{{ $message }}</span>
                    <svg class="w-4 h-4 text-red-700 mt-0.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z" />
                    </svg>
                    @enderror
                </div>
                <div class="my-2">
                    <div>
                        <label class="inline-flex items-center ml-6">
                            <input type="radio" id="have_drawing" name="drawing_file" value="yes" {{ old('drawing_file',
                                $enquiryData['drawing_file'])=='yes' ? 'checked' : '' }} onclick="fileInput()"
                                class="text-primary focus:ring-white">
                            <span class="ml-2">Have</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center ml-6">
                            <input type="radio" id="no_drawing" name="drawing_file" value="no" {{ old('drawing_file',
                                $enquiryData['drawing_file'])=='no' ? 'checked' : '' }} onclick="fileInput()"
                                class="text-primary focus:ring-white">
                            <span class="ml-2">Don't have</span>
                        </label>
                    </div>
                </div>
                <div id="upload_drawing_file" onclick="fileInput()" class="hidden w-[90%] ml-6 text-gray-600">
                    <input
                        class="block w-full text-sm text-gray-500 border-none shadow-sm rounded-md bg-white focus:outline-none"
                        aria-describedby="file_input_help" id="file_input" type="file" name="upload_drawing_file"
                        onchange="validateSize(this)">
                    <p id="file_size_error" class="mt-1 text-sm text-danger-normal whitespace-normal"
                        style="display:none;">
                        File must not exceed 5MB.
                    </p>
                    <p class="mt-1 text-sm text-gray-500" id="file_input_help">.pdf / .docs / .xlsx</p>
                    <p class="mt-1 text-sm text-gray-500" id="file_info">uploaded file: {{
                        $enquiryData['drawing_file_name'] ?? 'none' }}</p>
                </div>
                @error('upload_drawing_file')
                <div id="error-message" class="text-red-600 ml-6 mb-4">{{ $message }}</div>
                @enderror

                <script>
                    function validateSize(input) {
                            const maxFileSize = 5 * 1024 * 1024;
                            const fileSizeError = document.getElementById('file_size_error');
                    
                            if (input.files && input.files[0]) {
                                if (input.files[0].size > maxFileSize) {
                                    fileSizeError.style.display = 'block';
                                    fileSizeError.textContent = 'File size must not exceed 5MB.';
                                    input.value = '';
                                } else {
                                    fileSizeError.style.display = 'none';
                                }
                            }
                        }
                </script>
            </div>
    </section>


    <div class="mt-4">
        <button id="clear-button" type="reset"
            class="w-20 py-2 text-white text-base bg-red-600 rounded-md hover:bg-red-500 focus:outline-none">Reset</button>
        <x-submit-button>Submit</x-submit-button>
    </div>
    <script type="text/javascript">
        document.getElementById('clear-button').addEventListener('click', function() {
            var radios = document.querySelectorAll('input[type="radio"]');
            radios.forEach(function(radio) {
                radio.removeAttribute('checked');
            });
            return false;
        });

    </script>
    <script>
        function toggleForms() {
            var layerNumber = parseInt(document.getElementById('layer').value, 10);
            var secondForm = document.getElementById('second_layer');
            var thirdForm = document.getElementById('second_layer_thickness');

            if (layerNumber >= 2) {
                secondForm.classList.remove('hidden');
                thirdForm.classList.remove('hidden');
            } else {
                secondForm.classList.add('hidden');
                thirdForm.classList.add('hidden');
            }
        }

        document.getElementById('layer').addEventListener('input', toggleForms);
        window.addEventListener('load', toggleForms);
    </script>
    <script>
        window.onload = function() {
            var errorMessages = document.getElementById("error-message");
            if (errorMessages) {
                var position = errorMessages.getBoundingClientRect().top + window.pageYOffset - 100; // 100px offset
                window.scrollTo({
                    top: position,
                    behavior: 'smooth'
                });
            }
        };
    </script>
    <script>
        function fileInput() {
            if (document.getElementById('have_drawing').checked) {
                document.getElementById('upload_drawing_file').style.display = 'block';
            } else if (document.getElementById('no_drawing').checked) {
                document.getElementById('upload_drawing_file').style.display = 'none';
            }
        }
        window.addEventListener('load', fileInput);

    </script>
</form>
@endsection