<?php

namespace Database\Seeders;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        DB::table('items')->insert([
            [
                'category_id' => 1,
                'nama' => 'Beras Mangkok',
                'deskripsi' => 'Beras Mangkok ' . $faker->word(),
                'hargaaverage' => 0,
                'tglharga' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_id' => 1,
                'nama' => 'Beras Pangkoh',
                'deskripsi' => 'Beras Pangkoh ' . $faker->word(),
                'hargaaverage' => 0,
                'tglharga' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_id' => 1,
                'nama' => 'Beras Putri Koki',
                'deskripsi' => 'Beras Putri Koki ' . $faker->word(),
                'hargaaverage' => 0,
                'tglharga' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_id' => 2,
                'nama' => 'Minyak Goreng Filma',
                'deskripsi' => 'Minyak Goreng Filma ' . $faker->word(),
                'hargaaverage' => 0,
                'tglharga' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_id' => 2,
                'nama' => 'Minyak Goreng Bimoli',
                'deskripsi' => 'Minyak Goreng Bimoli ' . $faker->word(),
                'hargaaverage' => 0,
                'tglharga' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_id' => 2,
                'nama' => 'Minyak Goreng Sania',
                'deskripsi' => 'Minyak Goreng Sania ' . $faker->word(),
                'hargaaverage' => 0,
                'tglharga' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        // for ($i = 0; $i < 4; ++$i) {
        //     DB::table('items')->insert([
        //         [
        //             // 'category_id' => Category::all()->random()->id,
        //             'nama' => 'Minyak Goreng Filma ' . Category::all()->random()->id,
        //             'deskripsi' => 'Minyak Goreng Filma ' . $faker->word(),
        //             'hargaaverage' => 0,
        //             'tglharga' => Carbon::now(),
        //             'created_at' => Carbon::now(),
        //             'updated_at' => Carbon::now(),
        //         ]
        //     ]);
        // }
    }
}
