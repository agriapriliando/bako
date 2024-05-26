<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Item;
use App\Models\Setting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar', [
            'categories' => Category::all(),
            'items' => Item::all(),
            'logo' => Setting::find(10),
            'kontak' => Setting::find(2),
        ]);
    }
}
