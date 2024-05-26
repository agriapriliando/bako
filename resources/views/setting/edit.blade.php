<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.48.4/codemirror.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.48.4/theme/base16-dark.css">
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
                                    <h2>Setting {{ $setting->judul }}</h2>
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
                                <form method="POST" action="{{ url('setting/' . $setting->id . '/update') }}" enctype="multipart/form-data">
                                    @method('PATCH')
                                    @csrf
                                    @switch($setting->id)
                                        @case(1)
                                            <div class="mb-2">
                                                <label>Pilih Gambar Banner - </label>
                                                <small>{{ $setting->deskripsi }}</small>
                                                <input id="img-upload" onchange="readURL(this);" type="file" name="isi" class="d-none">
                                                <div class="row justify-content-center position-relative">
                                                    <div class="col-md-4 col-12">
                                                        <img id="img-preview" class="img-preview" src="{{ asset('storage/images/setting/' . $setting->isi) }}" alt="your image" />
                                                        <div class="position-absolute top-50 start-50 translate-middle img-preview p-2 m-3" style="background-color: #ffffffce">
                                                            <p class="fs-3">Pilih untuk mengganti gambar</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <x-alert-input :messages="$errors->get('isi')" class="mt-2 bg-danger"></x-alert-input>
                                            </div>
                                        @break

                                        @case(2)
                                            <div class="mb-2">
                                                <label>{{ $setting->deskripsi }}</label>
                                                <input type="text" name="isi" class="form-control" value="{{ old('isi', $setting->isi) }}">
                                                <x-alert-input :messages="$errors->get('isi')" class="mt-2 bg-danger"></x-alert-input>
                                            </div>
                                        @break

                                        @case(3)
                                            <div class="mb-2">
                                                <label>{{ $setting->deskripsi }}</label>
                                                <textarea id="codearea" class="form-control" name="isi" cols="30" rows="10">{{ old('isi', $setting->isi) }}</textarea>
                                                {{-- <input type="text" name="isi" class="form-control" value="{{ old('isi', $setting->isi) }}"> --}}
                                                <x-alert-input :messages="$errors->get('isi')" class="mt-2 bg-danger"></x-alert-input>
                                            </div>
                                            <div class="mb-2 align-right">
                                                <a onclick="return confirm('Yakin ingin reset?')" href="{{ url('setting/' . $setting->id . '/reset') }}" class="btn btn-sm btn-warning"><i
                                                        class="lni lni-spinner-arrow"></i> Atur Ulang</a>
                                            </div>
                                        @break

                                        @case(4)
                                            <div class="mb-2">
                                                <label>{{ $setting->deskripsi }}</label>
                                                <textarea id="codearea" class="form-control" name="isi" cols="30" rows="10">{{ old('isi', $setting->isi) }}</textarea>
                                                <x-alert-input :messages="$errors->get('isi')" class="mt-2 bg-danger"></x-alert-input>
                                            </div>
                                            <div class="mb-2 align-right">
                                                <a onclick="return confirm('Yakin ingin reset?')" href="{{ url('setting/' . $setting->id . '/reset') }}" class="btn btn-sm btn-warning"><i
                                                        class="lni lni-spinner-arrow"></i> Atur Ulang</a>
                                            </div>
                                        @break

                                        @case(5)
                                            <div class="mb-2">
                                                <label>{{ $setting->deskripsi }}</label>
                                                <textarea id="codearea" class="form-control" name="isi" cols="30" rows="10">{{ old('isi', $setting->isi) }}</textarea>
                                                <x-alert-input :messages="$errors->get('isi')" class="mt-2 bg-danger"></x-alert-input>
                                            </div>
                                            <div class="mb-2 align-right">
                                                <a onclick="return confirm('Yakin ingin reset?')" href="{{ url('setting/' . $setting->id . '/reset') }}" class="btn btn-sm btn-warning"><i
                                                        class="lni lni-spinner-arrow"></i> Atur Ulang</a>
                                            </div>
                                        @break

                                        @case(6)
                                            <div class="mb-2">
                                                <label>{{ $setting->deskripsi }}</label>
                                                <input type="text" name="isi" class="form-control" value="{{ old('isi', $setting->isi) }}">
                                                <x-alert-input :messages="$errors->get('isi')" class="mt-2 bg-danger"></x-alert-input>
                                            </div>
                                        @break

                                        @case(7)
                                            <div class="mb-2">
                                                <label>{{ $setting->deskripsi }}</label>
                                                <input type="text" name="isi" class="form-control" value="{{ old('isi', $setting->isi) }}">
                                                <x-alert-input :messages="$errors->get('isi')" class="mt-2 bg-danger"></x-alert-input>
                                            </div>
                                        @break

                                        @case(8)
                                            <div class="mb-2">
                                                <label>{{ $setting->deskripsi }}</label>
                                                <input type="text" name="isi" class="form-control" value="{{ old('isi', $setting->isi) }}">
                                                <x-alert-input :messages="$errors->get('isi')" class="mt-2 bg-danger"></x-alert-input>
                                            </div>
                                        @break

                                        @case(9)
                                            <div class="mb-2">
                                                <label>{{ $setting->deskripsi }}</label>
                                                <input type="text" name="isi" class="form-control" value="{{ old('isi', $setting->isi) }}">
                                                <x-alert-input :messages="$errors->get('isi')" class="mt-2 bg-danger"></x-alert-input>
                                            </div>
                                        @break

                                        @case(10)
                                            <div class="mb-2">
                                                <label>Pilih Gambar Banner - </label>
                                                <small>{{ $setting->deskripsi }}</small>
                                                <input id="img-upload" onchange="readURL(this);" type="file" name="isi" class="d-none">
                                                <div class="row justify-content-center position-relative">
                                                    <div class="col-md-4 col-12">
                                                        <img id="img-preview" class="img-preview mb-5 mt-2" src="{{ asset('storage/images/setting/' . $setting->isi) }}" alt="your image" />
                                                        <div class="position-absolute top-50 start-50 translate-middle img-preview p-2 m-3" style="background-color: #ffffffce">
                                                            <p class="fs-5">Pilih untuk mengganti gambar</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <x-alert-input :messages="$errors->get('isi')" class="mt-2 bg-danger"></x-alert-input>
                                            </div>
                                        @break

                                        @case(11)
                                            <div class="mb-2">
                                                <label>{{ $setting->deskripsi }}</label>
                                                <textarea id="codearea" class="form-control" name="isi" cols="30" rows="10">{{ old('isi', $setting->isi) }}</textarea>
                                                {{-- <input type="text" name="isi" class="form-control" value="{{ old('isi', $setting->isi) }}"> --}}
                                                <x-alert-input :messages="$errors->get('isi')" class="mt-2 bg-danger"></x-alert-input>
                                            </div>
                                            <div class="mb-2 align-right">
                                                <a onclick="return confirm('Yakin ingin reset?')" href="{{ url('setting/' . $setting->id . '/reset') }}" class="btn btn-sm btn-warning"><i
                                                        class="lni lni-spinner-arrow"></i> Atur Ulang</a>
                                            </div>
                                        @break

                                        @case(12)
                                            <div class="mb-2">
                                                <label>{{ $setting->deskripsi }}</label>
                                                <input type="text" name="isi" class="form-control" value="{{ old('isi', $setting->isi) }}">
                                                <x-alert-input :messages="$errors->get('isi')" class="mt-2 bg-danger"></x-alert-input>
                                            </div>
                                        @break

                                        @case(13)
                                            <div class="mb-2">
                                                <label>{{ $setting->deskripsi }}</label>
                                                <input type="text" name="isi" class="form-control" value="{{ old('isi', $setting->isi) }}">
                                                <x-alert-input :messages="$errors->get('isi')" class="mt-2 bg-danger"></x-alert-input>
                                            </div>
                                        @break

                                        @case(14)
                                            <div class="mb-2">
                                                <label>Pilih Gambar SEO - </label>
                                                <small>{{ $setting->deskripsi }}</small>
                                                <input id="img-upload" onchange="readURL(this);" type="file" name="isi" class="d-none">
                                                <div class="row justify-content-center position-relative">
                                                    <div class="col-md-4 col-12">
                                                        <img id="img-preview" class="img-preview" src="{{ asset('storage/images/setting/' . $setting->isi) }}" alt="your image" />
                                                        <div class="position-absolute top-50 start-50 translate-middle img-preview p-2 m-3" style="background-color: #ffffffce">
                                                            <p class="fs-3">Pilih untuk mengganti gambar</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <x-alert-input :messages="$errors->get('isi')" class="mt-2 bg-danger"></x-alert-input>
                                            </div>
                                        @break

                                        @default
                                    @endswitch
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary mb-2">Simpan Setting</button>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
        <!-- ========================= JS here ========================= -->
        <script src="{{ asset('') }}assets/js/bootstrap.min.js"></script>
        <script src="{{ asset('') }}assets/js/tiny-slider.js"></script>
        <script src="{{ asset('') }}assets/js/glightbox.min.js"></script>
        <script src="{{ asset('') }}assets/js/main.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.48.4/codemirror.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.48.4/mode/javascript/javascript.js"></script>
        <script>
            const codemirrorEditor = CodeMirror.fromTextArea(document.getElementById('codearea'), {
                lineNumbers: true,
                mode: "javascript",
                theme: "base16-dark"
            });
        </script>
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
