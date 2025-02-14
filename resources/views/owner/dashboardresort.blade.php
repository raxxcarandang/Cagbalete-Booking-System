
<x-app-layout>
	@vite(['resources/js/admin.js'])
    <x-slot name="header">
        <!--
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
		</h2> -->
		@include('layouts.navigation')
		<div class="wrapper" id="dashwrapper">
            <x-sbarowner  />
			
			
            <div class="main"
			x-data = "{
			
			bookid: '',
			users: {},
			user: {},
			accommodations: {},
			booking: {},
			bookings: {},
			currentBookings: {},
			
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
			
			updates: {},
			bid: '',
			bsts: '',
			bname: '',
			}"
			x-init = "document.getElementById('btndash').style = 'color: #39B54A; border-left: 3px solid #3b7ddd;';
			"
			>
				
				<div id="dynamicContent"></div>
				
				<x-cancel-modal />
				
				<div class="row mt-1">
					<div class = "col dashrowch">
						<x-bookperformance />
					</div>
					<div class = "col-8 dashrowch">
						<x-accperformance />
					</div>
				</div>
				
				<div class="row mt-1">
					<x-ownersummary />
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
	<script src="/js/toastmsg.js"></script>
	
	<script>
		
		
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
						