<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Pasar;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function dataToday()
    {
        $pasar = Pasar::all();
        $itemall = Item::all();
        foreach ($pasar as $p) {
            foreach ($itemall as $a) {
                DB::table('prices')->insert([
                    'item_id' => $a->id,
                    'pasar_id' => $p->id,
                    'user_id' => 1,
                    'hargahariini' => rand(100, 999) . "000",
                    'hargaminggulalu' => rand(100, 999) . "000",
                    'hargabulanlalu' => rand(100, 999) . "000",
                    'deskripsi' => '',
                    'status' => 'Tetap',
                    'selisih' => 0,
                    'persen' => 0,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
    }

    public function dataBanyak()
    {
        $pasar = Pasar::all();
        $itemall = Item::all();
        // pasar kahayan
        foreach ($pasar as $p) {
            foreach ($itemall as $a) {
                for ($i = 0; $i <= 1; $i++) {
                    DB::table('prices')->insert([
                        'item_id' => $a->id,
                        'pasar_id' => $p->id,
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
        }
    }

    public function run(): void
    {
        // $this->dataToday();
        $this->dataBanyak();
    }
}
