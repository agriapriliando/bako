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
        {{-- <script src="{{ asset('') }}assets/js/grafikbyid.js"></script> --}}
        <script>
            $(function() {
                var ids = document.getElementById("chartseminggu");
                id = ids.getAttribute("data-id");
                urlmingguan = ids.getAttribute("data-url");
                $.ajax({
                    type: 'GET',
                    url: urlmingguan,
                    dataType: 'json',
                    success: function(data) {
                        // var parsed_response = jQuery.parseJSON(data[0]['datapasar'][0]['dataharga'][0]);
                        // console.log(data[0]['datapasar'][0]['dataharga']);
                        chartSeminggu(data);
                        console.log("berhasil");
                    },
                    error: function() {
                        console.log(data);
                        console.log("gagal");
                    }
                });

                var idb = document.getElementById("chartsebulan");
                urlbulanan = idb.getAttribute("data-url");
                $.ajax({
                    type: 'GET',
                    url: urlbulanan,
                    dataType: 'json',
                    success: function(data) {
                        // var parsed_response = jQuery.parseJSON(data[0]['datapasar'][0]['dataharga'][0]);
                        // console.log(data[0]['datapasar'][0]['dataharga']);
                        chartBulanan(data);
                        console.log("berhasil");
                    },
                    error: function() {
                        console.log(data);
                        console.log("gagal");

                    }
                });
                var idt = document.getElementById("chartsetahun");
                tahun = idt.getAttribute("data-tahun");
                urltahun = idt.getAttribute("data-url");
                $.ajax({
                    type: 'GET',
                    url: urltahun,
                    dataType: 'json',
                    success: function(data) {
                        // var parsed_response = jQuery.parseJSON(data[0]['datapasar'][0]['dataharga'][0]);
                        // console.log(data[0]['datapasar'][0]['dataharga']);
                        chartTahunan(data);
                        console.log("berhasil");
                    },
                    error: function() {
                        console.log(data);
                        console.log("gagal");

                    }
                });
            });

            function chartSeminggu(dataseminggu) {
                var d = new Date();
                d.setDate(d.getDate() - 6);
                const chart = Highcharts.chart('chartseminggu', {
                    title: {
                        text: 'Harga Seminggu Terakhir',
                        align: 'left'
                    },
                    subtitle: {
                        text: 'Harga ' + dataseminggu.nama,
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
                            pointStart: Date.UTC(d.getUTCFullYear(), d.getUTCMonth(), d.getUTCDate()),
                            // pointInterval: 24 * 3600 * 1000 // one day
                            pointIntervalUnit: 'day' // one day
                        }
                    },

                    series: dataseminggu.data,
                    // series: [{
                    //     name: 'Lokasi Pasar Kahayan',
                    //     data: [14100, 15200, 14900, 15300, 14200, 15600, 15500]
                    // }, {
                    //     name: 'Lokasi Pasar Besar',
                    //     data: [14000, 15300, 14200, 15600, 15500, 14200, 15600]
                    // }],

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
            }

            function chartBulanan(datasebulan) {
                var d = new Date();
                // console.log(d);
                d.setDate(d.getDate() - 29);
                const chart = Highcharts.chart('chartsebulan', {
                    title: {
                        text: 'Harga 30 Hari Terakhir',
                        align: 'left'
                    },
                    subtitle: {
                        text: 'Harga ' + datasebulan.nama,
                        align: 'left'
                    },

                    yAxis: {
                        title: {
                            text: 'Harga'
                        }
                    },

                    xAxis: {
                        accessibility: {
                            rangeDescription: 'Range: 2024 to 2024'
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
                            pointStart: Date.UTC(d.getUTCFullYear(), d.getUTCMonth(), d.getUTCDate()),
                            // pointInterval: 24 * 3600 * 1000 // one day
                            pointIntervalUnit: 'day' // one day
                        }
                    },

                    series: datasebulan.data,

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
            }

            function chartTahunan(datasetahun) {
                var d = new Date();
                // console.log(d);
                // d.setDate(d.getDate() - 29);
                const chart = Highcharts.chart('chartsetahun', {
                    title: {
                        text: 'Harga Rerata Bulanan Tahun ' + d.getFullYear(),
                        align: 'left'
                    },
                    subtitle: {
                        text: 'Harga ' + datasetahun.nama,
                        align: 'left'
                    },

                    yAxis: {
                        title: {
                            text: 'Harga'
                        }
                    },

                    xAxis: {
                        accessibility: {
                            rangeDescription: 'Range: 2010 to 2024'
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
                            pointStart: Date.UTC(d.getUTCFullYear(), 0, 1),
                            // pointInterval: 24 * 3600 * 1000 // one day
                            pointIntervalUnit: 'month' // one day
                        }
                    },

                    series: datasetahun.data,

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
            }
        </script>
    @endsection
</x-guest-layout>
