<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class minroom extends Component
{
    /**
     * Create a new component instance.
     */
	public $accommodations;
    public function __construct($accommodations)
    {
        //
		$this->accommodations = $accommodations;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.minroom');
    }
}
