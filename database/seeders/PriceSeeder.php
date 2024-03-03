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
        for ($i = 0; $i < 12; ++$i) {
            DB::table('prices')->insert([
                'item_id' => Item::all()->random()->id,
                'pasar_id' => 1,
                'user_id' => 1,
                'hargahariini' => 80000,
                'hargakemarin' => 80000,
                'hargaminggulalu' => 80000,
                'hargabulanlalu' => 80000,
                'deskripsi' => '',
                'status' => 'Tetap',
                'selisih' => 0,
                'persen' => 0,
            ]);
        }
    }
}
