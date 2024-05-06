<?php

namespace Database\Seeders;

use App\Models\Item;
use Carbon\Carbon;
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
        $itemall = Item::all();
        // pasar kahayan
        foreach ($itemall as $a) {
            for ($i = 0; $i <= 7; $i++) {
                DB::table('prices')->insert([
                    'item_id' => $a->id,
                    'pasar_id' => 1,
                    'user_id' => 1,
                    'hargahariini' => rand(100, 999) . "000",
                    'hargaminggulalu' => rand(100, 999) . "000",
                    'hargabulanlalu' => rand(100, 999) . "000",
                    'deskripsi' => '',
                    'status' => 'Tetap',
                    'selisih' => 0,
                    'persen' => 0,
                    'created_at' => Carbon::now()->subDays($i),
                    'updated_at' => Carbon::now()->subDays($i),
                ]);
            }
        }
        // pasar besar
        foreach ($itemall as $a) {
            for ($i = 0; $i <= 7; $i++) {
                DB::table('prices')->insert([
                    'item_id' => $a->id,
                    'pasar_id' => 2,
                    'user_id' => 1,
                    'hargahariini' => rand(100, 999) . "000",
                    'hargaminggulalu' => rand(100, 999) . "000",
                    'hargabulanlalu' => rand(100, 999) . "000",
                    'deskripsi' => '',
                    'status' => 'Tetap',
                    'selisih' => 0,
                    'persen' => 0,
                    'created_at' => Carbon::now()->subDays($i),
                    'updated_at' => Carbon::now()->subDays($i),
                ]);
            }
        }
        // foreach ($itemall as $a) {
        //     DB::table('prices')->insert([
        //         'item_id' => $a->id,
        //         'pasar_id' => 1,
        //         'user_id' => 1,
        //         'hargahariini' => rand(2, 7) . "0000",
        //         'hargaminggulalu' => rand(2, 7) . "0000",
        //         'hargabulanlalu' => rand(2, 7) . "0000",
        //         'deskripsi' => '',
        //         'status' => 'Tetap',
        //         'selisih' => 0,
        //         'persen' => 0,
        //         'created_at' => Carbon::now()->subDays(1),
        //         'updated_at' => Carbon::now()->subDays(1),
        //     ]);
        // }
        // // pasar besar
        // foreach ($itemall as $a) {
        //     DB::table('prices')->insert([
        //         'item_id' => $a->id,
        //         'pasar_id' => 2,
        //         'user_id' => 1,
        //         'hargahariini' => rand(2, 7) . "0000",
        //         'hargaminggulalu' => rand(2, 7) . "0000",
        //         'hargabulanlalu' => rand(2, 7) . "0000",
        //         'deskripsi' => '',
        //         'status' => 'Tetap',
        //         'selisih' => 0,
        //         'persen' => 0,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ]);
        // }
        // foreach ($itemall as $a) {
        //     DB::table('prices')->insert([
        //         'item_id' => $a->id,
        //         'pasar_id' => 2,
        //         'user_id' => 1,
        //         'hargahariini' => rand(2, 7) . "0000",
        //         'hargaminggulalu' => rand(2, 7) . "0000",
        //         'hargabulanlalu' => rand(2, 7) . "0000",
        //         'deskripsi' => '',
        //         'status' => 'Tetap',
        //         'selisih' => 0,
        //         'persen' => 0,
        //         'created_at' => Carbon::now()->subDays(1),
        //         'updated_at' => Carbon::now()->subDays(1),
        //     ]);
        // }
    }
}
