<?php
	
	namespace App\Http\Controllers;
	
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Auth;
	use Illuminate\Support\Facades\DB;
	use App\Models\User;
	use App\Models\Accommodation;
	use App\Models\Notification;
	use App\Models\Activity;
	use App\Models\Notify;
	use App\Models\Booking;
	use App\Models\Watcher;
	use Carbon\Carbon;
	use Flasher\Prime\FlasherInterface;
	use Illuminate\Support\Facades\File;
	use Illuminate\Support\Facades\Validator;
	use Illuminate\Support\Facades\Log;
	
	class UserBookingController extends Controller
	{
		public function loaduserquery() {
			
			return \Blade::render('<x-userreload />');
		}
		
		public function reschedbook(Request $request) {
			
			
			$booking = Booking::find($request->id);
			$user = User::find($booking->userid);
			
			$action = new Activity;
			
			if ($booking) {
				
				$booking->arrival = $request->arrival;
				$booking->departure = $request->departure;
				$booking->itinerary = $request->itinerary;
				$booking->status = 'RESCHEDULED';
				$booking->save();
				
				
				$action->userid = $booking->userid;
				$action->bookid = $booking->id;
				$action->remark = $booking->remark;
				$action->updatemsg = "Booking # " . $booking->id . " Rescheduled by " . $user->lname  . "(#" . $user->id . ")" . " from (" . $booking->arrival . "_" . $booking->departure . ") to (" . $request->arrival . "_" . $request->departure . ")";
				$action->save();
				
				return redirect()->route('user.dashboard')->with('success', 'Booking rescheduled successfully.');
				} else {
				flash()->error('Booking Reschedule Failed')->with('error', 'Booking reschedule failed.');
			}
			
			return redirect()->route('user.dashboard');
		}
		
		
		public function cancelBook(Request $request)
		{
			try {
				$validated = $request->validate([
				'id' => 'required|exists:bookings,id',
				]);
				
				$booking = Booking::findOrFail($validated['id']);
				
				$accPath = public_path('images/proof/' . $booking->accproof);
				$parkPath = public_path('images/proof/' . $booking->parkproof);
				$boatPath = public_path('images/proof/' . $booking->boatproof);
				
				$filesToDelete = [$accPath, $parkPath, $boatPath];
				
				foreach ($filesToDelete as $filePath) {
					if (File::exists($filePath)) {
						File::delete($filePath);
					}
				}
				
				$booking->update(['status' => 'CANCELLED']);
				
				flash()->success('Booking cancelled successfully.');
				return redirect()->route('user.dashboard');
				} catch (\Exception $e) {
				flash()->error('An error occurred while cancelling the booking. Please try again.');
				return redirect()->route('user.dashboard')->withErrors(['error' => $e->getMessage()]);
			}
		}
		
		public function recountBook(Request $request) {
		
		$user = Auth::user();
		
			/*
				$validated = $request->validate([
				'id' => 'required|exists:bookings,id',
				'foreigners' => 'required|integer|min:0',
				'filipinos' => 'required|integer|min:0',
				'maubanins' => 'required|integer|min:0',
				'male' => 'required|integer|min:0',
				'female' => 'required|integer|min:0',
				'visitors' => 'required|integer|min:0',
				'priority' => 'required|integer|min:0',
				'zero7' => 'required|integer|min:0',
				'thirth' => 'required|integer|min:0',
				'above60' => 'required|integer|min:0',
				'amount' => 'required|integer|min:0',
				'discount' => 'required|integer|min:0',
				'namount' => 'required|integer|min:0',
				]);
			*/
			$hasarrived = Booking::where('userid', $user->id)
			->where('status', '=', 'ARRIVED')
			->exists();
			
			if ($hasarrived) {
				flash()->error('You have already arrived. If none, please contact +63 951 582 2030');
				return view('/dashboard');
				} else {
				try {
					$booking = Booking::findOrFail($request->id);
					
					$booking->foreigners = $request->foreigners;
					$booking->filipinos = $request->filipinos;
					$booking->maubanins = $request->maubanins;
					$booking->totalmale = $request->male;
					$booking->totalfemale = $request->female;
					$booking->totalvisitors = $request->visitors;
					$booking->specialneeds = $request->priority;
					$booking->zeroto7yold = $request->zero7;
					$booking->thirteento50yold = $request->thirth;
					$booking->above60yold = $request->above60;
					$booking->amount = $request->amount;
					$booking->discount = $request->discount;
					$booking->namount = $request->namount;
					
					$booking->save();
					
					flash()->success('Booking updated successfully.');
					return redirect()->route('user.dashboard');
					} catch (\Exception $e) {
					flash()->error('An error occurred while updating the booking. Please try again.');
					return redirect()->back()->withErrors(['error' => $e->getMessage()]);
				}
			}
		}
		
		
		
		
		public function bookuser(Request $request) {
			$admins = User::whereIn('role_id', ['979', '797'])->get();
			$user = Auth::user();
			
			
			$hasPendingBooking = Booking::where('userid', $user->id)
			->whereIn('status', ['PRE-ARRIVAL', 'RESCHEDULED'])
			->exists();
			
		   

			
			if ($hasPendingBooking) {
				flash()->error('You already have a booking for arrival. Please wait until it is processed before making a new one. If none, please contact +63 951 582 2030');
				return view('/booking');
				} 
				else {
				/*validate  request data
					$validated = $request->validate([
					'acc' => 'required|string',
					'accproofimg' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120', 
					'arrival' => 'required|date',
					'departure' => 'required|date|after_or_equal:arrival',
					'itinerary' => 'nullable|string',
					'foreigners' => 'required|integer|min:0',
					'filipinos' => 'required|integer|min:0',
					'maubanins' => 'required|integer|min:0',
					'male' => 'required|integer|min:0',
					'female' => 'required|integer|min:0',
					'visitors' => 'required|integer|min:0',
					'priority' => 'required|integer|min:0',
					'zero7' => 'required|integer|min:0',
					'thirth' => 'required|integer|min:0',
					'above60' => 'required|integer|min:0',
					'tmeans' => 'required|string',
					'parking' => 'required|string',
					'parkproofimg' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',  
					'boat' => 'required|string',
					'boatproofimg' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',  
					'purpose' => 'required|string',
					'status' => 'in:PENDING',
					'remark' => 'nullable|string',
					'amount' => 'required|integer|min:0',
					'discount' => 'required|integer|min:0',
					'namount' => 'required|integer|min:0',
					]);
				*/
				
				try {
					DB::transaction(function () use ($request, $admins, $user) {
						
						$booking = new Booking;
						
						
						$booking->userid = Auth::id();
						$booking->accommodation = $request->acc;
						$booking->arrival = $request->arrival;
						$booking->departure = $request->departure;
						$booking->itinerary = $request->itinerary;
						$booking->foreigners = $request->foreigners;
						$booking->filipinos = $request->filipinos;
						$booking->maubanins = $request->maubanins;
						$booking->totalmale = $request->male;
						$booking->totalfemale = $request->female;
						$booking->totalvisitors = $request->visitors;
						$booking->specialneeds = $request->priority;
						$booking->zeroto7yold = $request->zero7;
						$booking->thirteento50yold = $request->thirth;
						$booking->above60yold = $request->above60;
						$booking->travelmeans = $request->tmeans;
						$booking->parking = $request->parking;
						$booking->boating = $request->boat;
						$booking->purpose = $request->purpose;
						$booking->status = 'PRE-ARRIVAL';
						$booking->remark = 'N/A';
						$booking->amount = $request->amount;
						$booking->discount = $request->discount;
						$booking->namount = $request->namount;
						$booking->accproof = 'N/A';
						$booking->parkproof = 'N/A';
						$booking->boatproof = 'N/A';
						
						
						$booking->save();
						
						
						$accproof = $request->hasFile('accproofimg') ? 'accproof-' . $booking->id . '.' . $request->accproofimg->extension() : 'N/A';
						$parkproof = $request->hasFile('parkproofimg') ? 'parkproof-' . $booking->id . '.' . $request->parkproofimg->extension() : 'N/A';
						$boatproof = $request->hasFile('boatproofimg') ? 'boatproof-' . $booking->id . '.' . $request->boatproofimg->extension() : 'N/A';
						
						
						$acc_path = public_path('images/proof/' . $accproof);
						$park_path = public_path('images/proof/' . $parkproof);
						$boat_path = public_path('images/proof/' . $boatproof);
						
						
						if ($request->hasFile('accproofimg')) {
							$booking->accproof = $accproof;
							$request->accproofimg->move(public_path('images/proof/'), $accproof);
							} else {
							throw new \Exception('No accommodation proof image uploaded.');
						}
						
						if ($request->hasFile('parkproofimg')) {
							$booking->parkproof = $parkproof;
							$request->parkproofimg->move(public_path('images/proof/'), $parkproof);
							} else {
							$booking->parkproof = 'N/A';
						}
						
						if ($request->hasFile('boatproofimg')) {
							$booking->boatproof = $boatproof;
							$request->boatproofimg->move(public_path('images/proof/'), $boatproof);
							} else {
							throw new \Exception('No boating proof image uploaded.');
						}
						
						
						$booking->save();
						
						foreach ($admins as $admin) {
							$notif = new Notify;
							$notif->userid = $admin->id;
							$notif->bookid = $booking->id;
							$notif->msg = $user->lname . " (#" . $user->id . ") has created a new booking (#" . $booking->id . "). Please review.";
							$notif->save();
						}
						
					});
					} catch (\Exception $e) {
					throw new \Exception('File Upload Error: ' . $e->getMessage());
					flash()->error('There was an error processing your uploaded file. Please Refresh & try again later.');
					return Redirect::back()->with('error', 'There was an error processing your request. Please Refresh & try again later.');
				}
				
				flash()->success('Booking created successfully!');
				return redirect('/booking');
			}
			}
			
			
			
			
		}
		