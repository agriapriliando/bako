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
                                    <h3>{{ $pasar->nama }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <form method="POST" action="{{ url('prices') }}">
                                    @csrf
                                    @method('POST')
                                    <div class="mb-2">
                                        <label>Pilih Tanggal</label>
                                        <input data-url="{{ url('listitem') }}" name="tglprice" id="opt_items" type="date" class="form-control" value="{{ date('Y-m-d') }}" required>
                                        <small>Hari Ini Tanggal {{ date('j F Y') }}</small>
                                    </div>
                                    <div class="mb-2">
                                        <label>Pilih Barang</label>
                                        <div id="state">
                                        </div>
                                        <x-alert-input :messages="$errors->get('item_id')" class="bg-danger"></x-alert-input>
                                    </div>
                                    <div class="mb-3">
                                        <label>Harga Barang</label>
                                        <div class="input-group mb-1">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                            <input type="number" class="form-control" name="hargahariini" value="{{ old('hargahariini') }}">
                                        </div>
                                        <x-alert-input :messages="$errors->get('hargahariini')" class="bg-danger"></x-alert-input>
                                    </div>
                                    <div class="mb-2">
                                        <label>Harga Eceran Tertinggi (HET)</label>
                                        <div class="input-group mb-1">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                            <input type="number" class="form-control" name="het" value="{{ old('het') }}">
                                        </div>
                                        <x-alert-input :messages="$errors->get('het')" class="bg-danger"></x-alert-input>
                                    </div>
                                    <input class="d-none" id="pasar_id" type="text" name="pasar_id" value="{{ $pasar->id }}">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary mb-2">Simpan Data Harga</button>
                                        <a href="{{ url('hargapasar/' . $pasar->slugpasar) }}" class="btn btn-warning">Kembali</a>
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
        <script src="{{ asset('assets/js/select2/select2.min.js') }}"></script>
        <script>
            $(document).ready(function() {
                $('#basic-usage').select2({
                    theme: "bootstrap-5",
                });
                var url = document.getElementById("opt_items");
                url = url.getAttribute("data-url") + '/';
                var pasar_id = $("#pasar_id").val();
                var tgl = $('#opt_items').val();

                $.ajax({
                    type: 'GET',
                    url: url + tgl + '/' + pasar_id,
                    success: function(data) {
                        var html = '<select name="item_id" class="form-select" id="basic-usage" data-placeholder="Choose one thing">';
                        for (var count = 0; count < data.length; count++) {
                            html += '<option value="' + data[count].id + '">' + data[count].nama + '</option>';
                        }
                        html += '</select>';
                        console.log(html);
                        $('#state').html(html);
                        $('#basic-usage').select2({
                            theme: "bootstrap-5",
                        });
                    }
                });
                $(document).on('change', '#opt_items', function() {
                    var tgl = $(this).val();
                    $.ajax({
                        type: 'GET',
                        url: url + tgl + '/' + pasar_id,
                        success: function(data) {
                            var html = '<select name="item_id" class="form-select" id="basic-usage" data-placeholder="Choose one thing">';
                            for (var count = 0; count < data.length; count++) {
                                html += '<option value="' + data[count].id + '">' + data[count].nama + '</option>';
                            }
                            html += '</select>';
                            console.log(html);
                            $('#state').html(html);
                            $('#basic-usage').select2({
                                theme: "bootstrap-5",
                            });
                        }
                    });
                });
            });
        </script>
    @endpush
    </x-app-layouts>
