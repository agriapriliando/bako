<?php

namespace App\View\Components;

use App\Models\Setting;
use Illuminate\View\Component;
use Illuminate\View\View;

class GuestLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        $seojudul = Setting::find(12);
        $seoisi = Setting::find(13);
        $seoimg = Setting::find(14);
        return view('layouts.guest', compact('seojudul', 'seoisi', 'seoimg'));
    }
}
