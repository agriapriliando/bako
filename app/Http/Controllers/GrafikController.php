<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Pasar;
use App\Models\Price;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GrafikController extends Controller
{
    public function index()
    {
        $category = Category::withCount('item')->orderBy('item_count')->get();
        $pasar = Pasar::all();
        return view('grafik.mingguan', compact('category', 'pasar'));
    }

    public function dataGrafik()
    {
        // category id 1 beras
        $itemid = Item::where('category_id', 1)->get()->pluck('id');
        // return $itemid;
        $prices = Price::whereIn('item_id', $itemid)->where('created_at', '>=', Carbon::now()->subDays(7))->where('pasar_id', 1)
            ->with('item')->limit(7)->get();

        $pasar = Pasar::all();
        for ($z = 0; $z < count($pasar); $z++) {
            $datapasar[$z]['pasar'] = $pasar[$z]['nama'];
        }
        $category = Category::withCount('item')->orderBy('item_count')->get();
        // return $category;
        for ($z = 0; $z < count($category); $z++) { //loop category
            $datacategory[$z]['category'] = $category[$z]['nama']; //nama category sbg array utama
            $datacategory[$z]['categoryid'] = $category[$z]['id']; //id category
            // return $datacategory;
            for ($m = 0; $m < count($pasar); $m++) { //loop pasar
                $datapas[$m]['pasar_id'] = $pasar[$m]['id']; //id pasar
                $datapas[$m]['nama_pasar'] = $pasar[$m]['nama']; //nama pasar
                $i = 0;
                $items = Item::where('category_id', $category[$z]['id'])->get(); //cari item sesuai category
                foreach ($items as $it) { //loop item sesuai category
                    $data[$i]['name'] = $it->nama; //nama item
                    $dataharga = Price::where('item_id', $it->id)
                        ->where('created_at', '>=', Carbon::now()->subDays(7))
                        ->where('pasar_id', $pasar[$m]['id'])
                        ->with('item')->get()->pluck('hargahariini'); //cari harga sesuai loop item
                    // return $dataharga;
                    $data[$i]['data'] = $dataharga; //masukan ke daftar harga sesuai item
                    $i++;
                }
                // return $data;
                $datapas[$m]['dataharga'] = $data; // memasukan data harga per item sesuai pasar
            }
            // return $datapas;
            $datacategory[$z]['datapasar'] = $datapas; //gabung data ke array utama
        }
        $dataall = $datacategory;
        // return $dataall;
        // for ($z = 0; $z < count($pasar); $z++) {
        //     $datapas[$z]['pasar'] = $pasar[$z]['nama'];
        //     $i = 0;
        //     $items = Item::where('category_id', $pasar[$z]['id'])->get();
        //     foreach ($items as $it) {
        //         $data[$i]['name'] = $it->nama;
        //         //harga pasar kahayan
        //         $dataharga = Price::where('item_id', $it->id)
        //             ->where('created_at', '>=', Carbon::now()->subDays(7))
        //             ->where('pasar_id', 1)
        //             ->with('item')->get()->pluck('hargahariini');
        //         $data[$i]['data'] = $dataharga;
        //         $i++;
        //     }
        //     $datapas[$z]['dataharga'] = $data;
        // }
        // return $datapas;
        // $i = 0;
        // $items = Item::where('category_id', 1)->get();
        // foreach ($items as $it) {
        //     $data[$i]['name'] = $it->nama;
        //     //harga pasar kahayan
        //     $dataharga = Price::where('item_id', $it->id)
        //         ->where('created_at', '>=', Carbon::now()->subDays(7))
        //         ->where('pasar_id', 1)
        //         ->with('item')->get()->pluck('hargahariini');
        //     $data[$i]['data'] = $dataharga;
        //     $i++;
        // }
        return response()->json($dataall);
    }
}
