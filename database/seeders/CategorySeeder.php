<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'nama' => 'Beras Lokal',
                'deskripsi' => 'Semua barang kategori beras',
                'jumlahbarang' => 0,
                'image' => 'nobg_beras.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Bawang',
                'deskripsi' => 'Semua barang kategori Bawang',
                'jumlahbarang' => 0,
                'image' => 'nobg_bawang.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Aneka Cabai',
                'deskripsi' => 'Semua barang kategori Cabai',
                'jumlahbarang' => 0,
                'image' => 'nobg_cabai.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Daging',
                'deskripsi' => 'Semua barang kategori Daging, termasuk ayam, sapi, dsb',
                'jumlahbarang' => 0,
                'image' => 'nobg_daging.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Telur',
                'deskripsi' => 'Semua barang kategori Telur',
                'jumlahbarang' => 0,
                'image' => 'nobg_telur.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Minyak Goreng',
                'deskripsi' => 'Semua barang kategori Minyak Goreng',
                'jumlahbarang' => 0,
                'image' => 'nobg_minyakgoreng.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Ikan',
                'deskripsi' => 'Semua barang kategori Ikan',
                'jumlahbarang' => 0,
                'image' => 'nobg_ikan.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Kacang-Kacangan',
                'deskripsi' => 'Semua barang kategori Kacang, termasuk kedelai, hijau, tanah',
                'jumlahbarang' => 0,
                'image' => 'nobg_kacang.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Susu',
                'deskripsi' => 'Semua barang kategori Kental Manis, Susu Bubuk, dsb',
                'jumlahbarang' => 0,
                'image' => 'nobg_kental_manis.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Tepung',
                'deskripsi' => 'Semua barang kategori Tepung Terigu, Kanji, Ketan, dsb',
                'jumlahbarang' => 0,
                'image' => 'nobg_tepung.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Aneka Sayuran',
                'deskripsi' => 'Semua barang kategori Sayur dan Buah',
                'jumlahbarang' => 0,
                'image' => 'nobg_sayurbuah.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Gula',
                'deskripsi' => 'Semua barang kategori gula',
                'jumlahbarang' => 0,
                'image' => 'nobg_gula.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Garam',
                'deskripsi' => 'Semua barang kategori Garam',
                'jumlahbarang' => 0,
                'image' => 'nobg_garam.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Mie Instant',
                'deskripsi' => 'Semua barang kategori Mie Instant',
                'jumlahbarang' => 0,
                'image' => 'nobg_mie.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
