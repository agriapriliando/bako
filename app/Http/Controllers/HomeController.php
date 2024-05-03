<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Pasar;
use App\Models\Price;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // return Carbon::now()->subDay();
        $priceslide = Price::whereDate('created_at', Carbon::now())
            ->with('item', 'category')->inRandomOrder()->limit(4)->get();
        $prices = Price::whereDate('created_at', Carbon::now())
            ->with('item', 'category')->orderBy('pasar_id')->get();
        // $price = Price::whereDate('created_at', Carbon::now())
        //     ->with('item', 'category')->inRandomOrder()->limit(4)->get();
        // if (count($price) == 0) {
        //     return "AAAA";
        // }
        // return $price;
        $items = Item::all();
        $category = Category::all();
        $pasar = Pasar::all();
        return view('guest.home', compact('priceslide', 'prices', 'category', 'items', 'pasar'));
    }
}
