@extends('layouts/secondary', ['title' => 'Quotation Request', 'subtitle' => $model])

@section('content')
    <div class="flex flex-col lg:grid grid-cols-2 pt-[2vh] gap-5">
        <div class="col-span-1 flex flex-col">
            <div class="shadow shadow-gray-400 border-2 border-green-600 lg:h-[580px] rounded-md px-8 overflow-y-auto">
                @include('pages/user/components/quotation-preview')
            </div>
        </div>
        <div class="col-span-1 flex flex-col">
            <div class="shadow shadow-gray-400 border-2 border-green-600 lg:h-[580px] rounded-md px-32 py-20">
                <table>
                    <tr>
                        <td class="pr-5 font-medium">Name</td>
                        <td>: {{ $clientData['client_contact_name'] }}</td>
                    </tr>
                    <tr>
                        <td class="pr-5 font-medium">Tel</td>
                        <td>: {{ $clientData['client_phone_number'] }}</td>
                    </tr>
                    <tr>
                        <td class="pr-5 font-medium">Email</td>
                        <td>: {{ $clientData['client_email'] }}</td>
                    </tr>
                    <tr>
                        <td class="pr-5 font-medium">Company</td>
                        <td>: {{ $clientData['client_company'] }}</td>
                    </tr>
                </table>
            </div>
            <div class="grid grid-cols-3 gap-2 mt-[2vh]">

                <a href="{{ url('client-edit-form/' . $model . '/' . $postKey) }}" class="col-start-2 col-span-1">
                    <div
                        class="p-2 uppercase border-1 border-gray-normal bg-secondary transition hover:bg-gray-normal hover:text-white rounded-md text-center">
                        edit
                    </div>
                </a>

                <button class="col-start-3 col-span-1" data-modal-target="popup-modal" data-modal-toggle="popup-modal">
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
                                <h3 class="mb-5 text-lg font-normal text-gray-500">This will navigate to quotation
                                    administrator</h3>
                                <div class="flex gap-4 justify-center">
                                    <a href="{{ url('admin/request-quotation/' . $model . '/' . $postKey) }}">
                                        <button type="submit"
                                            class="text-white bg-green-500 hover:bg-green-700 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                            YES, CONFIRM
                                        </button>
                                    </a>
                                    <button data-modal-hide="popup-modal" type="button"
                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 ">
                                        CANCEL</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
