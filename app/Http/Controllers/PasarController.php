<?php

namespace App\Http\Controllers;

use Image;
use App\Models\Pasar;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PasarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pasar.index', ['pasars' => Pasar::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('pasar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataValidated = $request->validate([
            'nama' => 'required|unique:pasars,nama|string',
            'deskripsi' => 'required',
        ]);

        if ($request->has('gambar')) {
            $path = storage_path('app/public/images/pasar/');
            // code to make dir and subdir
            !is_dir($path) &&
                mkdir($path, 0777, true);

            $name = Carbon::now()->format('YmdHis') . '.' . $request->gambar->extension();
            Image::make($request->file('gambar'))
                ->resize(400, 400)
                ->save($path . $name);
            $dataValidated['gambar'] = $name;
        } else {
            $dataValidated['gambar'] = "kosong.png";
        }

        if ($request->filled('lokasi_gmap')) {
            $dataValidated['lokasi_gmap'] = $request->lokasi_gmap;
        } else {
            $dataValidated['lokasi_gmap'] = 'Lokasi Google Map Belum Diisi';
        }
        Pasar::create($dataValidated);

        return redirect('pasars')->with('status', 'Pasar : ' . $dataValidated['nama'] . ' telah ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pasar $pasar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pasar $pasar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pasar $pasar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pasar $pasar)
    {
        $pasar->delete();
        return response()->json([
            'message' => 'Data Pasar Berhasil Dihapus'
        ]);
    }
}
