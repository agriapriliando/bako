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
        DB::table('prices')->insert([
            'item_id' => Item::all()->random()->id,
            'pasar_id' => 1,
            'hargahariini' => 8.0000,
            'hargakemarin' => 80000,
            'hargaminggulalu' => 80000,
            'hargabulanlalu' => 80000,
            'deskripsi' => '',
            'status' => 'Tetap',
            'selisih' => 0,
            'persen' => 0,
        ]);
        //    nId('item_id')->constrained();
        //    nId('pasar_id')->constrained();
        //    r('hargahariini')->default(0);
        //    r('hargakemarin')->default(0);
        //    r('hargaminggulalu')->default(0);
        //    r('hargabulanlalu')->default(0);
        //    ('deskripsi')->nullable();
        //    status', ['Tetap', 'Turun', 'Naik']);
        //    r('selisih')->default(0);
        //    'persen', 5, 2)->nullable();
    }
}
