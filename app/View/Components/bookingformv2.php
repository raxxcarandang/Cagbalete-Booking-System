<?php
	
	namespace App\View\Components;
	
	use Closure;
	use Illuminate\Contracts\View\View;
	use Illuminate\View\Component;
	use App\Models\User;
	use App\Models\Accommodation;
	use App\Models\Booking;
	
	class bookingformv2 extends Component
	{
		/**
			* Create a new component instance.
		*/
		public $accommodations;
		public $users;
		public $ubookings;
		
		public function __construct($accommodations, $users, $ubookings)
		{
			//
			$this->accommodations = $accommodations;
			$this->users = $users;
			$this->ubookings = $ubookings;
		}
		
		/**
			* Get the view / contents that represent the component.
		*/
		public function render(): View|Closure|string
		{
			return view('components.bookingformv2');
		}
	}
