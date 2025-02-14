<aside id="sidebar">
	<div class="d-flex">
		<button class="toggle-btn" type="button">
			<img src="/images/promo/macto.webp" id = "applogo"/>
		</button>
		<div class="sidebar-logo">
			<a href="{{url('/')}}">MACTO</a>
		</div>
		
	</div>
	<ul class="sidebar-nav">
		<li class="sidebar-item">
			<a href="{{route('profile.edit')}}" class="sidebar-link" id = "btnprof">
				<i class="ion-md-person"></i><span>&nbsp;User Proflie</span>
			</a>
		</li>
		<li class="sidebar-item">
			<a href="{{route('user.dashboard')}}" class="sidebar-link" id = "btndash">
				<i class="ion-ios-clipboard"></i>
				<span>Dashboard</span>
			</a>
		</li>
		
		<li class="sidebar-item">
			<a href="{{route('user.dashbook')}}" class="sidebar-link" id = "btnbook" >
				<i class="ion-ios-book"></i>
				<span>Bookings</span>
			</a>
		</li>
		
	</ul>
	<div class="sidebar-footer">
		<li class="sidebar-item">
			<a href="{{url('/')}}" class="sidebar-link" id = "btnweb" >
				<i class="ion-ios-globe"></i>
				<span>Website</span>
			</a>
		</li>
		<form method="POST" action="{{ route('logout') }}">
			@csrf
			<a class="sidebar-link" href="{{route('logout')}}"
			onclick="event.preventDefault();
			this.closest('form').submit();" style="color: black;">
				<i class="ion-ios-log-out"></i>
				<span>Logout</span>
			</a>
		</form>
	</div>
</aside>