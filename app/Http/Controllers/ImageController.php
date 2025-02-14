<?php
	
	namespace App\Http\Controllers;
	
	use Illuminate\Http\Request;
	use Illuminate\View\View;
	use Illuminate\Support\Facades\DB;
	use Illuminate\Support\Facades\File;
	use Illuminate\Http\RedirectResponse;
	use App\Models\Accommodation;
	use App\Models\Image;
	
	
	
	class ImageController extends Controller
	{
		/**
			* Display a listing of the resource.
			*
			* @return \Illuminate\Http\Response
		*/
		
		public function accimg(Request $request){
			DB::transaction(function () use ($request) {
				
				$request->validate([
				'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:8192', 
				]);
				
				
				$imginc = DB::table('images')
				->where('accid', '=', $request->accid)
				->max('sequence');
				
				
				$imgadd = $imginc + 1;
				
				foreach ($request->file('images') as $image) {
					
					if ($image->isValid()) {
						
						while (DB::table('images')->where('accid', '=', $request->accid)->where('sequence', '=', $imgadd)->exists()) {
							$imgadd++;
						}
						
						
						$imageName = $request->accid . $imgadd . '.' . $image->extension();  
						
						
						$image->move(public_path('images/resort/supplier' . $request->accid . "/"), $imageName);
						
						
						$dbimage = new Image;
						$dbimage->accid = $request->accid;
						$dbimage->sequence = $imgadd;
						$dbimage->name = $imageName;
						$dbimage->uploaddate = $request->uploaddate;
						$dbimage->save();
						
						
						$imgadd++;
					}
				}
			});
			
		}
		
		public function delaccimg(Request $request){
			DB::transaction(function () use ($request) {
				$imageName = $request->name;  
				
				$img_path = public_path('images/resort/supplier' . $request->accid . '/' . $imageName);
				
				if(File::exists($img_path)) {
					File::delete($img_path);
				}
				
				Image::destroy($request->id);
				
				
				return $imageName;
			});
			
		}
		
		public function delallaccimg(Request $request){
			DB::transaction(function () use ($request) {
			
				$images = DB::table('images')->where('accid', '=', $request->accid);
				
				$img_path = public_path('images/resort/supplier' . $request->accid . '/');
				
				if(File::exists($img_path)) {
				File::cleanDirectory($img_path);
				}
				
				$images->destroy();
			});
			
		}
		
		 
		
		public function repaccimg(Request $request){
			DB::transaction(function () use ($request) {
				
				$imgname = $request->accid . $request->seqid . '.' . $request->image->extension();
				
				
				$targetDir = public_path('images/resort/supplier' . $request->accid . "/");
				
				
				if (!File::exists($targetDir)) {
					File::makeDirectory($targetDir, 0755, true);
				}
				
				
				$img_path = $targetDir . '/' . $imgname;
				
				
				if (File::exists($img_path)) {
					File::delete($img_path);
				}
				
				
				$request->image->move($targetDir, $imgname);
			});
			
		}
		
		public function thumbimg(Request $request){
			DB::transaction(function () use ($request) {
				$request->validate([
				'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:8192',
				]);
				
				$imageName = $request->accid . 't' . '.' . $request->image->extension();  
				
				$thumb_path = public_path('images/resort/thumbnail/' . $imageName);
				
				if(File::exists($thumb_path)) {
					File::delete($thumb_path);
				}
				
				$request->image->move(public_path('images/resort/thumbnail/'), $imageName);
				
				$dbthumb = Accommodation::find($request->accid);
				$dbthumb->thumbnail = $imageName;
				$dbthumb->save();
			});
		}
		
		public function headerimg(Request $request){
			DB::transaction(function () use ($request) {
				$request->validate([
				'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:8192',
				]);
				
				$imageName = $request->accid . 'h' . '.' . $request->image->extension(); 
				
				$slider_path = public_path('images/resort/header/' . $imageName);
				
				if(File::exists($slider_path)) {
					File::delete($slider_path);
				}
				
				$request->image->move(public_path('images/resort/header'), $imageName);
				
				$dbhead = Accommodation::find($request->accid);
				$dbhead->slider = $imageName;
				$dbhead->save();
			});
		}
	}
