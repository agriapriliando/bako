<x-app-layout>
    @push('css')
        <!-- Styles -->
        {{-- <link rel="stylesheet" href="{{ asset('assets/js/select2/bootstrap.min.css') }}"> --}}
        <link rel="stylesheet" href="{{ asset('assets/js/select2/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/js/select2/select2-bootstrap-5-theme.min.css') }}">
    @endpush
    <!-- Start Trending Product Area -->
    <section class="trending-product section pt-0">
        <div class="container">
            <div class="row justify-content-center pt-0">
                <div class="col-lg-8 pt-0">
                    <!-- Start Single Product -->
                    <div class="single-product p-4 mt-1">
                        <div class="row">
                            <div class="col-12 mt-0 pt-0">
                                <div class="section-title p-0 m-0">
                                    <h2>Tambah Harga Barang</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <form method="POST" action="{{ url('prices') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-2">
                                        <label>Pilih Nama Barang</label>
                                        <select name="item_id" class="form-select" id="basic-usage" data-placeholder="Choose one thing">
                                            <option></option>
                                            @foreach ($items as $c)
                                                <option value="{{ $c->id }}">{{ $c->nama }}</option>
                                            @endforeach
                                        </select>
                                        <x-alert-input :messages="$errors->get('deskripsi')" class="mt-2 bg-danger"></x-alert-input>
                                    </div>
                                    <div class="mb-2">
                                        <label>Harga Barang</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                            <input type="number" class="form-control" name="hargahariini" value="{{ old('hargahariini') }}">
                                        </div>
                                        <x-alert-input :messages="$errors->get('hargahariini')" class="mt-2 bg-danger"></x-alert-input>
                                    </div>
                                    <div class="mb-2">
                                        <label>Tanggal Hari Ini</label>
                                        <input id="hariini" type="datetime" class="form-control" disabled value=" {{ date('d M Y') }}">
                                    </div>
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary mb-2">Simpan Data Harga</button>
                                        <a href="{{ url('prices') }}" class="btn btn-warning">Kembali</a>
                                    </div>
                                </form>
                            </div>
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
        <!-- Scripts -->
        {{-- <script src="{{ asset('assets/js/select2/jquery3_5_0.slim.min.js') }}"></script> --}}
        {{-- <script src="{{ asset('assets/js/select2/bootstrap.bundle.min.js') }}"></script> --}}
        <script src="{{ asset('assets/js/select2/select2.min.js') }}"></script>
        <script>
            $(document).ready(function() {
                $('#basic-usage').select2({
                    theme: "bootstrap-5",
                    // width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                    // placeholder: $(this).data('placeholder'),
                });
            });
        </script>
    @endpush
    </x-app-layouts>
