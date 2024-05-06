<x-guest-layout>
    <!-- Start Trending Product Area -->
    <section class="trending-product section" style="padding-top: 10px;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="align-center my-2">
                        <h3>Grafik Harga Seluruh Kategori (7 Hari Terakhir)</h3>
                        <p class="text-muted">Grafik Ini menampilkan Harga Rata-Rata Per Kategori</p>
                    </div>
                    <?php $x = 0; ?>
                    @foreach ($category as $cat)
                        <!-- Start Single Product -->
                        <div class="single-product">
                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $x }}" aria-expanded="false"
                                            aria-controls="flush-collapse{{ $x }}">
                                            <span class="fw-bold fs-5">Kategory - {{ $cat->nama }}</span>
                                        </button>
                                    </h2>
                                    @foreach ($pasar as $pas)
                                        <div id="flush-collapse{{ $x }}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                            <p>{{ $pas->nama }}</p>
                                            <div class="accordion-body">
                                                <div id="chart{{ $x . $cat->nama . $pas->id }}">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product -->
                        <?php $x++; ?>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End Trending Product Area -->
    @section('script')
        <!-- ========================= JS here ========================= -->
        <script src="{{ asset('') }}assets/js/bootstrap.min.js"></script>
        <script src="{{ asset('') }}assets/js/tiny-slider.js"></script>
        <script src="{{ asset('') }}assets/js/glightbox.min.js"></script>
        <script src="{{ asset('') }}assets/js/main.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="{{ asset('') }}assets/js/grafik.js"></script>
    @endsection
</x-guest-layout>
