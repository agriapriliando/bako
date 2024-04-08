<?php

namespace Database\Seeders;

use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AveragehargaharianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $allitem = Item::all();
        $i = 0;
        foreach ($allitem as $a) {
            DB::table('averagehargaharians')->insert([
                'item_id' => $a->id,
                'ave_harian' => rand(12, 19) . '000',
                'created_at' => Carbon::now()->subDays($i),
                'updated_at' => Carbon::now()->subDays($i)
            ]);
            $i++;
        }
    }
}
