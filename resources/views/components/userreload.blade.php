@php

use App\Models\Booking;
use App\Models\Notification;
use App\Models\Activity;
use App\Models\Notify;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

$notifications = Notify::where('userid', '=', Auth::id())->get(); 

$unreadNotifications = $notifications->whereNull('read_at');  

$activities = Activity::where('userid', '=', Auth::id())->get();  
$unreadActivities = $activities->whereNull('read_at');  


$currentBookings = DB::table('bookings')
    ->where('userid', '=', Auth::id())
    ->where('departure', '>=', Carbon::today())
    ->where('status', '!=', 'DENIED')
    ->where('status', '!=', 'CANCELLED')
	->where('status', '!=', 'DELINQUENT')
    ->get();

$currentBookingIds = $currentBookings->pluck('id')->toArray();

$currentActivities = $activities->whereIn('bookid', $currentBookingIds);


$pastBookings = DB::table('bookings')
    ->where('userid', '=', Auth::id())
    ->whereNotIn('status', ['PRE-ARRIVAL', 'RESCHEDULED'])
    ->get();


$user = DB::table('users')
->where('id', '=', Auth::id())
->get();
@endphp
<div 

x-data = "{

}"

x-init="

bookings = {};

bookings = {{$pastBookings}};
currentBookings = {{$currentBookings}};
user = {{$user}};
activities = {{$activities}};
cactivities = {{$currentActivities}};
notifications = {{$notifications}};
unreadActivities =  {{$unreadActivities}};
unreadNotifications = {{$notifications}};
unreadActivitiesCount =  {{$unreadActivities->count()}};
unreadNotificationsCount = {{$notifications->count()}};
$dispatch('bookload');

">
</div>