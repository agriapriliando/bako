<x-app-layout>
    <!-- Start Trending Product Area -->
    <section class="trending-product section pt-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <style>
                        .section-title h2 {
                            margin-bottom: 0px;
                        }
                    </style>
                    <div class="section-title p-0 m-0">
                        <h2>Register Pengguna Baru</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <!-- Start Single Product -->
                    <div class="single-product p-4">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="mb-2">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus autocomplete="name">
                                <x-alert-input :messages="$errors->get('name')" class="mt-2 bg-danger"></x-alert-input>
                            </div>
                            <div class="mb-2">
                                <label for="">Username</label>
                                <input type="text" class="form-control" name="username" value="{{ old('username') }}" autofocus autocomplete="username">
                                <small class="text-muted">Digunakan untuk Login</small>
                                <x-alert-input :messages="$errors->get('username')" class="mt-2 bg-danger"></x-alert-input>
                            </div>
                            <div class="mb-2">
                                <label for="">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" autofocus autocomplete="email">
                                <x-alert-input :messages="$errors->get('email')" class="mt-2 bg-danger"></x-alert-input>
                            </div>
                            <div class="mb-2">
                                <label for="">Password</label>
                                <input type="password" class="form-control" name="password" autocomplete="new-password">
                                <x-alert-input :messages="$errors->get('password')" class="mt-2 bg-danger"></x-alert-input>
                            </div>
                            <div class="mb-2">
                                <label for="">Konfirmasi Password</label>
                                <input type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                                <x-alert-input :messages="$errors->get('password_confirmation')" class="mt-2 bg-danger"></x-alert-input>
                            </div>
                            <div class="button align-center">
                                <button type="submit" class="btn">Simpan</button>
                            </div>
                        </form>
                    </div>
                    <!-- End Single Product -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Trending Product Area -->
</x-app-layout>
