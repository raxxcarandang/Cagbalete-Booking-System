<x-app-layout>
	@vite(['resources/js/admin.js'])
    <x-slot name="header">
		
		<div class="container-xxl position-relative bg-white d-flex p-0">
			<div class="wrapper"
			x-data = "{
			
			searchTerm: '', 
			
			updmopen: false,
			crtmopen: false,
			
			bookid: '',
			users: {},
			accommodations: {},
			booking: {},
			bookings: {},
			images: {},
			
			showbook: false,
			hidebook: false,
			
			data: {},
			dtable: '',
			userbook: {},
			usbook: {},
			
			pgclass: '',
			
			stsicon: '',
			scolor: '',
			colors: '',
			
			
			opage: '',
			spage: '',
			itinerary: '',
			
			
			today: new Date().toISOString().split('T')[0], 
			tomorrow: new Date(new Date().setDate(new Date().getDate() + 1)).toISOString().split('T')[0], 
			selectedDate: '',
			
			formattedDate: '',
			dates: '',
			
			tpending: '',
			tarrived: '',
			trescheduled: '',
			tcancelled: '',
			tdelinquent: '',
			
			adate: '',
			rdate: '',
			
			stsgiven: '',
			
			bid: '',
			bsts: '',
			
			bname: '',
			id: '',
			client: '',
			
			resarea: '',
			resdnyarea: '',
			rescnlarea: '',
			remarea: '',
			rem: '',
			remarkarea: 'N/A',
			reason: '',
			
			arrivecolor: '',
			ids: '',
			selectedBookings: [],
			status: '',
			
			proof: '',
			proofname: '',
			
			report: '',
			reports: '',
			nocolor: false,
			
			showtallydetail: true,
			tallyicon: 'person',
			tallycolor: 'red',
			
			logCount: '',
			
			toggleBooking(id) {
			if (this.selectedBookings.includes(id)) {
			this.selectedBookings = this.selectedBookings.filter(bookId => bookId !== id);
			} else {
			this.selectedBookings.push(id);
			}
			},
			
			toggleSelectAll() {
			
			if (this.selectedBookings.length === this.filteredBookings.length) {
			this.selectedBookings = [];
			} else {
			
			this.selectedBookings = this.filteredBookings.map(booking => booking.id);
			}
			},
			getSelectedBookingsString() {
			return this.selectedBookings.join(', ');
			},
			allChecked() {
			
			return this.selectedBookings.length === this.filteredBookings.length;
			},
			
			
			
			}"
			>
				
				<div class="main" 
				x-data="bookingQuery()"
				@refresh.window = "
				fetchBookings();
				$nextTick(() => {
				
				setTimeout(() => {
				$dispatch('stsload');
				$dispatch('userload');
				}, 2000); 
				});
				logcount = unreadActivitiesCount + unreadNotificationsCount;
				"
				x-init = "document.getElementById('btndash').style = 'color: #39B54A; border-left: 3px solid #3b7ddd;'
				statsort =  {{ now()->addDay()->toDateString() }};
				
				"
				>
					<x-adminnavigation />
					
					<x-sbarminadmin  />
					
					<x-toastcontainer />
					
					<x-createmodal />
					
					<x-deletemodal />
					
					<x-updatemodal />
					
					<x-remarkmodal />
					
					
					<x-reschedmodal />
					
					<x-admincancelmodal />
					
					<x-batchmodal />
					
					<x-proofmodal />
					
					<x-exportmodal />
					<div class="container-fluid pt-1">
						<div class="row mt-1">
							<div class = "col dashrow">
								<x-demoreports />
							</div>
						</div>
					</div>
					<div class="container-fluid pt-1">
						<div class="row mt-1">
							<div class = "col-12 col-xl-6 dashrowch">
								<x-bookquota />
							</div>
							<div class = "col-12 col-xl-6 dashrowch">
								<x-bookingforecast />
							</div>
						</div>
					</div>
					
					
					
					<span style="opacity:0;"
					x-init="$nextTick(() => { $dispatch('refresh'); });"
					></span>
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
	<script src="/js/jscolor.min.js"></script>
	<script src="/js/alpine.validate.min.js"></script>
	<script src="/js/sbar.js"></script>
	<script src="/js/toastmsg.js"></script>
	<script src="/js/chart.js"></script>
	<script src="/js/FileSaver.js"></script>
	<script>
	
	  window.addEventListener('pageshow', function(event) {
        if (event.persisted) {
            window.location.reload();
        }
    });
    
		document.getElementById('btnexp').addEventListener('click', () => {
            const table = document.getElementById('tablestat');
            let csvContent = "";
			
			let datastart = new Date(new Date().getFullYear(), new Date().getMonth(), 1).toISOString().split('T')[0];
			
            const headers = Array.from(table.querySelectorAll('thead th')).map(header => `"${header.innerText}"`);
            csvContent += headers.join(",") + "\r\n";
			
			
            const rows = table.querySelectorAll('tbody tr');
            rows.forEach(row => {
                const rowData = Array.from(row.querySelectorAll('td')).map(cell => `"${cell.innerText.trim()}"`);
                csvContent += rowData.join(",") + "\r\n";
			});
			
			
            const blob = new Blob([csvContent], { type: "text/csv;charset=utf-8;" });
            saveAs(blob, "Booking_" + datastart  + ".csv");
		});
		
		
		jscolor.presets.default = {
			position: 'right',
			palette: [
			'#000000', '#7d7d7d', '#870014', '#ec1c23', '#ff7e26',
			'#fef100', '#22b14b', '#00a1e7', '#3f47cc', '#a349a4',
			'#ffffff', '#c3c3c3', '#b87957', '#feaec9', '#ffc80d',
			'#eee3af', '#b5e61d', '#99d9ea', '#7092be', '#c8bfe7',
			],
			//paletteCols: 12,
			hideOnPaletteClick: true,
		};
		
		
		//Main Booking & User Data Retrieval Fetch Api
		function bookingQuery() {
			return {
				filteredBookings: [], 
				dcolor: [],
				unreadNotifications: [],
				unreadActivities: [],
				unreadNotificationsCount: [],
				unreadActivitiesCount: [],
				accommodations: [],
				pendings: [],
				arrivals: [],
				totaldemo: [],
				notdemo: [],
				accnames: [],
				sums: [],
				datastart: '',
				dataend: '',
				tarrivals: 0,
				totalBookings: 0,
				fullBookings: 0,
				displayedamount: 0,
				totalamount: 0,
				projectedamount: 0,
			seenPages: 0,
			totalPages: 0,         
			currentPage: 1,        
			searchTerm: '',        
			perpage: 3,           
			cpage: 1, 
			bookpendcount: 0,
			itrsort: 7,
			stssort: 6,
			contsort: 4,
			sorter: 17,
			colorsort: '',
			datesort: '',
			datesortend: '',
			statsort: '2016',
			
			fetchBookings() {
				
				
				
				let url = "{{route('bookingstatquery')}}?" +
				`itrsort=${this.itrsort}` +
				`&stssort=${this.stssort}` +
				`&contsort=${this.contsort}` +
				`&sorter=${this.sorter}` +
				`&colorsort=${this.colorsort}` +
				`&statsort=${this.statsort}` +
				`&datesort=${this.datesort}` +
				`&datastart=${this.datastart}` +
				`&dataend=${this.dataend}` +
				`&datesortend=${this.datesortend}` +
				`&searchTerm=${this.searchTerm}` +
				`&perpage=${this.perpage}` +
				`&cpage=${this.cpage}`;
				
				fetch(url, {
					method: 'GET', 
					headers: {
						'X-CSRF-TOKEN': '{{ csrf_token() }}',  
						'Content-Type': 'application/json', 
					},
				})
				.then(response => response.json())
				.then(data => {
					this.filteredBookings = data.filteredBookings;
					this.dcolor = data.dcolor;
					this.totalPages = data.totalPages;
					this.currentPage = data.currentPage;
					this.unreadActivities = data.unreadActivities;
					this.unreadNotifications = data.unreadNotifications;
					this.unreadActivitiesCount = data.unreadActivitiesCount;
					this.unreadNotificationsCount = data.unreadNotificationsCount;
					this.accommodations = data.accommodations;
					this.pendings = data.pendings;
					this.arrivals = data.arrivals;
					this.tarrivals = data.tarrivals;
					this.totaldemo = data.totaldemo;
					this.notdemo = data.notdemo;
					this.accnames = data.accnames;
					this.sums = data.sums;
					this.bookpendcount = data.bookpendcount;
					this.totalBookings = data.totalBookings;
					this.fullBookings = data.fullBookings;
					this.totalamount = data.totalamount;
					this.projectedamount = data.projectedamount;
					this.displayedamount = data.displayedamount;
					this.seenPages = data.seenPages;
				})
				.catch(error => {
					console.error("Error fetching bookings:", error);
					alert("An error occurred while fetching the bookings.  Please try refreshing the page.");
				});
			},
	};
}
//Main Booking & User Data Retrieval Fetch Api

function getAcronym(name) {
	return name
	.split(' ') 
	.map(word => word.replace(/[()]/g, '').charAt(0).toUpperCase()) 
	.join(''); 
}

document.addEventListener('alpine:init', () => {
	
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	
	$('#updcancel').click(function () {
		document.getElementById('reschedbook').reset();
	});
	
	$('#createcancel').click(function () {
		document.getElementById('createbook').reset();
	});
	
	$('#updatebook').on('submit', function(event) {
		event.preventDefault();
		
		var submitButton = $('#updbtn'); 
		submitButton.prop('disabled', true).text('UPDATING...');
		
		$.ajax({
			url:"{{ route('updatebook') }}",
			data:$('#updatebook').serialize(),
			type:"post",
			
			
			
			success:function(result){
				document.getElementById('chartfresh').click();
				showToast("Booking Updated", "Booking # " + document.getElementById('bookidin').value + " Updated Successfully", "success");
				
				submitButton.prop('disabled', false).text('UPDATE'); 
				$('#updcancel').click();
				
			},
			
			error: function(data){
				var errors = data.responseJSON;
				submitButton.prop('disabled', false).text('UPDATE'); 
				showToast("Update Failed", "Booking # " + document.getElementById('bookidin').value + " Update Failed", "danger");
				
				console.log(errors);
			}
			
			
			}).always(function() {
			document.getElementById('chartfresh').click();
			this.fetchBookings();
		});
	});
	
	$('#reschedbook').on('submit', function(event) {
		event.preventDefault();
		
		var submitButton = $('#reschedbtn'); 
		submitButton.prop('disabled', true).text('RESCHEDULING...');
		
		$.ajax({
			url:"{{ route('reschedbooking') }}",
			data:$('#reschedbook').serialize(),
			type:"post",
			
			
			
			success:function(result){
				document.getElementById('chartfresh').click();
				showToast("Booking Rescheduled", "Booking # " + document.getElementById('bookidin').value + " Rescheduled Successfully", "success");
				
				submitButton.prop('disabled', false).text('RESCHEDULE'); 
				$('#reschedcancel').click();
				
			},
			
			error: function(data){
				var errors = data.responseJSON;
				submitButton.prop('disabled', false).text('RESCHEDULE'); 
				showToast("Update Failed", "Booking # " + document.getElementById('bookidin').value + " Update Failed", "danger");
				
				console.log(errors);
			}
			
			
			}).always(function() {
			
			this.fetchBookings();
		});
	});
	
	$('#createbook').on('submit', function(event) {
		event.preventDefault();
		
		var submitButton = $('#createbtn'); 
		submitButton.prop('disabled', true).text('CREATING...');
		$.ajax({
			url:"{{ route('adminbook') }}",
			data:$('#createbook').serialize(),
			type:"post",
			
			
			
			success:function(result){
				document.getElementById('chartfresh').click();
				showToast("Booking Created", "User # " + document.getElementById('userbookid').value + "'s Booking Inserted Successfully", "success");
				submitButton.prop('disabled', false).text('CREATE'); 
				$('#createcancel').click();
				$('#createbook')[0].reset();
			},
			
			error: function(data){
				var errors = data.responseJSON;
				submitButton.prop('disabled', false).text('CREATE'); 
				showToast("Booking Failed", "User # " + document.getElementById('userbookid').value + "'s Booking Failed", "danger");
				
				console.log(errors);
			}
			
			}).always(function() {
			
			this.fetchBookings();
		});
	});
	
	
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

// Booking Delete Fetch API Submission
function deletebook() {
	return {
		formData: new FormData(),
		formMessage: "",
		formLoading: false,
		buttonText: "DELETE",
		id: "",
		reason: "",
		deleted: "",
		client: "",
		
		deleteData() {
			this.formData.append('_token', "{{ csrf_token() }}");
			this.formData.append('id', this.bookid);
			this.formData.append('reason', this.reason);
			this.client = document.getElementById('clientin').value;
			
			this.formMessage = "";
			this.formLoading = true;
			document.getElementById('delbtn').disabled = true;
			this.buttonText = "DELETING...";
			document.getElementById('deltxt').innerHTML = "DELETING...";
			
			fetch("{{route('deletebooking')}}", {
				method: "POST",
				body: this.formData,
			})
			.then(response => {
				console.log(response); 
				
				
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
				
				
				return response.json().catch(() => {
					
					return Promise.resolve({}); 
				});
			})
			.then(data => {
				document.getElementById('chartfresh').click();
				this.formMessage = "Booking deleted successfully!";
				showToast("Booking Deleted", this.client + "'s Booking # " + this.bookid  + "<br> Deleted Successfully", "success");
				document.getElementById('delcancel').click();
			})
			.catch(error => {
				this.formMessage = `Error: ${error.message}`;
				showToast("Delete Failed", this.client + "'s Booking # " + this.bookid  + "<br> Delete Failed", "danger");
			})
			.finally(() => { 
				this.fetchBookings();
				this.formLoading = false;
				document.getElementById('delbtn').disabled = false;
				this.buttonText = "DELETE";
				document.getElementById('deltxt').innerHTML = "DELETE";
				document.getElementById('resarea').reset();
			});
		}
	};
}
// end of Booking Delete Fetch API

// Booking Remark Fetch API Submission
function rembook() {
	return {
		formData: new FormData(),
		formMessage: "",
		formLoading: false,
		buttonText: "REMARK",
		id: "",
		remark: "",
		status: "",
		client: "",
		
		remarkData() {
			this.formData.append('_token', "{{ csrf_token() }}");
			this.formData.append('id', this.bookid);
			this.formData.append('remark', this.remark);
			this.formData.append('status', document.getElementById('statusipt').value);
			this.client = document.getElementById('clientin').value;
			
			this.formMessage = "";
			this.formLoading = true;
			document.getElementById('rembtn').disabled = true;
			this.buttonText = "REMARKING...";
			document.getElementById('remtxt').innerHTML = "REMARKING...";
			
			fetch("{{route('remarkbooking')}}", {
				method: "POST",
				body: this.formData,
			})
			.then(response => {
				console.log(response); 
				
				
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
				
				
				return response.json().catch(() => {
					
					return Promise.resolve({}); 
				});
			})
			.then(data => {
				document.getElementById('chartfresh').click();						
				this.formMessage = "Booking remarked successfully!";
				showToast("Booking Remarked", this.client + "'s Booking # " + this.bookid  + "<br> Remarked Successfully", "success");
				document.getElementById('remcancel').click();
			})
			.catch(error => {
				this.formMessage = `Error: ${error.message}`;
				showToast("Remarking Failure", this.client + "'s Booking # " + this.bookid  + "<br> Remarked Failed", "danger");
			})
			.finally(() => { 
				this.fetchBookings();
				this.formLoading = false;
				document.getElementById('rembtn').disabled = false;
				this.buttonText = "REMARK";
				document.getElementById('remtxt').innerHTML = "REMARK";
				this.remark = '';
				
			});
		}
	};
}

// Booking Remark Fetch API Submission
function exportbook() {
	return {
		formData: new FormData(),
		formMessage: "",
		formLoading: false,
		buttonText: "EXPORT",
		reportdate: "",
		
		
		exportData() {
			this.formData.append('_token', "{{ csrf_token() }}");
			this.formData.append('id', this.bookid);
			this.formData.append('reportdate', this.reportdate);
			
			
			this.formMessage = "";
			this.formLoading = true;
			document.getElementById('expbtn').disabled = true;
			this.buttonText = "EXPORTING...";
			document.getElementById('exptxt').innerHTML = "EXPORTING...";
			
			fetch("{{route('exportbooking')}}", {
				method: "POST",
				body: this.formData,
			})
			.then(response => {
				console.log(response); 
				
				
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
				
				
				return response.json().catch(() => {
					
					return Promise.resolve({}); 
				});
			})
			.then(data => {					
				this.formMessage = "Booking exported successfully!";
				showToast("Booking Data Exported", "Booking Data Exported Successfully", "success");
				document.getElementById('expcancel').click();
			})
			.catch(error => {
				this.formMessage = `Error: ${error.message}`;
				showToast("Export Failure", "Booking Data Export Failed", "danger");
			})
			.finally(() => { 
				this.fetchBookings();
				this.formLoading = false;
				document.getElementById('expbtn').disabled = false;
				this.buttonText = "EXPORT";					
			});
		}
	};
}

// Booking Batch Fetch API Submission
function batchbook() {
	return {
		formData: new FormData(),
		formMessage: "",
		formLoading: false,
		buttonText: "PROCEED",
		remark: "",
		status: "",
		idbatch: "",
		color: "",
		arrival: "",
		departure: "",
		itinerary: "",
		
		batchData() {
			this.formData.append('_token', "{{ csrf_token() }}");
			this.formData.append('remark', this.remarkarea);
			this.formData.append('status', this.status);
			this.formData.append('color', this.arrivecolor);
			this.formData.append('idarray', document.getElementById('idarray').value);
			this.formData.append('arrival', this.adate);
			this.formData.append('departure', this.rdate);
			this.formData.append('itinerary', this.itinerary);
			this.client = document.getElementById('clientin').value;
			
			this.formMessage = "";
			this.formLoading = true;
			document.getElementById('batchbtn').disabled = true;
			this.buttonText = "PROCESSING...";
			document.getElementById('batchtxt').innerHTML = "PROCESSING...";
			
			fetch("{{route('batchstatus')}}", {
				method: "POST",
				body: this.formData,
			})
			.then(response => {
				console.log(response); 
				
				
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
				
				
				return response.json().catch(() => {
					
					return Promise.resolve({}); 
				});
			})
			.then(data => {
				document.getElementById('chartfresh').click();
				this.selectedBookings = [];
				this.formMessage = "Booking Operation successful!";
				showToast("Booking Operation", "Bookings" + this.idbatch  + "<br> Operation Successful", "success");
				document.getElementById('batchcancel').click();
			})
			.catch(error => {
				this.formMessage = `Error: ${error.message}`;
				showToast("Operation Failure", "Bookings " + this.idbatch  + "<br> Operation Failed", "danger");
			})
			.finally(() => { 
				this.fetchBookings();
				this.formLoading = false;
				document.getElementById('batchbtn').disabled = false;
				this.buttonText = "PROCEED";
				document.getElementById('batchtxt').innerHTML = "PROCEED";
				
			});
		}
	};
}
// end of Booking Remark Fetch API



// Booking Delete Fetch API Submission
function cancelbook() {
	return {
		formData: new FormData(),
		formMessage: "",
		formLoading: false,
		buttonText: "YES",
		id: "",
		remark: "",
		deleted: "",
		client: "",
		
		cancelData() {
			this.formData.append('_token', "{{ csrf_token() }}");
			this.formData.append('id', this.bookid);
			this.formData.append('remark', this.remark);
			this.client = document.getElementById('clientin').value;
			
			this.formMessage = "";
			this.formLoading = true;
			document.getElementById('cnlbtn').disabled = true;
			this.buttonText = "PROCESSING...";
			document.getElementById('cnltxt').innerHTML = "PROCESSING...";
			
			fetch("{{route('admincancelbooking')}}", {
				method: "POST",
				body: this.formData,
			})
			.then(response => {
				console.log(response); 
				
				
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
				
				
				return response.json().catch(() => {
					
					return Promise.resolve({}); 
				});
			})
			.then(data => {
				document.getElementById('chartfresh').click();
				this.formMessage = "Booking cancelled successfully!";
				showToast("Booking Cancelled", this.client + "'s Booking # " + this.bookid  + "<br> Cancelled Successfully", "success");
				document.getElementById('cnlnobtn').click();
			})
			.catch(error => {
				this.formMessage = `Error: ${error.message}`;
				showToast("Cancel Failed", this.client + "'s Booking # " + this.bookid  + "<br> Cancel Failed", "danger");
			})
			.finally(() => { 
				this.fetchBookings();
				this.formLoading = false;
				document.getElementById('cnlbtn').disabled = false;
				this.buttonText = "YES";
				document.getElementById('cnltxt').innerHTML = "YES";
				document.getElementById('rescnlarea').value='';
			});
		}
	};
}
// end of Booking Delete Fetch API

//Function for submitting the POST method to update status of booking
function statusform() {
	return {
		formData: {
			_token: "{{ csrf_token() }}",
			id: "",
			status: "",
			client: "",
			color: "",
		},
		formMessage: "",
		formLoading: false,
		buttonText: "Submit",
		submitData() {
			this.formMessage = "";
			this.formLoading = false;
			this.buttonText = "Submitting...";
			fetch("{{route('bookingstatus')}}", {
				method: "POST",
				headers: {
					"Content-Type": "application/json",
					Accept: "application/json",
				}, body: JSON.stringify(this.formData),})
				.then(response => {
					console.log(response); 
					
					
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
					
					
					return response.json().catch(() => {
						
						return Promise.resolve({}); 
					});
				})
				.then(() => {
					
					
					
					if(this.formData.status == 'PENDING') {
						showToast("Booking Pended", this.formData.client + "'s Booking # " + this.formData.id  + "<br> Pended Successfully", "success");
					}
					if(this.formData.status == 'CANCELLED') {
						showToast("Booking Cancelled", this.formData.client + "'s Booking # " + this.formData.id  + "<br> Cancelled Successfully", "success");
					}
					if(this.formData.status == 'ARRIVED') {
						showToast("Booking Arrived", this.formData.client + "'s Booking # " + this.formData.id  + "<br> Arrived Successfully", "success");
					}
					if(this.formData.status == 'RESCHEDULED') {
						showToast("Booking Rescheduled", this.formData.client + "'s Booking # " + this.formData.id  + "<br> Rescheduled Successfully", "success");
					}
					if(this.formData.status == 'DELINQUENT') {
						showToast("Booking Marked for Delinquency", this.formData.client + "'s Booking # " + this.formData.id  + "<br> Marked as Delinquent Successfully", "success");
					}
					document.getElementById('chartfresh').click();
					this.formData.id = "";
					this.formData.status = "";
					this.formData.message = "";
					this.formMessage = "Form successfully submitted.";
				})
				.catch(() => {
					this.formMessage = "Something went wrong.";
					showToast("Operation Failed", this.formData.client + "'s Booking # " + this.formData.id  + "<br> Action Failed", "danger");
					
					
				})
				.finally(() => { 
					this.fetchBookings();
					this.formLoading = false;
					this.buttonText = "Submit";
					
				});
		}
	};
}
// end of status form



</script>
</x-app-layout>
