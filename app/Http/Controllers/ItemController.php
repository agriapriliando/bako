<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('item.index', ['items' => Item::with('category')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('item.create', ['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataValidated = $request->validate([
            'nama' => 'required|string',
            'deskripsi' => 'required',
            'category_id' => 'required'
        ]);

        $dataValidated['hargaaverage'] = 0;
        $dataValidated['tglharga'] = Carbon::now();

        Item::create($dataValidated);

        return redirect('items')->with('status', 'Nama Barang ' . $dataValidated['nama'] . ' Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return response()->json([
            'message' => 'Nama Barang Berhasil dihapus'
        ]);
    }
}
