<?php
	
	namespace App\Http\Controllers;
	
	use Illuminate\Http\Request;
	use App\Models\User;
	use App\Models\Notify;
	use Carbon\Carbon;
	
	class NotificationController extends Controller
	{
		public function markAsRead(Notify $notification)
		{
			$notification->markAsRead();
			return response()->json(['status' => 'success']);
		}
		public function clearNotifications(Request $request)
		{
			
			$now = now();
			
			
			$updatedCount = Notify::where('created_at', '<', $now)
            ->whereNull('read_at')  
            ->update(['read_at' => $now]);  

			
			
			return response()->json([
			'message' => "{$updatedCount} notifications marked as read successfully"
			]);
		}
	}
