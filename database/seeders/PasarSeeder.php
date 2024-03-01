<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PasarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pasars')->insert([
            [
                'nama' => 'Pasar Kahayan',
                'deskripsi' => 'Jalan Tjilik Riwut km 1,5, Kelurahan Palangka Kecamatan Jekanraya, Kota Palangkaraya, Kalimantan Tengah.',
                'lokasi_gmap' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.883916161197!2d113.90635627496775!3d-2.1975949977829425!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dfcb3ca92766779%3A0xd4a33d27b24c1464!2sPasar%20Kahayan!5e0!3m2!1sen!2sid!4v1709268634522!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'gambar' => 'kosong'
            ],
            [
                'nama' => 'Pasar Besar',
                'deskripsi' => 'Jl.Jawa, Kel. Langkai, Kec. Pahandut, Kota Palangka Raya, Kalimantan Tengah.',
                'lokasi_gmap' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.8534317594235!2d113.93430827496773!3d-2.208981897771483!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dfcb263ee0db4bf%3A0xc5461930d3ddd112!2sKomplek%20Pasar%20Besar%20Palangkaraya!5e0!3m2!1sen!2sid!4v1709268812564!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'gambar' => 'kosong'
            ],
        ]);
    }
}
