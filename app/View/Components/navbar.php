<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class navbar extends Component
{
    
    public $bookings;
    public $visits;
    /**
     * Create a new component instance.
     */
    public function __construct($bookings, $visits)
    {
        $this->bookings = $bookings;
        $this->visits = $visits;
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar');
    }
}
