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
                                        <span class="fw-bold fs-5">Beras Selama Seminggu Terakhir</span>
                                    </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <div id="chartseminggu" data-id="{{ $item->id }}">
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
                                        <span class="fw-bold fs-5">Beras Selama Sebulan Terakhir</span>
                                    </button>
                                </h2>
                                <div id="flush-collapseSebulan" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <div id="chartsebulan">
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
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false"
                                        aria-controls="flush-collapseOne">
                                        <span class="fw-bold fs-5">Harga Beras A Tahunan</span>
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <div id="chartone">
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
        <script>
            var da = new Date();
            document.addEventListener('DOMContentLoaded', function() {
                const chart = Highcharts.chart('chartone', {
                    title: {
                        text: 'Harga Rata-Rata Beras A Setiap Bulan di Tahun 2024',
                        align: 'left'
                    },
                    // accessibility: enabled,

                    subtitle: {
                        text: 'Kategori Beras | Lokasi : Pasar Kahayan',
                        align: 'left'
                    },

                    yAxis: {
                        title: {
                            text: 'Harga'
                        }
                    },

                    xAxis: {
                        accessibility: {
                            rangeDescription: 'Range: 2010 to 2020'
                        },
                        title: {
                            text: 'Tanggal'
                        },
                        type: 'datetime'
                    },

                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'middle'
                    },

                    plotOptions: {
                        series: {
                            label: {
                                connectorAllowed: true
                            },
                            // pointStart: Date.UTC(d.getUTCFullYear(), d.getUTCMonth(), d.getUTCDate()),
                            pointStart: Date.UTC(da.getUTCFullYear(), 0, 1),
                            // pointInterval: 24 * 3600 * 1000 // one day
                            pointIntervalUnit: 'month' // one day
                        }
                    },

                    series: [{
                        name: 'Lokasi Pasar Kahayan',
                        data: [14100, 15200, 14900, 15300, 14200, 15600, 15500, 14300, 14200, 15600, 15500, 14300]
                    }, {
                        name: 'Lokasi Pasar Besar',
                        data: [14000, 15300, 14200, 15600, 15500, 14200, 15600, 15500, 14300, 14100, 15200, 15100]
                    }],

                    responsive: {
                        rules: [{
                            condition: {
                                maxWidth: 500
                            },
                            chartOptions: {
                                legend: {
                                    layout: 'horizontal',
                                    align: 'center',
                                    verticalAlign: 'bottom'
                                }
                            }
                        }]
                    }
                });
            });
        </script>
        <script>
            var t = new Date();
            console.log(t);
            // t.setDate(t.getDate() - 30);
            // console.log(d.getDate() - 6);
            // console.log(d.setDate(d.getDate() - 6));
            // console.log(d.getUTCFullYear());
            document.addEventListener('DOMContentLoaded', function() {
                const chart = Highcharts.chart('chartsebulan', {
                    title: {
                        text: 'Harga Sebulan Terakhir',
                        align: 'left'
                    },
                    // accessibility: enabled,

                    subtitle: {
                        text: 'Harga Beras AAA',
                        align: 'left'
                    },

                    yAxis: {
                        title: {
                            text: 'Harga'
                        }
                    },

                    xAxis: {
                        accessibility: {
                            rangeDescription: 'Range: 2010 to 2020'
                        },
                        title: {
                            text: 'Tanggal'
                        },
                        type: 'datetime'
                    },

                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'middle'
                    },

                    plotOptions: {
                        series: {
                            label: {
                                connectorAllowed: true
                            },
                            pointStart: Date.UTC(t.getUTCFullYear(), t.getUTCMonth(), t.getUTCDate()),
                            // pointInterval: 24 * 3600 * 1000 // one day
                            pointIntervalUnit: 'day' // one day
                        }
                    },

                    series: [{
                        name: 'Lokasi Pasar Kahayan',
                        data: [
                            14100, 15200, 14900, 15300, 14200, 15600, 15500, 15500, 14200, 15600,
                            15300, 14200, 15600, 15300, 14200, 15600, 15600, 15300, 15500, 14900,
                            15200, 14900, 15300, 14200, 15600, 15200, 14900, 14200, 15600, 14200
                        ]
                    }, {
                        name: 'Lokasi Pasar Besar',
                        data: [
                            13100, 14200, 15900, 14800, 14200, 15400, 15200, 15800, 15300, 15100,
                            15300, 14500, 15300, 16200, 15400, 15300, 15200, 14900, 14700, 14900,
                            15500, 15200, 15100, 14800, 14600, 14200, 14300, 15200, 14600, 15100
                        ]
                    }],

                    responsive: {
                        rules: [{
                            condition: {
                                maxWidth: 500
                            },
                            chartOptions: {
                                legend: {
                                    layout: 'horizontal',
                                    align: 'center',
                                    verticalAlign: 'bottom'
                                }
                            }
                        }]
                    }
                });
            });
        </script>
    @endsection
</x-guest-layout>
