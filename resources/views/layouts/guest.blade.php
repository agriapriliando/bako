<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
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

    <!-- ========================= JS here ========================= -->
    <script src="{{ asset('') }}assets/js/bootstrap.min.js"></script>
    <script src="{{ asset('') }}assets/js/tiny-slider.js"></script>
    <script src="{{ asset('') }}assets/js/glightbox.min.js"></script>
    <script src="{{ asset('') }}assets/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script>
        $(function() {
            $("#navbar").load("/navbar.html");
        });
    </script>
    <script type="text/javascript">
        //========= Hero Slider 
        tns({
            container: '.hero-slider',
            slideBy: 'page',
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 0,
            items: 1,
            nav: false,
            controls: true,
            controlsText: ['<i class="lni lni-chevron-left"></i>', '<i class="lni lni-chevron-right"></i>'],
        });

        //======== Brand Slider
        tns({
            container: '.brands-logo-carousel',
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 15,
            nav: false,
            controls: false,
            responsive: {
                0: {
                    items: 1,
                },
                540: {
                    items: 3,
                },
                768: {
                    items: 5,
                },
                992: {
                    items: 6,
                }
            }
        });
    </script>
</body>

</html>
