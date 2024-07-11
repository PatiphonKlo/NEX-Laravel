<!-- Top bar -->
<nav class="font-semibold uppercase">
    <div class="max-w-screen flex flex-wrap lg:grid grid-cols-12 lg:gap-5 items-center justify-between mx-auto">

        <!-- Hamberger button -->
        <button data-collapse-toggle="navbar-default" type="button"
            class="inline-flex items-center w-10 h-10 justify-center text-sm text-gray-900 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none"
            aria-controls="navbar-default" aria-expanded="false">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>

        <!-- Logo(small screen) -->
        <div class="lg:hidden flex-nowrap">
            <x-link href="http://www.miscible.co.th/">
                <img src="/svg/NEX-logo.svg" alt="NEX logo" class="h-7 ss:h-8" />
            </x-link>
        </div>

        <!-- Top bar content -->
        <div id="navbar-default" class="hidden w-full lg:block lg:w-auto col-span-9">
            <ul
                class="lg:grid grid-cols-9 gap-3 lg:gap-5  mt-1 rounded-md lg:flex-row lg:mt-0 bg-secondary lg:bg-white">
                <li class="col-span-3">
                    <div
                        class="text-white flex justify-center rounded-t-md lg:rounded-md bg-primary lg:border-2 border-primary p-2">
                        {{ $title }}
                    </div>
                </li>
                <li class="hidden lg:block col-span-3">
                    <div
                        class="flex justify-center bg-primary text-white lg:rounded-md lg:border-2 border-primary p-2">
                        {{ $subtitle }}
                    </div>
                </li>
                <li>
                    <x-go-back-button
                        class="uppercase w-full text-center font-inter font-semibold flex justify-center transition hover:bg-primary hover:text-white lg:rounded-md bg-secondary lg:border-2 border-primary p-2">
                        back
                    </x-go-back-button>
                </li>
                <li>
                    <x-link href="{{ url('/') }}"
                        class="flex justify-center transition hover:bg-primary hover:text-white lg:rounded-md rounded-b-md bg-secondary lg:border-2 border-primary p-2">
                        home
                    </x-link>
                </li>
            </ul>
        </div>

        <!-- sub title(small screen) -->
        <div class="mt-2 lg:hidden w-full bg-primary rounded-md">
            <h1 class="font-semibold text-center text-white p-2.5">{{ $subtitle }}</h1>
        </div>

        <!-- Logo(normal screen) -->
        <x-link href="{{ url('/') }}" class="hidden lg:flex col-start-11 col-span-2 justify-end items-center">
            <img src="/svg/NEX-logo.svg" alt="NEX logo" class="h-12 w-full" />
        </x-link>

    </div>
</nav>
