<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> --}}

    {{-- SEO Metatag --}}
    <!-- Primary Meta Tags -->
    <title>{{ $seojudul->isi }}</title>
    <meta name="title" content="{{ $seojudul->isi }}" />
    <meta name="description" content="{{ $seoisi->isi }}" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url('') }}" />
    <meta property="og:title" content="{{ $seojudul->isi }}" />
    <meta property="og:description" content="{{ $seoisi->isi }}" />
    <meta property="og:image" content="{{ asset('storage/images/setting/' . $seoimg->isi) }}" />

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="{{ url('') }}" />
    <meta property="twitter:title" content="{{ $seojudul->isi }}" />
    <meta property="twitter:description" content="{{ $seoisi->isi }}" />
    <meta property="twitter:image" content="{{ asset('storage/images/setting/' . $seoimg->isi) }}" />

    <!-- Meta Tags Generated with https://metatags.io -->
    {{-- SEO Metatag --}}


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
