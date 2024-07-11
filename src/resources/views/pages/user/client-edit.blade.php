@extends('layouts/secondary', ['title' => 'Quotation Request', 'subtitle' => $model])

@section('content')
    <div class="flex flex-col lg:grid grid-cols-2 pt-[2vh] gap-5">
        <div class="col-span-1 flex flex-col">
            <div
                class="shadow shadow-gray-400 border-2 border-green-600 lg:h-[580px] rounded-md px-8 overflow-y-auto">
                @include('pages/user/components/quotation-preview')
            </div>
        </div>
        <div class="col-span-1 flex flex-col">
            <x-form
                action="{{ config('app.env') == 'production' ? secure_url('client-update/' . $model . '/' . $postKey) : url('client-update/' . $model . '/' . $postKey) }}"
                method="POST">
                @method('PUT')
                <div class="shadow shadow-gray-400 border-2 border-green-600 lg:h-[580px] rounded-md p-16">
                    <div class="relative w-full mb-6 group">
                        <input value="{{ $clientData['client_email'] }}" type="text" name="email" id="email"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-green-500 focus:outline-none focus:ring-0 focus:border-green-600 peer"
                            placeholder=" " />
                        <label for="email"
                            class="peer-focus:font-medium absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-1 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-green-600 peer-focus:dark:text-green-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email
                            address</label>
                        @error('email')
                            <p class="mt-2 text-sm text-red-600 whitespace-normal">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="col-span-2 relative w-full mb-6 group">
                            <input value="{{ $clientData['client_contact_name'] }}" type="text" name="name"
                                id="name"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-green-500 focus:outline-none focus:ring-0 focus:border-green-600 peer"
                                placeholder=" " />
                            <label for="name"
                                class="peer-focus:font-medium absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-1 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-green-600 peer-focus:dark:text-green-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First
                                name</label>
                            @error('name')
                                <p class="mt-2 text-sm text-red-600 whitespace-normal">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative w-full mb-6 group">
                            <input value="{{ $clientData['client_phone_number'] }}" type="tel" name="phone"
                                id="phone"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-green-500 focus:outline-none focus:ring-0 focus:border-green-600 peer"
                                placeholder=" " />
                            <label for="phone"
                                class="peer-focus:font-medium absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-1 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-green-600 peer-focus:dark:text-green-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Tel
                                (ex.123-456-7890)</label>
                            @error('phone')
                                <p class="mt-2 text-sm text-red-600 whitespace-normal">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="relative w-full mb-6 group">
                            <input value="{{ $clientData['client_company'] }}" type="text" name="company" id="company"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-green-500 focus:outline-none focus:ring-0 focus:border-green-600 peer"
                                placeholder=" " />
                            <label for="company"
                                class="peer-focus:font-medium absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-1 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-green-600 peer-focus:dark:text-green-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Company</label>
                            @error('company')
                                <p class="mt-2 text-sm text-red-600 whitespace-normal">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-2 mt-[2vh]">
                    <button type="submit" class="col-start-3 col-span-1" data-modal-target="popup-modal"
                        data-modal-toggle="popup-modal">
                        <div
                            class="p-2 uppercase border-1 border-green-500 bg-green-400 transition hover:bg-green-500 hover:text-white rounded-md text-center">
                            confirm
                        </div>
                    </button>
                </div>
        </div>
        </x-form>
    </div>
    </div>
@endsection
