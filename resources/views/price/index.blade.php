<x-app-layout>
    <style>
        .dt-button {
            color: #e6e6e6 !important;
            background-color: #2174b8 !important;
        }
    </style>
    <!-- Start Trending Product Area -->
    <section class="trending-product section pt-0">
        <div class="container">
            <div class="row justify-content-center pt-0">
                <div class="col-lg-12 pt-0">
                    <!-- Start Single Product -->
                    <div class="single-product p-4 mt-1">
                        <div class="row">
                            <div class="col-12 mt-0 pt-0">
                                <div class="section-title p-0 m-0">
                                    <h2>Kelola Seluruh Data Harga Barang</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            @if (session('status'))
                                <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                                    <strong>{{ session('status') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                        </div>
                        <div class="row mb-2 d-none">
                            <div class="col-12 col-lg-4">
                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false"
                                                aria-controls="flush-collapseOne">
                                                <span class="fw-bold fs-5">Lihat by Tanggal</span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                            <form action="{{ url('priceby') }}" method="POST">
                                                @csrf
                                                @method('POST')
                                                <div class="accordion-body">
                                                    <div class="mb-2">
                                                        <label>Dari Tanggal</label>
                                                        <input name="tglrange" type="text" class="form-control mb-2" id="datepicker" />
                                                    </div>
                                                    {{-- <div class="mb-2">
                                                        <label>Sampai Tanggal</label>
                                                        <input name="tglend" type="text" class="form-control mb-2" id="datepicker2" />
                                                    </div> --}}
                                                    <div class="mt-lg-3 mb-2">
                                                        <div class="d-grid" style="">
                                                            <button type="submit" class="btn btn-sm btn-success"> Pilih Tanggal</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            {{-- <div class="col-lg-5 col-md-6 col-12 align-center">
                                <div class="d-grid">
                                    <button class="btn btn-sm btn-success"> Salin Data Hari Kemarin</button>
                                </div>
                            </div> --}}
                        </div>
                        <div>
                            <table id="example" class="table table-striped data-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Barang</th>
                                        <th>Harga</th>
                                        <th>Timestamp</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                                <tfoot>
                                    <tr>
                                        <th>Barang</th>
                                        <th>Harga</th>
                                        <th>Timestamp</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- End Single Product -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Trending Product Area -->
    @push('scripts')
        <!-- ========================= JS here ========================= -->
        <script src="{{ asset('') }}assets/js/bootstrap.min.js"></script>
        <script src="{{ asset('') }}assets/js/tiny-slider.js"></script>
        <script src="{{ asset('') }}assets/js/glightbox.min.js"></script>
        <script src="{{ asset('') }}assets/js/main.js"></script>

        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <script>
            $(function() {
                $('#datepicker').daterangepicker({
                    // singleDatePicker: true,
                    locale: {
                        format: 'DD/MM/YYYY'
                    },
                    showDropdowns: true,
                    minYear: 2024,
                    maxYear: parseInt(moment().format('YYYY'), 10),
                    maxDate: moment()
                });
            });
        </script>
        <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
        {{-- <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script> --}}
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
        <script type="text/javascript">
            $(function() {
                var table = $('.data-table').DataTable({
                    processing: true,
                    serverSide: true,
                    scrollX: true,
                    search: {
                        return: true
                    },
                    // stateSave: true,
                    pagingType: 'numbers',
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print', 'pageLength'
                    ],
                    lengthMenu: [
                        [10, 50, 200, -1],
                        [10, 50, 200, 'All']
                    ],
                    createdRow: function(row, data, dataIndex) {
                        $(row).attr('id', 'data' + data['id']);
                    },
                    initComplete: function() {
                        var api = this.api();
                        // Setup - add a text input to each header cell
                        $('.filterhead', api.table().header()).each(function() {
                            var title = $(this).text();
                            $(this).html('<input type="text" placeholder="Search ' + title + '" class="column_search" />');
                        });
                        this.api()
                            .columns()
                            .every(function() {
                                let column = this;
                                let title = column.footer().textContent;

                                // Create input element
                                let input = document.createElement('input');
                                input.placeholder = title;
                                column.footer().replaceChildren(input);

                                // Event listener for user input
                                input.addEventListener('keyup', () => {
                                    if (column.search() !== this.value) {
                                        column.search(input.value).draw();
                                    }
                                });
                            });
                    },
                    // order: [
                    //     [2, 'desc']
                    // ],
                    ajax: "{{ url('prices') }}",
                    columns: [{
                            data: 'item.nama',
                            name: 'item.nama'
                        },
                        {
                            data: 'hargahariini',
                            name: 'hargahariini'
                        },
                        {
                            data: 'created_at',
                            name: 'created_at'
                        },

                    ]
                });

            });
            // Apply the search
            $('table thead').on('keyup', ".column_search", function() {
                table.column($(this).parent().index())
                    .search(this.value)
                    .draw();
            });
        </script>
        <script src="{{ asset('') }}assets/js/sweetalert/sweetalert.min.js"></script>
        <script>
            $(document).ready(function() {
                $('body').on('click', '.btn-delete', function(e) {
                    e.preventDefault();
                    var id = $(this).data('id');
                    var nama = $(this).data('name');
                    var tgl = $(this).data('tgl');
                    var at = $(this).attr('data-id');
                    console.log(at);
                    swal({
                        title: 'Yakin menghapus Harga Barang : ' + nama + ", Tgl : " + tgl,
                        icon: 'warning',
                        buttons: {
                            confirm: {
                                text: 'Ya, Hapus',
                                className: 'btn btn-success'
                            },
                            cancel: {
                                visible: true,
                                className: 'btn btn-danger'
                            }
                        }
                    }).then((deleteAll) => {
                        if (deleteAll) {
                            $.ajax({
                                url: "{{ url('prices') }}/" + id,
                                type: 'DELETE',
                                data: {
                                    "id": id,
                                    "_token": $("meta[name='csrf-token']").attr("content"),
                                },
                                success: function(data) {
                                    swal({
                                        title: 'Data Harga Barang Berhasil Dihapus',
                                        text: data.message,
                                        type: 'success',
                                        buttons: {
                                            confirm: {
                                                className: 'btn btn-success'
                                            }
                                        }
                                    });
                                    if (data['message']) {
                                        $("#data" + id).each(function() {
                                            // $(this).parents("tr").remove();
                                            $(this).remove();
                                        });
                                    } else {
                                        alert('Error occured.');
                                    }
                                },
                                error: function(data) {
                                    alert(data.responseText);
                                }
                            });
                        } else {
                            swal.close();
                        }
                    });
                });
            });
        </script>
    @endpush
    </x-app-layouts>
