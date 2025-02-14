<?php
	namespace App\View\Components;
	
	use Closure;
	use Illuminate\Contracts\View\View;
	use Illuminate\View\Component;

	class Bookreload extends Component
	{
		// Public properties to hold the values passed from the controller

	
		
		
		/**
			* Create a new component instance.
		*/
		public function __construct(

     

  
     
		) {
			// Initialize the public properties with the data passed from the controller

		

			
		}
		
		/**
			* Get the view / contents that represent the component.
		*/
		public function render(): View|Closure|string
		{
			return view('components.bookreload');
		}
	}
