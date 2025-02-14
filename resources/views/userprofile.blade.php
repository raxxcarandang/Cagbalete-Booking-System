
<x-app-layout>
	@vite(['resources/js/user.js'])
    <x-slot name="header">
        <!--
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
		</h2> -->
		<div class="container-xxl position-relative bg-white d-flex p-0" >
			<div class="wrapper" id="dashwrapper">
				@include('layouts.navigation')
				
				<x-sbaruser  />
				
				<div class="main"
				x-data = "{
				
				bookid: '',
				users: {},
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
				rdate: '',
				
				stsgiven: '',
				
				bid: '',
				bsts: '',
				bname: '',
				}"
				x-init = "document.getElementById('btnprof').setAttribute('style', 'color: #39B54A !important; border-left: 3px solid #3b7ddd !important;');
				"
				>
					
					
					
					<div id="dynamicContent"></div>
					<div class="container-fluid pt-2 px-4">
						<x-userinfo />
						
						<x-userpassword />
						
						<x-userdelete />
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
		
	</script>
	</x-app-layout>
				