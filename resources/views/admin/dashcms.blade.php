
<x-app-layout>
	@vite(['resources/js/admin.js'])
    <x-slot name="header">
		
        <!--
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
		</h2> -->
		<div class="container-xxl position-relative bg-white d-flex p-0">
        <div class="wrapper"
		x-data = "{
		tallyph: '',
		tallymn: '',
		tallyun: '',
		tallyspc: '',
		tallykid: '',
		tallymature: '',
		tallyold: '',
		
		allactivities: {},
		cactivities: {},
		activities: {},
		notifications: {},
		
		unreadNotifications: '',
		unreadActivities: '',
		unreadNotificationsCount: '',
		unreadActivitiesCount: '',
		logCount: '',
		
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
		
		 accload() {
                this.accimginc = this.accommodations.length;
                this.accnum = 0;

                Object.values(this.accommodations).forEach(accommodation => {
                    if (this.$refs.accselect.selectedIndex === accommodation.id) {
                        this.acchead = accommodation.slider;
                        this.accimg = accommodation.thumbnail;
                        this.accdesc = accommodation.description;
                        this.acctext = accommodation.name;
                        this.accnum = accommodation.id;
                        this.acctype = accommodation.type;
                        this.acclodge = accommodation.lodge;
                        this.accconnum = accommodation.contactno;
                        this.accadd = accommodation.address;
                    }
                });
            },
			
			imgload() {
                if (this.accnum == 0) {
                   
                    this.sortedimages = this.images; 
                } else {
                   
                    this.sortedimages = this.images.filter(image => 
                        image.accid.toString().toLowerCase().includes(this.accnum)
                    );
                }

                if (this.searchint === '') {
                    
                    this.filteredimages = this.sortedimages.slice((this.cpage - 1) * this.perpage, this.cpage * this.perpage);
                    this.pages = this.sortedimages.length;
                } else {
                  
                    let userbook = this.users.filter(user => 
                        user.name.toString().toLowerCase().includes(this.searchint) ||
                        user.lname.toString().toLowerCase().includes(this.searchint) ||
                        user.gender.toString().toLowerCase().includes(this.searchint) ||
                        user.contactno.toString().toLowerCase().includes(this.searchint) ||
                        user.country.toString().toLowerCase().includes(this.searchint) ||
                        user.region.toString().toLowerCase().includes(this.searchint) ||
                        user.email.toString().toLowerCase().includes(this.searchint)
                    );

                    let searchbook = [];

                    if (userbook.length > 0) {
                       
                        searchbook = this.sortedimages.filter(image => 
                            image.userid.toString().toLowerCase().includes(userbook.map(userb => userb.id))
                        );
                    } else {
                       
                        searchbook = this.sortedimages.filter(image => 
                            image.id.toString().toLowerCase().includes(this.searchint) ||
                            image.accommodation.toString().toLowerCase().includes(this.searchint) ||
                            image.arrival.toString().toLowerCase().includes(this.searchint) ||
                            image.departure.toString().toLowerCase().includes(this.searchint) ||
                            image.foreigners.toString().toLowerCase().includes(this.searchint) ||
                            image.filipinos.toString().toLowerCase().includes(this.searchint) ||
                            image.maubanins.toString().toLowerCase().includes(this.searchint) ||
                            image.totalmale.toString().toLowerCase().includes(this.searchint) ||
                            image.totalfemale.toString().toLowerCase().includes(this.searchint) ||
                            image.totalvisitors.toString().toLowerCase().includes(this.searchint) ||
                            image.specialneeds.toString().toLowerCase().includes(this.searchint) ||
                            image.zeroto7yold.toString().toLowerCase().includes(this.searchint) ||
                            image.thirteento50yold.toString().toLowerCase().includes(this.searchint) ||
                            image.above60yold.toString().toLowerCase().includes(this.searchint) ||
                            image.travelmeans.toString().toLowerCase().includes(this.searchint) ||
                            image.parking.toString().toLowerCase().includes(this.searchint) ||
                            image.boating.toString().toLowerCase().includes(this.searchint) ||
                            image.purpose.toString().toLowerCase().includes(this.searchint) ||
                            image.status.toString().toLowerCase().includes(this.searchint)
                        );
                    }

                   
                    this.pages = searchbook.length;
                    this.filteredimages = searchbook.slice((this.cpage - 1) * this.perpage, this.cpage * this.perpage);
                }

                
                this.tpages = Math.ceil(this.pages / this.perpage);

               
                if (this.sortedimages.length === 0) {
                    this.showbook = false;
                    this.hidebook = true;
                } else {
                    this.showbook = true;
                    this.hidebook = false;
                }
            },
            
		
		}"
		>
           
		<x-adminnavigation />
		    
		    
            <x-sbaradmin  />
			
            <div class="main" 
			x-data="bookingQuery()"
				@refresh.window = "
				fetchBookings();
				
				logcount = unreadActivitiesCount + unreadNotificationsCount;
				"
				x-init = "
				document.getElementById('btnacc').setAttribute('style', 'color: #39B54A !important; border-left: 3px solid #3b7ddd !important;');
				"

			>
				
				
				<div id="dynamicContent"></div>
				<div class="container-fluid pt-2 px-2">
						<div class="row mt-1">
				<x-accdesc :accommodations="$accommodations"/>
				
        				</div>
        		</div>
        		
        		<div class="container-fluid pt-2 px-2">
						<div class="row mt-1">
				<x-accimgtable />
				        </div>
				</div>
				
				<x-imgmodal />
				
				<x-imgheadermodal />
				
				<x-thumbmodal />
				
				<x-imguploadmodal />
				
				<x-imagedeletemodal />
				
				<x-imgreplacemodal />
				
				<x-toastcontainer />
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



let url = "{{route('bookingquery')}}?" +
`itrsort=${this.itrsort}` +
`&stssort=${this.stssort}` +
`&contsort=${this.contsort}` +
`&sorter=${this.sorter}` +
`&colorsort=${this.colorsort}` +
`&statsort=${this.statsort}` +
`&datesort=${this.datesort}` +
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

  window.addEventListener('pageshow', function(event) {
        if (event.persisted) {
            window.location.reload();
        }
    });

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
					
					fetch("{{route('changedesc')}}", {
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
						booktable();
					});
					
					
					
				}
			};
		}
		
		
		// end of Acc Name & Desc Fetch API
		
		// Upload Image Fetch API Submission
		function imageform() {
			return {
				formData: new FormData(),
				formMessage: "",
				formLoading: false,
				buttonText: "UPLOAD",
				accid: "",
				uploaddate: new Date().toISOString().split('T')[0],
				images: [], 
				
				handleFileUpload(event) {
					const files = Array.from(event.target.files);
					this.images = files.map(file => window.URL.createObjectURL(file)); 
					
					this.formData = new FormData(); 
					files.forEach(file => {
						this.formData.append('images[]', file); 
					});
				},
				
				removeImage(index) {
					
					this.images.splice(index, 1); 
					
					
					this.formData = new FormData(); 
					const input = document.getElementById('imguploader');
					const remainingFiles = Array.from(input.files);
					
					
					remainingFiles.forEach((file, i) => {
						if (i !== index) {
							this.formData.append('images[]', file);
						}
					});
					
					const dataTransfer = new DataTransfer();
					remainingFiles.forEach((file, i) => {
						if (i !== index) {
							dataTransfer.items.add(file);
						}
					});
					input.files = dataTransfer.files;
				},
				
				submitImg() {
					this.formData.append('_token', "{{ csrf_token() }}");
					this.formData.append('accid', document.getElementById('idacc').value);
					this.formData.append('uploaddate', this.uploaddate);
					
					this.formMessage = "";
					this.formLoading = true;
					document.getElementById('uploadbtn').disabled = true;
					this.buttonText = "UPLOADING...";
					document.getElementById('upbtntext').innerHTML = "UPLOADING...";
					
					fetch("{{route('uploadimage')}}", {
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
						document.getElementById('loadaccimg').click();
						setTimeout(() => {
							document.getElementById('loadaccimg').click();
						}, 10000);
						this.formMessage = this.images.length + "Images uploaded successfully!";
						showToast("Images Uploaded", this.images.length + " Images Uploaded Successfully", "success");
					})
					.catch(error => {
						this.formMessage = `Error: ${error.message}`;
						showToast("Operation Failed", "Images Upload Failed", "danger");
					})
					.finally(() => {
						this.formLoading = false;
						document.getElementById('uploadbtn').disabled = false;
						this.buttonText = "UPLOAD";
						document.getElementById('upbtntext').innerHTML = "UPLOAD";
						document.getElementById('uplcancel').click();
						document.getElementById('uploadimg').reset();
						this.images = []; 
						setTimeout(() => {
							document.getElementById('loadaccimg').click();
						}, 3000);
						booktable();
					});
				}
			};
		}
		
		// end of Image Upload Fetch API
		
		// Image Deletion Fetch API Submission
		function accdelimg() {
			return {
				formData: new FormData(),
				formMessage: "",
				formLoading: false,
				buttonText: "DELETE",
				id: "",
				accid: "",
				name: "",
				deleted: "",
				
				deleteImg() {
					this.formData.append('_token', "{{ csrf_token() }}");
					this.formData.append('id', document.getElementById('deleteid').value);
					this.formData.append('accid', document.getElementById('accdelid').value);
					this.formData.append('name', document.getElementById('delname').value);
					this.deleted = document.getElementById('delname').value;
					
					this.formMessage = "";
					this.formLoading = true;
					document.getElementById('delbtnid').disabled = true;
					this.buttonText = "DELETING...";
					document.getElementById('deltxt').innerHTML= "DELETING...";
					
					fetch("{{route('deleteaccimg')}}", {
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
						document.getElementById('loadaccimg').click();
						setTimeout(function() {
							document.getElementById('loadaccimg').click();
						}, 5000);
						this.formMessage = "Image deleted successfully!";
						showToast("Image Deleted", this.deleted + " Deleted", "success");
					})
					.catch(error => {
						
						this.formMessage = `Error: ${error.message}`;
						showToast("Operation Failed", this.deleted + " Delete Failed", "danger");
					})
					.finally(() => {
						this.formLoading = false;
						document.getElementById('delbtnid').disabled = false;
						this.buttonText = "DELETE";
						document.getElementById('deltxt').innerHTML= "DELETE";
						document.getElementById('delcancel').click();
						setTimeout(function() {
							document.getElementById('loadaccimg').click();
						}, 5000);
						booktable();
					});
				}
			};
		}
		// end of Image Deletion Fetch API
		
		// Image Replace Fetch API Submission
		function accrepimg() {
			return {
				formData: new FormData(),
				formMessage: "",
				formLoading: false,
				buttonText: "REPLACE",
				accid: "",
				seqid: "",
				name: "",
				replaced: "",
				
				handleFileUpload(event) {
					this.imageFile = event.target.files[0];
					this.formData.append('image', this.imageFile);
				},
				
				generateRandomQueryString() {
					return Math.random().toString(36).substring(2, 15);
				},
				
				replaceImg() {
					this.formData.append('_token', "{{ csrf_token() }}");
					this.formData.append('accid', document.getElementById('accrepid').value);
					this.formData.append('seqid', document.getElementById('imgseq').value);
					this.formData.append('name', document.getElementById('repname').value);
					this.replaced = document.getElementById('repname').value;
					
					this.formMessage = "";
					this.formLoading = true;
					document.getElementById('repbtnid').disabled = true;
					this.buttonText = "REPLACING...";
					document.getElementById('repbtntext').innerHTML = "REPLACING...";
					
					fetch("{{url('replaceaccimg')}}", {
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
						
						setTimeout(function() {
							document.getElementById('loadaccimg').click();
							document.getElementById('img' + document.getElementById('accrepid').value).src = '/images/resort/supplier' + document.getElementById('accrepid').value + '/' + document.getElementById('accrepid').value + document.getElementById('imgseq').value + '.' + this.getFileExtension(this.imageFile) + "?id=" + this.generateRandomQueryString();
						}, 5000);
						document.getElementById('loadaccimg').click();
						document.getElementById('img' + document.getElementById('accrepid').value).src = '/images/resort/supplier' + document.getElementById('accrepid').value + '/' + document.getElementById('accrepid').value + document.getElementById('imgseq').value + '.' + this.getFileExtension(this.imageFile) + "?id=" + this.generateRandomQueryString();
						
						this.formMessage = "Image replaced successfully!";
						showToast("Image Updated", this.replaced + " Replaced", "success");
					})
					.catch(error => {
						this.formMessage = `Error: ${error.message}`;
						showToast("Operation Failed", this.replaced + " Not Updated", "danger");
					})
					.finally(() => {
						this.formLoading = false;
						document.getElementById('repbtnid').disabled = false;
						this.buttonText = "REPLACE";
						document.getElementById('repbtntext').innerHTML = "REPLACE";
						document.getElementById('repcancel').click();
						setTimeout(function() {
							document.getElementById('loadaccimg').click();
							document.getElementById('img' + document.getElementById('accrepid').value).src = '/images/resort/supplier' + document.getElementById('accrepid').value + '/' + document.getElementById('accrepid').value + document.getElementById('imgseq').value + '.' + this.getFileExtension(this.imageFile) + "?id=" + this.generateRandomQueryString();
							
						}, 5000);
						booktable();
						
					});
				}
			};
		}
		// end of Image Replace Fetch API
		
		// Accommodation Header Update Fetch API Submission
		function headerupdate() {
			return {
				formData: new FormData(),
				formMessage: "",
				formLoading: false,
				buttonText: "CHANGE",
				accid: "",
				imageFile: null,
				headed: "",
				
				handleFileUpload(event) {
					this.imageFile = event.target.files[0];
					this.formData.append('image', this.imageFile);
				},
				
				getFileExtension(file) {
					return file ? file.name.split('.').pop().toLowerCase() : '';
				},
				
				generateRandomQueryString() {
					return Math.random().toString(36).substring(2, 15);
				},
				
				submitHeader() {
					this.formData.append('_token', "{{ csrf_token() }}");
					this.formData.append('accid', document.getElementById('accidhead').value);
					this.headed = document.getElementById('accidhead').value;
					
					this.formMessage = "";
					this.formLoading = true;
					document.getElementById('headchange').disabled = true;
					this.buttonText = "CHANGING...";
					document.getElementById('headtxt').innerHTML = "CHANGING...";
					
					fetch("{{route('uploadheader')}}", {
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
						this.formMessage = "Header updated successfully!";
						showToast("Slider Updated", "Accommodation # " + this.headed + " Slider Updated Successfully", "success");
					})
					.catch(error => {
						this.formMessage = `Error: ${error.message}`;
						showToast("Operation Failed", "Accommodation # " + this.headed + " Update Failed", "danger");
					})
					.finally(() => {
						this.formLoading = false;
						document.getElementById('headchange').disabled = false;
						this.buttonText = "CHANGE";
						document.getElementById('headtxt').innerHTML = "CHANGE";
						document.getElementById('accheadpreview').src = '/images/resort/header/' + document.getElementById('accidhead').value + 'h.' + this.getFileExtension(this.imageFile) + "?id=" + this.generateRandomQueryString();
						
						document.getElementById('headcancel').click();
						document.getElementById('headerupdateform').reset();
						booktable();
					});
				}
			};
		}
		// end of Accommodation Header Update Fetch API
		
		// Thumbnail Update Fetch API Submission
		function thumbupdate() {
			return {
				formData: new FormData(),
				formMessage: "",
				formLoading: false,
				buttonText: "CHANGE",
				accid: "",
				imageFile: null,
				updated: "",
				
				handleFileUpload(event) {
					this.imageFile = event.target.files[0];
					this.formData.append('image', this.imageFile);
				},
				
				getFileExtension(file) {
					return file ? file.name.split('.').pop().toLowerCase() : '';
				},
				
				generateRandomQueryString() {
					return Math.random().toString(36).substring(2, 15);
				},
				
				submitThumb() {
					this.formData.append('_token', "{{ csrf_token() }}");
					this.formData.append('accid', document.getElementById('accidthmb').value);
					this.updated = document.getElementById('accidthmb').value;
					
					this.formMessage = "";
					this.formLoading = true;
					document.getElementById('thmbchange').disabled = true;
					this.buttonText = "UPLOADING...";
					document.getElementById('thumbtxt').innerHTML = "CHANGING...";
					
					fetch("{{route('uploadthumbnail')}}", {
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
						this.formMessage = "Thumbnail updated successfully!";
						showToast("Thumbnail Updated", "Accommodation # " + this.updated + " Thumbnail Updated Successfully", "success");
					})
					.catch(error => {
						this.formMessage = `Error: ${error.message}`;
						showToast("Operation Failed", "Accommodation # " + this.updated + " Update Failed", "danger");
					})
					.finally(() => {
						this.formLoading = false;
						document.getElementById('thmbchange').disabled = false;
						this.buttonText = "CHANGE";
						document.getElementById('thumbtxt').innerHTML = "CHANGE";
						
						document.getElementById('accpreview').src = '/images/resort/thumbnail/' + document.getElementById('accidthmb').value + 't.' + this.getFileExtension(this.imageFile) + '?id=' + this.generateRandomQueryString();
						
						document.getElementById('thmbcancel').click();
						document.getElementById('thumbform').reset();
						booktable();
					});
				}
			};
		}
		// end of Thumbnail Update Fetch API
		
		// Dynamic Table Retrieval function
		function booktable() {
			var csrfToken = "{{ csrf_token() }}";
		
			const loadtable = new XMLHttpRequest();
			loadtable.onload = function() {
				document.getElementById('dynamicContent').innerHTML = this.responseText;
			}
			loadtable.open("POST", "{{route('loadbook')}}");
			loadtable.setRequestHeader('X-CSRF-TOKEN', csrfToken);
			loadtable.send();
			change = 0;
			
		}
		// end of Dynamic Table retrieval
		
		booktable();
		
		
		$('#uplcancel').click(function () {
			document.getElementById('uploadimg').reset();
		});
		
		$('#thmbcancel').click(function () {
			document.getElementById('thumbform').reset();
		});
		
		$('#headcancel').click(function () {
			document.getElementById('headerupdateform').reset();
		});
		
		$('#repcancel').click(function () {
			document.getElementById('repimgform').reset();
		});
		
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
