<?php

namespace App\View\Components;

use App\Models\Kategori;
use App\Models\Konfig;
use App\Models\Sosmed;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FrontLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $search = null
    ){}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $data['sosmed'] = Sosmed::all();
        $data['kategori'] = Kategori::all();
        $data['konfig'] = Konfig::first();
        return view('components.front-layout', $data);
    }
}
