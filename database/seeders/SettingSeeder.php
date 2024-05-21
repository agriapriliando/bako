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
    public function run(): void
    {
        DB::table('settings')->insert([
            [
                "kode" => "B",
                "judul" => "Banner Front",
                "deskripsi" => "Pengaturan Banner di Halaman Beranda. Wajib Berukuran xxx",
                "isi" => "bannerfront.jpg",
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
                "isi" => '<h3>Dinas Perdangan, Koperasi, UKM dan Perindustrian
                Kota Palangka Raya</h3>
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
                "isi" => "",
                "isi2" => ""
            ],
            [
                "kode" => "SEO",
                "judul" => "Judul",
                "deskripsi" => "Judul untuk Search Engine Optimization (SEO). Ditampilkan Saat link dibagikan di Media Social",
                "isi" => "",
                "isi2" => ""
            ],
            [
                "kode" => "SEO",
                "judul" => "Isi",
                "deskripsi" => "Isi untuk Search Engine Optimization (SEO). Ditampilkan Saat link dibagikan di Media Social",
                "isi" => "",
                "isi2" => ""
            ],
            [
                "kode" => "SEO",
                "judul" => "Gambar",
                "deskripsi" => "Gambar untuk Search Engine Optimization (SEO). Ditampilkan Saat link dibagikan di Media Social",
                "isi" => "",
                "isi2" => ""
            ],
        ]);
    }
}
