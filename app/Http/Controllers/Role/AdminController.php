<?php
	
	namespace App\Http\Controllers\Role;
	
	use App\Http\Controllers\Controller;
	use App\Http\Controllers\BookingController;
	use App\Models\Booking;
	use App\Models\Accommodation;
	use App\Models\User;
	use App\Models\Activity;
	use App\Models\Notify;
	use App\Models\Image;
	use App\Models\Report;
	use App\Models\Notification;
	use Illuminate\Support\Facades\DB;
	use Illuminate\Http\Request;
	
	class AdminController extends Controller
	{
		public function index(){
			
			
			$activities = Activity::all();
			$unreadActivities = Activity::whereNull('read_at');
			
			$bookpendcount = Booking::where('status', 'PENDING')->count();
			$newusercount = User::where('created_at', '>=', now()->subDay())->count();
			
			$bookings = collect();
			$images = collect();
			$users = collect();
			$accommodations = collect();
			$activities = collect();
			$notifications = collect();
			$reports = collect();
			
			$allreports = Report::chunk(1000, function($getreports) use ($reports) {
				foreach($getreports as $getreport) {
					$reports->push($getreport);
				}
			});
			
			
			$allnotifications = Notify::chunk(1000, function($getnotifies) use ($notifications) {
				foreach($getnotifies as $getnotify) {
					$notifications->push($getnotify);
				}
			});
			
			$unreadNotifications = $notifications->whereNull('read_at');
			
			$allactivities = Activity::chunk(1000, function($getactivities) use ($activities) {
				foreach($getactivities as $getactivity) {
					$activities->push($getactivity);
				}
			});
			
			$unreadActivities = $activities->whereNull('read_at');
			
			$allbookings = Booking::chunk(1000, function($getbookings) use ($bookings) {
				foreach($getbookings as $getbooking) {
					$bookings->push($getbooking);
				}
			});
			
			$allusers = User::chunk(1000, function($getusers) use ($users) {
				foreach($getusers as $getuser) {
					$users->push($getuser);
				}
			});
			
			$allaccommodations = Accommodation::chunk(1000, function($getaccommodations) use ($accommodations) {
				foreach($getaccommodations as $getaccommodation) {
					$accommodations->push($getaccommodation);
				}
			});
			
			$allimages = Image::chunk(1000, function($getimages) use ($images) {
				foreach($getimages as $getimage) {
					$images->push($getimage);
				}
			});
			
			
			
			return view('admin/dashboard', [
			
			'accommodations' => $accommodations,
			'images' => $images,
			]);
		}
		
		public function dashbook(){
			return view('admin/dashbookings');
		}
		
		public function dashuser(){
			return view('admin/dashusers');
		}
		
		public function dashacc(){
			
			
			$accommodations = collect();
			
			
			$allaccommodations = Accommodation::chunk(1000, function($getaccommodations) use ($accommodations) {
				foreach($getaccommodations as $getaccommodation) {
					$accommodations->push($getaccommodation);
				}
			});
			
			return view('admin/dashcms', [
			'accommodations' => $accommodations,
			]);
		}
		
		public function dashnotify(){
			return view('admin/dashnotify');
		}
		
		public function dashstat(){
		$accommodations = collect();
		
			$allaccommodations = Accommodation::chunk(1000, function($getaccommodations) use ($accommodations) {
				foreach($getaccommodations as $getaccommodation) {
					$accommodations->push($getaccommodation);
				}
			});
			return view('admin/dashreports', 
			[
			'accommodations' => $accommodations,
			]);
			
		}
	}
