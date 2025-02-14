@php
    use App\Models\Visit;
    use Illuminate\Support\Facades\Cookie;

    $cookieName = 'unique_visitor';
    $visit = Visit::find(1);

    if (!Cookie::has($cookieName)) {
        if ($visit) {
            $visit->totalwebvisitors += 1;
            $visit->save();
        }

        Cookie::queue($cookieName, true, 1440);
    }

    $visits = $visit ? $visit->totalwebvisitors : 0;
@endphp

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	<div class="container">
		
		<a class="navbar-brand" href="{{ url('/') }}"> <img src="/images/promo/macto.webp" alt="Mauban Tourism" style="width: 3rem; height: 3rem; display: inline-flex; margin-right: 0.5rem;"/> MAUBAN TOURISM </a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
		</button>
		<div class="collapse navbar-collapse" id="ftco-nav">
			@if (Route::has('login'))
	        <ul class="navbar-nav ml-auto"  
	        x-data="{
      guests: {{ $visits }},
      
      abbreviate(number) {
        if (number >= 1_000_000_000) {
          return (number / 1_000_000_000).toFixed(1) + 'B';
        } else if (number >= 1_000_000) {
          return (number / 1_000_000).toFixed(1) + 'M';
        } else if (number >= 1000) {
          return (number / 1000).toFixed(1) + 'K';
        }
        return number;
      }
    }">
	            
				@auth
				<li class="nav-item {{ Route::currentRouteName() == 'index' ? 'active' : ' '}}"><a href="{{ url('/') }}" class="nav-link">Home</a></li>
				<li class="nav-item  {{ Route::currentRouteName() == 'accommodation' ? 'active' : ' '}}"><a href="{{ url('/details') }}" class="nav-link">Accommodation</a></li>
				<li class="nav-item  {{ Route::currentRouteName() == 'bookingform' ? 'active' : ' '}}"><a href="{{ url('/booking') }}" class="nav-link">Booking</a></li>
				<li class="nav-item  {{ Route::currentRouteName() == 'about' ? 'active' : ' '}}"><a href="{{ url('/about') }}" class="nav-link">About</a></li>
                <li class="nav-item" :title="'Since 2025, Over ' + guests + ' Have Visited for the Cagbalete Experience – Book Now!'">
				     <span class="nav-link" x-html="abbreviate(guests) + ' <i class=\'ion-ios-people\'></i>'"></span>
                 </li>
				<li class="nav-item ">
					<div class="dropdown">
						<button class="btn btn-secondary dropdown-toggle" type="button" id="userdropdown" data-bs-toggle="dropdown" aria-expanded="false">
							<i class="ion-md-person"></i>
						</button>
						<ul class="dropdown-menu" aria-labelledby="userdropdown">
							<li><a href="{{ Auth::user()->role_id == 979 ? route('admin.dashboard') : (Auth::user()->role_id == 797 ? route('subadmin.dashboard') : route('user.dashboard')) }}" class="nav-link">Dashboard</a>
							</li>
							<li>
								<form method="POST" action="{{ route('logout') }}">
									@csrf
									<a href="{{ route('logout')}}" class="nav-link" style="margin-top: 0.9rem;" 
									onclick="event.preventDefault();
									this.closest('form').submit();">Log Out</a>
								</form></li>
						</ul>
					</div>
				</li>
				@else
				<li class="nav-item {{ Route::currentRouteName() == 'index' ? 'active' : ' '}}"><a href="{{ url('/') }}" class="nav-link">Home</a></li>
				<li class="nav-item {{ Route::currentRouteName() == 'accommodation' ? 'active' : ' '}} "><a href="{{ url('/details') }}" class="nav-link">Accommodation</a></li>
				<li class="nav-item {{ Route::currentRouteName() == 'about' ? 'active' : ' '}}"><a href="{{ url('/about') }}" class="nav-link">About</a></li>
				<li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Log in</a></li>
				@if (Route::has('register'))
				<li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li>
				<li class="nav-item" :title="'Since 2025, Over ' + guests + ' Have Visited for the Cagbalete Experience – Book Now!'">
				     <span class="nav-link" x-html="abbreviate(guests) + ' <i class=\'ion-ios-people\'></i>'"></span>
                 </li>
				<!--
				
				<li class="nav-item"><a href="https://forms.gle/v2VPGkiipMyyMs527" class="nav-link">Survey</a></li>
				
				-->
				
				@endif
				@endauth
				
			    
			</ul>
			@endif
		</div>
	</div>
	
</nav>