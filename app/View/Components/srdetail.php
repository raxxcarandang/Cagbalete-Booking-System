<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class srdetail extends Component
{
    /**
     * Create a new component instance.
     */
	 public $accommodation;
	 public $images;
	 
    public function __construct($accommodation, $images)
    {
        //
		$this->accommodation = $accommodation;
		$this->images = $images;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.srdetail');
    }
}
