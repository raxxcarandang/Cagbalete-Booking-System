<?php
	
	namespace App\Http\Controllers;
	
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\DB;
	use App\Models\Accommodation;
	
	class AccommodationController extends Controller
	{
		public function changeaccdesc(Request $request) {
			DB::transaction(function () use ($request) {
				$acc = Accommodation::find($request->accid);
				
				$acc->name = $request->name;
				$acc->description = $request->description;
				$acc->type = $request->type;
				$acc->lodge = $request->lodge;
				$acc->address = $request->address;
				$acc->contactno = $request->contactno;
				
				$acc->save();
				
				return response()->json([
				'message' => 'Accommodation details updated successfully!',
				'data' => $acc, 
				], 200);
				
			});
		}
		
	}
