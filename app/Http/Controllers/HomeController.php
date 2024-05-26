<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Pasar;
use App\Models\Price;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // return "AAAA";
        // return Carbon::now()->subDay();
        $priceslide = Price::whereDate('created_at', Carbon::now())
            ->with('item', 'category')->inRandomOrder()->limit(4)->get();
        $c = 0;
        while (count($priceslide) == 0) { // jika data hari ini null, cek data kemarin dst
            $priceslide = Price::whereDate('created_at', Carbon::now()->subDays($c))
                ->with('item', 'category')->inRandomOrder()->limit(4)->get();
            $c++;
        }
        // return $priceslide;
        $prices = Price::whereDate('created_at', Carbon::now())
            ->with('item', 'category')->orderBy('pasar_id')->get();
        $items = Item::all();
        $category = Category::all();
        $pasar = Pasar::all();
        $banner = Setting::find(1);
        return view('guest.home', compact('priceslide', 'prices', 'category', 'items', 'pasar', 'banner'));
    }

    public function tentang()
    {
        $setting = Setting::find(11);
        $pasar = Pasar::all();
        return view('guest.tentang', compact('setting', 'pasar'));
    }
}
