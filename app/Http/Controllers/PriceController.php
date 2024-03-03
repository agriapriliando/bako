<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Price;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data = Category::join('items', 'items.category_id', '=', 'categories.id')
        //     ->join('prices', 'prices.item_id', '=', 'items.id')
        //     ->select('categories.nama', 'items.nama as namaa', 'prices.hargahariini')
        //     ->get();
        // $data = Price::join('prices', 'prices.item_id', '=', 'items.id')
        //     ->join('items', 'items.category_id', '=', 'categories.id')
        //     ->select('prices.hargahariini', 'items.nama', 'categories.nama as nama_category')
        //     ->get();
        // dd($data);
        return view('price.index', [
            'prices' => Price::with('item', 'pasar')->get(),
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        //
    }
}
