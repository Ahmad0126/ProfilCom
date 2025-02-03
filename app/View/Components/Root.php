<?php

namespace App\View\Components;

use App\Models\Konfig;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Root extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $title = 'Document'
    ){
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $konfig = Konfig::first() ?? new Konfig();
        $data['favicon'] = asset('storage/'.$konfig->favicon);
        return view('components.root', $data);
    }
}
