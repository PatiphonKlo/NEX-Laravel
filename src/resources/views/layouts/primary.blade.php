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

    <main class="flex-grow p-4 lg:p-8">
        @include('layouts/shared/topbar-1', [
        'title' => $title,
        ])
        @yield('header')
        @yield('content')
        @yield('footer')
        @include('layouts/shared/back-to-top-button')
    </main>

    @vite(['resources/js/app.js'])

</body>
</html>
