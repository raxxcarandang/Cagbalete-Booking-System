<?php
	
	namespace App\Http\Controllers\Role;
	
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use App\Http\Requests\ProfileUpdateRequest;
	use Illuminate\Http\RedirectResponse;
	use Illuminate\Support\Facades\Auth;
	use Illuminate\Support\Facades\Redirect;
	use Illuminate\View\View;
	use App\Models\Accommodation;
	use App\Models\Activity;
	
	class UserController extends Controller
	{
		public function index(){
			$accommodationsliders = collect()->shuffle();
			$allaccommodations = Accommodation::chunk(1000, function($getaccommodations) use ($accommodationsliders) {
				foreach($getaccommodations as $getaccommodation) {
					$accommodationsliders->push($getaccommodation);
				}
			});
			
			$notifications = auth()->user()->unreadNotifications;
			$activities = Activity::where('userid', auth()->id())->latest()->get();
			$unreadActivities = $activities = Activity::where('userid', auth()->id())->whereNull('read_at')->latest()->get();
			
			return view('/dashboarduser', [
			'accommodationsliders' => $accommodationsliders,
			'notifications' => $notifications,
			'activities' => $activities,
			'unreadActivities' => $unreadActivities
			]);
		}
		
		public function dashbook(){
			return view('/userbook');
		}
		
		public function dashnotify(){
			return view('/usernotify');
		}
	}
