<x-app-layout>
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
                                    <h2>Ubah Data Pasar</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <form method="POST" action="{{ url('pasars/' . $pasar->id) }}" enctype="multipart/form-data">
                                    @method('PATCH')
                                    @csrf
                                    <div class="mb-2">
                                        <label>Nama Pasar</label>
                                        <input type="text" class="form-control" name="nama" value="{{ old('nama', $pasar->nama) }}" autofocus autocomplete="nama">
                                        <x-alert-input :messages="$errors->get('nama')" class="mt-2 bg-danger"></x-alert-input>
                                    </div>
                                    <div class="mb-2">
                                        <label>Deskripsi Pasar</label>
                                        <textarea name="deskripsi" class="form-control" rows="2">{{ old('deskripsi', $pasar->deskripsi) }}</textarea>
                                        <x-alert-input :messages="$errors->get('deskripsi')" class="mt-2 bg-danger"></x-alert-input>
                                    </div>
                                    <div class="mb-2">
                                        <label>Lokasi Google Maps Pasar</label>
                                        <textarea name="lokasi_gmap" class="form-control" rows="3">{{ old('lokasi_gmap', $pasar->lokasi_gmap) }}</textarea>
                                        <small><a class="badge bg-warning" target="_blank" href="#">Click untuk Panduan</a></small>
                                        <x-alert-input :messages="$errors->get('lokasi_gmap')" class="mt-2 bg-danger"></x-alert-input>
                                    </div>
                                    <div class="mb-2">
                                        <label>Pilih Gambar Sampul</label>
                                        <input id="img-upload" onchange="readURL(this);" type="file" name="gambar" class="d-none">
                                        <div class="row justify-content-center position-relative">
                                            <div class="col-md-4 col-12">
                                                <img id="img-preview" class="img-preview" src="{{ asset('storage/images/pasar/' . $pasar->gambar) }}" alt="your image" />
                                                <div class="position-absolute top-50 start-50 translate-middle img-preview p-2 m-3" style="background-color: #ffffffce">
                                                    <p class="fs-3">Pilih untuk mengganti gambar</p>
                                                </div>
                                            </div>
                                        </div>
                                        <x-alert-input :messages="$errors->get('image')" class="mt-2 bg-danger"></x-alert-input>
                                    </div>
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary mb-2">Simpan Data Pasar</button>
                                        <a href="{{ url('pasars') }}" class="btn btn-warning">Kembali</a>
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
        <script>
            $(function() {
                $('.img-preview').on('click', function() {
                    $('#img-upload').trigger('click');
                });
            });
        </script>
        <script>
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#img-preview').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
    @endpush
    </x-app-layouts>
