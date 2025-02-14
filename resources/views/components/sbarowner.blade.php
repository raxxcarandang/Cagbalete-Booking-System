<aside id="sidebar">
	<div class="d-flex">
		<button class="toggle-btn" type="button">
			<img src="/images/promo/macto.png" id = "applogo"/>
		</button>
		<div class="sidebar-logo">
			<a href="{{url('/')}}">MACTO</a>
		</div>
		
	</div>
	<ul class="sidebar-nav">
		<li class="sidebar-item">
			<a href="{{route('profile.edit')}}" class="sidebar-link" id = "btnprof">
				@if (isset($userimg))
				<img class="rounded-circle" src="/images/user/<?php if(!empty ($userimg)){echo $userimg;} ?>" alt="" style = "height:40px; min-width:40px; margin-left: -0.47rem; display: inline-flex;"/>
				<span>&nbsp;User Proflie</span>
				
				@else
				<i class="ion-md-person"></i><span>&nbsp;User Proflie</span>
				@endif
			</a>
		</li>
		<li class="sidebar-item">
			<a href="{{route('owner.dashboard')}}" class="sidebar-link" id = "btndash">
				<i class="ion-ios-clipboard"></i>
				<span>Dashboard</span>
			</a>
		</li>
		
		<li class="sidebar-item">
			<a href="{{route('owner.dashacc')}}" class="sidebar-link" id = "btnacc" >
				<i class="icon-beach_access"></i>
				<span>Accommodation</span>
			</a>
		</li>
		
	</ul>
	<div class="sidebar-footer">
		<ul class="sidebar-nav">
			<li class="sidebar-item">
				<a href="{{url('/')}}" class="sidebar-link" id = "btnweb" >
					<i class="ion-ios-globe"></i>
					<span>Website</span>
				</a>
			</li>
			<li class="sidebar-item">
				<form method="POST" action="{{ route('logout') }}">
					@csrf
					<a class="sidebar-link" href="{{route('logout')}}"
					onclick="event.preventDefault();
					this.closest('form').submit();" style="color: black;">
						<i class="ion-ios-log-out"></i>
						<span>Logout</span>
					</a>
				</form>
			</li>
		</ul>
	</div>
</aside>