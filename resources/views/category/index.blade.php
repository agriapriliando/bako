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
                                    <h2>Kelola Kategori</h2>
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
                            <div class="col">
                                <a href="{{ url('categories/create') }}" class="btn btn-sm btn-success"><i class="lni lni-plus"></i> Tambah Kategori</a>
                            </div>
                        </div>
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Kelola</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="data{{ $item->id }}">{{ $item->nama }} <br><small class="text-muted">{{ $item->deskripsi }}</small></td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <a href="{{ url('categories/' . $item->id . '/edit') }}" class="btn btn-sm btn-warning"><i class="lni lni-pencil"></i></a>
                                                <a data-id="{{ $item->id }}" data-name="{{ $item->nama }}" href="#" class="btn btn-sm btn-danger btn-delete">
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
                                    <th>Nama</th>
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
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

        <script>
            new DataTable('#example', {
                scrollX: true
            });
            $(function() {
                $('#datepicker').daterangepicker({
                    singleDatePicker: true,
                    showDropdowns: true,
                    minYear: 2024,
                    maxYear: parseInt(moment().format('YYYY'), 10),
                    maxDate: moment()
                });
            });
        </script>
        <script src="{{ asset('') }}assets/js/sweetalert/sweetalert.min.js"></script>
        <script>
            $(document).ready(function() {
                $('body').on('click', '.btn-delete', function(e) {
                    e.preventDefault();
                    var id = $(this).data('id');
                    var nama = $(this).data('name');
                    var at = $(this).attr('data-id');
                    console.log(at);
                    swal({
                        title: 'Yakin menghapus Kategori : ' + nama,
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
                                url: "{{ url('categories') }}/" + id,
                                type: 'DELETE',
                                data: {
                                    "id": id,
                                    "_token": $("meta[name='csrf-token']").attr("content"),
                                },
                                success: function(data) {
                                    swal({
                                        title: 'Kategori Berhasil Dihapus',
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
