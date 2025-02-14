<?php
	
	use App\Http\Controllers\ProfileController;
	use App\Http\Controllers\BookingController;
	use App\Http\Controllers\UserBookingController;
	use App\Http\Controllers\ImageController;
	use App\Http\Controllers\AccommodationController;
	use App\Http\Controllers\LandingController;
	use App\Http\Controllers\Role\UserController;
	use App\Http\Controllers\Role\OwnerController;
	use App\Http\Controllers\Role\AdminController;
	use App\Http\Controllers\ActivityController;
	use App\Http\Controllers\ReportsController;
	use App\Http\Controllers\NotificationController;
	use Illuminate\Support\Facades\Route;
	use Illuminate\Support\Facades\DB;
	use Illuminate\Support\Facades\Auth;
	use Illuminate\Auth\Notifications\VerifyEmail;
	use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
	use App\Models\Booking;
	use App\Models\Report;
	use App\Models\Accommodation;
	use App\Models\User;
	use App\Models\Image;
	use App\Models\Activity;
	use App\Models\Notification;
	
	Auth::routes(['verify' => true]);
	
	Route::get('/', [LandingController::class, 'index'])->name('index');
	
	Route::get('/details', [LandingController::class, 'details'])->name('accommodation');
	
	Route::get('/accommodation', [LandingController::class, 'accommodation'])->name('supplier');
	
	Route::get('/booking', [LandingController::class, 'booking'])->middleware(['auth', 'verified'])->name('bookingform');
	
	Route::get('/about', [LandingController::class, 'about'])->name('about');
	
	Route::get('/contact', function () {
		return view('contact');
	})->name('contact');
	
	Route::middleware(['auth', 'adminMidware'])->group(function() {
		Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
		Route::get('/admin/dashboard/bookings', [AdminController::class, 'dashbook'])->name('admin.dashbook');
		Route::get('/admin/dashboard/users', [AdminController::class, 'dashuser'])->name('admin.dashuser');
		Route::get('/admin/dashboard/accommodations', [AdminController::class, 'dashacc'])->name('admin.dashacc');
		Route::get('/admin/dashboard/notifications', [AdminController::class, 'dashnotify'])->name('admin.dashnotify');
		Route::get('/admin/dashboard/statistics', [AdminController::class, 'dashstat'])->name('admin.dashstat');
	});
	
	Route::middleware(['auth', 'ownerMidware'])->group(function() {
		Route::get('/subadmin/dashboard', [OwnerController::class, 'index'])->middleware(['auth', 'verified'])->name('subadmin.dashboard');
		Route::get('/subadmin/dashboard/bookings', [OwnerController::class, 'bookings'])->middleware(['auth', 'verified'])->name('subadmin.dashbooking');
		Route::get('/subadmin/dashboard/statistics', [OwnerController::class, 'stats'])->middleware(['auth', 'verified'])->name('subadmin.dashreport');
	});
	
	Route::middleware(['auth', 'userMidware'])->group(function() {
		Route::get('/dashboard', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('user.dashboard');
		Route::get('/dashboard/bookings', [UserController::class, 'dashbook'])->middleware(['auth', 'verified'])->name('user.dashbook');
		Route::get('/dashboard/logs', [UserController::class, 'dashnotify'])->middleware(['auth', 'verified'])->name('user.dashnotify');
	});
	
	//User Booking Action Routes
	Route::post('/book', [UserBookingController::class, 'bookuser'])->name('bookuser');
	Route::post('/cancelbooking', [UserBookingController::class, 'cancelbook'])->name('cancelbooking');
	Route::post('/confirmbooking', [UserBookingController::class, 'confirmbook'])->name('confirmbooking');
	Route::post('/loaduserinfo', [UserBookingController::class, 'loaduserquery'])->name('loaduser');
	Route::post('/rescheduserbook', [UserBookingController::class, 'reschedbook'])->name('rescheduser');
	Route::post('/recountguest', [UserBookingController::class, 'recountBook'])->name('updatebooktally');
	
	//Admin Booking Action Routes
	Route::post('/admin/dashboard/adminbook', [BookingController::class, 'adminbook'])->name('adminbook');
	Route::post('/admin/dashboard/updatebook', [BookingController::class, 'updatebook'])->name('updatebook');
	Route::post('/admin/dashboard/loadbook', [BookingController::class, 'loadquery'])->name('loadbook');
	Route::post('/admin/dashboard/bookingstatus', [BookingController::class, 'bookstatus'])->name('bookingstatus');
	Route::post('/admin/dashboard/batchstatus', [BookingController::class, 'batchOp'])->name('batchstatus');
	Route::post('/admin/dashboard/admincancelbooking', [BookingController::class, 'cancelbook'])->name('admincancelbooking');
	Route::post('/admin/dashboard/denybooking', [BookingController::class, 'denybook'])->name('denybooking');
	Route::post('/admin/dashboard/reschedbooking', [BookingController::class, 'reschedbook'])->name('reschedbooking');
	Route::post('/admin/dashboard/remarkbooking', [BookingController::class, 'remarkbook'])->name('remarkbooking');
	Route::post('/admin/dashboard/deletebooking', [BookingController::class, 'deletebook'])->name('deletebooking');
	Route::post('/admin/dashboard/exportbooking', [BookingController::class, 'export'])->name('exportbooking');
	
	Route::get('/admin/profile', [ProfileController::class, 'adminedit'])->name('adminprofile.edit');
	Route::patch('/admin/profile', [ProfileController::class, 'adminupdate'])->name('adminprofile.update');
	
	Route::post('/admin/dashboard/changeusertype', [BookingController::class, 'usertype'])->name('changeusertype');
	Route::post('/admin/dashboard/userstatus', [BookingController::class, 'userstatus'])->name('userstatus');
	Route::post('/admin/dashboard/deleteuser', [BookingController::class, 'deleteuser'])->name('deleteuser');
	Route::post('/admin/dashboard/updateuser', [BookingController::class, 'updateuser'])->name('updateuser');
	
	Route::get('/admin/dashboard/reportbooking', [ReportsController::class, 'aggregateReports'])->name('reportbooking');
	Route::get('/admin/dashboard/loadbookingperformance', [BookingController::class, 'chart'])->name('loadbookchart');
	Route::get('/admin/dashboard/bookingquery', [BookingController::class, 'booktablequery'])->name('bookingquery');
	Route::get('/admin/dashboard/bookingstatquery', [BookingController::class, 'booktablestatquery'])->name('bookingstatquery');
	Route::get('/admin/dashboard/userquery', [BookingController::class, 'usertablequery'])->name('userquery');
	
	//Admin Image Action Routes
	Route::post('/admin/dashboard/uploadimage', [ImageController::class, 'accimg'])->name('uploadimage');
	Route::post('/admin/dashboard/deleteaccimage', [ImageController::class, 'delaccimg'])->name('deleteaccimg');
	Route::post('/admin/dashboard/replaceaccimage', [ImageController::class, 'repaccimg'])->name('replaceaccimg');
	Route::post('/admin/dashboard/uploadthumbnail', [ImageController::class, 'thumbimg'])->name('uploadthumbnail');
	Route::post('/admin/dashboard/uploadheader', [ImageController::class, 'headerimg'])->name('uploadheader');
	
	//Admin Accommodation Action Routes
	Route::post('/admin/dashboard/changeaccdesc', [AccommodationController::class, 'changeaccdesc'])->name('changedesc');
	Route::post('/admin/dashboard/loadacc', [AccommodationController::class, 'loadacc'])->name('loadacclist');
	
	
	// Notification Route
	Route::post('/notifications/{notification}/read', [NotificationController::class, 'markAsRead'])->name('notifications.read');
	Route::post('/clear-notifications', [NotificationController::class, 'clearNotifications'])->name('notifications.clear');
	
	// Activity Route
	Route::post('/activities/{activity}/read', [ActivityController::class, 'markAsRead'])->name('activities.read');
	Route::post('/clear-activities', [ActivityController::class, 'clearActivities'])->name('activities.clear');
	
	Route::middleware('auth')->group(function () {
		Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
		Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
		Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
	});
	
	
	Route::get('/email/verify', function () {
		return view('auth.verify');
	})->middleware('auth')->name('verification.notice');
	
	Route::get('/email/verify/{id}/{hash}', function ($id, $hash) {
	})->middleware(['auth', 'signed'])->name('verification.verify');
	
	Route::get('/verified', function () {
		return view('verifysuccess');
	})->name('dashboard');
	
	Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});


Route::middleware('guest')->group(function () {

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
	
});
	

