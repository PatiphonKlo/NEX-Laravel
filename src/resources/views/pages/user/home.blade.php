@extends('layouts/blank',['title' => 'Home'])

@section('content')
<div class="mx-14 min-h-[80vh] mt-10 md:mt-0 flex-col md:grid md:grid-rows-2 flex justify-center">
    <div class="flex items-end justify-center">
        <img class="mb-8 object-fill w-72 sm:w-80 min-w-[220px] md:w-[420px] lg:w-128 h-15 md:h-30 -z-10" src="/svg/NEX-logo.svg" alt="NEX logo" />
    </div>
    <div class="flex items-start justify-center mt-4">
        <div class="grid md:grid-cols-3 gap-4 lg:gap-6 text-center">
            <x-link href="{{ url('standard-product') }}" class="flex items-center justify-center shadow-md transition hover:bg-primary hover:text-white h-full md:h-40 font-bold w-full rounded-[70px] bg-secondary border-[3px] border-primary text-sm md:text-lg lg:text-xl px-16 py-10 lg:p-16">
                STANDARD PRODUCTS
            </x-link>
            <x-link href="{{ url('admin/made-to-order') }}" class="flex items-center justify-center shadow-md transition hover:bg-primary hover:text-white h-full md:h-40 font-bold w-full rounded-[70px] bg-secondary border-[3px] border-primary text-sm md:text-lg lg:text-xl px-16 py-10 lg:p-16">
                MADE TO ORDER
            </x-link>
            <x-link href="#" class="cursor-not-allowed flex items-center justify-center shadow-md transition hover:bg-primary hover:text-white h-full md:h-40 font-bold w-full rounded-[70px] bg-secondary border-[3px] border-primary text-sm md:text-lg lg:text-xl px-16 py-10 lg:p-16">
                Ai RECOMMENDATION
            </x-link>
        </div>
    </div>
</div>
@endsection
