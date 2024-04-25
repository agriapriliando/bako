<x-app-layout>
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
                                    <h2>Kelola Data Harga Semua Pasar</h2>
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
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Harga </th>
                                    <th>Tanggal</th>
                                    <th>Pasar</th>
                                    <th>Kelola</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($prices as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="data{{ $item->id }}">{{ $item->item->nama }} <br><small class="text-muted">
                                                @foreach ($categories as $i)
                                                    @if ($i->id == $item->item->category_id)
                                                        <span class="badge bg-success">Kategori : {{ $i->nama }}</span>
                                                    @endif
                                                @endforeach
                                            </small></td>
                                        <td>
                                            <div>@currency($item->hargahariini)</div>

                                            <span class="badge rounded-pill bg-primary">
                                                Harga Kemarin :
                                                {{ $item->hargakemarin ? 'Rp ' . $item->hargakemarin : 'Tidak Ada' }}
                                            </span><br>
                                            <span class="badge rounded-pill bg-warning text-dark">
                                                updated : {{ \Carbon\Carbon::parse($item->updated_at)->translatedFormat('j F, Y H:i') }} Wib
                                            </span><br>
                                            <span class="badge rounded-pill bg-warning text-dark">
                                                oleh Petugas : {{ $item->user->name }}
                                            </span>
                                        </td>
                                        <td>{{ $item->created_at }} Wib</td>
                                        <td>{{ $item->pasar->nama }}</td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <a href="{{ url('prices/' . $item->id . '/edit') }}" class="btn btn-sm btn-warning"><i class="lni lni-pencil"></i></a>
                                                <a data-tgl="{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('j F, Y H:i') }} Wib" data-id="{{ $item->id }}"
                                                    data-name="{{ $item->item->nama }}" href="#" class="btn btn-sm btn-danger btn-delete">
                                                    <i class="lni lni-eraser"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Harga Hari Ini</th>
                                    <th>Harga Kemarin</th>
                                    <th>Kelola</th>
                                </tr>
                            </tfoot>
                        </table>
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

                console.log(startDate);
            });
        </script>
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
        <script>
            new DataTable('#example', {
                scrollX: true
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
                                        $(".data" + id).each(function() {
                                            $(this).parents("tr").remove();
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
