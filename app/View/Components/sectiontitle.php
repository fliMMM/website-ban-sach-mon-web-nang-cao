<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Http\Request;
class sectiontitle extends Component
{
    /**
     * Create a new component instance.
     */
   
    public function __construct(
        public $list,
        public string $title,
    )
    {
        //
       
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sectiontitle');
    }
}
