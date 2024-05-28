<x-guest-layout>
    <!-- Start Trending Product Area -->
    <section class="trending-product section" style="padding-top: 10px;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="align-center my-2">
                        <h3>Grafik Harga {{ $item->nama }} (7 Hari Terakhir)</h3>
                        <p class="text-muted">Grafik Mingguan, Bulanan, dan Tahunan</p>
                    </div>
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                        aria-controls="flush-collapseTwo">
                                        <span class="fw-bold fs-5">Harga {{ $item->nama }} Selama Seminggu Terakhir</span>
                                    </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <div id="chartseminggu" data-url="{{ url('grafikbarang/datamingguan/' . $item->id) }}" data-id="{{ $item->id }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSebulan" aria-expanded="false"
                                        aria-controls="flush-collapseSebulan">
                                        <span class="fw-bold fs-5">Harga {{ $item->nama }} Selama Sebulan Terakhir</span>
                                    </button>
                                </h2>
                                <div id="flush-collapseSebulan" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <div id="chartsebulan" data-url="{{ url('grafikbarang/databulanan/' . $item->id) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTahun" aria-expanded="false"
                                        aria-controls="flush-collapseTahun">
                                        <span class="fw-bold fs-5">Harga {{ $item->nama }} Rerata Bulanan</span>
                                    </button>
                                </h2>
                                <div id="flush-collapseTahun" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <div id="chartsetahun" data-url="{{ url('grafikbarang/' . $item->id . '/' . Carbon\Carbon::now()->year) }}" data-tahun="{{ Carbon\Carbon::now()->year }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                </div>
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
        <script src="{{ asset('') }}assets/js/grafikbyid.js"></script>
    @endsection
</x-guest-layout>
