<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('category.index', ['categories' => Category::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataValidated = $request->validate([
            'nama' => 'required|string|unique:categories',
            'deskripsi' => 'required',
            'image' => 'required'
        ]);
        $path = storage_path('app/public/images/category/');
        // code to make dir and subdir
        !is_dir($path) &&
            mkdir($path, 0777, true);

        $name = Carbon::now()->format('YmdHis') . '.' . $request->image->extension();
        Image::make($request->file('image'))
            ->resize(400, 400)
            ->save($path . $name);
        $dataValidated['jumlahbarang'] = 0;
        $dataValidated['image'] = $name;
        Category::create($dataValidated);
        return redirect('categories')->with('status', 'Kategori : ' . $dataValidated['nama'] . ' telah ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json([
            'message' => "Kategori Berhasil Dihapus"
        ]);
    }
}
