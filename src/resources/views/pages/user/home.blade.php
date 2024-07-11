@extends('layouts/blank', ['title' => 'Home'])

@section('content')
    <div class="mx-14 h-[90vh] md:mt-0 flex-col md:grid md:grid-rows-2 flex justify-center">
        <div class="flex items-end justify-center">
            <img class="mb-8 object-fill w-72 sm:w-80 min-w-[220px] md:w-[420px] lg:w-128 h-15 md:h-30 -z-10"
                src="/svg/NEX-logo.svg" alt="NEX logo" />
        </div>
        <div class="flex items-start justify-center mt-4">
            <div class="grid md:grid-cols-3 gap-4 lg:gap-6 text-center">
                <x-link href="{{ url('standard-product') }}"
                    class="flex items-center justify-center shadow-md transition hover:bg-primary hover:text-white h-full md:h-40 font-bold w-full rounded-[100px] bg-secondary border-[3px] border-primary text-sm md:text-lg lg:text-xl px-16 py-10 lg:p-16">
                    STANDARD PRODUCTS
                </x-link>
                <x-link href="{{ url('enquiry-form') }}"
                    class="flex items-center justify-center shadow-md transition hover:bg-primary hover:text-white h-full md:h-40 font-bold w-full rounded-[100px] bg-secondary border-[3px] border-primary text-sm md:text-lg lg:text-xl px-16 py-10 lg:p-16">
                    MADE TO ORDER
                </x-link>
                <x-link href="#"
                    class="cursor-not-allowed flex items-center justify-center shadow-md transition hover:bg-primary hover:text-white h-full md:h-40 font-bold w-full rounded-[100px] bg-secondary border-[3px] border-primary text-sm md:text-lg lg:text-xl px-16 py-10 lg:p-16">
                    Ai RECOMMENDATION
                </x-link>
            </div>
        </div>
    </div>

    <div class="fixed top-0 right-0 p-1 sm:p-4 flex items-center justify-center gap-4">
        <a
            href="https://www.appsheet.com/start/aef75d1b-a90a-4961-81fb-ba43f29d27b2?platform=desktop#viewStack[0][identifier][Type]=Control&viewStack[0][identifier][Name]=Inventory(%E0%B8%A3%E0%B8%B1%E0%B8%9A%E0%B9%80%E0%B8%82%E0%B9%89%E0%B8%B2)&appName=StockStoreV1-11909385">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-orange-200">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                    fill="#000000">
                    <path
                        d="M200-80q-33 0-56.5-23.5T120-160v-451q-18-11-29-28.5T80-680v-120q0-33 23.5-56.5T160-880h640q33 0 56.5 23.5T880-800v120q0 23-11 40.5T840-611v451q0 33-23.5 56.5T760-80H200Zm0-520v440h560v-440H200Zm-40-80h640v-120H160v120Zm200 280h240v-80H360v80Zm120 20Z" />
                </svg>
            </div>
        </a>
        <div
            class="mx-auto flex items-center justify-center h-12 w-12 rounded-full {{ $authenticated ? ' bg-green-100' : 'bg-red-300' }}">
            @if ($authenticated)
                <button id="logoutButton" class="flex flex-col justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                        fill="#000000">
                        <path
                            d="M240-640h360v-80q0-50-35-85t-85-35q-50 0-85 35t-35 85h-80q0-83 58.5-141.5T480-920q83 0 141.5 58.5T680-720v80h40q33 0 56.5 23.5T800-560v400q0 33-23.5 56.5T720-80H240q-33 0-56.5-23.5T160-160v-400q0-33 23.5-56.5T240-640Zm0 480h480v-400H240v400Zm240-120q33 0 56.5-23.5T560-360q0-33-23.5-56.5T480-440q-33 0-56.5 23.5T400-360q0 33 23.5 56.5T480-280ZM240-160v-400 400Z" />
                    </svg>
                    <span class="uppercase relative font-semibold text-[10px]">{{ $role ?? '' }}</span>
                </button>
                <div id="logoutModal" class="hidden">
                    @include('pages/authentication/modal-logout')
                </div>
            @else
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                    fill="#000000">
                    <path
                        d="M240-80q-33 0-56.5-23.5T160-160v-400q0-33 23.5-56.5T240-640h40v-80q0-83 58.5-141.5T480-920q83 0 141.5 58.5T680-720v80h40q33 0 56.5 23.5T800-560v400q0 33-23.5 56.5T720-80H240Zm0-80h480v-400H240v400Zm240-120q33 0 56.5-23.5T560-360q0-33-23.5-56.5T480-440q-33 0-56.5 23.5T400-360q0 33 23.5 56.5T480-280ZM360-640h240v-80q0-50-35-85t-85-35q-50 0-85 35t-35 85v80ZM240-160v-400 400Z" />
                </svg>
            @endif
        </div>
    </div>

    @vite(['resources/js/modal-logout.js'])
@endsection
