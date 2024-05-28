<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>Harga Sembako</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('') }}assets/images/favicon.svg" />

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="{{ asset('') }}assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('') }}assets/css/LineIcons.3.0.css" />
    <link rel="stylesheet" href="{{ asset('') }}assets/css/tiny-slider.css" />
    <link rel="stylesheet" href="{{ asset('') }}assets/css/glightbox.min.css" />
    <link rel="stylesheet" href="{{ asset('') }}assets/css/main.css?version=51" />

</head>

<body>
    <!-- Start Header Area -->
    <x-navbar></x-navbar>
    <!-- End Header Area -->

    {{ $slot }}

    <x-footer></x-footer>

    @yield('script')

</body>

</html>
