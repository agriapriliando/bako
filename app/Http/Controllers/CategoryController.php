<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

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
            'image' => 'required|image|max:2048'
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
        return view('category.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $dataValidated = $request->validate([
            'nama' => ['required', 'string', Rule::unique('categories')->ignore($category->id)],
            'deskripsi' => 'required',
            'image' => 'image|max:2048'
        ]);
        if ($request->has('image')) {
            $path = storage_path('app/public/images/category/');
            $name = Carbon::now()->format('YmdHis') . '.' . $request->image->extension();
            Image::make($request->file('image'))
                ->resize(400, 400)
                ->save($path . $name);
            $dataValidated['image'] = $name;
            Storage::delete('public/images/category/' . $category->image);
        }
        Category::where('id', $category->id)->update($dataValidated);
        return redirect('categories')->with('status', 'Kategori : ' . $dataValidated['nama'] . ' telah dirubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        Storage::delete('public/images/category/' . $category->image);
        $category->delete();
        return response()->json([
            'message' => "Kategori Berhasil Dihapus"
        ]);
    }
}
