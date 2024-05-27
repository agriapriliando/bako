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
                                    <h2>Ubah Password Akun {{ Auth::user()->name }}</h2>
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
                        <div class="row mb-3">
                            <div class="col">
                                <form method="POST" action="{{ url('gantipass/') }}" enctype="multipart/form-data">
                                    @method('PATCH')
                                    @csrf
                                    <div class="mb-2">
                                        <label>Password</label>
                                        <div class="input-group">
                                            <input id="openpass" type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukan Password">
                                            <button onclick="seePass()" class="btn btn-outline-secondary" type="button"><i class="lni lni-eye"></i></button>
                                        </div>
                                        <script>
                                            function seePass() {
                                                var x = document.getElementById("openpass");
                                                console.log(x.type);
                                                if (x.type === "password") {
                                                    x.type = "text";
                                                } else {
                                                    x.type = "password";
                                                }
                                            }
                                        </script>
                                        <x-alert-input :messages="$errors->get('email')" class="mt-2 bg-danger"></x-alert-input>
                                    </div>
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary mb-2">Ganti Password</button>
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
    @endpush
    </x-app-layouts>
