<?php
	
	namespace App\Http\Controllers\Auth;
	
	use App\Http\Controllers\Controller;
	use App\Models\User;
	use Illuminate\Foundation\Auth\RegistersUsers;
	use Illuminate\Support\Facades\Hash;
	use Illuminate\Support\Facades\Validator;
	
	class RegisterController extends Controller
	{
		/*
			|--------------------------------------------------------------------------
			| Register Controller
			|--------------------------------------------------------------------------
			|
			| This controller handles the registration of new users as well as their
			| validation and creation. By default this controller uses a trait to
			| provide this functionality without requiring any additional code.
			|
		*/
		
		use RegistersUsers;
		
		/**
			* Where to redirect users after registration.
			*
			* @var string
		*/
		protected $redirectTo = '/verify-email';
		
		/**
			* Create a new controller instance.
			*
			* @return void
		*/
		public function __construct()
		{
			//$this->middleware('guest');
		}
		
		/**
			* Get a validator for an incoming registration request.
			*
			* @param  array  $data
			* @return \Illuminate\Contracts\Validation\Validator
		*/
		
		// check disposable email
		function isDisposableEmail($email, $blocklist_path = null) {
			if (!$blocklist_path) {
				$blocklist_path = public_path('disposable_email_blocklist.conf');
			}
			
			$disposable_domains = file($blocklist_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
			$domain = mb_strtolower(explode('@', trim($email))[1]);
			
			return in_array($domain, $disposable_domains);
		}
		
		protected function validator(array $data)
		{
			
			Validator::extend('disposable_email', function ($attribute, $value, $parameters, $validator) {
				return !$this->isDisposableEmail($value); 
			});
			
			
			return Validator::make($data, [
			'name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s\'-]+$/'],
			'mname' => ['required', 'string', 'max:255'],
			'lname' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s\'-]+$/'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:users', 'disposable_email'],
			'password' => ['required', 'string', 'min:8', 'confirmed'],
			
			'contactno' => [
            'required',
            'regex:/^\+(\d{1,3})\d{7,15}$/',
			],
			
			'country' => [
            'required', 
            'string', 
            'max:255',
			],
			
			'region' => [
            'required',
            'string',
            'max:255',
			],
			
			'bdate' => [
            'required',
            'date',
            'before_or_equal:' . \Carbon\Carbon::now()->subYears(13)->toDateString(),
            'after_or_equal:' . \Carbon\Carbon::now()->subYears(122)->toDateString(),
			],
			
			'gender' => [
            'required',
			],
			], [
			'name.required' => 'First name is required.',
			'name.string' => 'First name must be a valid string.',
			'name.max' => 'First name must not exceed 255 characters.',
			'name.regex' => 'First name must only contain letters, spaces, apostrophes, and hyphens.',
			
			'mname.required' => 'Middle Initial is required.',
			
			'email.required' => 'Email is required.',
			'email.email' => 'Email must be a valid email address.',
			'email.max' => 'Email must not exceed 255 characters.',
			'email.unique' => 'This email address is already in use.',
			'email.disposable_email' => 'Disposable email addresses are not allowed.', 
			
			'password.required' => 'Password is required.',
			'password.string' => 'Password must be a valid string.',
			'password.min' => 'Password must be at least 8 characters long.',
			'password.confirmed' => 'Password confirmation does not match.',
			
			'contactno.required' => 'Contact number is required.',
			'contactno.regex' => 'Contact number must be a valid local/international phone number.',
			
			'country.required' => 'Country is required.',
			'country.string' => 'Country must be a valid string.',
			'country.max' => 'Country name must not exceed 255 characters.',
			
			'region.required' => 'Region is required.',
			'region.string' => 'Region must be a valid string.',
			'region.max' => 'Region name must not exceed 255 characters.',
			
			'bdate.required' => 'Date of birth is required.',
			'bdate.date' => 'Please provide a valid date of birth.',
			'bdate.before_or_equal' => 'You must be at least 13 years old.',
			'bdate.after_or_equal' => 'Your date of birth cannot be earlier than 122 years ago.',
			
			'lname.required' => 'Last name is required.',
			'lname.string' => 'Last name must be a valid string.',
			'lname.max' => 'Last name must not exceed 255 characters.',
			'lname.regex' => 'Last name must only contain letters, spaces, apostrophes, and hyphens.',
			
			'gender.required' => 'Gender is required.',
			]);
		}
		
		
		
		/**
			* Create a new user instance after a valid registration.
			*
			* @param  array  $data
			* @return \App\Models\User
		*/
		protected function create(array $data)
		{
			return User::create([
            'name' => $data['name'],
			'mname' => $data['mname'],
			'lname' => $data['lname'],
			'gender' => $data['gender'],
			'bdate' => $data['bdate'],
			'contactno' => $data['contactno'],
			'country' => $data['country'],
			'region' => $data['region'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
			
			]);
		}
	}
