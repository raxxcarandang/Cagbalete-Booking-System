
<x-app-layout>
	@vite(['resources/js/admin.js'])
    <x-slot name="header">
        <!--
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
		</h2> -->
		
		<div class="wrapper"
		x-data = "{
		
		bookid: '',
		users: {},
		user: {},
		accommodations: {},
		booking: {},
		bookings: {},
		currentBookings: {},
		
		allactivities: {},
		cactivities: {},
		activities: {},
		notifications: {},
		
		unreadNotifications: '',
		unreadActivities: '',
		unreadNotificationsCount: '',
		unreadActivitiesCount: '',
		newusercount: '',
		newreqcount: '',
		bookpendcount: '',
		logCount: '',
		
		showbook: false,
		hidebook: false,
		
		perpage: 3,
		data: {},
		dtable: '',
		userbook: {},
		usbook: {},
		filteredbookings: {},
		searchint: '',
		searchbook: {},
		sorted: {},
		booktosort: {},
		itrsorted: {},
		
		aperpage: 3,
		apages: 0,
		atpages: 0,
		acpage: 1,
		pages: 0,
		tpages: 0,
		cpage: 1,
		gpage: 1,
		currentpage: 1,
		pgclass: '',
		
		stssort: 4,
		stsicon: 'clipboard',
		scolor: 'black',
		
		contsort: 4,
		itrsort: 7,
		cont: 'wh',
		sorter: 17,
		sorted: '',
		sortedbookings: {},
		opage: '',
		spage: '',
		
		adate: '',
		cadate: '',
		rdate: '',
		crdate: '',
		itinerary: '',
		stsgiven: '',
		id: '',
		client: '',
		
		arrivaldb: '',
		returndb: '',
		
		loadactupdates: {},
		actupdates: {},
		bid: '',
		bsts: '',
		bname: '',
		
		loadnotupdates: {},
		notupdates: {},
		
		}"
		>
		   
		<x-adminnavigation />
		   
		    
            <x-sbaradmin  />
			
            <div class="main"
			
				@refresh.window = "
				fetchBookings();
				$nextTick(() => { $dispatch('userload'); } );
				$nextTick(() => { $dispatch('stsload'); } );
				$nextTick(() => {
				
				setTimeout(() => {
				$dispatch('stsload');
				$dispatch('userload');
				}, 2000); 
				});
				logcount = unreadActivitiesCount + unreadNotificationsCount;
				"
				x-init = "
				statsort =  {{ now()->addDay()->toDateString() }};
				
				"
				
			x-init = "document.getElementById('btnnofy').setAttribute('style', 'color: #39B54A !important; border-left: 3px solid #3b7ddd !important;');
			"
			>
				
				
				
				<div id="dynamicContent"></div>
				<div class="row mt-1">
					<div class = "col-12 dashrowch">
						<x-notiftable />
						
						
					</div>
				</div>
				<div class="row mt-1">
					<div class = "col-12 dashrowch">
						
						
						<x-acttable />
					</div>
				</div>
				
				
				
				
			</div>
		</div>
	</x-slot>
	
  	<script src="/js/jquery-3.7.1.min.js"></script>
	<script src="/js/jquery-migrate-3.0.1.min.js"></script>
	<script src="/js/popper.min.js"></script>
	<script src="/js/bootstrap.bundle.min.js"></script>
	<script src="/js/jquery.easing.1.3.js"></script>
	<script src="/js/jquery.waypoints.min.js"></script>
	<script src="/js/jquery.stellar.min.js"></script>
	<script src="/js/owl.carousel.min.js"></script>
	<script src="/js/jquery.magnific-popup.min.js"></script>
	<script src="/js/aos.js"></script>
	<script src="/js/jquery.animateNumber.min.js"></script>
	<script src="/js/bootstrap-datepicker.js"></script>
	<script src="/js/scrollax.min.js"></script>
	<script src="/js/main.js"></script>
	<script src="/js/alpine.validate.min.js"></script>
    <script src="/js/sbar.js"></script>
	
	<script>
	
	  window.addEventListener('pageshow', function(event) {
        if (event.persisted) {
            window.location.reload();
        }
    });
    
		function booktable() {
			var csrfToken = "{{ csrf_token() }}";
			
			const loadtable = new XMLHttpRequest();
			loadtable.onload = function() {
				document.getElementById('dynamicContent').innerHTML = this.responseText;
			}
			loadtable.open("POST", "{{url('loaduserinfo')}}");
			loadtable.setRequestHeader('X-CSRF-TOKEN', csrfToken);
			loadtable.send();
		}
		
		booktable();
		
		
		document.addEventListener('alpine:init', () => {
			
			Alpine.data('activityNotificationComponent', () => ({
				markActivityAsRead(id) {
					event.preventDefault();
					let form = this.$refs['activityReadForm' + id]; 
					if (form) {
						this.submitForm(form, 'activity', id);
						
					}
				},
				markNotificationAsRead(id) {
					event.preventDefault();
					let form = this.$refs['notificationReadForm' + id]; 
					if (form) {
						this.submitForm(form, 'notification', id);
						
					}
				},
				async submitForm(form, type, id) {
					try {
						event.preventDefault(); 
						const formData = new FormData(form);
						const response = await fetch(form.action, {
							method: 'POST',
							body: formData,
						});
						
						if (!response.ok) {
							throw new Error('Failed to mark as read');
						}
						
						if (type === 'activity') {
							this.unreadActivities--;
							} else if (type === 'notification') {
							this.unreadNotifications--;
						}
						
						} catch (error) {
						console.error(error);
						alert('An error occurred while marking as read.');
					}
				},
				formatDate(dateString) {
					const date = new Date(dateString);
					return date.toLocaleString(); 
				}
			}));
		});
		
	</script>
</x-app-layout>
