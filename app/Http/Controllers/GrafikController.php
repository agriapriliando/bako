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
                    $pricesint = array();
                    foreach ($dataharga as $as)
                        $pricesint[] = intval($as);
                    $data[$i]['data'] = $pricesint; //masukan ke daftar harga sesuai item
                    $i++;
                }
                // return $data;
                $datapas[$m]['dataharga'] = $data; // memasukan data harga per item sesuai pasar
            }
            // return $datapas;
            $datacategory[$z]['datapasar'] = $datapas; //gabung data ke array utama
        }
        $dataall = $datacategory;
        return response()->json($dataall);
    }

    public function grafikbarang($itemid)
    {
        $item = Item::find($itemid);
        return view('grafik.grafikbarang', compact("item"));
    }

    public function dataMingguan($itemid)
    {
        $pasar = Pasar::all();
        for ($i = 0; $i < count($pasar); $i++) {
            // $dataMingguan[$i]["pasar_id"] = $pasar[$i]["id"];
            // $dataMingguan[$i]["item_id"] = (Item::where("id", $itemid)->first())["id"];
            // $dataMingguan[$i]["item_nama"] = (Item::where("id", $itemid)->first())["nama"];
            $dataMingguan[$i]["name"] = (Item::where("id", $itemid)->first())["nama"] . " di " . $pasar[$i]["nama"];
            $prices = Price::where('item_id', $itemid)
                ->where('created_at', '>=', Carbon::now()->subDays(7))
                ->where('pasar_id', $pasar[$i]["id"])
                ->with('item')->limit(7)->get()->pluck('hargahariini');
            $pricesint = array();
            foreach ($prices as $as)
                $pricesint[] = intval($as);
            // $dataMingguan[$i]["data"] = intval($prices);
            $dataMingguan[$i]["data"] = $pricesint;
        }
        // return $pricesint;
        // return json_encode([
        //     'nama' => (Item::where("id", $itemid)->first())["nama"],
        //     'data' => $dataMingguan
        // ]);
        return response()->json([
            'nama' => (Item::where("id", $itemid)->first())["nama"],
            'data' => $dataMingguan
        ]);
    }

    public function dataBulanan($itemid)
    {
        $pasar = Pasar::all();
        for ($i = 0; $i < count($pasar); $i++) {
            // $dataMingguan[$i]["pasar_id"] = $pasar[$i]["id"];
            // $dataMingguan[$i]["item_id"] = (Item::where("id", $itemid)->first())["id"];
            // $dataMingguan[$i]["item_nama"] = (Item::where("id", $itemid)->first())["nama"];
            $dataBulanan[$i]["name"] = (Item::where("id", $itemid)->first())["nama"] . " di " . $pasar[$i]["nama"];
            $prices = Price::where('item_id', $itemid)
                ->where('created_at', '>=', Carbon::now()->subDays(30))
                ->where('pasar_id', $pasar[$i]["id"])
                ->with('item')->limit(30)->get()->pluck('hargahariini');
            $pricesint = array();
            foreach ($prices as $as)
                $pricesint[] = intval($as);
            // $dataMingguan[$i]["data"] = intval($prices);
            $dataBulanan[$i]["data"] = $pricesint;
        }
        return json_encode([
            'nama' => (Item::where("id", $itemid)->first())["nama"],
            'data' => $dataBulanan
        ]);
    }

    public function dataTahunan($itemid, $tahun)
    {
        for ($n = 0; $n < 12; $n++) {
            $bulan[$n] = $n;
        }
        $pasar = Pasar::all();
        for ($i = 0; $i < count($pasar); $i++) {
            $dataTahunan[$i]["name"] = (Item::where("id", $itemid)->first())["nama"] . " di " . $pasar[$i]["nama"];
            for ($n = 0; $n < 12; $n++) {
                $prices[$n] = Price::where('item_id', $itemid)
                    ->whereMonth('created_at', '=', $n + 1)
                    ->whereYear('created_at', $tahun)
                    ->where('pasar_id', $pasar[$i]["id"])
                    ->with('item')->get();
                if (count($prices[$n]) != 0) {
                    $average[$n] = $prices[$n]->sum('hargahariini') / count($prices[$n]);
                    $average[$n] = round($average[$n]);
                } else {
                    $average[$n] = 0;
                }
            }
            // return $prices[10];
            // return count($prices[0]);
            // return $prices[0]->sum('hargahariini');
            // return array_sum($prices[0][0]);
            $dataTahunan[$i]["data"] = $average;
        }
        return json_encode([
            'nama' => (Item::where("id", $itemid)->first())["nama"],
            'data' => $dataTahunan
        ]);
    }
}
