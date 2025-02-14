<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
	<?php echo app('Illuminate\Foundation\Vite')(['resources/js/admin.js']); ?>
     <?php $__env->slot('header', null, []); ?> 
		
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
		allactivities: {},
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
		
		uname: '',
		ustatus: '',
		uid: '',
		
		advanced: false,
		}"
		>
			
			<div class="main" 
			x-data="userQuery()"

			x-init = "document.getElementById('btnuser').setAttribute('style', 'color: #39B54A !important; border-left: 3px solid #3b7ddd !important;');
			fetchUsers();
			statsort =  <?php echo e(now()->addDay()->toDateString()); ?>;
			$watch('cpage', value => fetchUsers());
			$watch('stssort', value => fetchUsers());
			$watch('contsort', value => fetchUsers());
			$watch('typesort', value => fetchUsers());
			$watch('perpage', value => fetchUsers());
			"
			>
			   
				<?php if (isset($component)) { $__componentOriginalf08e1e9a2f54f8de63a24639dbe74a3b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf08e1e9a2f54f8de63a24639dbe74a3b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.adminnavigation','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('adminnavigation'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf08e1e9a2f54f8de63a24639dbe74a3b)): ?>
<?php $attributes = $__attributesOriginalf08e1e9a2f54f8de63a24639dbe74a3b; ?>
<?php unset($__attributesOriginalf08e1e9a2f54f8de63a24639dbe74a3b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf08e1e9a2f54f8de63a24639dbe74a3b)): ?>
<?php $component = $__componentOriginalf08e1e9a2f54f8de63a24639dbe74a3b; ?>
<?php unset($__componentOriginalf08e1e9a2f54f8de63a24639dbe74a3b); ?>
<?php endif; ?>
				
				<?php if (isset($component)) { $__componentOriginalf5aa7668090fe2b2f05f3b540ec0511a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf5aa7668090fe2b2f05f3b540ec0511a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.sbaradmin','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('sbaradmin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf5aa7668090fe2b2f05f3b540ec0511a)): ?>
<?php $attributes = $__attributesOriginalf5aa7668090fe2b2f05f3b540ec0511a; ?>
<?php unset($__attributesOriginalf5aa7668090fe2b2f05f3b540ec0511a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf5aa7668090fe2b2f05f3b540ec0511a)): ?>
<?php $component = $__componentOriginalf5aa7668090fe2b2f05f3b540ec0511a; ?>
<?php unset($__componentOriginalf5aa7668090fe2b2f05f3b540ec0511a); ?>
<?php endif; ?>
				
				<?php if (isset($component)) { $__componentOriginal960b84be72ea246851d006b4716d754a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal960b84be72ea246851d006b4716d754a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.toastcontainer','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('toastcontainer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal960b84be72ea246851d006b4716d754a)): ?>
<?php $attributes = $__attributesOriginal960b84be72ea246851d006b4716d754a; ?>
<?php unset($__attributesOriginal960b84be72ea246851d006b4716d754a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal960b84be72ea246851d006b4716d754a)): ?>
<?php $component = $__componentOriginal960b84be72ea246851d006b4716d754a; ?>
<?php unset($__componentOriginal960b84be72ea246851d006b4716d754a); ?>
<?php endif; ?>
				
				<?php if (isset($component)) { $__componentOriginal7d0de51f8ce78d66bc275045445ba722 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7d0de51f8ce78d66bc275045445ba722 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.userdeletemodal','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('userdeletemodal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7d0de51f8ce78d66bc275045445ba722)): ?>
<?php $attributes = $__attributesOriginal7d0de51f8ce78d66bc275045445ba722; ?>
<?php unset($__attributesOriginal7d0de51f8ce78d66bc275045445ba722); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7d0de51f8ce78d66bc275045445ba722)): ?>
<?php $component = $__componentOriginal7d0de51f8ce78d66bc275045445ba722; ?>
<?php unset($__componentOriginal7d0de51f8ce78d66bc275045445ba722); ?>
<?php endif; ?>
				
				<?php if (isset($component)) { $__componentOriginal48e7cf816fa9d822be1819ce49b7f098 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal48e7cf816fa9d822be1819ce49b7f098 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.usertypemodal','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('usertypemodal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal48e7cf816fa9d822be1819ce49b7f098)): ?>
<?php $attributes = $__attributesOriginal48e7cf816fa9d822be1819ce49b7f098; ?>
<?php unset($__attributesOriginal48e7cf816fa9d822be1819ce49b7f098); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal48e7cf816fa9d822be1819ce49b7f098)): ?>
<?php $component = $__componentOriginal48e7cf816fa9d822be1819ce49b7f098; ?>
<?php unset($__componentOriginal48e7cf816fa9d822be1819ce49b7f098); ?>
<?php endif; ?>
				
				<?php if (isset($component)) { $__componentOriginal52b612bf43e3236e0299f37efd68636e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal52b612bf43e3236e0299f37efd68636e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.userupdatemodal','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('userupdatemodal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal52b612bf43e3236e0299f37efd68636e)): ?>
<?php $attributes = $__attributesOriginal52b612bf43e3236e0299f37efd68636e; ?>
<?php unset($__attributesOriginal52b612bf43e3236e0299f37efd68636e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal52b612bf43e3236e0299f37efd68636e)): ?>
<?php $component = $__componentOriginal52b612bf43e3236e0299f37efd68636e; ?>
<?php unset($__componentOriginal52b612bf43e3236e0299f37efd68636e); ?>
<?php endif; ?>
				
					<div class="container-fluid pt-2 px-2">
    					<div class="row mt-1">
            				<?php if (isset($component)) { $__componentOriginal7a111c9f0a824ba85f0ebf4de933bfce = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7a111c9f0a824ba85f0ebf4de933bfce = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.usertablefull','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('usertablefull'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7a111c9f0a824ba85f0ebf4de933bfce)): ?>
<?php $attributes = $__attributesOriginal7a111c9f0a824ba85f0ebf4de933bfce; ?>
<?php unset($__attributesOriginal7a111c9f0a824ba85f0ebf4de933bfce); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7a111c9f0a824ba85f0ebf4de933bfce)): ?>
<?php $component = $__componentOriginal7a111c9f0a824ba85f0ebf4de933bfce; ?>
<?php unset($__componentOriginal7a111c9f0a824ba85f0ebf4de933bfce); ?>
<?php endif; ?>
            				</div>
				    </div>
				
				<span style="opacity:0;"
				x-init="$nextTick(() => { fetchUsers();; });"
				></span>
			</div>
		</div>
		</div>
	 <?php $__env->endSlot(); ?>
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
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	
	<script>
		//Main Booking & User Data Retrieval Fetch Api
		function userQuery() {
			return {
				filteredUsers: [], 
				dcolor: [],
				totalPages: 0,         
				currentPage: 1,        
				searchTerm: '',        
				perpage: 5,           
				cpage: 1, 
				typesort: 5,
				stssort: 6,
				contsort: 4,
				sorter: 17,
				
				
				fetchUsers() {
					
					let url = "<?php echo e(route('userquery')); ?>?" +
					`typesort=${this.typesort}` +
					`&stssort=${this.stssort}` +
					`&contsort=${this.contsort}` +
					`&sorter=${this.sorter}` +
					`&searchTerm=${this.searchTerm}` +
					`&perpage=${this.perpage}` +
					`&cpage=${this.cpage}`;
					
					fetch(url, {
						method: 'GET', 
						headers: {
							'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',  
							'Content-Type': 'application/json', 
						},
					})
					.then(response => response.json())
					.then(data => {
						this.filteredUsers = data.filteredUsers;
						this.totalPages = data.totalPages;
						this.currentPage = data.currentPage;
					})
					.catch(error => {
						console.error("Error fetching users:", error);
						alert("An error occurred while fetching the users. Please try refreshing the page.");
					});
				},
			};
		}
		//Main Booking & User Data Retrieval Fetch Api
		
		  window.addEventListener('pageshow', function(event) {
        if (event.persisted) {
            window.location.reload();
        }
    });
    
		// status form
		function statusform() {
			return {
				formData: new FormData(),
				id: "",
				status: "",
				client: "",
				
				submitData() {
					this.formData.append('_token', "<?php echo e(csrf_token()); ?>");
					this.formData.append('id', this.uid);
					this.formData.append('status', this.ustatus);
					this.client = this.uname;
					
					
					fetch("<?php echo e(route('userstatus')); ?>", {
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
						if(this.ustatus == 'Verified') {
							showToast("User Verified", this.client + "'s Account # " + this.uid  + "<br> Verified Successfully", "success");
						}
						if(this.ustatus == 'Suspended') {
							showToast("User Suspended", this.client + "'s Account # " + this.uid  + "<br> Suspended Successfully", "success");
						}
					})
					.catch(error => {
						this.formMessage = `Error: ${error.message}`;
						showToast("Status Failed", this.client + "'s Account # " + this.userid  + "<br> Status Failed", "danger");
					})
					.finally(() => { 
						this.fetchUsers();
						
					});
				}
			};
		}
		// end of status form
		
		// update user
		function updateuser() {
			return {
				formData: new FormData(),
				formMessage: "",
				formLoading: false,
				buttonText: "UPDATE",
				id: "",
				client: "",
				reason: "",
				name: '',
				mname: '',
				lname: '',
				gender: '',
				bdate: '',
				contactno: '',
				country: '',
				region: '',
				email: '',
				status: '',
				
				updateData() {
					this.formData.append('_token', "<?php echo e(csrf_token()); ?>");
					this.formData.append('id', this.uid);
					this.formData.append('name', this.name);
					this.formData.append('mname', this.mname);
					this.formData.append('lname', this.lname);
					this.formData.append('gender', this.gender);
					this.formData.append('bdate', this.bdate);
					this.formData.append('contactno', this.contactno);
					this.formData.append('country', this.country);
					this.formData.append('region', this.region);
					this.formData.append('email', this.email);
					this.formData.append('status', this.status);
					this.client = this.uname;
					
					this.formMessage = "";
					this.formLoading = true;
					document.getElementById('updbtn').disabled = true;
					this.buttonText = "UPDATING...";
					
					fetch("<?php echo e(route('updateuser')); ?>", {
						method: "POST",
						body: this.formData,
					})
					.then(response => {
						console.log(response); 
						
						
						if (!response.ok) {
							const contentType = response.headers.get("content-type");
							return response.text().then(text => {
								console.log("Response text:", text); 
								
							});
						}
						
						
						return response.json().catch(() => {
							
							return Promise.resolve({}); 
						});
					})
					.then(data => {
						document.getElementById('updcancel').click();
						showToast("User Updated", this.client + "'s Account # " + this.uid  + "<br> Updated Successfully", "success");
						
						
						
						
					})
					.catch(error => {
						this.formMessage = `Error: ${error.message}`;
						showToast("Update Failed", this.client + "'s Account # " + this.uid  + "<br> Updation Failed", "danger");
					})
					.finally(() => { 
						this.fetchUsers();
						this.formLoading = false;
						
						this.buttonText = "UPDATE";
						document.getElementById('updatebook').reset();
					});
				}
			};
		}
		// end of delete user
		
		// delete user
		function deleteuser() {
			return {
				formData: new FormData(),
				formMessage: "",
				formLoading: false,
				buttonText: "DELETE",
				id: "",
				client: "",
				reason: "",
				
				deleteData() {
					this.formData.append('_token', "<?php echo e(csrf_token()); ?>");
					this.formData.append('id', this.uid);
					this.formData.append('remark', this.reason);
					this.client = this.uname;
					
					this.formMessage = "";
					this.formLoading = true;
					document.getElementById('delbtn').disabled = true;
					this.buttonText = "DELETING...";
					document.getElementById('deltxt').innerHTML = "DELETING...";
					
					fetch("<?php echo e(route('deleteuser')); ?>", {
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
						document.getElementById('delcancel').click();
						showToast("User Deleted", this.client + "'s Account # " + this.uid  + "<br> Deleted Successfully", "success");
						
						
						
						
					})
					.catch(error => {
						this.formMessage = `Error: ${error.message}`;
						showToast("Delete Failed", this.client + "'s Account # " + this.userid  + "<br> Deletion Failed", "danger");
					})
					.finally(() => { 
						this.fetchUsers();
						this.formLoading = false;
						document.getElementById('delbtn').disabled = false;
						this.buttonText = "DELETE";
						document.getElementById('deltxt').innerHTML = "DELETE";
						document.getElementById('resarea').reset();
					});
				}
			};
		}
		// end of delete user
		
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
					this.formData.append('_token', "<?php echo e(csrf_token()); ?>");
					this.formData.append('id', this.bookid);
					this.formData.append('reason', this.reason);
					this.client = document.getElementById('clientin').value;
					
					this.formMessage = "";
					this.formLoading = true;
					document.getElementById('delbtn').disabled = true;
					this.buttonText = "DELETING...";
					document.getElementById('deltxt').innerHTML = "DELETING...";
					
					fetch("<?php echo e(url('deletebooking')); ?>", {
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
		function typeuser() {
			return {
				formData: new FormData(),
				formMessage: "",
				formLoading: false,
				buttonText: "CHANGE",
				id: "",
				role: "",
				client: "",
				remark: "",
				
				typeData() {
					this.formData.append('_token', "<?php echo e(csrf_token()); ?>");
					this.formData.append('id', this.uid);
					this.formData.append('role_id', this.role);
					this.formData.append('remark', this.remark);
					this.client = this.uname;
					
					this.formMessage = "";
					this.formLoading = true;
					this.buttonText = "PROCESSING...";
					document.getElementById('typetxt').innerHTML = "PROCESSING...";
					
					fetch("<?php echo e(route('changeusertype')); ?>", {
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
						
						showToast("User Type Changed", this.client + "'s Account "  + "<br> Changed Successfully", "success");
						document.getElementById('typecancel').click();
					})
					.catch(error => {
						this.formMessage = `Error: ${error.message}`;
						showToast("Change User Type Failure", this.client + "'s Account <br> Change Failed", "danger");
						this.formLoading = false;
						this.buttonText = "CHANGE";
						document.getElementById('typetxt').innerHTML = "CHANGE";
					})
					.finally(() => { 
						this.fetchUsers();
						this.formLoading = false;
						this.buttonText = "CHANGE";
						document.getElementById('typetxt').innerHTML = "CHANGE";
						
					});
				}
			};
		}
		
	</script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH /home/u101594241/domains/maubantourism.com/public_html/resources/views/admin/dashusers.blade.php ENDPATH**/ ?>