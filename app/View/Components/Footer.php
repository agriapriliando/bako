<?php

namespace App\View\Components;

use App\Models\Setting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Footer extends Component
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
        $logo = Setting::find(10);
        $footer1 = Setting::find(3);
        $footer2 = Setting::find(4);
        $footer3 = Setting::find(5);
        return view('components.footer', compact('logo', 'footer1', 'footer2', 'footer3'));
    }
}
