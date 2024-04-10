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

        return view('price.index', [
            'prices' => Price::with('item', 'pasar')->latest()->get(),
            'categories' => Category::all()
        ]);
    }

    public function hargapasar($slugpasar)
    {

        $pasar = Pasar::where('slugpasar', $slugpasar)->first();
        return view('price.hargapasar', [
            'prices' => Price::with('item', 'pasar')->where('pasar_id', $pasar->id)->get(),
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
        // hanya tampilkan item yang belum dimasukan
        // return $this->listitem(Carbon::now(), $pasar_id);
        $pasar = Pasar::find($pasar_id);
        return view('price.create', [
            'items' => Item::all(),
            'pasar' => $pasar
        ]);
    }

    public function getHargaminggulalu($tglprice, $item_id, $pasar_id)
    {
        $hargaminggulalu = Price::where('created_at', $tglprice)->where('pasar_id', $pasar_id)->where('item_id', $item_id)->get();
        return $hargaminggulalu;
    }

    public function createHargaharian()
    {
        //
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
        $time = Carbon::now()->toTimeString();
        // return $time;
        $gabung = $request->tglprice . " " . $time;
        // return $gabung;
        // $tgl = Carbon::createFromFormat('Y-m-d H:i:s', $gabung)->locale('id');
        // $tgl = Carbon::parse($gabung);
        // return $tgl;
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
        return redirect('prices')->with('status', 'Anda berhasil Menambah Harga');
    }

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Price $price)
    {
        //
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
