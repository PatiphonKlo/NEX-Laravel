@extends('layouts/blank', ['title' => 'PDF Access'])

@section('content')
<section class="bg-white">
    <div class="lg:grid lg:min-h-screen lg:grid-cols-12">
        <section class="relative flex h-32 items-end bg-gray-800 lg:col-span-5 lg:h-full xl:col-span-6">
            <img alt="NA" src="/images/server-bg.png" class="absolute inset-0 h-full w-full object-cover opacity-20" />
            <div class="hidden lg:relative lg:block lg:p-12 justify-center items-center">
                <a class="block" href="{{ url('/') }}">
                    <span class="sr-only">Home</span>
                    <img src="/svg/NEX-logo.svg" alt="NA" class="h-32 bg-white p-8 rounded-md">
                </a>

                <h2 class="mt-6 text-2xl font-bold text-white sm:text-3xl md:text-4xl">
                    Pdf access
                </h2>
            </div>
        </section>

        <main class="flex items-center justify-center px-8 py-8 sm:px-12 lg:col-span-7 lg:px-16 lg:py-12 xl:col-span-6">
            <div class="max-w-xl lg:max-w-3xl flex flex-col items-center justify-center">
                <div class="relative -mt-20 lg:hidden flex flex-col items-center justify-center">
                    <a class="rounded-md mb-20" href="{{ url('/') }}">
                        <span class="sr-only">Home</span>
                        <img src="/svg/NEX-logo.svg" alt="NA" class="h-24 bg-white p-4 px-8 rounded-md">
                    </a>

                    <h1 class="mt-2 text-2xl font-bold text-gray-900 sm:text-3xl md:text-4xl">
                        Pdf access
                    </h1>
                </div>

                <form enctype="multipart/form-data" action="{{ config('app.env') == 'production' ? secure_url('pdf-access/'.$type .'/'.$key) : url('pdf-access/'.$type .'/'.$key) }}" method="post" class="flex flex-col gap-4 items-center justify-center">
                    @csrf
                    <label for="password">Enter Password to Access PDF:</label>
                    <input type="password" name="password" class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm">
                    <x-submit-button type="submit">Access</x-submit-button>
                    @if ($errors->any())
                    <div class="text-danger-normal">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </form>
            </div>
        </main>
    </div>
</section>
@endsection
