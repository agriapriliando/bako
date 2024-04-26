<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Pasar;
use App\Models\Price;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prices = Price::with('item', 'pasar')->orderBy('created_at', 'DESC')->get();
        for ($i = 0; $i < count($prices); $i++) {
            $hargakemarin = Price::where('pasar_id', $prices[$i]['pasar_id'])
                ->where('item_id', $prices[$i]['item_id'])
                ->whereDate('created_at', Carbon::parse($prices[$i]['created_at'])->subday()->format('Y-m-d'))->first();
            if ($hargakemarin) {
                $prices[$i]['hargakemarin'] = $hargakemarin['hargahariini'];
            } else {
                $prices[$i]['hargakemarin'] = FALSE;
            }
        }
        // dd($prices[0]);
        return view('price.index', [
            'prices' => $prices,
            'categories' => Category::all()
        ]);
    }

    public function hargapasar($slugpasar)
    {
        $pasar = Pasar::where('slugpasar', $slugpasar)->first();
        return view('price.hargapasar', [
            'prices' => Price::with('item', 'pasar')->where('pasar_id', $pasar->id)
                ->whereDate('created_at', date('Y-m-d'))
                ->orderBy('updated_at', 'DESC')
                ->get(),
            'categories' => Category::all(),
            'pasar' => $pasar,
            'tglstart' => Carbon::now(),
            'tglend' => Carbon::now()
        ]);
    }

    public function priceby(Request $request)
    {
        $tglrange = $request->tglrange;
        $dates = explode(' - ', $tglrange);
        $tglstart = date("Y-d-m 00:00:00", strtotime($dates[0]));
        $tglend = date("Y-d-m 23:59:59", strtotime($dates[1]));
        // return $tglstart;
        session()->flash('tglstart', TRUE);
        $allprices = Price::whereBetween('updated_at', [$tglstart, $tglend])->get();
        return view('price.hargatgl', [
            'tglstart' => $tglstart,
            'tglend' => $tglend,
            'prices' => $allprices,
            'categories' => Category::all(),

        ]);
    }


    public function listitem($tglinput, $pasar_id)
    {
        $tglinput = str_replace('-', '/', $tglinput);
        $itemExist = Price::whereDate('created_at', $tglinput)->where('pasar_id', $pasar_id)->get();
        $items_id = $itemExist->pluck('item_id');
        // return $items_id;
        $items = Item::whereNotIn('id', $items_id)->get();
        return response()->json($items);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($pasar_id)
    {
        $pasar = Pasar::find($pasar_id);
        return view('price.create', [
            'items' => Item::all(),
            'pasar' => $pasar
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataValidated = $request->validate([
            'item_id' => 'required',
            'pasar_id' => 'required',
            'hargahariini' => 'required',
            'tglprice' => 'required'
        ]);
        // $time = Carbon::now()->toTimeString();
        $time = Carbon::now()->format('H:i:s');
        $gabung = $request->tglprice . " " . $time;
        // $gabung = date('Y-m-d H:i:s', strtotime($gabung));
        // return $gabung;
        Price::create([
            'item_id' => $request->item_id,
            'pasar_id' => $request->pasar_id,
            'user_id' => Auth::id(),
            'hargahariini' => $request->hargahariini,
            'hargaminggulalu' => 0,
            'hargabulanlalu' => 0,
            'deskripsi' => '',
            'status' => 'Tetap',
            'selisih' => 2000,
            'persen' => '2',
            'created_at' => $gabung,
            'updated_at' => $gabung
        ]);
        $pasar = Pasar::find($request->pasar_id);
        return redirect('hargapasar/' . $pasar->slugpasar)->with('status', 'Anda berhasil Menambah Harga');
    }

    // 

    /**
     * Display the specified resource.
     */
    public function show(Price $price)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Price $price)
    {
        $pasar = Pasar::where('id', $price->pasar_id)->first();
        return view('price.edit', [
            'price' => $price,
            'pasar' => $pasar,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Price $price)
    {
        $dataValidated = $request->validate([
            'hargahariini' => 'required',
        ]);
        $pasar = Pasar::find($price->pasar_id);
        $price->update($dataValidated);

        return redirect('hargapasar/' . $pasar->slugpasar)->with('status', 'Harga Berhasil dirubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Price $price)
    {
        $price->delete();
        return response()->json([
            'message' => 'Data Harga Berhasil Dihapus'
        ]);
    }
}
