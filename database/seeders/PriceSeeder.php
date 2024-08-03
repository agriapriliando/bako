<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Pasar;
use App\Models\Price;
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
        $jumlah_hari = 350;
        // pasar kahayan
        foreach ($pasar as $p) {
            foreach ($itemall as $a) {
                for ($i = 1; $i <= $jumlah_hari; $i++) {
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

    public function addHet()
    {
        DB::table('prices')
            ->whereDate('created_at', Carbon::now())
            ->whereIn('item_id', [1, 9, 52, 53, 54, 55])
            ->update([
                'het' => rand(100, 999) . "000"
            ]);
    }

    public function run(): void
    {
        // $this->dataToday();
        // Price::truncate();
        // DB::statement("ALTER TABLE prices AUTO_INCREMENT = 1");
        $this->dataBanyak();
        // $this->addHet();
    }
}
