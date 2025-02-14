<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
	
    <form method="POST" action="{{ route('login') }}">
        @csrf
		
        <!-- Email Address -->
		<div x-data="{ email: '', suffix: '', customSuffix: '' }">
			<x-input-label for="email" :value="__('Email')" />
			<div class="flex">
				<!-- Email Input -->
				<x-text-input id="email" x-model="email" class="block mt-1 w-full pr-16" type="email" name="email" :value="old('email')" required autofocus autocomplete="email" />
				
			</div>
			
			<x-input-error :messages="$errors->get('email')" class="mt-2" />
		</div>
		
        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
			
            <x-text-input id="password" class="block mt-1 w-full"
			type="password"
			name="password"
			required autocomplete="current-password" />
			
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
		</div>
		
		<div class="flex items-center justify-center mt-4">
			<x-primary-button class="w-full justify-center" style="width: 100%;">
				{{ __('Log in') }}
			</x-primary-button>
		</div>
		<div class="flex items-center justify-center mt-4">
			<label for="remember_me" class="inline-flex items-center">
				<input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
				<span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
			</label>
			
		</div>
		
        <div class="flex items-center justify-start mt-4">
			@if (Route::has('password.request'))
			<a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
				{{ __('Forgot password?') }}
			</a>
            @endif
			
			
			
		</div>
		<div class="flex items-center justify-start mt-4">
			<a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('register') }}">
				{{ __('Don\'t have an account?') }}
			</a>
		</div>
	</form>
</x-guest-layout>


