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
                'nama' => 'Beras',
                'deskripsi' => 'Semua barang kategori beras',
                'jumlahbarang' => 0,
                'image' => 'Kosong',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Minyak Goreng',
                'deskripsi' => 'Semua barang kategori Minyak Goreng',
                'jumlahbarang' => 0,
                'image' => 'Kosong',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
