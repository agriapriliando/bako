<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Price;
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

    public function hargapasar($namapasar)
    {
        return view('price.hargapasar', [
            'prices' => Price::with('item', 'pasar')->where('nama', $namapasar)->get(),
            'categories' => Category::all(),
            'namapasar' => $namapasar
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('price.create', ['items' => Item::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
