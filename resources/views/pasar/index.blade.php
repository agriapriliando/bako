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
                                    <h2>Kelola Data Pasar</h2>
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
                            {{-- <div class="col">
                                <a href="{{ url('pasars/create') }}" class="btn btn-sm btn-success"><i class="lni lni-plus"></i> Tambah Pasar</a>
                            </div> --}}
                        </div>
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pasar</th>
                                    <th>Kelola</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pasars as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="data{{ $item->id }}">{{ $item->nama }} <br><small class="text-muted">{{ $item->deskripsi }}</small>
                                            <div style="max-width: 100px;">{!! $item->lokasi_gmap !!}</div>
                                            <span class="badge rounded-pill bg-warning text-dark">
                                                updated : {{ \Carbon\Carbon::parse($item->updated_at)->translatedFormat('j F, Y H:i') }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <a href="{{ url('pasars/' . $item->id . '/edit') }}" class="btn btn-sm btn-warning"><i class="lni lni-pencil"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pasar</th>
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
        <script>
            new DataTable('#example', {
                scrollX: true
            });
        </script>
    @endpush
    </x-app-layouts>
