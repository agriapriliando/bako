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
                                    <h2>Ubah Akun {{ $user->name }}</h2>
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
                                <form method="POST" action="{{ url('users/' . $user->id) }}" enctype="multipart/form-data">
                                    @method('PATCH')
                                    @csrf
                                    <div class="mb-2">
                                        <label>Nama Lengkap</label>
                                        <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" autofocus autocomplete="name">
                                        <x-alert-input :messages="$errors->get('name')" class="mt-2 bg-danger"></x-alert-input>
                                    </div>
                                    <div class="mb-2">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="username" value="{{ old('username', $user->username) }}" autofocus autocomplete="username">
                                        <x-alert-input :messages="$errors->get('username')" class="mt-2 bg-danger"></x-alert-input>
                                    </div>
                                    <div class="mb-2">
                                        <label>Email</label>
                                        <input type="text" class="form-control" name="email" value="{{ old('email', $user->email) }}" autofocus autocomplete="email">
                                        <x-alert-input :messages="$errors->get('email')" class="mt-2 bg-danger"></x-alert-input>
                                    </div>
                                    <div class="mb-2">
                                        <label>Status</label>
                                        <select class="form-select" name="status">
                                            <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Admin Utama</option>
                                            <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>Admin Pelaksana</option>
                                        </select>
                                        <x-alert-input :messages="$errors->get('status')" class="mt-2 bg-danger"></x-alert-input>
                                    </div>
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
    @endpush
    </x-app-layouts>
