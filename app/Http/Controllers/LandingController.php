<?php
	
	namespace App\Http\Controllers;
	
	use Illuminate\Http\Request;
	
	use Illuminate\Support\Facades\Auth;
	use Illuminate\Support\Facades\DB;
	use App\Models\User;
	use App\Models\Accommodation;
	use App\Models\Booking;
	use App\Models\Watcher;
	use App\Models\Visit;
	
	class LandingController extends Controller
	{
		public function index(Request $request)
		{
		    $bookings = collect();
			$accommodations = collect();
			$allaccommodations = Accommodation::chunk(1000, function($getaccommodations) use ($accommodations) {
				foreach($getaccommodations as $getaccommodation) {
					$accommodations->push($getaccommodation);
				}
			});
			
        	$allbookings = Booking::chunk(1000, function($getbookings) use ($bookings) {
                foreach($getbookings as $getbooking) {
                    $bookings->push($getbooking);
                }
            });

			
			$accommodationsliders = collect();
			
			$accommodationsliders = Accommodation::all()->shuffle();
		
		
			return view('index', [
			    
			'accommodations' => $accommodations,
			'accommodationsliders' => $accommodationsliders,
			
			]);
		}
		
		
		public function details(Request $request){
			$accommodations = collect();
			$allaccommodations = Accommodation::chunk(1000, function($getaccommodations) use ($accommodations) {
				foreach($getaccommodations as $getaccommodation) {
					$accommodations->push($getaccommodation);
				}
			});
			
		
			
			return view('accommodation', [

			    'accommodations' => $accommodations
			]);
		}
		
		public function accommodation(Request $request){
			
			$accommodation = DB::table('accommodations')
			->where('id', '=', $_GET['supplier'])
			->get();
			
			$images = DB::table('images')
			->where('accid', '=', $_GET['supplier'])
			->get();
			
	
			
			return view('supplier', [
			'accommodation' => $accommodation,
			'images' => $images,
			]);
		}
		
		public function booking(Request $request){
			$ubookings = DB::table('bookings')
			->where('userid', '=', Auth::id())
			->orderBy('created_at', 'desc') 
			->limit(7) 
			->get();
			
			$user = Auth::user(); 
			
			$hasPendingBooking = Booking::where('userid', $user->id)
			->whereIn('status', ['PRE-ARRIVAL', 'RESCHEDULED'])
			->exists();
			
		
			if ($hasPendingBooking) {
				flash()->error('You already have a booking for arrival. Please wait until it is processed before making a new one. If none, please contact +63 951 582 2030');
			
			
				 $bookings = collect();
			$accommodations = collect();
			$allaccommodations = Accommodation::chunk(1000, function($getaccommodations) use ($accommodations) {
				foreach($getaccommodations as $getaccommodation) {
					$accommodations->push($getaccommodation);
				}
			});
			
        	$allbookings = Booking::chunk(1000, function($getbookings) use ($bookings) {
                foreach($getbookings as $getbooking) {
                    $bookings->push($getbooking);
                }
            });

			
			$accommodationsliders = collect();
			
			$accommodationsliders = Accommodation::all()->shuffle();
			
	

			return view('index', [

			'bookings' => $bookings->count(),
			'accommodations' => $accommodations,
			'accommodationsliders' => $accommodationsliders,
			]);
				
			} 
			
			
			$accommodations = collect();
			$allaccommodations = Accommodation::chunk(1000, function($getaccommodations) use ($accommodations) {
				foreach($getaccommodations as $getaccommodation) {
					$accommodations->push($getaccommodation);
				}
			});
			
			$users = collect();
			$allusers = User::chunk(1000, function($getusers) use ($users) {
				foreach($getusers as $getuser) {
					$users->push($getuser);
				}
			});
			

			
			return view('booking', [

			'accommodations' => $accommodations,
			'users' => $users,
			'ubookings' => $ubookings
			]);
			
		}
		
		public function about(Request $request)
		{
		  

			return view('about');
		}
	}
