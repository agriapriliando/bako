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
                <div class="col-lg-8 col-12 custom-padding-right">
                    <div class="slider-head">
                        <!-- Start Hero Slider -->
                        <div class="hero-slider">
                            <!-- Start Single Slider -->
                            @foreach ($price as $item)
                                <div class="single-slider div1">
                                    <div class="content"
                                        style="background: linear-gradient(0deg, rgba(255, 255, 255, 0.5), rgba(236, 236, 236, 0.5)),url(storage/images/category/{{ $item->category->image }}) 80% center no-repeat; background-size: 200px;">
                                        <h2><span>Update : {{ date('d/m/Y') . ' - ' . $item->pasar->nama }}</span>
                                            {{ $item->item->nama }}
                                        </h2>
                                        <p>Kategori {{ $item->category->nama }}</p>
                                        <h3>@currency($item->hargahariini)</h3>
                                        <div class="button">
                                            <a href="/barang-detail.html" class="btn">Lihat</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- End Single Slider -->
                            <!-- Start Single Slider -->
                            <div class="single-slider div1">
                                <div class="content"
                                    style="background: linear-gradient(0deg, rgba(255, 255, 255, 0.5), rgba(236, 236, 236, 0.5)),url(assets/images/hero/nobg_minyakgoreng.png) 80% center no-repeat; background-size: 200px;">
                                    <h2><span>Harga Sembako</span>
                                        Minyak Goreng
                                    </h2>
                                    <p>Bimoli, Sun Co, Tropical, Sania 2 liter, Fortune, Minyak Kita, Tanpa Merk / Curah
                                    </p>
                                    <h3><span>Harga Rata-Rata</span> Rp 28.000</h3>
                                    <div class="button">
                                        <a href="/barang-detail.html" class="btn">Lihat</a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Slider -->
                        </div>
                        <!-- End Hero Slider -->
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-6 col-12 md-custom-padding">
                            <!-- Start Small Banner -->
                            <div class="hero-small-banner" style="background-image: url('assets/images/hero/slider-bnr.jpg');">
                                <div class="content">
                                    <h2>
                                        <span>Harga Hari Ini</span>
                                        Daging Sapi Segar
                                    </h2>
                                    <h3>Rp 135.000</h3>
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
                                        <a class="btn" href="#">Unduh PDF</a>
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
                        <p>Berisi Daftar Bahan Pokok | diperbaharui tanggal 15 Februari 2024 Pukul 09.23 WIB</p>
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
                <div class="col-lg-3 col-md-6 col-6">
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="product-image">
                            <img src="assets/images/products/products1.jpg" alt="#">
                            <div class="button">
                                <a href="/barang-detail.html" class="btn"><i class="lni lni-chevron-right"></i>Lihat</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="category">Beras</span>
                            <h4 class="title">
                                <a href="/barang-detail.html">Beras Mangkok</a>
                            </h4>
                            <ul class="review">
                                <li><i class="lni lni-arrow-up"></i></li>
                                <li><i class="lni lni-arrow-up"></i></li>
                                <li><i class="lni lni-arrow-up"></i></li>
                                <li><i class="lni lni-arrow-up"></i></li>
                                <li><i class="lni lni-arrow-up"></i></li>
                                <li><span>Harga Naik 3%</span></li>
                            </ul>
                            <div class="price">
                                <span>Rp 18.000/Kg</span><br>
                                <small> berfore : Rp 17.000/Kg</small><br>
                                <small> selisih : Rp 1000/Kg</small>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                </div>
                <div class="col-lg-3 col-md-6 col-6">
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="product-image">
                            <img src="assets/images/products/products2.jpg" alt="#">
                            <div class="button">
                                <a href="/barang-detail.html" class="btn"><i class="lni lni-chevron-right"></i>Lihat</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="category">Minyak Goreng</span>
                            <h4 class="title">
                                <a href="/barang-detail.html">Minyak Gooreng Curah</a>
                            </h4>
                            <ul class="review">
                                <li><i class="lni lni-arrow-up"></i></li>
                                <li><i class="lni lni-arrow-up"></i></li>
                                <li><i class="lni lni-arrow-up"></i></li>
                                <li><i class="lni lni-arrow-up"></i></li>
                                <li><i class="lni lni-arrow-up"></i></li>
                                <li><span>Harga Naik 3%</span></li>
                            </ul>
                            <div class="price">
                                <span>Rp 18.000/Kg</span><br>
                                <small> berfore : Rp 17.000/Kg</small><br>
                                <small> selisih : Rp 1000/Kg</small>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                </div>
                <div class="col-lg-3 col-md-6 col-6">
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="product-image">
                            <img src="assets/images/products/products1.jpg" alt="#">
                            <div class="button">
                                <a href="/barang-detail.html" class="btn"><i class="lni lni-chevron-right"></i>Lihat</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="category">Minyak Goreng</span>
                            <h4 class="title">
                                <a href="/barang-detail.html">Minyak Tropical</a>
                            </h4>
                            <ul class="review">
                                <li><i class="lni lni-arrow-down"></i></li>
                                <li><i class="lni lni-arrow-down"></i></li>
                                <li><i class="lni lni-arrow-down"></i></li>
                                <li><i class="lni lni-arrow-down"></i></li>
                                <li><i class="lni lni-arrow-down"></i></li>
                                <li><span>Harga Turun 2%</span></li>
                            </ul>
                            <div class="price">
                                <span>Rp 18.000/Kg</span><br>
                                <small> berfore : Rp 17.000/Kg</small><br>
                                <small> selisih : Rp 1000/Kg</small>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                </div>
                <div class="col-lg-3 col-md-6 col-6">
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="product-image">
                            <img src="assets/images/products/products1.jpg" alt="#">
                            <div class="button">
                                <a href="/barang-detail.html" class="btn"><i class="lni lni-chevron-right"></i>Lihat</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="category">Minyak Goreng</span>
                            <h4 class="title">
                                <a href="/barang-detail.html">Minyak Tropical</a>
                            </h4>
                            <ul class="review">
                                <li><i class="lni lni-arrow-down"></i></li>
                                <li><i class="lni lni-arrow-down"></i></li>
                                <li><i class="lni lni-arrow-down"></i></li>
                                <li><i class="lni lni-arrow-down"></i></li>
                                <li><i class="lni lni-arrow-down"></i></li>
                                <li><span>Harga Turun 2%</span></li>
                            </ul>
                            <div class="price">
                                <span>Rp 18.000/Kg</span><br>
                                <small> berfore : Rp 17.000/Kg</small><br>
                                <small> selisih : Rp 1000/Kg</small>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                </div>
                <div class="col-lg-3 col-md-6 col-6">
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="product-image">
                            <img src="assets/images/products/products1.jpg" alt="#">
                            <div class="button">
                                <a href="/barang-detail.html" class="btn"><i class="lni lni-chevron-right"></i>Lihat</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="category">Minyak Goreng</span>
                            <h4 class="title">
                                <a href="/barang-detail.html">Minyak Tropical</a>
                            </h4>
                            <ul class="review">
                                <li><i class="lni lni-arrow-down"></i></li>
                                <li><i class="lni lni-arrow-down"></i></li>
                                <li><i class="lni lni-arrow-down"></i></li>
                                <li><i class="lni lni-arrow-down"></i></li>
                                <li><i class="lni lni-arrow-down"></i></li>
                                <li><span>Harga Turun 2%</span></li>
                            </ul>
                            <div class="price">
                                <span>Rp 18.000/Kg</span><br>
                                <small> berfore : Rp 17.000/Kg</small><br>
                                <small> selisih : Rp 1000/Kg</small>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                </div>
                <div class="col-lg-3 col-md-6 col-6">
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="product-image">
                            <img src="assets/images/products/products1.jpg" alt="#">
                            <div class="button">
                                <a href="/barang-detail.html" class="btn"><i class="lni lni-chevron-right"></i>Lihat</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="category">Minyak Goreng</span>
                            <h4 class="title">
                                <a href="/barang-detail.html">Minyak Tropical</a>
                            </h4>
                            <ul class="review">
                                <li><i class="lni lni-arrow-down"></i></li>
                                <li><i class="lni lni-arrow-down"></i></li>
                                <li><i class="lni lni-arrow-down"></i></li>
                                <li><i class="lni lni-arrow-down"></i></li>
                                <li><i class="lni lni-arrow-down"></i></li>
                                <li><span>Harga Turun 2%</span></li>
                            </ul>
                            <div class="price">
                                <span>Rp 18.000/Kg</span><br>
                                <small> berfore : Rp 17.000/Kg</small><br>
                                <small> selisih : Rp 1000/Kg</small>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                </div>
                <div class="col-lg-3 col-md-6 col-6">
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="product-image">
                            <img src="assets/images/products/products1.jpg" alt="#">
                            <div class="button">
                                <a href="/barang-detail.html" class="btn"><i class="lni lni-chevron-right"></i>Lihat</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="category">Minyak Goreng</span>
                            <h4 class="title">
                                <a href="/barang-detail.html">Minyak Tropical</a>
                            </h4>
                            <ul class="review">
                                <li><i class="lni lni-arrow-down"></i></li>
                                <li><i class="lni lni-arrow-down"></i></li>
                                <li><i class="lni lni-arrow-down"></i></li>
                                <li><i class="lni lni-arrow-down"></i></li>
                                <li><i class="lni lni-arrow-down"></i></li>
                                <li><span>Harga Turun 2%</span></li>
                            </ul>
                            <div class="price">
                                <span>Rp 18.000/Kg</span><br>
                                <small> berfore : Rp 17.000/Kg</small><br>
                                <small> selisih : Rp 1000/Kg</small>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                </div>
                <div class="col-lg-3 col-md-6 col-6">
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="product-image">
                            <img src="assets/images/products/products1.jpg" alt="#">
                            <div class="button">
                                <a href="/barang-detail.html" class="btn"><i class="lni lni-chevron-right"></i>Lihat</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="category">Minyak Goreng</span>
                            <h4 class="title">
                                <a href="/barang-detail.html">Minyak Tropical</a>
                            </h4>
                            <ul class="review">
                                <li><i class="lni lni-arrow-down"></i></li>
                                <li><i class="lni lni-arrow-down"></i></li>
                                <li><i class="lni lni-arrow-down"></i></li>
                                <li><i class="lni lni-arrow-down"></i></li>
                                <li><i class="lni lni-arrow-down"></i></li>
                                <li><span>Harga Turun 2%</span></li>
                            </ul>
                            <div class="price">
                                <span>Rp 18.000/Kg</span><br>
                                <small> berfore : Rp 17.000/Kg</small><br>
                                <small> selisih : Rp 1000/Kg</small>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                </div>
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
                            <p class="wow fadeInUp" data-wow-delay=".6s">Seluruh Harga Bahan Pokok tersebut diatas
                                diperbaharui setiap hari.</p>
                            <div class="button wow fadeInUp" data-wow-delay=".8s">
                                <a href="javascript:void(0)" class="btn">Unduhan</a>
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
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="single-banner" style="background-image:url('assets/images/banner/banner_besar.jpg')">
                        <div class="content">
                            <h2>Pasar Besar</h2>
                            <p>Jalan A. Yani Km <br>Kel. Pahandut, Kec. Pahandut <br> Kota Palangkaraya, Kalimantan
                                Tengah</p>
                            <div class="button">
                                <a href="#" class="btn">Lokasi</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="single-banner custom-responsive-margin" style="background-image:url('assets/images/banner/banner_kahayan.jpg')">
                        <div class="content">
                            <h2>Pasar Kahayan</h2>
                            <p>Jl. Tjilik Riwut Km. 1 <br>Kel. Palangka, Kec. Jekan Raya, <br>Kota Palangka Raya,
                                Kalimantan Tengah</p>
                            <div class="button">
                                <a href="product-grids.html" class="btn">Lokasi</a>
                            </div>
                        </div>
                    </div>
                </div>
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
</x-guest-layout>
