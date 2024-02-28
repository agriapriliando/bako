<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Harga Sembako</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.svg" />

    <!-- ========================= CSS here ========================= -->
    <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/css/LineIcons.3.0.css" />
    <link rel="stylesheet" href="{{ asset('') }}assets/css/tiny-slider.css" />
    <link rel="stylesheet" href="{{ asset('') }}assets/css/glightbox.min.css" />
    <link rel="stylesheet" href="{{ asset('') }}assets/css/main.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

</head>

<body>

    <!-- Start Header Area -->
    <x-navbar-admin></x-navbar-admin>
    <!-- End Header Area -->

    {{ $slot }}

    <x-footer></x-footer>

    @stack('scripts')
</body>

</html>
