<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Price;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $price = Price::whereDate('created_at', date('Y-m-d'))
            ->with('item', 'category')->inRandomOrder()->limit(3)->get();
        // return $items;
        $category = Category::all();
        return view('guest.home', compact('price', 'category'));
    }
}
