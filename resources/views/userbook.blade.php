
<x-app-layout>
	@vite(['resources/js/user.js'])
    <x-slot name="header">
        <!--
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
		</h2> -->
		<div class="container-xxl position-relative bg-white d-flex p-0" >
			
			<div class="wrapper">
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
				
				stssort: 6,
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
				
				advanced: false,
				advanced2: false,
				}"
				x-init = "document.getElementById('btnbook').setAttribute('style', 'color: #39B54A !important; border-left: 3px solid #3b7ddd !important;');
				"
				>
					
					
					
					<div id="dynamicContent"></div>
					
					<x-cancel-modal />
					<div class="container-fluid pt-2 px-4">
						<x-usercurrentbook />
					</div>
					<div class="container-fluid pt-2 px-4">
						<x-userbookings />
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
				
				// Booking Cancel Fetch API Submission
				function cancelbook() {
				return {
				formData: new FormData(),
				formMessage: "",
				formLoading: false,
				buttonText: "YES",
				id: "",
				deleted: "",
				client: "",
				
				cancelData() {
				this.formData.append('_token', "{{ csrf_token() }}");
				this.formData.append('id', document.getElementById('bookin').value);
				
				this.formMessage = "";
				this.formLoading = true;
				document.getElementById('cancelbtn').disabled = true;
				this.buttonText = "CANCELLING...";
				document.getElementById('canceltxt').innerHTML = "CANCELLING...";
				
				fetch("{{url('cancelbooking')}}", {
				method: "POST",
				body: this.formData,
				})
				.then(response => {
				console.log(response); 
				
				/*
				if (!response.ok) {
				const contentType = response.headers.get("content-type");
				return response.text().then(text => {
				console.log("Response text:", text); 
				
				if (contentType && contentType.includes("application/json")) {
				
				try {
				const errorResponse = JSON.parse(text);
				const message = errorResponse.message || "An error occurred.";
				throw new Error(message);
				} catch (e) {
				console.warn("Ignoring JSON parse error:", e);
				throw new Error("Received error response: " + text);
				}
				} else {
				
				const newWindow = window.open();
				newWindow.document.write(text);
				newWindow.document.close();
				throw new Error("Unexpected server response. Please check the new window for details.");
				}
				});
				}
				*/
				
				return response.json().catch(() => {
				
				return Promise.resolve({}); 
				});
				})
				.then(data => {
				location.reload();
				this.formMessage = "Booking deleted successfully!";
				showToast("Booking Deleted", this.client + "'s Booking # " + document.getElementById('bookin').value  + "<br> Deleted Successfully", "success");
				})
				.catch(error => {
				this.formMessage = `Error: ${error.message}`;
				showToast("Delete Failed", this.client + "'s Booking # " + document.getElementById('bookin').value  + "<br> Delete Failed", "danger");
				})
				.finally(() => {
				this.formLoading = false;
				document.getElementById('cancelbtn').disabled = false;
				this.buttonText = "CANCEL";
				document.getElementById('canceltxt').innerHTML = "CANCEL";
				document.getElementById('exitbtn').click();
				});
				}
				};
				}
				// end of Booking Cancel Fetch API
				
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
								