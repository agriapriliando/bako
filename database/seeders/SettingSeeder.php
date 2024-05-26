<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // ALTER TABLE your_table_name AUTO_INCREMENT = 1;
    // untuk reset counter id tabel db

    public function run(): void
    {
        DB::table('settings')->insert([
            [
                "kode" => "B",
                "judul" => "Banner Front",
                "deskripsi" => "Pengaturan Banner di Halaman Beranda. Wajib Berukuran Width x Height 800x600 px",
                "isi" => "",
                "isi2" => "",
            ],
            [
                "kode" => "K",
                "judul" => "Kontak",
                "deskripsi" => "Pengaturan Kontak Narahubung",
                "isi" => "6285249444828",
                "isi2" => ""
            ],
            [
                "kode" => "F",
                "judul" => "Footer 1",
                "deskripsi" => "Pengaturan Footer",
                "isi" => '<h3>Dinas Perdangan, Koperasi, UKM dan Perindustrian Kota Palangka Raya</h3>
            <p class="phone">Jalan Tjilik Riwut No. 98, Kota Palangka Raya</p>
            <p class="phone">Telp. : 0852444xxxxx</p>
            <ul>
                <li><span>Senin s.d. Jumat: </span> 08.00 WIB - 15.00 WIB</li>
            </ul>
            <p class="mail">
                <a href="#">disperindagkop@palangkaraya.go.id</a>
            </p>',
                "isi2" => ""
            ],
            [
                "kode" => "F",
                "judul" => "Footer 2",
                "deskripsi" => "Pengaturan Footer",
                "isi" => '<h3>Informasi</h3>
                <ul>
                    <li><a href="javascript:void(0)">Tentang Kami</a></li>
                    <li><a href="javascript:void(0)">Harga Hari Ini</a></li>
                    <li><a href="javascript:void(0)">Harga Lampau</a></li>
                    <li><a href="javascript:void(0)">Pasar Kahayan</a></li>
                    <li><a href="javascript:void(0)">Pasar Besar</a></li>
                </ul>',
                "isi2" => ""
            ],
            [
                "kode" => "F",
                "judul" => "Footer 3",
                "deskripsi" => "Pengaturan Footer",
                "isi" => '<h3>Kategori Bahan Pokok</h3>
                <ul>
                    <li><a href="javascript:void(0)">Beras</a></li>
                    <li><a href="javascript:void(0)">Minyak Goreng</a></li>
                    <li><a href="javascript:void(0)">Daging Segar</a></li>
                    <li><a href="javascript:void(0)">Sayuran dan Buah</a></li>
                    <li><a href="javascript:void(0)">Cabai Lombok</a></li>
                </ul>',
                "isi2" => ""
            ],
            [
                "kode" => "M",
                "judul" => "Facebook",
                "deskripsi" => "Pengaturan Link Facebook",
                "isi" => "",
                "isi2" => ""
            ],
            [
                "kode" => "M",
                "judul" => "Instagram",
                "deskripsi" => "Pengaturan Link Instagram",
                "isi" => "",
                "isi2" => ""
            ],
            [
                "kode" => "M",
                "judul" => "X Twitter",
                "deskripsi" => "Pengaturan Link X Twitter",
                "isi" => "",
                "isi2" => ""
            ],
            [
                "kode" => "M",
                "judul" => "Youtube",
                "deskripsi" => "Pengaturan Link Youtube",
                "isi" => "",
                "isi2" => ""
            ],
            [
                "kode" => "L",
                "judul" => "Logo Header",
                "deskripsi" => "Pengaturan Logo Header",
                "isi" => "",
                "isi2" => ""
            ],
            [
                "kode" => "PT",
                "judul" => "Halaman Tentang",
                "deskripsi" => "Pengaturan Konten Halaman Tentang",
                "isi" =>
                '<!-- Start Trending Product Area -->
                <section class="trending-product section" style="padding-top: 10px;">
                <div class="container">
                <div class="row">
                <div class="col-12">
                <!-- Start Single Product -->
                <div class="single-product">
                <div class="product-info align-center">
                <h2 class="mb-4">KONTAK KAMI</h2>
                <h3>Dinas Perdagangan, Koperasi, UKM dan Perindustrian
                Kota Palangka Raya</h3>
                <p class="phone">Jalan Tjilik Riwut No. 98, Kota Palangka Raya</p>
                <p class="phone">Telp. : 0852444xxxxx</p>
                <ul>
                <li><span>Senin s.d. Jumat: </span> 08.00 WIB - 15.00 WIB</li>
                </ul>
                <p class="mail">
                <a href="#">disperindagkop@palangkaraya.go.id</a>
                </p>
                </div>
                <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63791.16936970784!2d113.8075336216797!3d-2.1734308000000007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dfcb15e7eb6d625%3A0xdada12e5dbe5efe9!2sDisperindag%20Kota%20Palangka%20Raya!5e0!3m2!1sen!2sid!4v1707981625118!5m2!1sen!2sid"
                style="width: 100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <!-- End Single Product -->
                </div>
                </div>
                </div>
                </section>
                <!-- End Trending Product Area -->',
                "isi2" =>
                '<!-- Start Trending Product Area -->
                <section class="trending-product section" style="padding-top: 10px;">
                <div class="container">
                <div class="row">
                <div class="col-12">
                <!-- Start Single Product -->
                <div class="single-product">
                <div class="product-info align-center">
                <h2 class="mb-4">KONTAK KAMI</h2>
                <h3>Dinas Perdagangan, Koperasi, UKM dan Perindustrian
                Kota Palangka Raya</h3>
                <p class="phone">Jalan Tjilik Riwut No. 98, Kota Palangka Raya</p>
                <p class="phone">Telp. : 0852444xxxxx</p>
                <ul>
                <li><span>Senin s.d. Jumat: </span> 08.00 WIB - 15.00 WIB</li>
                </ul>
                <p class="mail">
                <a href="#">disperindagkop@palangkaraya.go.id</a>
                </p>
                </div>
                <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63791.16936970784!2d113.8075336216797!3d-2.1734308000000007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dfcb15e7eb6d625%3A0xdada12e5dbe5efe9!2sDisperindag%20Kota%20Palangka%20Raya!5e0!3m2!1sen!2sid!4v1707981625118!5m2!1sen!2sid"
                style="width: 100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <!-- End Single Product -->
                </div>
                </div>
                </div>
                </section>
                <!-- End Trending Product Area -->'
            ],
            [
                "kode" => "SEO",
                "judul" => "Judul SEO",
                "deskripsi" => "Judul untuk Search Engine Optimization (SEO). Ditampilkan Saat link dibagikan di Media Social",
                "isi" => "",
                "isi2" => ""
            ],
            [
                "kode" => "SEO",
                "judul" => "Isi SEO",
                "deskripsi" => "Deskripsi untuk Search Engine Optimization (SEO). Ditampilkan Saat link dibagikan di Media Social",
                "isi" => "",
                "isi2" => ""
            ],
            [
                "kode" => "SEO",
                "judul" => "Gambar SEO",
                "deskripsi" => "Gambar untuk Search Engine Optimization (SEO). Ditampilkan Saat link dibagikan di Media Social",
                "isi" => "",
                "isi2" => ""
            ],
        ]);
    }
}
