<x-guest-layout>
    <style>
        .div1 {
            background: url(assets/images/hero/slider-bga.jpg);
            background-size: cover;
            background-repeat: no-repeat;
        }

        p {
            color: #303030;
        }

        .google-maps {
            position: relative;
            padding-bottom: 75%; // This is the aspect ratio
            height: 0;
            overflow: hidden;
        }

        .google-maps iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100% !important;
            height: 100% !important;
        }
    </style>
    <!-- Start Hero Area -->
    <section class="hero-area">
        <div class="container">
            <div class="row">
                @if (session('status_logout'))
                    <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                        <strong>{{ session('status_logout') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="col-lg-8 col-12 custom-padding-right d-none d-sm-block">
                    <div class="slider-head">
                        <!-- Start Hero Slider -->
                        <div class="hero-slider">
                            <!-- Start Single Slider -->
                            @foreach ($priceslide as $item)
                                <div class="single-slider div1">
                                    <div class="content align-right"
                                        style="background: linear-gradient(0deg, rgba(255, 255, 255, 0.5), rgba(236, 236, 236, 0.5)),url({{ $item->category->image }}) right center no-repeat; background-size: 280px;">
                                        <h2><span>Update : {{ $item->created_at_edit }} WIB</br>Lokasi : {{ $item->pasar->nama }} </span>
                                            {{ $item->item->nama }}
                                        </h2>
                                        <h3>@currency($item->hargahariini)</h3>
                                        <p>Kategori {{ $item->category->nama }}</p>
                                        <div class="button d-none">
                                            <a href="{{ url('grafikbarang/' . $item->category->id) }}" class="btn">Lihat</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- End Single Slider -->
                        </div>
                        <!-- End Hero Slider -->
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-6 col-12 md-custom-padding">
                            <!-- Start Small Banner -->
                            <div class="hero-small-banner" style="background-image: url('{{ asset('storage/images/setting/bannerfront.jpg') }}');">
                                <img src="{{ asset('storage/images/setting/' . $banner->isi) }}" alt="banner" class="img-fluid">
                                <div class="content">
                                    <h2 class="text-center d-none">
                                        Free Banner
                                    </h2>
                                </div>
                            </div>
                            <!-- End Small Banner -->
                        </div>
                        <div class="col-lg-12 col-md-6 col-12">
                            <!-- Start Small Banner -->
                            <div class="hero-small-banner style2">
                                <div class="content">
                                    <h2>Daftar Harga Hari ini</h2>
                                    <p>Berisi seluruh item bahan pokok berdasarkan lokasi pantauan : Pasar Besar dan
                                        Pasar Kahayan</p>
                                    <div class="button">
                                        @foreach ($pasar as $p)
                                            {{-- jika di local, gunakan url localhost --}}
                                            <a class="btn" href="{{ url('') }}/public/report/{{ $p->id }}/{{ \Carbon\Carbon::now()->format('Y-m-d') }}/pdf">{{ $p->nama }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- Start Small Banner -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero Area -->

    <!-- Start Trending Product Area -->
    <section class="trending-product section" style="margin-top: 12px;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Daftar Harga Bahan Pokok</h2>
                        <h5>Hari ini Tanggal {{ \Carbon\Carbon::now()->translatedFormat('j F Y') }}</h5>
                    </div>
                </div>
            </div>
            <style>
                i.lni-arrow-up {
                    color: green !important;
                    font-size: 20px !important;
                }

                i.lni-arrow-down {
                    color: red !important;
                    font-size: 20px !important;
                }
            </style>
            <div class="row">
                @foreach ($items as $item)
                    <div class="col-lg-3 col-md-6 col-6">
                        <!-- Start Single Product -->
                        <div class="single-product">
                            <div class="product-image">
                                <img src="{{ $item->category->image }}" alt="#">
                                <div class="button">
                                    <a href="{{ url('grafikbarang/' . $item->id) }}" class="btn"><i class="lni lni-chevron-right"></i>Lihat</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <span class="category">{{ $item->category->nama }}</span>
                                <h4 class="title">
                                    <a href="{{ url('grafikbarang/' . $item->id) }}">{{ $item->nama }}</a>
                                </h4>
                                {{-- <ul class="review">
                                    <li><i class="lni lni-arrow-up"></i></li>
                                    <li><i class="lni lni-arrow-up"></i></li>
                                    <li><i class="lni lni-arrow-up"></i></li>
                                    <li><i class="lni lni-arrow-up"></i></li>
                                    <li><i class="lni lni-arrow-up"></i></li>
                                    <li><span>Harga Naik 3%</span></li>
                                </ul> --}}
                                <div class="price">
                                    @foreach ($prices as $i)
                                        @if ($i->item_id == $item->id)
                                            <small style="color: #303030">@currency($i->hargahariini) | {{ $i->pasar->nama }}</small><br>
                                        @endif
                                    @endforeach
                                    {{-- <small> berfore : Rp 17.000/Kg</small><br>
                                    <small> selisih : Rp 1000/Kg</small> --}}
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product -->
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Trending Product Area -->

    <!-- Start Call Action Area -->
    <section class="call-action section">
        <div class="container">
            <div class="row ">
                <div class="col-lg-8 offset-lg-2 col-12">
                    <div class="inner">
                        <div class="content">
                            <h2 class="wow fadeInUp" data-wow-delay=".4s">Kolom Informasi Bahan Pokok</h2>
                            <p class="wow fadeInUp" data-wow-delay=".6s">Daftar Harga Bahan Pokok
                                1 Minggu Terakhir</p>
                            <div class="button p-0 wow fadeInUp" data-wow-delay=".8s">
                                @for ($c = 1; $c <= 7; $c++)
                                    <div>
                                        @foreach ($pasar as $i)
                                            <a target="_blank" href="{{ url('') }}/report/{{ $i->id }}/{{ \Carbon\Carbon::now()->subDays($c)->format('Y-m-d') }}"
                                                class="btn m-1">{{ \Carbon\Carbon::now()->subDays($c)->translatedFormat('j F Y') }} - {{ $i->nama }}</a>
                                        @endforeach
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Call Action Area -->

    <!-- Start Banner Area -->
    <section class="banner section">
        <div class="container">
            <div class="row">
                @foreach ($pasar as $p)
                    <div class="col-lg-6 col-md-6 col-12">
                        {{-- <div class="single-banner" style="background-image:url('{{ $p->image }}')"> --}}
                        <div class="single-banner">
                            <div class="content">
                                <h2>{{ $p->nama }}</h2>
                                <p>{{ $p->deskripsi }}</p>
                                <div class="google-maps mt-3">
                                    {!! $p->lokasi_gmap !!}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!-- Start Shipping Info -->
    <section class="shipping-info">
        <div class="container">
            <ul>
                <!-- Free Shipping -->
                <li>
                    <div class="media-icon">
                        <i class="lni lni-delivery"></i>
                    </div>
                    <div class="media-body">
                        <h5>Diperbaharui </h5>
                        <span>Setiap Hari</span>
                    </div>
                </li>
                <!-- Money Return -->
                <li>
                    <div class="media-icon">
                        <i class="lni lni-support"></i>
                    </div>
                    <div class="media-body">
                        <h5>Laporan</h5>
                        <span>Unduhan PDF</span>
                    </div>
                </li>
                <!-- Support 24/7 -->
                <li>
                    <div class="media-icon">
                        <i class="lni lni-bar-chart"></i>
                    </div>
                    <div class="media-body">
                        <h5>Presentatif</h5>
                        <span>Grafik Harga</span>
                    </div>
                </li>
                <!-- Safe Payment -->
                <li>
                    <div class="media-icon">
                        <i class="lni lni-reload"></i>
                    </div>
                    <div class="media-body">
                        <h5>Riwayat</h5>
                        <span>Melihat Riwayat Harga</span>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- End Shipping Info -->
    @section('script')
        <!-- ========================= JS here ========================= -->
        <script src="{{ asset('') }}assets/js/bootstrap.min.js"></script>
        <script src="{{ asset('') }}assets/js/tiny-slider.js"></script>
        <script src="{{ asset('') }}assets/js/glightbox.min.js"></script>
        <script src="{{ asset('') }}assets/js/main.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
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
    @endsection
</x-guest-layout>
