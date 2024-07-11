@extends('layouts/secondary', ['title' => 'Assembly Parts', 'subtitle' => $model])

@section('content')
    <div class="mt-3 lg:mt-5 grid ss:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
        @forelse ($assemblyData as $item)
            <div class="flex flex-col text-xxs md:text-xs">
                <div
                    class="h-[250px] shadow shadow-gray-400 rounded-md border-2 border-primary flex justify-center items-center">
                    <img class="p-4 contrast-125 object-scale-down max-h-52" src="{{ $item['part_image'] }}" alt="" onerror="this.onerror=null; this.src='{{ asset('images/no-image.png') }}';">
                </div>
                <div class="grid grid-cols-3">
                    <div
                        class="shadow shadow-gray-400 col-span-2 mt-2 rounded-l-md border-y-2 border-l-2 border-primary bg-secondary">
                        <h2 class="p-1 text-center uppercase font-semibold">{{ $item['part_name'] }} <br> (
                            {{ $item['part_id'] }} )</h2>
                    </div>
                    <div
                        class="shadow shadow-gray-400 col-span-1 mt-2 rounded-r-md border-y-2 border-r-2 border-primary flex items-center justify-center">
                        <h2 class="p-1 text-center uppercase font-semibold">{{ $item['spare_part'] }} UNIT</h2>
                    </div>
                </div>
            </div>
        @empty
            <span class="flex justify-center p-4">Assembly part not avaliable</span>
        @endempty
</div>
@endsection
