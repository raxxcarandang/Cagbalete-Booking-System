<aside id="sidebar">
    <div class="d-flex">
        <button class="toggle-btn" type="button">
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
                    <span class="notification-badge" x-show="bookpendcount != '' || bookpendcount == 0" x-text="bookpendcount"></span>
                </i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="{{route('admin.dashbook')}}" class="sidebar-link" id="btnbook">
                <i class="ion-ios-book">
                    <span class="notification-badge" x-show="bookpendcount > 0" x-text="bookpendcount"></span>
                </i>
                <span>Bookings</span>
            </a>
        </li>
		<!--
        <li class="sidebar-item">
            <a href="{{route('admin.dashuser')}}" class="sidebar-link" id="btnuser">
                <i class="ion-md-person">
                    <span class="notification-badge" x-show="newusercount > 0" x-text="newusercount"></span>
                </i>
                <span>Users</span>
            </a>
        </li>
		-->
        <li class="sidebar-item">
            <a href="{{route('admin.dashacc')}}" class="sidebar-link" id="btnacc">
                <i class="icon-beach_access">
                    <span class="notification-badge" x-show="newreqcount > 0" x-text="newreqcount"></span>
                </i>
                <span>Accommodation</span>
            </a>
        </li>
		<!--
        <li class="sidebar-item">
            <a href="{{route('admin.dashnotify')}}" class="sidebar-link" id="btnnofy">
                <i class="ion-ios-paper">
                    <span class="notification-badge" x-show="logCount > 0" x-text="logCount"></span>
                </i>
                <span>Notification</span>
            </a>
        </li>
		-->
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
