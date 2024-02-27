<x-guest-layout>
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
                        <h2>Login Administrator</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <!-- Start Single Product -->
                    <div class="single-product p-4">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-2">
                                <label for="">Username / Email</label>
                                <input type="text" class="form-control" name="inputType" value="{{ old('inputType') }}" autofocus>
                                <x-alert-input :messages="$errors->get('email')" class="mt-2 bg-danger"></x-alert-input>
                                <x-alert-input :messages="$errors->get('username')" class="mt-2 bg-danger"></x-alert-input>
                            </div>
                            <div class="mb-2">
                                <label for="">Password</label>
                                <input type="password" class="form-control" name="password" autocomplete="current-password">
                                <x-alert-input :messages="$errors->get('password')" class="mt-2 bg-danger"></x-alert-input>
                            </div>
                            <div class="button align-center">
                                <button type="submit" class="btn">Login</button>
                            </div>
                        </form>
                    </div>
                    <!-- End Single Product -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Trending Product Area -->
</x-guest-layout>
