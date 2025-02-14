<x-guest-layout>
    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="text-sm text-gray-600 mb-4">
            {{ __('Please confirm your password before continuing.') }}
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" 
                type="password" 
                name="password" 
                required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-center mt-4">
            <x-primary-button class="w-full justify-center">
                {{ __('Confirm Password') }}
            </x-primary-button>
        </div>

        <div class="flex items-center justify-start mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" 
                   href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </div>
    </form>
</x-guest-layout>
