<?php
	
	namespace App\Http\Controllers;
	
	use Illuminate\Support\Facades\Auth;
	use Illuminate\Support\Facades\DB;
	use Illuminate\Support\Facades\Blade;
	use Illuminate\Http\Request;
	use App\Models\User;
	use App\Models\Accommodation;
	use App\Models\Notification;
	use App\Models\Activity;
	use App\Models\Notify;
	use App\Models\Booking;
	use App\Models\Image;
	use App\Models\Watcher;
	use Carbon\Carbon;
	use Flasher\Prime\FlasherInterface;
	use Illuminate\Support\Facades\File;
	use Illuminate\Auth\Events\Verified;
	
	
	class BookingController extends Controller
	{
		
		public function chart(Request $request)
		{
			$dateRangeType = $request->input('dateRange', 'week');  
			
			
			$startDate = Carbon::today()->startOfWeek();
			$dates = [];
			$weeks = 4; 
			
			
			if ($dateRangeType === 'month') {
				$startDate = Carbon::today()->startOfMonth(); 
				$weeks = ceil(Carbon::today()->daysInMonth / 7);
			}
			
			for ($i = 0; $i < $weeks; $i++) {
				$date = null;
				
				if ($dateRangeType === 'week') {
					$weekStart = $startDate->copy()->addWeeks($i);
					$date = $weekStart->format('Y-m-d');
					} else {
					$monthStart = $startDate->copy()->addMonths($i);
					$date = $monthStart->format('Y-m');
				}
				
				$dates[] = $date;
			}
			
			$bookingData = [];
			$statuses = ['PRE-ARRIVAL', 'CANCELLED', 'RESCHEDULED', 'ARRIVED', 'DELINQUENT'];
			
			foreach ($dates as $date) {
				foreach ($statuses as $status) {
					$count = 0;
					
					if ($dateRangeType === 'week') {
						
						$count = Booking::whereDate('arrival', '>=', $date)
						->whereDate('arrival', '<', Carbon::parse($date)->addWeek())
						->where('status', $status)
						->count();
						} else {
						
						$count = Booking::whereMonth('arrival', Carbon::parse($date)->month)
						->whereYear('arrival', Carbon::parse($date)->year)
						->where('status', $status)
						->count();
					}
					
					$bookingData[$status][$date] = $count;
				}
			}
			
			return response()->json([
			'dates' => $dates,
			'bookingData' => $bookingData,
			]);
		}
		
		public function booktablestatquery(Request $request) {
			$itrsort = $request->input('itrsort');
			$stssort = $request->input('stssort');
			$contsort = $request->input('contsort');
			$sorter = $request->input('sorter');
			$colorsort = $request->input('colorsort');
			$datesort = $request->input('datesort');
			$datesortend = $request->input('datesortend');
			$statsort = Carbon::parse($request->input('statsort'))->toDateString();
			$searchTerm = $request->input('searchTerm');
			$perpage = $request->input('perpage', 3);
			$cpage = $request->input('cpage', 1);
			$datastart = $request->input('datastart', Carbon::today()->startOfMonth()->toDateString());
			$dataend = $request->input('dataend', Carbon::today()->endOfMonth()->toDateString());
			
			
			$unreadActivities = DB::table('activities')->whereNull('read_at')->get();
			$unreadNotifications = DB::table('notifies')->whereNull('read_at')->get();
			
			$accommodations = Accommodation::select('name', 'capacity')->get()->toArray();		
			
			$accnames = Accommodation::select('name')->get()->pluck('name')->toArray();
			
			$totaldemo = [];
			
			$statbookings = Booking::whereIn('accommodation', $accnames)
			->select('accommodation', 'arrival', 'status', 'specialneeds', 'foreigners', 'maubanins', 'filipinos', 'zeroto7yold', 'thirteento50yold', 'above60yold', 'totalmale', 'totalfemale', 'totalvisitors', 'namount')
			->whereBetween('arrival', [$datastart, $dataend])
			->where('status', '=', 'ARRIVED')
			->get();
			
			
			foreach ($statbookings as $booking) {
				
				if (!isset($totaldemo[$booking->accommodation])) {
					$totaldemo[$booking->accommodation] = [
					'specialneeds' => 0,
					'foreigners' => 0,
					'maubanins' => 0,
					'filipinos' => 0,
					'zeroto7yold' => 0,
					'thirteento50yold' => 0,
					'above60yold' => 0,
					'totalmale' => 0,
					'totalfemale' => 0,
					'totalvisitors' => 0,
					'namount' => 0,
					'bcount' => 0
					];
				}
				
				
				$totaldemo[$booking->accommodation]['specialneeds'] += $booking->specialneeds;
				$totaldemo[$booking->accommodation]['foreigners'] += $booking->foreigners;
				$totaldemo[$booking->accommodation]['maubanins'] += $booking->maubanins;
				$totaldemo[$booking->accommodation]['filipinos'] += $booking->filipinos;
				$totaldemo[$booking->accommodation]['zeroto7yold'] += $booking->zeroto7yold;
				$totaldemo[$booking->accommodation]['thirteento50yold'] += $booking->thirteento50yold;
				$totaldemo[$booking->accommodation]['above60yold'] += $booking->above60yold;
				$totaldemo[$booking->accommodation]['totalmale'] += $booking->totalmale;
				$totaldemo[$booking->accommodation]['totalfemale'] += $booking->totalfemale;
				$totaldemo[$booking->accommodation]['totalvisitors'] += $booking->totalvisitors;
				$totaldemo[$booking->accommodation]['namount'] += $booking->namount;
				$totaldemo[$booking->accommodation]['bcount'] += 1;
			}
			
			
			$sums = [
			'specialneeds' => 0,
			'foreigners' => 0,
			'maubanins' => 0,
			'filipinos' => 0,
			'zeroto7yold' => 0,
			'thirteento50yold' => 0,
			'above60yold' => 0,
			'totalmale' => 0,
			'totalfemale' => 0,
			'totalvisitors' => 0,
			'namount' => 0,
			'bcount' => 0
			];
			
			
			foreach ($totaldemo as $acc => $stats) {
				$sums['specialneeds'] += $stats['specialneeds'];
				$sums['foreigners'] += $stats['foreigners'];
				$sums['maubanins'] += $stats['maubanins'];
				$sums['filipinos'] += $stats['filipinos'];
				$sums['zeroto7yold'] += $stats['zeroto7yold'];
				$sums['thirteento50yold'] += $stats['thirteento50yold'];
				$sums['above60yold'] += $stats['above60yold'];
				$sums['totalmale'] += $stats['totalmale'];
				$sums['totalfemale'] += $stats['totalfemale'];
				$sums['totalvisitors'] += $stats['totalvisitors'];
				$sums['namount'] += $stats['namount'];
				$sums['bcount'] += $stats['bcount'];
			}
			
			
			$notdemo = [
			'specialneeds' => 0,
			'foreigners' => 0,
			'maubanins' => 0,
			'filipinos' => 0,
			'zeroto7yold' => 0,
			'thirteento50yold' => 0,
			'above60yold' => 0,
			'totalmale' => 0,
			'totalfemale' => 0,
			'totalvisitors' => 0,
			'namount' => 0,
			'bcount' => 0
			];
			
			
			$noaccnames = Booking::select('accommodation', 'arrival', 'specialneeds', 'foreigners', 'maubanins', 'filipinos', 'zeroto7yold', 'thirteento50yold', 'above60yold', 'totalmale', 'totalfemale', 'totalvisitors', 'namount')
			->whereBetween('arrival', [$datastart, $dataend])
			->whereNotIn('accommodation', $accnames)  
			->get();
			
			foreach ($noaccnames as $booking) {
				$notdemo['specialneeds'] += $booking->specialneeds;
				$notdemo['foreigners'] += $booking->foreigners;
				$notdemo['maubanins'] += $booking->maubanins;
				$notdemo['filipinos'] += $booking->filipinos;
				$notdemo['zeroto7yold'] += $booking->zeroto7yold;
				$notdemo['thirteento50yold'] += $booking->thirteento50yold;
				$notdemo['above60yold'] += $booking->above60yold;
				$notdemo['totalmale'] += $booking->totalmale;
				$notdemo['totalfemale'] += $booking->totalfemale;
				$notdemo['totalvisitors'] += $booking->totalvisitors;
				$notdemo['namount'] += $booking->namount;
				$notdemo['bcount'] += 1;
			}
			
			$fullBookings = Booking::count();
			$unreadActivitiesCount = $unreadActivities->count();
			$unreadNotificationsCount = $unreadNotifications->count();
			
			$distinctColors = Booking::select('color')->where('color', '!=', '')->distinct()->get()->toArray();
			
			$pendings = Booking::select('arrival', 'accommodation')
			->whereIn('status', ['PRE-ARRIVAL', 'RESCHEDULED'])
            ->whereDate('arrival', '=', $statsort)
            ->get()->toArray();
			
			$arrivals = Booking::select('arrival', 'accommodation', 'totalvisitors')
			->where('status', '=', 'ARRIVED')
            ->whereDate('arrival', '=', $statsort)
            ->get();
			
			$tarrivals = $arrivals->sum('totalvisitors');
			
			$bookings = Booking::query();
			
			$bookings = $bookings->with('user'); 
			
			$itineraryOptions = ['Day Tour', 'Overnight', '2 Nights', '3 Nights', '4 Nights', '5+ Nights'];
			$itrsort = (int)$itrsort;
			if ($itrsort && isset($itineraryOptions[$itrsort - 1])) {
				$bookings = $bookings->where('itinerary', $itineraryOptions[$itrsort - 1]);
			}
			
			$statusMap = [
			1 => 'PRE-ARRIVAL',
			2 => 'ARRIVED',
			3 => 'RESCHEDULED',
			4 => 'CANCELLED',
			5 => 'DELINQUENT',
			];
			if ($stssort && isset($statusMap[$stssort])) {
				$bookings = $bookings->where('status', $statusMap[$stssort]);
			}
			
			$countries = [
			1 => 'PHILIPPINES',
			2 => 'MAUBAN',
			3 => 'INTERNATIONAL',
			];
			if ($contsort && isset($countries[$contsort])) {
				$bookings = $bookings->whereHas('user', function($query) use ($countries, $contsort) {
					$query->where('country', $countries[$contsort]);
				});
			}
			
			$sorters = [
			1 => 'id',
			2 => 'id',
			3 => 'totalvisitors',
			4 => 'totalvisitors',
			5 => 'accommodation',
			6 => 'accommodation',
			7 => 'parking',
			8 => 'parking',
			9 => 'boating',
			10 => 'boating',
			11 => 'travelmeans',
			12 => 'travelmeans',
			13 => 'purpose',
			14 => 'purpose',
			15 => 'arrival',
			16 => 'arrival',
			17 => 'status',
			];
			
			if ($sorter && isset($sorters[$sorter])) {
				$bookings = $bookings->orderBy($sorters[$sorter], $sorter % 2 == 0 ? 'desc' : 'asc');
			}
			
			if ($colorsort && $colorsort != '100') {
				$bookings = $bookings->where('color', $colorsort);
			}
			
			if ($datesort) {
				$bookings = $bookings->where('arrival', '>=', $datesort);
			}
			if ($datesortend) {
				$bookings = $bookings->where('arrival', '<=', $datesortend);
			}
			
			if ($searchTerm) {
				$bookings = $bookings->where(function ($query) use ($searchTerm) {
					$query->where('id', 'like', "%$searchTerm%")
					->orWhere('accommodation', 'like', "%$searchTerm%")
					->orWhere('parking', 'like', "%$searchTerm%")
					->orWhere('boating', 'like', "%$searchTerm%")
					->orWhere('travelmeans', 'like', "%$searchTerm%")
					->orWhere('purpose', 'like', "%$searchTerm%")
					
					->orWhereHas('user', function ($query) use ($searchTerm) {
						$query->where('name', 'like', "%$searchTerm%")
						->orWhere('lname', 'like', "%$searchTerm%")
						->orWhere('email', 'like', "%$searchTerm%");
					});
					
				});
			}
			
			$totalPages = ceil($bookings->count() / $perpage);
			
			$bookings = $bookings->skip(($cpage - 1) * $perpage)->take($perpage)->get();
			$bookpendcount = Booking::whereIn('status', ['PENDING', 'RESCHEDULED'])->count();
			$totalamount = Booking::where('status', '=', 'ARRIVED')->whereNotNull('namount')->sum('namount');
			
			$projectedamount = Booking::sum('namount');
			$currentBookings = $bookings->count();
			$displayedamount = $bookings->sum('namount');
			
			$seenPages = $perpage * $cpage;
			
			return response()->json([
			'filteredBookings' => $bookings,
			'dcolor' => $distinctColors,
			'totalPages' => $totalPages,
			'currentPage' => $cpage,
			'totalBookings' => $bookings->count(),
			'bookpendcount' => $bookpendcount,
			'unreadActivities' => $unreadActivities,
			'unreadNotifications' => $unreadNotifications,
			'unreadActivitiesCount' => $unreadActivitiesCount,
			'unreadNotificationsCount' => $unreadNotificationsCount,
			'accommodations' => $accommodations,
			'pendings' => $pendings,
			'arrivals' => $arrivals,
			'tarrivals' => $tarrivals,
			'totaldemo' => $totaldemo,
			'notdemo' => $notdemo,
			'accnames' => $accnames,
			'totalamount' => $totalamount,
			'sums' => $sums,
			'projectedamount' => $projectedamount,
			'displayedamount' => $displayedamount,
			'fullBookings' => $fullBookings,
			'seenPages' => $seenPages,
			'filters' => [
            'itinerary' => $itrsort,
            'status' => $stssort,
            'country' => $contsort,
            'sorter' => $sorter,
            'colorsort' => $colorsort,
            'datesort' => $datesort,
            'datesortend' => $datesortend,
            'searchTerm' => $searchTerm,
			],
			]);
		}
		
		public function booktablequery(Request $request) {
			$itrsort = $request->input('itrsort');
			$stssort = $request->input('stssort');
			$contsort = $request->input('contsort');
			$sorter = $request->input('sorter');
			$colorsort = $request->input('colorsort');
			$datesort = $request->input('datesort');
			$datesortend = $request->input('datesortend');
			$statsort = Carbon::parse($request->input('statsort'))->toDateString();
			$searchTerm = $request->input('searchTerm');
			$perpage = $request->input('perpage', 3);
			$cpage = $request->input('cpage', 1);
			
			$unreadActivities = DB::table('activities')->whereNull('read_at')->get();
			$unreadNotifications = DB::table('notifies')->whereNull('read_at')->get();
			
			$accommodations = Accommodation::select('name', 'capacity')->get()->toArray();			
			
			$fullBookings = Booking::count();
			$unreadActivitiesCount = $unreadActivities->count();
			$unreadNotificationsCount = $unreadNotifications->count();
			
			$distinctColors = Booking::select('color')->where('color', '!=', '')->distinct()->get()->toArray();
			
			$pendings = Booking::select('arrival', 'accommodation')
			->whereIn('status', ['PRE-ARRIVAL', 'RESCHEDULED'])
            ->whereDate('arrival', '=', $statsort)
            ->get()->toArray();
			
			$arrivals = Booking::select('arrival', 'accommodation', 'totalvisitors')
			->where('status', '=', 'ARRIVED')
            ->whereDate('arrival', '=', $statsort)
            ->get();
			
			$tarrivals = $arrivals->sum('totalvisitors');
			
			$bookings = Booking::query();
			
			$bookings = $bookings->with('user'); 
			
			$itineraryOptions = ['Day Tour', 'Overnight', '2 Nights', '3 Nights', '4 Nights', '5+ Nights'];
			$itrsort = (int)$itrsort;
			if ($itrsort && isset($itineraryOptions[$itrsort - 1])) {
				$bookings = $bookings->where('itinerary', $itineraryOptions[$itrsort - 1]);
			}
			
			$statusMap = [
			1 => 'PRE-ARRIVAL',
			2 => 'ARRIVED',
			3 => 'RESCHEDULED',
			4 => 'CANCELLED',
			5 => 'DELINQUENT',
			];
			if ($stssort && isset($statusMap[$stssort])) {
				$bookings = $bookings->where('status', $statusMap[$stssort]);
			}
			
			$countries = [
			1 => 'PHILIPPINES',
			2 => 'MAUBAN',
			3 => 'INTERNATIONAL',
			];
			if ($contsort && isset($countries[$contsort])) {
				$bookings = $bookings->whereHas('user', function($query) use ($countries, $contsort) {
					$query->where('country', $countries[$contsort]);
				});
			}
			
			$sorters = [
			1 => 'id',
			2 => 'id',
			3 => 'totalvisitors',
			4 => 'totalvisitors',
			5 => 'accommodation',
			6 => 'accommodation',
			7 => 'parking',
			8 => 'parking',
			9 => 'boating',
			10 => 'boating',
			11 => 'travelmeans',
			12 => 'travelmeans',
			13 => 'purpose',
			14 => 'purpose',
			15 => 'arrival',
			16 => 'arrival',
			17 => 'status',
			];
			
			if ($sorter && isset($sorters[$sorter])) {
				$bookings = $bookings->orderBy($sorters[$sorter], $sorter % 2 == 0 ? 'desc' : 'asc');
			}
			
			if ($colorsort && $colorsort != '100') {
				$bookings = $bookings->where('color', $colorsort);
			}
			
			if ($datesort) {
				$bookings = $bookings->where('arrival', '>=', $datesort);
			}
			if ($datesortend) {
				$bookings = $bookings->where('arrival', '<=', $datesortend);
			}
			
			if ($searchTerm) {
				$bookings = $bookings->where(function ($query) use ($searchTerm) {
					$query->where('id', 'like', "%$searchTerm%")
					->orWhere('accommodation', 'like', "%$searchTerm%")
					->orWhere('parking', 'like', "%$searchTerm%")
					->orWhere('boating', 'like', "%$searchTerm%")
					->orWhere('travelmeans', 'like', "%$searchTerm%")
					->orWhere('purpose', 'like', "%$searchTerm%")
					
					->orWhereHas('user', function ($query) use ($searchTerm) {
						$query->where('name', 'like', "%$searchTerm%")
						->orWhere('lname', 'like', "%$searchTerm%")
						->orWhere('email', 'like', "%$searchTerm%");
					});
					
				});
			}
			
			$totalPages = ceil($bookings->count() / $perpage);
			
			$bookings = $bookings->skip(($cpage - 1) * $perpage)->take($perpage)->get();
			$bookpendcount = Booking::whereIn('status', ['PRE-ARRIVAL', 'RESCHEDULED'])->count();
			$totalamount = Booking::where('status', '=', 'ARRIVED')->whereNotNull('namount')->sum('namount');
			
			$projectedamount = Booking::sum('namount');
			$currentBookings = $bookings->count();
			$displayedamount = $bookings->sum('namount');
			
			$seenPages = $perpage * $cpage;
			
			return response()->json([
			'filteredBookings' => $bookings,
			'dcolor' => $distinctColors,
			'totalPages' => $totalPages,
			'currentPage' => $cpage,
			'totalBookings' => $bookings->count(),
			'bookpendcount' => $bookpendcount,
			'unreadActivities' => $unreadActivities,
			'unreadNotifications' => $unreadNotifications,
			'unreadActivitiesCount' => $unreadActivitiesCount,
			'unreadNotificationsCount' => $unreadNotificationsCount,
			'accommodations' => $accommodations,
			'pendings' => $pendings,
			'arrivals' => $arrivals,
			'tarrivals' => $tarrivals,
			'totalamount' => $totalamount,
			'projectedamount' => $projectedamount,
			'displayedamount' => $displayedamount,
			'fullBookings' => $fullBookings,
			'seenPages' => $seenPages,
			'filters' => [
			'itinerary' => $itrsort,
			'status' => $stssort,
			'country' => $contsort,
			'sorter' => $sorter,
			'colorsort' => $colorsort,
			'datesort' => $datesort,
			'datesortend' => $datesortend,
			'searchTerm' => $searchTerm,
			],
			]);
		}
		
		public function loadquery() {
			
			
			
			return Blade::render('<x-bookreload />');
		}
		
		public function bookstatus(Request $request) {
		
			
					
					$booking = Booking::findOrFail($request->id);
					
			
					
					$user = User::findOrFail($booking->userid);
					
					
				
					
					
					$booking->status = $request->status;
					if($request->status == 'ARRIVED') {
						$booking->color = $request->color;
						} else {
						$booking->color = '';
					}
					
					$action = new Activity;
					$action->userid = $booking->userid;
					$action->bookid = $booking->id;
					
					
					switch ($request->status) {
						
						
						case 'CANCELLED':
						$action->updatemsg = $user->lname . "'s Booking # " . $booking->id . " Has Been Cancelled.";
						break;
						
						case 'PRE-ARRIVAL':
						$action->updatemsg = $user->lname . "'s Booking # " . $booking->id . " Has Been set for Pre-arrival.";
						break;
						
						case 'RESCHEDULED':
						$action->updatemsg = $user->lname . "'s Booking # " . $booking->id . " Has Been Rescheduled.";
						break;
						
						case 'ARRIVED':
						$action->updatemsg = $user->lname . "'s Booking # " . $booking->id . " Has Been Marked as Arrived.";
						break;
						
						
						case 'DELINQUENT':
						$action->updatemsg = $user->lname . "'s Booking # " . $booking->id . " Has been marked as Delinquent.";
						break;
						
						default:
						
						$action->updatemsg = $user->lname . "'s Booking # " . $booking->id . " status has been updated to an unknown state.";
						break;
					}
					
					
					$action->remark = $booking->remark;
					
					
					$action->save();
					
					
					$booking->save();
					
			
					
		
		}
		
		public function updatebook(Request $request) {
			
			DB::transaction(function () use ($request) {
				try {
					$booking = Booking::findOrFail($request->id);
					$booking->accommodation = $request->acc;
					$booking->arrival = $request->arrival;
					$booking->departure = $request->departure;
					$booking->itinerary = $request->itinerary;
					$booking->foreigners = $request->foreigners;
					$booking->filipinos = $request->filipinos;
					$booking->maubanins =  $request->maubanins;
					$booking->totalmale =  $request->male;
					$booking->totalfemale =  $request->female;
					$booking->totalvisitors =  $request->visitors;
					$booking->specialneeds =  $request->priority;
					$booking->zeroto7yold =  $request->zero7;
					$booking->thirteento50yold =  $request->thirth;
					$booking->above60yold =  $request->above60;
					$booking->travelmeans =  $request->tmeans;
					$booking->parking =  $request->parking;
					$booking->boating =  $request->boat;
					$booking->purpose = $request->purpose;
					$booking->status = $request->status;
					$booking->remark = $request->remark;
					$booking->save();
				}
				catch (\Exception $e) {
					
					DB::rollBack();
					
					
					\Log::error('Error updating booking status: ' . $e->getMessage());
					
					
					return redirect()->route('admin.dashboard')->with('error', 'An error occurred while updating the booking status.');
				}
				
			});
		}
		
		public function denybook(Request $request) {
			DB::transaction(function () use ($request) {
				
				$booking = Booking::findOrFail($request->id);
				$user = User::findOrFail($booking->userid);
				
				$action = new Activity;
				
				if ($booking) {
					
					$booking->status = 'DENIED';
					
					$booking->remark = $request->remark;
					
					$booking->save();
					
					$action->userid = $booking->userid;
					
					$action->bookid = $booking->id;
					
					$action->remark = $request->remark;
					
					$action->updatemsg = "We regret to inform you that Booking # " . $booking->id . " for " . $user->lname . " has been denied. We apologize for any inconvenience and are here to assist you if needed.";
					
				} else {}
				
			});
		}
		
		public function cancelbook(Request $request) {
			DB::transaction(function () use ($request) {
				
				$booking = Booking::findOrFail($request->id);
				$user = User::findOrFail($booking->userid);
				
				$action = new Activity;
				
				if ($booking) {
					
					$booking->status = 'CANCELLED';
					
					$booking->remark = $request->remark;
					
					$booking->color = '';
					
					$booking->save();
					
					$action->userid = $booking->userid;
					
					$action->bookid = $booking->id;
					
					$action->remark = $request->remark;
					
					$action->updatemsg = $user->lname . "'s Booking # " . $booking->id . " has been cancelled. We are sorry for the inconvenience. Please reach out if you need help or clarification.";
					
					$action->save();
					
				} else {}
				
			});
		}
		
		public function reschedbook(Request $request) {
			DB::transaction(function () use ($request) {
				$booking = Booking::findOrFail($request->id);
				$booking->arrival = $request->arrival;
				$booking->departure = $request->departure;
				$booking->itinerary = $request->itinerary;
				$booking->status = 'RESCHEDULED';
				$booking->remark = $request->remark;
				$booking->save();
			});
		}
		
		
		public function remarkbook(Request $request) {
			$action = new Activity;
			
			$booking = Booking::findOrFail($request->id);
			$user = User::findOrFail($booking->userid);
			
			$booking->status = $request->status;
			
			if($request->status == 'ARRIVED') {
				$booking->color = $request->color;
				} else {
				$booking->color = '';
			}
			
			$booking->remark = $request->remark;
			
			$action->userid = $booking->userid;
			$action->bookid = $booking->id;
			$action->remark = $booking->remark;
			$action->updatemsg = "A new remark has been added to " . $user->lname . "'s Booking # " . $booking->id . ". Review the updated remark for further action.";
			$action->save();
			
			$booking->save();
			
		}
		
		
		
		public function deletebook(Request $request) {
			DB::transaction(function () use ($request) {
				$booking = Booking::findOrFail($request->id);
				
				$notif = new Notify;
				
				if ($booking) {
					
					$booking->delete();
					
					
					$acc_path = public_path('images/proof/' . $booking->accproofimg);
					$park_path = public_path('images/proof/' . $booking->parkproofimg);
					$boat_path = public_path('images/proof/' . $booking->boatproofimg);
					
					
					if (File::exists($acc_path)) {
						File::delete($acc_path); 
					}
					
					if (File::exists($park_path)) {
						File::delete($park_path); 
					}
					
					if (File::exists($boat_path)) {
						File::delete($boat_path); 
					}
					
					$notif->userid = $booking->userid;
					
					$notif->bookid = $booking->id;
					
					$notif->msg = "Booking (#" . $booking->id . ") has been deleted as it violates our policies. If mistaken, contact +63-951-582-2030 for assistance.";
					
					$notif->save();
					
					} else {
					
				}
			});
			
		}
		
		public function adminbook(Request $request) {
			
			DB::transaction(function () use ($request) {
				$booking = new Booking;
				$booking->userid = $request->userid;
				$booking->accommodation = $request->acc;
				$booking->arrival = $request->arrival;
				$booking->departure = $request->departure;
				$booking->itinerary = $request->itinerary;
				$booking->foreigners = $request->foreigners;
				$booking->filipinos = $request->filipinos;
				$booking->maubanins =  $request->maubanins;
				$booking->totalmale =  $request->male;
				$booking->totalfemale =  $request->female;
				$booking->totalvisitors =  $request->visitors;
				$booking->specialneeds =  $request->priority;
				$booking->zeroto7yold =  $request->zero7;
				$booking->thirteento50yold =  $request->thirth;
				$booking->above60yold =  $request->above60;
				$booking->travelmeans =  $request->tmeans;
				$booking->parking =  $request->parking;
				$booking->boating =  $request->boat;
				$booking->purpose = $request->purpose;
				$booking->status =  $request->status;
				$booking->remark =  $request->remark;
				$booking->save();
			});
		}
		
		public function batchOp(Request $request)
		{
			$getid = $request->idarray;
			
			$idarray = json_decode($getid, true);
			
			if (json_last_error() !== JSON_ERROR_NONE) {
				throw new \Exception("Invalid ID array format.");
			}
			
			$idarray = array_map('trim', $idarray);
			
			if (empty($idarray)) {
				throw new \Exception("No valid IDs provided.");
			}
			
			DB::beginTransaction();
			
			try {
				
				$updateData = [
				'remark' => $request->remark,
				];
				
				
				if ($request->status !== 'DELETE') {
					
					if ($request->status === 'RESCHEDULED') {
						
						$updateData = array_merge($updateData, [
						'status' => $request->status,
						'arrival' => $request->arrival,
						'departure' => $request->departure,
						'color' => '', 
						]);
					} 
					elseif ($request->status === 'ARRIVED') {
						
						$updateData = array_merge($updateData, [
						'status' => $request->status,
						'color' => $request->color, 
						]);
					} 
					else {
						
						$updateData['status'] = $request->status;
						$updateData['color'] = ''; 
					}
					
					
					DB::table('bookings')
					->whereIn('id', $idarray)
					->update($updateData);
				} 
				else {
					
					DB::table('bookings')
					->whereIn('id', $idarray)
					->delete(); 
					
					
					foreach ($idarray as $id) {
						
						$delete = DB::table('bookings')->find($id);
						
						if ($delete) {
							
							$acc_path = public_path('images/proof/' . $delete->accproofimg);
							$park_path = public_path('images/proof/' . $delete->parkproofimg);
							$boat_path = public_path('images/proof/' . $delete->boatproofimg);
							
							
							if (File::exists($acc_path)) {
								File::delete($acc_path); 
							}
							
							if (File::exists($park_path)) {
								File::delete($park_path); 
							}
							
							if (File::exists($boat_path)) {
								File::delete($boat_path); 
							}
						}
					}
					
					
				}
				
				
				DB::commit();
				} catch (\Exception $e) {
				
				DB::rollBack();
				throw $e;
			}
		}
		
		public function usertablequery(Request $request) {
			$typesort = $request->input('typesort');
			$stssort = $request->input('stssort');
			$contsort = $request->input('contsort');
			$sorter = $request->input('sorter');
			$searchTerm = $request->input('searchTerm');
			$perpage = $request->input('perpage', 5);
			$cpage = $request->input('cpage', 1);
			
			$users = User::query();
			
			$statusMap = [
			1 => 'Unverified',
			2 => 'Verified',
			3 => 'Suspended',
			];
			
			if ($stssort && isset($statusMap[$stssort])) {
				$users = $users->where('status', $statusMap[$stssort]);
			}
			
			$typeMap = [
			1 => '1',
			2 => '797' || '979',
			];
			
			if ($typesort && isset($typeMap[$typesort])) {
				$users = $users->where('role_id', $typeMap[$typesort]);
			}
			
			$countries = [
			1 => 'PHILIPPINES',
			2 => 'MAUBAN',
			3 => 'INTERNATIONAL',
			];
			if ($contsort && isset($countries[$contsort])) {
				$users = $users->where('country', $countries[$contsort]);
			}
			
			$sorters = [
			1 => 'id',
			2 => 'id',
			3 => 'status',
			4 => 'status',
			5 => 'created_at',
			6 => 'created_at',
			];
			
			if ($sorter && isset($sorters[$sorter])) {
				$users = $users->orderBy($sorters[$sorter], $sorter % 2 == 0 ? 'desc' : 'asc');
			}
			
			
			
			if ($searchTerm) {
				$users = $users->where(function ($query) use ($searchTerm) {
					$query->where('id', 'like', "%$searchTerm%")
					->orWhere('name', 'like', "%$searchTerm%")
					->orWhere('lname', 'like', "%$searchTerm%")
					->orWhere('email', 'like', "%$searchTerm%")
					->orWhere('contactno', 'like', "%$searchTerm%")
					->orWhere('country', 'like', "%$searchTerm%")
					->orWhere('region', 'like', "%$searchTerm%");
				});
			}
			
			$totalPages = ceil($users->count() / $perpage);
			$users = $users->skip(($cpage - 1) * $perpage)->take($perpage)->get();
			
			return response()->json([
			'filteredUsers' => $users,
			'totalPages' => $totalPages,
			'currentPage' => $cpage,
			'totalUsers' => $users->count(),
			'filters' => [
			'role_id' => $typesort,
			'status' => $stssort,
			'country' => $contsort,
			'sorter' => $sorter,
			'searchTerm' => $searchTerm,
			],
			]);
		}
		
		public function updateuser(Request $request) {
			DB::transaction(function () use ($request) {
				try {
					$user = User::findOrFail($request->id);
					
					
					if ($request->has('name') && !empty($request->name)) {
						$user->name = $request->name;
					}
					
					if ($request->has('lname') && !empty($request->lname)) {
						$user->lname = $request->lname;
					}
					
					if ($request->has('bdate') && !empty($request->bdate)) {
						$user->bdate = $request->bdate;
					}
					
					if ($request->has('country') && !empty($request->country)) {
						$user->country = $request->country;
					}
					
					if ($request->has('region') && !empty($request->region)) {
						$user->region = $request->region;
					}
					
					if ($request->has('contactno') && !empty($request->contactno)) {
						$user->contactno = $request->contactno;
					}
					
					if ($request->has('gender') && !empty($request->gender)) {
						$user->gender = $request->gender;
					}
					
					if ($request->has('email') && !empty($request->email)) {
						$user->email = $request->email;
					}
					
					
					$user->save();
					
					
					$action = new Activity;
					$msg = $user->lname . "'s Account # " . $user->id . " Has been updated.";
					$action->userid = $user->id;
					$action->updatemsg = $msg;
					$action->remark = 'N/A';
					$action->save();
					
					} catch (\Exception $e) {
					
					DB::rollBack();
					\Log::error('Error updating user: ' . $e->getMessage());
				}
			});
		}
		
		
		public function deleteuser(Request $request) {
			DB::transaction(function () use ($request) {
				$user = User::findOrFail($request->id);
				
				$action = new Activity;
				
				if ($user) {
					$booking = Booking::where('userid', '=', $user->id);
					$booking->delete();
					
					$user->delete();
					
					$action->userid = $user->id;
					
					$action->bookid = null;
					
					$action->updatemsg = "User (#" . $user->id . ") has been deleted as it was found to be in violation of our policies. If you believe this was a mistake, contact +63-951-582-2030 for assistance.";
					
					$action->remark = $request->remark;
					
					$action->save();
					
					} else {
					
				}
			});
			
		}
		
		public function usertype(Request $request) {
			DB::transaction(function () use ($request) {
				try {
					$admins = User::where('role_id', '979')->get();
					
					$user = User::findOrFail($request->id);
					$user->role_id = $request->role_id;
					$user->save();
					
					$notif = new Notify;
					
					switch ($request->role_id) {
						
						case '1':
						$msg = $user->lname . "'s Account # " . $user->id . " Has been Changed to User .";
						break;
						
						case '797':
						$msg = $user->lname . "'s Account # " . $user->id . " Has been Changed to Admin.";
						break;
						
						case '979':
						$msg = $user->lname . "'s Account # " . $user->id . " Has Been Changed to Super Admin.";
						break;
						
						default:
						$msg = $user->lname . "'s Account # " . $user->id . " User Type has been updated to an unknown state.";
						break;
					}
					
					$notif->userid = $user->id;
					$notif->msg = $msg;
					$notif->remark = $request->remark;
					
					$notif->save();
					
					foreach ($admins as $admin) {
						$notif = new Notify;
						$notif->userid = $admin->id;
						$notif->adminid = Auth::id();
						$notif->bookid = null;
						$notif->msg = $msg;
						$notif->remark = $request->remark;
						$notif->save();
					}
					
					
					
					
					} catch (\Exception $e) {
					
					DB::rollBack();
					
					
					\Log::error('Error updating user type: ' . $e->getMessage());
					
					
					return redirect()->route('admin.dashboard')->with('error', 'An error occurred while updating the booking status.');
				}
			});
		}
		
		public function userstatus(Request $request) {
			DB::transaction(function () use ($request) {
				try {
					
					$user = User::findOrFail($request->id);
					
					if($request->status == "Verified") {
						$user->markEmailAsVerified();
						$user->status = "Verified";
						} else {
						$user->status = $request->status;
					}
					$user->save();
					
					$action = new Activity;
					$msg = $user->lname . "'s Account # " . $user->id . " Has been set to " . $request->status  . ".";
					$action->userid = $user->id;
					$action->updatemsg = $msg;
					$action->remark = 'N/A';
					
					$action->save();
					
					} catch (\Exception $e) {
					
					DB::rollBack();
					
					
					\Log::error('Error updating user type: ' . $e->getMessage());
					
				}
			});
		}
		
	}
