<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Pasar;
use App\Models\Price;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('price.index', [
            'prices' => Price::with('item', 'pasar')->get(),
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('price.create', ['items' => Item::all()]);
    }

    public function getHargakemarin($tanggal, $pasar_id, $item_id)
    {
        $hargakemarin = Price::where('updated_at', $tanggal)->where('pasar_id', $pasar_id)->where('item_id', $item_id)->first();
        return $hargakemarin;
    }

    public function getHargaminggulalu($tglstart, $tglend, $pasar_id, $item_id)
    {
        $hargaminggulalu = Price::whereBetween('updated_at', [$tglstart, $tglend])->where('pasar_id', $pasar_id)->where('item_id', $item_id)->first();
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
            'deskripsi' => 'required',
            'status' => 'required'
        ]);


        // $table->foreignId('user_id')->constrained();
        //     $table->integer('hargahariini')->default(0);
        //     $table->integer('hargakemarin')->default(0);
        //     $table->integer('hargaminggulalu')->default(0);
        //     $table->integer('hargabulanlalu')->default(0);
        //     $table->string('deskripsi')->nullable();
        //     $table->enum('status', ['Tetap', 'Turun', 'Naik']);
        //     $table->integer('selisih')->default(0);
        //     $table->float('persen', 5, 2)->nullable();
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
