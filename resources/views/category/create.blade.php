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
                                    <h2>Tambah Kategori</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="mb-2">
                                        <label>Nama Kategori</label>
                                        <input type="text" class="form-control" name="nama" value="{{ old('nama') }}" autofocus autocomplete="nama">
                                        <x-alert-input :messages="$errors->get('nama')" class="mt-2 bg-danger"></x-alert-input>
                                    </div>
                                    <div class="mb-2">
                                        <label>Deskripsi Kategori</label>
                                        <textarea name="deskripsi" class="form-control" rows="2">{{ old('deskripsi') }}</textarea>
                                        <x-alert-input :messages="$errors->get('deskripsi')" class="mt-2 bg-danger"></x-alert-input>
                                    </div>
                                    <div class="mb-2">
                                        <label>Pilih Gambar Sampul</label>
                                        <input id="img-upload" onchange="readURL(this);" type="file" name="image" class="d-none">
                                        <div>
                                            <img id="img-preview" style="max-width: 200px" id="blah" src="https://placehold.co/600x600" alt="your image" />
                                        </div>
                                        <x-alert-input :messages="$errors->get('image')" class="mt-2 bg-danger"></x-alert-input>
                                    </div>
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary mb-2">Simpan Kategori</button>
                                        <a href="{{ url('categories') }}" class="btn btn-warning">Kembali</a>
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
                $('#img-preview').on('click', function() {
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
