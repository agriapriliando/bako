<x-guest-layout>

    {!! $setting->isi !!}

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
                                            <a target="_blank" href="http://localhost/sembakolaravel/public/report/{{ $i->id }}/{{ \Carbon\Carbon::now()->subDays($c)->format('Y-m-d') }}"
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
    @endsection
</x-guest-layout>
