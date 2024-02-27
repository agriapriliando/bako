<x-app-layout>
    <!-- Start Trending Product Area -->
    <section class="trending-product section" style="padding-top: 24px;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <style>
                        .section-title h2 {
                            margin-bottom: 0px;
                        }
                    </style>
                    <div class="section-title p-0 m-0">
                        <h2>Daftar Bahan Pokok</h2>
                        <p>Tanggal : 17 Februari 2024</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <!-- Start Single Product -->
                    <div class="single-product p-4">
                        <div class="row mb-2">
                            <div class="col-lg-2 col-md-6 col-12 align-center mb-2">
                                <input type="text" class="form-control mb-2" id="datepicker" />
                                <div class="d-grid">
                                    <button class="btn btn-sm btn-primary"> Pilih Tanggal</button>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6 col-12 align-center mb-2">
                                <div class="d-grid mb-2">
                                    <a href="/barang-tambah.html" class="btn btn-sm btn-primary"> Tambah Bahan Pokok</a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6 col-12 align-center">
                                <div class="d-grid">
                                    <button class="btn btn-sm btn-primary"> Salin Data Hari Kemarin</button>
                                </div>
                            </div>
                        </div>
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Barang</th>
                                    <th>Harga Hari Ini</th>
                                    <th>Harga Sebelumnya</th>
                                    <th>Nama Pasar</th>
                                    <th>Kelola</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Beras Mangkok <span class="badge bg-warning text-black">Beras</span></td>
                                    <td id="dataharga">16000 <a href="#"><i class="lni lni-pencil text-warning"></i></a>
                                    </td>
                                    <td>15800</td>
                                    <td>Kahayan</td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <a href="#" class="btn btn-sm btn-warning"><i class="lni lni-pencil"></i></a>
                                            <a href="#" class="btn btn-sm btn-danger"><i class="lni lni-eraser"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Barang</th>
                                    <th>Harga Hari Ini</th>
                                    <th>Harga Sebelumnya</th>
                                    <th>Nama Pasar</th>
                                    <th>Kelola</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- End Single Product -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Trending Product Area -->
    </x-app-layouts>
