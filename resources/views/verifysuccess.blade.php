<x-guest-layout>
   
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('Your email has been successfully verified! You can now book with your account.') }}
        </div>
  

    <div class="mt-4 flex items-center justify-between">
     
           

            <div>
			<a href="{{url('/')}}">
                <x-primary-button>
                    {{ __('Go Back to Main Site') }}
                </x-primary-button>
				</a>
            </div>
      

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>
