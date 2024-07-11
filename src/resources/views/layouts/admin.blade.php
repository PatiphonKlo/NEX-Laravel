<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts/shared/title-meta', ['title' => $title])
    @vite(['resources/css/app.css'])
    @yield('css')
</head>
<body>

    @include('layouts/shared/status-alert-server-side')
    @include('layouts/shared/status-alert-client-side')

    <main class="flex-grow lg:p-8">
        <div class="p-6 pt-2 lg:ml-56">
            @yield('header')
            @include('layouts/shared/sidebar')
            @yield('content')
            @yield('footer')
        </div>
        @include('layouts/shared/back-to-top-button')
    </main>

    @vite(['resources/js/app.js'])
</body>
</html>
