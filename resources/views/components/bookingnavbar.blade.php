<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
			
	      <a class="navbar-brand" href="{{ url('/') }}"> <img src="/images/promo/macto.png" style="width: 3rem; height: 3rem; display: inline-flex; margin-right: 0.5rem;"/> MAUBAN TOURISM </a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
		  <div class="navbar-collapse" id="ftco-nav">
			  @if (Route::has('login'))
	        <ul class="navbar-nav ml-auto">
                                @auth
								<li class="nav-item active"><a href="#parking" class="nav-link">Parking</a></li>
	          					<li class="nav-item"><a href="#boat" class="nav-link">Boat</a></li>
								<li class="nav-item"><a href="#accommodation" class="nav-link">Accommodation</a></li>
	          					<li class="nav-item"><a href="#visitor" class="nav-link">Visitor Type</a></li>
								<li class="nav-item"><a href="#summary" class="nav-link">Summary</a></li>
                                @else
								<li class="nav-item active"><a href="{{ url('/') }}" class="nav-link">Home</a></li>
	          					<li class="nav-item"><a href="{{ url('/details') }}" class="nav-link">Accommodation</a></li>
								<li class="nav-item"><a href="{{ url('/contact') }}" class="nav-link">Contact</a></li>
	          					<li class="nav-item"><a href="{{ url('/about') }}" class="nav-link">About</a></li>
								<li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Log in</a></li>
                                    @if (Route::has('register'))
								<li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                                    @endif
                                @endauth
			</ul>
                        @endif
	      </div>
	    </div>

</nav>