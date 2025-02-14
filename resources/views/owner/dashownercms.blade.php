
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
			tallyph: '',
			tallymn: '',
			tallyun: '',
			tallyspc: '',
			tallykid: '',
			tallymature: '',
			tallyold: '',
			
			updmopen: false,
			crtmopen: false,
			
			imgid: '',
			imgname: '',
			idseq: '',
			
			users: {},
			accommodations: {},
			booking: {},
			bookings: {},
			image: {},
			images: {},
			
			showbook: false,
			hidebook: false,
			
			perpage: 5,
			data: {},
			dtable: '',
			userbook: {},
			usbook: {},
			filteredimages: {},
			searchint: '',
			searchbook: {},
			sorted: {},
			itrsorted: {},
			imagetosort: {},
			
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
			sorter: 18,
			sorted: '',
			sortedimages: {},
			opage: '',
			spage: '',
			
			acchead: 'bg_1.jpg',
			accimg: 'other.webp',
			acctext: '',
			accdesc: '',
			accnum: '',
			accconnum: '',
			acctype: '',
			acclodge: '',
			accadd: '',
			accidup: '',
			accimgdir: '',
			imginc: '',
			accimginc: '',
			
			previewimgname: '',
			
			imgupload: '',
			
			generateRandomQueryString() {
			return Math.random().toString(36).substring(2, 15);
			},
			
			}"
			x-init = "document.getElementById('btnacc').style = 'color: #39B54A; border-left: 3px solid #3b7ddd;'"
			>
				
				<div id="dynamicContent"></div>
				
				<x-accdescreq :accommodation="$accommodation" />
				
				<x-accimgtablereq :images="$images" />
				
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
		
		// Acc Name & Desc Fetch API Submission
		function accnamedesc() {
			return {
				formData: new FormData(),
				formMessage: "",
				formLoading: false,
				buttonText: "SET DETAILS",
				accid: "",
				name: "",
				description: "",
				type: "",
				lodge: "",
				address: "",
				contactno: "",
				
				submitData() {
					this.formData.append('_token', "{{ csrf_token() }}");
					this.formData.append('accid', document.getElementById('acciddesc').value);
					this.formData.append('name', document.getElementById('accname').value);
					this.formData.append('description', document.getElementById('accdesc').value);
					this.formData.append('type', document.getElementById('acctype').value);
					this.formData.append('lodge', document.getElementById('acclodge').value);
					this.formData.append('address', document.getElementById('accadd').value);
					this.formData.append('contactno', document.getElementById('acccontact').value);
					
					this.formMessage = "";
					this.formLoading = true;
					this.buttonText = "Setting Details...";
					
					fetch("{{url('requestaccdesc')}}", {
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
						this.formMessage = "Name & Description Changed successfully!";
						showToast("Accommodation # " + document.getElementById('acciddesc').value + " Updated", document.getElementById('accname').value + "<br> Details Updated", "success");
					})
					.catch(error => {
						console.error("Error occurred:", error);
						this.formMessage = `Error: ${error.message}`;
						showToast("Accommodation # " + document.getElementById('acciddesc').value + " Operation Failed", document.getElementById('accname').value + " Details Update Failed", "danger");
					})
					.finally(() => {
						this.formLoading = false;
						this.buttonText = "SET DETAILS";
					});
					
					
					
				}
			};
		}
		
		
		// end of Acc Name & Desc Fetch API
		
		
	</script>
</x-app-layout>
