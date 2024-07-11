@extends('layouts/blank', ['title' => 'Authentication'])

@section('content')
    <div class="bg-gray-100">
        <div class="h-screen flex justify-center items-center">
            <div class="bg-white mx-4 p-8 rounded shadow-md w-full sm:w-1/2 lg:w-1/3">
                <img class="mx-auto" width="200px" src="/svg/NEX-logo.svg" alt="NEX logo" />
                <h1 class="text-xl font-bold mb-8 text-center uppercase">Login to Admin Panel</h1>
                <x-form
                    action="{{ config('app.env') == 'production' ? secure_url('authentication/login') : url('authentication/login') }}"
                    method="POST">
                    <div class="mb-4">
                        <label class="block font-semibold text-black mb-2" for="email">
                            Email Address
                        </label>
                        <input name="email"
                            class="bg-gray-50 border border-gray-500 focus:ring-bg-primary focus:border-bg-primary rounded-lg w-full py-3 px-3 text-black"
                            id="email" type="email" placeholder="Enter your email address" required />
                    </div>
                    <div class="mb-4">
                        <label class="block font-semibold text-black mb-2" for="password">
                            Password
                        </label>
                        <input name="password"
                            class="bg-gray-50 border border-gray-500 focus:ring-bg-primary focus:border-bg-primary rounded-lg w-full py-3 px-3 text-black mb-3"
                            id="password" type="password" placeholder="Enter your password" required />
                    </div>
                    <div class="mb-5">
                        <button type="submit"
                            class="uppercase w-full bg-primary hover:bg-green-900 text-white font-bold py-2 px-4 rounded-lg">
                            Login
                        </button>
                    </div>
                </x-form>
                <x-go-back-button
                    class="uppercase w-full bg-primary hover:bg-green-900 text-white font-bold py-2 px-4 rounded-lg">
                    back
                </x-go-back-button>
            </div>
        </div>
    </div>
@endsection
