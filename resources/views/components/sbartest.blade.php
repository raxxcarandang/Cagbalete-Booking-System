<aside id="sidebar">
    <div class="d-flex"  x-data="{ margin: false }">
		
		
        <button class="toggle-btn" 
		type="button">
            <img src="/images/promo/macto.png" id="applogo"/>
		</button>
        <div class="sidebar-logo">
            <a href="{{url('/')}}">MACTO</a>
		</div>
	</div>
    <ul class="sidebar-nav">
        <li class="sidebar-item">
            <a href="{{route('admin.dashboard')}}" class="sidebar-link" id="btndash">
                <i class="ion-ios-clipboard">
                    <span class="notification-badge" x-show="bookpendcount != '' && bookpendcount > 0" x-text="bookpendcount"></span>
				</i>
                <span>Dashboard</span>
			</a>
		</li>
        <li class="sidebar-item">
            <a href="{{route('admin.dashbook')}}" class="sidebar-link" id="btnbook">
                <i class="ion-ios-book">
                    <span class="notification-badge" x-show="bookpendcount != '' && bookpendcount > 0" x-text="bookpendcount"></span>
				</i>
                <span>Bookings</span>
			</a>
		</li>
		
        <li class="sidebar-item">
            <a href="{{route('admin.dashuser')}}" class="sidebar-link" id="btnuser">
                <i class="ion-md-person">
					
				</i>
                <span>Users</span>
			</a>
		</li>
		
		<li class="sidebar-item">
            <a href="{{route('admin.dashacc')}}" class="sidebar-link" id="btnacc">
                <i class="icon-beach_access">
				</i>
                <span>Accommodation</span>
			</a>
		</li>
		
		<li class="sidebar-item">
			<a href="{{route('admin.dashstat')}}" class="sidebar-link" id="btnstat">
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
				