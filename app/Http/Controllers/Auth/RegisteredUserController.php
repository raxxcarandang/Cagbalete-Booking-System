<?php
	
	namespace App\Http\Controllers\Auth;
	
	use App\Http\Controllers\Controller;
	use App\Models\User;
	use Illuminate\Auth\Events\Registered;
	use Illuminate\Http\RedirectResponse;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Auth;
	use Illuminate\Support\Facades\Hash;
	use Illuminate\Validation\Rules;
	use Illuminate\View\View;
	
	class RegisteredUserController extends Controller
	{
		/**
			* Display the registration view.
		*/
		public function create(): View
		{
			return view('auth.register');
		}
		
		/**
			* Handle an incoming registration request.
			*
			* @throws \Illuminate\Validation\ValidationException
		*/
		public function store(Request $request): RedirectResponse
		{
			$request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
			'mname' => ['required', 'string', 'max:255'],
            'lname'  => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'bdate' => ['required', 'date', 'max:255'],
            'contactno' => ['required', 'string', 'max:11'],
            'country' => ['required', 'string', 'max:50'],
            'region' => ['required', 'string', 'max:50'],
			]);
			
			$user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
			'mname' => $request->mname,
            'lname'  => $request->lname,
            'gender' => $request->gender,
            'bdate' => $request->bdate,
            'contactno' => $request->contactno,
            'country' => $request->country,
            'region' => $request->region,
			]);
			
			event(new Registered($user));
			
			$user->sendEmailVerificationNotification();
			
			return redirect()->route('verification.notice');
		}
	}
