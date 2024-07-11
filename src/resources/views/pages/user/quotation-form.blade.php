@extends('layouts/secondary', ['title' => 'Quotation Request', 'subtitle' => $model])

@section('content')
<x-form
    action="{{ config('app.env') == 'production' ? secure_url('request-quotation/' . $group .'/'.$model) : url('request-quotation/' . $group .'/'.$model) }}"
    method="POST">
    @csrf
    <div class="flex flex-col lg:grid grid-cols-2 pt-[2vh] gap-5">
        <div class="col-span-1 flex flex-col">
            <div class="shadow shadow-gray-400 border-2 border-primary lg:h-[580px] rounded-md px-8 overflow-y-auto">
                @include('pages/user/components/quotation-preview')
            </div>
        </div>
        <div class="col-span-1 flex flex-col">
            <div class="shadow shadow-gray-400 border-2 border-primary lg:h-[580px] rounded-md p-16 overflow-y-auto">
                <div class="grid grid-cols-1 md:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="text" name="email" value="{{ old('email') }}" id="email"
                            class="block my-3 px-0 w-full text-sm bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-primary peer"
                            placeholder=" " />
                        <label for="email"
                            class="font-semibold peer-focus:font-bold absolute text-sm text-gray-600 duration-100 transform -translate-y-3 scale-75 top-1 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-primary peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3">Email
                            address</label>
                        @error('email')
                        <p class="mt-2 text-sm text-red-600 whitespace-normal">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="col-span-2 relative z-0 w-full mb-6 group">
                        <input type="text" name="name" value="{{ old('name') }}" id="name"
                            class="block my-3 px-0 w-full text-sm bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-primary peer"
                            placeholder=" " />
                        <label for="name"
                            class="font-semibold peer-focus:font-bold absolute text-sm text-gray-600 duration-100 transform -translate-y-3 scale-75 top-1 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-primary peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3">Name</label>
                        @error('name')
                        <p class="mt-2 text-sm text-red-600 whitespace-normal">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="tel" name="phone" value="{{ old('phone') }}" id="phone"
                            class="block my-3 px-0 w-full text-sm bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-primary peer"
                            placeholder=" " />
                        <label for="phone"
                            class="font-semibold peer-focus:font-bold absolute text-sm text-gray-600 duration-100 transform -translate-y-3 scale-75 top-1 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-primary peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3">Tel
                            (ex.123-456-7890)</label>
                        @error('phone')
                        <p class="mt-2 text-sm text-red-600 whitespace-normal">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="text" name="company" value="{{ old('company') }}" id="company"
                            class="block my-3 px-0 w-full text-sm bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-primary peer"
                            placeholder=" " />
                        <label for="company"
                            class="font-semibold peer-focus:font-bold absolute text-sm text-gray-600 duration-100 transform -translate-y-3 scale-75 top-1 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-primary peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3">Company</label>
                        @error('company')
                        <p class="mt-2 text-sm text-red-600 whitespace-normal">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-2 mt-[2vh]">
                <button type="button" class="col-start-3 col-span-1" data-modal-target="popup-modal"
                    data-modal-toggle="popup-modal">
                    <div
                        class="p-2 uppercase border-1 border-green-500 bg-green-400 transition hover:bg-green-500 hover:text-white rounded-md text-center">
                        request quotation
                    </div>
                </button>
                <div id="popup-modal" tabindex="-1"
                    class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-md max-h-full">
                        <div class="relative bg-white rounded-lg shadow">
                            <button type="button"
                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
                                data-modal-hide="popup-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="p-6 text-center">
                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <h3 class="mb-5 text-lg font-normal text-gray-500">This will create a new quotation</h3>
                                <div class="flex gap-4 justify-center">
                                    <button type="submit"
                                        class="text-white bg-green-500 hover:bg-green-700 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                        YES, CONFIRM
                                    </button>
                                    <button data-modal-hide="popup-modal" type="button"
                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 ">
                                        CANCEL</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <button type="submit" class="col-start-3 col-span-1" data-modal-target="popup-modal"
                    data-modal-toggle="popup-modal">
                    <div
                        class="p-2 uppercase border-1 border-green-500 bg-green-400 transition hover:bg-green-500 hover:text-white rounded-md text-center">
                        confirm
                    </div>
                </button> --}}
            </div>
        </div>
    </div>
    </div>
</x-form>
@endsection