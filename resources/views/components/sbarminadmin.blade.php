<aside id="sidebar">
    <div class="d-flex"  x-data="{ margin: false }">
		
		
        <button class="toggle-btn" type="button">
            <img src="/images/promo/macto.webp" id="applogo"/>
		</button>
        <div class="sidebar-logo">
            <a href="{{url('/')}}">MACTO</a>
		</div>
	</div>
    <ul class="sidebar-nav">
        <li class="sidebar-item">
            <a href="{{route('subadmin.dashboard')}}" class="sidebar-link" id="btndash">
                <i class="ion-ios-clipboard">
					
				</i>
                <span>Dashboard</span>
			</a>
		</li>
        <li class="sidebar-item">
            <a href="{{route('subadmin.dashbooking')}}" class="sidebar-link" id="btnbook">
                <i class="ion-ios-book">
					<template x-if="bookpendcount > 0">
						<span class="notification-badge" x-text="bookpendcount"></span>
					</template>
				</i>
                <span>Bookings</span>
			</a>
		</li>
		
		<li class="sidebar-item">
			<a href="{{route('subadmin.dashreport')}}" class="sidebar-link" id="btnstat">
				<i class="ion-md-paper">
				</i>
				<span>Statistics</span>
			</a>
		</li>
		
		
	</ul>
    <div class="sidebar-footer">
        <li class="sidebar-item">
            <a href="{{url('/')}}" class="sidebar-link" id="btnweb">
                <i class="ion-ios-globe"></i>
                <span>Website</span>
			</a>
		</li>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
			<a class="sidebar-link" href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();" style="color: black;">
				<i class="ion-ios-log-out"></i>
				<span>Logout</span>
			</a>
		</form>
	</div>
</aside>
