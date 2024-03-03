<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 15; ++$i) {
            DB::table('prices')->insert([
                'item_id' => Item::all()->random()->id,
                'pasar_id' => rand(1, 2),
                'user_id' => 1,
                'hargahariini' => rand(2, 7) . "0000",
                'hargakemarin' => rand(2, 7) . "0000",
                'hargaminggulalu' => rand(2, 7) . "0000",
                'hargabulanlalu' => rand(2, 7) . "0000",
                'deskripsi' => '',
                'status' => 'Tetap',
                'selisih' => 0,
                'persen' => 0,
            ]);
        }
    }
}
