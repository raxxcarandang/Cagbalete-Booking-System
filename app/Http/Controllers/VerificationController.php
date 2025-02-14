<?php
	
	namespace App\Http\Controllers;
	
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Auth;
	use Illuminate\Auth\Events\Verified;
	
	class VerificationController extends Controller
	{
		/**
			* Handle the email verification and redirection.
			*
			* @param  Request  $request
			* @param  int  $id
			* @param  string  $hash
			* @return \Illuminate\Http\RedirectResponse
		*/
		public function verify($id, $hash)
		{
			
			$user = \App\Models\User::findOrFail($id);
			
			
			if (! hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
				return redirect('/');  
			}
			
			$user->status = "Verified";
			$user->markEmailAsVerified();
			$user->save();
			event(new Verified($user));
			
			return redirect()->route('index'); /
		}
	}
