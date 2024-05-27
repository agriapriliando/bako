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
                                    <h2>Tambah Akun</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <form method="POST" action="{{ url('users') }}" enctype="multipart/form-data">
                                    @method('POST')
                                    @csrf
                                    <div class="mb-2">
                                        <label>Nama Lengkap</label>
                                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus autocomplete="name">
                                        <x-alert-input :messages="$errors->get('name')" class="mt-2 bg-danger"></x-alert-input>
                                    </div>
                                    <div class="mb-2">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="username" value="{{ old('username') }}" autofocus autocomplete="username">
                                        <x-alert-input :messages="$errors->get('username')" class="mt-2 bg-danger"></x-alert-input>
                                    </div>
                                    <div class="mb-2">
                                        <label>Email</label>
                                        <input type="text" class="form-control" name="email" value="{{ old('email') }}" autofocus autocomplete="email">
                                        <x-alert-input :messages="$errors->get('email')" class="mt-2 bg-danger"></x-alert-input>
                                    </div>
                                    <div class="mb-2">
                                        <label>Password -</label>
                                        <small>Password Default memakai username, silahkan login untuk mengganti password</small>
                                    </div>
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary mb-2">Simpan Akun</button>
                                        <a href="{{ url('users') }}" class="btn btn-warning">Kembali</a>
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
