<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;


class ActivityController extends Controller
{
 
    public function markAsRead(Activity $activity)
{
    $now = now();  

    if ($activity) {
     
        $activity->read_at = $now;
        $activity->save();


        return response()->json(['status' => 'success']);
    } else {
      
        return response()->json(['status' => 'error', 'message' => 'Activity not found']);
    }
}


    public function clearActivities(Request $request)
    {
       
        $now = now();

        
        $updatedCount = Activity::where('created_at', '<', $now)
            ->whereNull('read_at')  
            ->update(['read_at' => $now]);  

       
        return response()->json([
            'message' => "{$updatedCount} activities marked as read successfully"
        ]);
    }
}
