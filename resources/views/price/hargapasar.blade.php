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
                                    <h2>Kelola Data Harga Barang <br>Lokasi : {{ $pasar->nama }}
                                        <br>Hari Ini Tanggal {{ date('j F Y') }}
                                    </h2>
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
                            <div class="align-right">
                                <a onclick="return confirm('Yakin ingin duplikat data kemarin?')" href="{{ url('prices/copy/' . \Carbon\Carbon::now()->format('Y-m-d')) . '/' . $pasar->id }}"
                                    class="btn btn-sm btn-warning"><i class="lni lni-clipboard"></i>
                                    Duplikat Nama Barang Kemarin</a>
                                <a onclick="return confirm('Yakin ingin hapus semua data harga hari ini?')"
                                    href="{{ url('prices/deletes/' . \Carbon\Carbon::now()->format('Y-m-d')) . '/' . $pasar->id }}" class="btn btn-sm btn-danger"><i class="lni lni-trash-can"></i>
                                    Hapus
                                    Seluruh
                                    Harga</a>
                            </div>
                            <div class="col">
                                <a href="{{ url('prices/create/' . $pasar->id) }}" class="btn btn-sm btn-success"><i class="lni lni-plus"></i> Tambah Data Harga</a>
                            </div>
                        </div>
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Harga Barang | HET</th>
                                    <th>Diperbaharui</th>
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
                                            </small> <br>
                                            <small><span class="badge text-bg-info">{{ $item->pasar->nama }}</span></small>
                                        </td>
                                        <td>
                                            <div>@currency($item->hargahariini) <br>
                                                @if ($item->het != '')
                                                    @currency($item->het)
                                                @endif
                                            </div>
                                        </td>
                                        <td>{{ $item->updated_at }} Wib <br>
                                            <span class="badge rounded-pill bg-warning text-dark">
                                                oleh : {{ $item->user->name }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <a href="{{ url('prices/' . $item->id . '/edit') }}" class="btn btn-sm btn-warning"><i class="lni lni-pencil"></i></a>
                                                {{-- <a data-tgl="{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('j F, Y H:i') }} Wib" data-id="{{ $item->id }}" --}}
                                                <a data-tgl="{{ $item->created_at }} Wib" data-id="{{ $item->id }}" data-name="{{ $item->item->nama }}" href="#"
                                                    class="btn btn-sm btn-danger btn-delete">
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
                                    <th>Harga Barang | HET</th>
                                    <th>Diperbaharui</th>
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
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
        <script>
            new DataTable('#example', {
                scrollX: true,
                search: {
                    return: true // click enter untuk mencari
                },
                pagingType: 'numbers',
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print', 'pageLength'
                ],
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
