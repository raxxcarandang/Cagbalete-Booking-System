<nav x-data="{ 
open: false, 
notificationsOpen: false, 
activitiesOpen: false, 

clearActivities() {
axios.post('/clear-activities', { 
_token: '{{ csrf_token() }}' 
}).then(response => {
this.unreadActivities = 0; 
this.activities = []; 
}).catch(error => {
console.error('Error clearing activities:', error);
});
},

clearNotifications() {
axios.post('/clear-notifications', { 
_token: '{{ csrf_token() }}' 
}).then(response => {
this.unreadNotifications = 0; 
this.notifications = []; 
}).catch(error => {
console.error('Error clearing notifications:', error);
});
}
}" class="bg-gray border-b border-gray-100" id="appnav">
	
    <div class="max-w-7xl mx-auto py-1 px-4 sm:px-6 lg:px-8">
        <div x-data="activityNotificationComponent()" class="flex justify-between items-center h-8">
            <div class="flex-grow"></div>
            <div class="flex items-center space-x-14 relative">
				
                <!-- Actions Button 
                <div class="relative">
                    <button @click="activitiesOpen = !activitiesOpen" class="text-gray-500 hover:text-gray-700">
                        <i class="ion-ios-alarm relative text-2xl"></i> Actions
                        
                            <span x-show="unreadActivitiesCount > 0" class="absolute top-0 right-0 text-xs font-bold text-red-500 bg-white rounded-full px-1" id="actcount" x-text="unreadActivitiesCount"></span>
						
					</button>
                    <div x-show="activitiesOpen" x-transition class="mt-2 w-96 bg-white shadow-lg rounded-md absolute left-1/2 transform -translate-x-1/2 z-10 max-h-60 overflow-y-auto">
                        <div class="table-responsive w-auto" style="width:100%; height:100%; margin-left: 1rem;">
                            <table class="table table-borderless text-center" id="table">
                                <tbody>
                                    <template x-for="(activity, index) in unreadActivities" :key="index">
                                        <tr :class="{
										'bg-info': activity.type === 'booking',
										'bg-success': activity.type === 'update',
										'bg-danger': activity.type === 'cancel',
										'bg-light': activity.type !== 'booking' && activity.type !== 'update' && activity.type !== 'cancel'
                                        }">
                                            <td x-text="formatDate(activity.created_at)"></td>
                                            <td x-text="activity.updatemsg"></td>
                                            <td x-text="activity.remark || 'No remark'"></td>
                                            
										</tr>
									</template>
                                    <tr x-show="unreadActivities.length === 0">
                                        <td colspan="4" class="text-center text-gray-400">No recent actions</td>
									</tr>
								</tbody>
							</table>
                            <button @click="clearActivities" class="w-full text-red-500 hover:text-red-700 mt-2 py-2 border-t border-gray-200">Clear Actions</button>
						</div>
					</div>
				</div>
				-->
				
                <!-- Notifications Button -->
                <div class="relative">
                    <button @click="notificationsOpen = !notificationsOpen" class="text-gray-500 hover:text-gray-700">
                        <i class="ion-ios-notifications relative text-2xl"></i> Notifications
                        <span x-show="unreadNotificationsCount > 0" class="absolute top-0 right-0 text-xs font-bold text-red-500 bg-white rounded-full px-1" id="notifcount">
                            <span x-text="unreadNotificationsCount"></span>
						</span>
					</button>
                    <div x-show="notificationsOpen" x-transition class="mt-2 w-96 bg-white shadow-lg rounded-md absolute left-1/2 transform -translate-x-1/2 z-10 max-h-60 overflow-y-auto">
                        <div class="table-responsive w-auto" style="width:100%; height:100%; margin-left: 1rem;">
                            <table class="table table-borderless text-center" id="table">
                                <tbody>
                                    <template x-for="(notification, index) in unreadNotifications" :key="index">
                                        <tr :class="{
										'bg-info': notification.type === 'booking',
										'bg-success': notification.type === 'update',
										'bg-danger': notification.type === 'cancel',
										'bg-light': notification.type !== 'booking' && notification.type !== 'update' && notification.type !== 'cancel'
                                        }">
                                            <td x-text="formatDate(notification.created_at)"></td>
                                            <td x-text="notification.msg"></td>
                                            <td x-text="notification.remark || 'No remark'"></td>
                                            
										</tr>
									</template>
                                    <tr x-show="unreadNotifications.length === 0">
                                        <td colspan="4" class="text-center text-gray-400">No recent notifications</td>
									</tr>
								</tbody>
							</table>
                            <button @click="clearNotifications" class="w-full text-red-500 hover:text-red-700 mt-2 py-2 border-t border-gray-200">Clear Notifications</button>
						</div>
					</div>
				</div>
				
                <!-- Settings Dropdown -->
                <div>
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
									</svg>
								</div>
							</button>
						</x-slot>
						
                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
							</x-dropdown-link>
                            <x-dropdown-link :href="route('index')">
                                {{ __('Go To Main Site') }}
							</x-dropdown-link>
                            
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link href="{{route('logout')}}"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
								</x-dropdown-link>
							</form>
						</x-slot>
					</x-dropdown>
				</div>
				
			</div>
		</div>
	</div>
</nav>