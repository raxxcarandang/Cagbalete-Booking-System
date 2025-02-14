<?php
	
	namespace App\Http\Controllers\Role;
	
	use App\Http\Controllers\Controller;
	use App\Http\Controllers\BookingController;
	use Illuminate\Support\Facades\DB;
	use Illuminate\Support\Facades\Auth;
	use App\Models\Booking;
	use App\Models\Accommodation;
	use App\Models\User;
	use Illuminate\Http\Request;
	
	class OwnerController extends Controller
	{
		public function index(){
			return view('minadmin/dashboard');
		}
		
		public function stats(){
			return view('minadmin/dashreport');
		}
		
		public function bookings(){
			
			return view('minadmin/dashbooking');
		}
	}
