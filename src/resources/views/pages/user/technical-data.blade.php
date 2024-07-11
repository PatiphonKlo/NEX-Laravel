@extends('layouts/secondary',[ 'title' => 'Technical Data', 'subtitle' => $model])

@section('content')
<div class="grid sm:grid-cols-2 my-5 gap-5 text-xs lg:text-base h-[80vh]">
    <div class="relative h-full border-2 border-green-600 rounded-md shadow shadow-gray-400 lg:pt-1/4 flex flex-col items-center p-4 lg:p-10 gap-2">
        <div class="absolute top-0 left-0 mt-4 ml-4">
            @include('pages/user/components/modal-spec-send')
        </div>
        <div class="flex flex-col lg:grid grid-cols-2 gap-2 mt-16">
            <div class="flex justify-center items-center">
                <img src="{{$imageURL[0]}}" class="w-72 h-72" onerror="this.onerror=null; this.src='{{ asset('images/no-image.png') }}'; this.className='w-60 border-2';">
            </div>
            <div class="flex justify-center items-center">
                <img src="{{$imageURL[1]}}" class="w-72 h-72" onerror="this.onerror=null; this.src='{{ asset('images/no-image.png') }}'; this.className='w-60 border-2';">
            </div>
        </div>
        <div class="flex justify-center items-center">
            <img src="{{$imageURL[1]}}" class="w-72 h-72" onerror="this.onerror=null; this.src='{{ asset('images/no-image.png') }}'; this.className='w-60 border-2';">
        </div>
    </div>
    <div class="flex flex-col gap-2">
        @forelse($technicalData as $item)
        <div class="grid grid-cols-6 gap-4 border-2 border-primary rounded-md shadow shadow-gray-400">
            <div class="max-h-20 col-span-2 bg-secondary rounded-l-[4px]">
                <h2 class="p-2 text-center uppercase font-semibold">{{$item['technical_component'] ?? ''}}</h2>
            </div>
            <div class="max-h-20 col-span-4 flex items-center justify-center">
                <h2 class="p-2 text-center uppercase font-semibold">{{$item['specification'] ?? '' }}</h2>
            </div>
        </div>
        @empty
        <div class="grid grid-cols-6 gap-4 border-2 border-primary rounded-md shadow shadow-gray-400">
            <div class="max-h-20 col-span-2 bg-secondary rounded-l-[4px]">
                <h2 class="p-2 text-center uppercase font-semibold">Data not avaliable</h2>
            </div>
            <div class="max-h-20 col-span-4 flex items-center justify-center">
                <h2 class="p-2 text-center uppercase font-semibold">Data not avaliable</h2>
            </div>
        </div>
        @endempty
    </div>
</div>
@endsection

