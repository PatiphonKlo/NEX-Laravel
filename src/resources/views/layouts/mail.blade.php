<!DOCTYPE html>
<html>

<head>

    <!-- Title -->
    <title>NEX | MISCIBLE TECHNOLOGY</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta content="A platform for industrial mixing tank design" name="description">
    <meta content="Miscible Technology Co., Ltd." name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="/images/favicon.ico">
    <!-- CSS -->
    @vite(['resources/css/app.css'])

</head>

<body class="bg-secondary flex justify-center items-center flex-col">
    <div class="flex flex-row gap-4 p-8">
        <img src="svg/NEX-logo.svg" alt="">
        <img src="svg/miscible-logo.svg" alt="" class="w-16">
    </div>


    <main class="bg-white shadow-lg p-8 flex-col">
        <h1>{{ $data['subject'] ?? '' }}</h1>
        <h3>This is an email from NEX platform & has attached flie below.</h3>
        <h3 class="flex ">Thanks, <br>Miscible Technology</h3>
    </main>
    @include('layouts/shared/footer')
</body>

</html>
