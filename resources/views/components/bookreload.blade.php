@php

use App\Models\Booking;
use App\Models\Accommodation;
use App\Models\User;
use App\Models\Image;
use App\Models\Activity;
use App\Models\Notify;
use App\Models\Report;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\DB;


$bookpendcount = Booking::where('status', 'PENDING')->count();
$newusercount = User::where('created_at', '>=', now()->subDay())->count();


$distinctColors = Booking::select('color')->where('color', '!=', '')->distinct()->get();

$users = collect();
$bookings = collect();
$accommodations = collect();
$images = collect();
$activities = collect();
$notifications = collect();
$reports = Report::select('report_date')->where('report_date', '!=', '')->distinct()->get();

/*
$jusers = $users->toJson();
$jbookings = $bookings->toJson();
$jaccommodations = $accommodations->toJson();
$jimages = $images->toJson();
$jnotifications = $notifications->toJson();
$jactivities = $activities->toJson();
$jreports = $reports->toJson();


$allreports = Report::chunk(1000, function($getreports) use ($reports) {
foreach($getreports as $getreport) {
$reports->push($getreport);
}
});
*/

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

@endphp
<div 

x-data = "{

}"
x-init="


bookpendcount = {{$bookpendcount}};
newusercount = {{$newusercount}};
reports = {{$reports}};
colors = {{$distinctColors}};
users = {{$users}};
accommodations = {{$accommodations}};
bookings = {{$bookings}};
images = {{$images}};
allactivities = {{$activities}};
activities = {{$unreadActivities}};
notifications = {{$notifications}};
unreadActivities =  {{$unreadActivities}};
unreadNotifications = {{$unreadNotifications}};
unreadActivitiesCount =  {{$unreadActivities->count()}};
unreadNotificationsCount = {{$unreadNotifications->count()}};
logCount = unreadActivitiesCount + unreadNotificationsCount;
$dispatch('bookload');

">
</div>