<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
		
        <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
		
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
         <meta name="description" content="
Discover the best of Mauban, Quezon! Explore the stunning beauty of Cagbalete Island, home to serene beaches and top resorts like Aquazul Hotel and Resort, Dona Choleng Camping Resort, Rio del Sol Beach Resort, and Villa Cleofas. Relax at Mauban's finest coastal destinations, including Jovencio's Resort, MVT Sto. Niño Beach Resort, Nilandingan Cove Resort, and Villa Noe Beach Resort. Enjoy beachfront serenity at Villa Pilarosa, Tita Pinay Beach Resort, Aguho Playa Beach Resort, Tent Place, and Orlan Beach Resort. Plan your perfect island escape with crystal-clear waters, lush landscapes, and unforgettable experiences.">
		<meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Booking Form</title>
		
        @vite(['resources/js/app.js'])
		
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i" rel="stylesheet">
		
		
        <!-- Styles -->
        <style>
            
		</style>
		
		
	</head>
	
    <body x-data="{ 
	forminprogress: true,
	fileName1: '', 
	imagePreview1: null, 
	showImagePreview1: false, 
	fileData1: null,
	
	fileName2: '', 
	imagePreview2: null, 
	showImagePreview2: false, 
	fileData2: null,
	
	fileName3: '', 
	imagePreview3: null, 
	showImagePreview3: false, 
	fileData3: null,
	
	
	previewImage1(event) { 
    const file1 = event.target.files[0]; 
    if (file1) { 
	this.fileData1 = file1; 
	this.fileName1 = file1.name; 
	this.imagePreview1 = URL.createObjectURL(file1);
	
    }
	},
	
	
	previewImage2(event) { 
    const file2 = event.target.files[0]; 
    if (file2) { 
	this.fileData2 = file2; 
	this.fileName2 = file2.name; 
	this.imagePreview2 = URL.createObjectURL(file2);
	
    }
	},
	
	
	previewImage3(event) { 
    const file3 = event.target.files[0]; 
    if (file3) { 
	this.fileData3 = file3; 
	this.fileName3 = file3.name; 
	this.imagePreview3 = URL.createObjectURL(file3);
	}
    },
	
	inphone: window.matchMedia('(max-width: 768px)').matches,
	parktext: '',
	parkdesc: '',
	parktab: 0,
	showpcheck: false,
	parkcheck: false,
	park: '',
	oparkdiv: false,
	opark: null,
	parkimg: '',
	parkintro: 'Travel & Parking',
	parknum: '',
	radpark: '',
	parkbef: '',
	parkreq: '',
	parkinq: '',
	
	tmtext: 'Please Select Travel Means',
	tmeanimg: 'tmean.jpg',
	tmeanname: 'Mauban Welcome Arch',
	
	boattext: '',
	boatdesc: '',
	showbcheck: false,
	boatcheck: false,
	oboat: null,
	boat: null,
	boattab: 0,
	oboatdiv: false,
	boatimg: '',
	boatintro: 'Classify your Boat',
	boatnum: '',
	radboat: '',
	boatbef: '',
	boatreq: '',
	boatinq: '',
	
	accimg: '',
	acctext: '',
	oacc: 'Enter Accommodation Here',
	showacheck: false,
	acc: '',
	accdesc: '',
	accimg: 'other.webp',
	accintro: 'Chart your Destination',
	acccheck: false,
	accnum: '',
	accbef: '',
	accreq: '',
	accinq: '',
	
	opurposediv: false,
	opurpose: 'Enter Purpose Here',
	oaccdiv: false,
	purpose: '',
	
	tvisitor: '',
	tmale: '',
	tfemale: '',
	tpriority: '',
	tzero7: '',
	tthirth: '',
	t60: '',
	tmaubanin: '',
	tfilipino: '',
	tforeigner: '',
	
	base: 80,
	deducted: 64, 
	amount: 0,
	discount: 0,
	namount: 0,
	
	adate: '<?php echo date('Y-m-d') ?>',
	rdate: '',
	itinerary: '',
	timediff: null,
	datediff: null,
	
	tmeans: '',
	means: '',
	tmeanspuv: 'Public Vehicle',
	
	accblock: true,
	boatblock: true,
	parkblock: true,
	personblock: true,
	natblock: true,
	ageblock: true,
	priorityblock: true,
	childblock: false,
	blankblock: true,
	
	parkerr: '',
	boaterr: '',
	
	showpuv: false,
	showpv: false,
	
	nopark: true,
	noboat: true,
	noacc: true,
	noperson: true,
	nosum: true,
	
	empty: '',
	}">
		
		<x-navbar />
		
		<x-consentmodal />
		
		<x-bookingformv2 :accommodations="$accommodations" :users="$users" :ubookings="$ubookings"/>
		
		<x-footer />
		
		<x-loader />
		
		
		
	</body>
	
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
	<script src="/js/jquery.timepicker.min.js"></script>
	<script src="/js/scrollax.min.js"></script>
	<script src="/js/main.js"></script>
	<script src="/js/alpine.validate.min.js"></script>
	<script src="/js/multistepform.js"></script>
	<script src="/js/html2canvas.js"></script>
	<script>
		
		
		const bookSlider = document.querySelector('.book-slider');
		
		
		const event = new CustomEvent('to.owl.carousel', {
			detail: [6, 300]  
		});
		
		
		// Booking Fetch API Submission
		function bookUser() {
			return {
				formData: new FormData(),
				formMessage: "",
				formLoading: false,
				buttonText: "SUBMIT",
				above60: "",  
				acc: "",
				arrival: "",
				itinerary: "",
				boat: "",
				departure: "",
				female: "",
				filipinos: "",
				foreigners: "",
				male: "",
				maubanins: "",
				parking: "",
				priority: "",
				purpose: "",
				thirth: "",
				tmeans: "",
				visitors: "",
				zero7: "",
				
				
				
				submitBook() {
					const requiredFields = [
    'acc', 'adate', 'itinerary', 'boat', 'rdate', 'purpose','tmeans', 
	 'fileData2', 'fileData3'
];
					
					for (const field of requiredFields) {
						if (!this[field]) {
							this.formMessage = `Error: A required field hasn't been filled in.`;
							alert(this.formMessage); 
							return;
						}
					}
					
					this.formData.append('_token', "{{ csrf_token() }}");
					this.formData.append('above60',  this.t60);
					this.formData.append('acc', this.acc);
					this.formData.append('arrival', this.adate);
					this.formData.append('itinerary', this.itinerary);
					this.formData.append('boat', this.boat);
					this.formData.append('departure', this.rdate);
					this.formData.append('female', this.tfemale);
					this.formData.append('filipinos', this.tfilipino);
					this.formData.append('foreigners', this.tforeigner);
					this.formData.append('male', this.tmale);
					this.formData.append('maubanins', this.tmaubanin);
					this.formData.append('parking', this.park);
					this.formData.append('priority', this.tpriority);
					this.formData.append('purpose', this.purpose);
					this.formData.append('thirth', this.tthirth);
					this.formData.append('tmeans', this.tmeans);
					this.formData.append('visitors', this.tvisitor);
					this.formData.append('zero7', this.tzero7);
					this.formData.append('amount', this.amount);
					this.formData.append('discount', this.discount);
					this.formData.append('namount', this.namount);
					
					this.formData.append('parkproofimg', this.fileData1); 
					
					this.formData.append('boatproofimg', this.fileData2); 
					
					this.formData.append('accproofimg', this.fileData3); 
					
					
					
					this.formMessage = "";
					this.formLoading = true;
					document.getElementById('submitBtn').disabled = true;
					this.buttonText = "SUBMITTING...";
					document.getElementById('submitTxt').innerHTML = "SUBMITTING...";
					
					fetch("{{url('book')}}", {
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
						this.forminprogress = false;
						
						$(document).ready(function() {
							$('.book-slider').trigger('to.owl.carousel', [6, 300]);
						});
						
					},
					
					)
					.catch(error => {
						this.formMessage = `Error: ${error.message}`;
						location.reload();
					})
					.finally(() => {
						this.formLoading = false;
						document.getElementById('submitBtn').disabled = false;
						this.buttonText = "SUBMIT";
						document.getElementById('submitTxt').innerHTML = "SUBMIT";
						
					});
				}
			};
		}
		// end of Booking Fetch API
		
		document.getElementById("bookmainform").addEventListener("keydown", function (event) {
			if (event.key === "Tab") {
				
				event.preventDefault();
			}
		});
		
		$(document).ready(function() {
			$('.owl-carousel').on('keydown', function(event) {
				if (event.keyCode === 13) {  
					event.preventDefault();
				}
				if (event.keyCode === 9) {  
					event.preventDefault();
				}
			});
			
			$('#consentm').modal('show');
			
			$('#cardot1').click(function () {
				$('.book-slider').trigger('to.owl.carousel', [0, 300]);
			});
			$('#cardot2').click(function () {
				$('.book-slider').trigger('to.owl.carousel', [1, 300]);
			});
			$('#cardot3').click(function () {
				$('.book-slider').trigger('to.owl.carousel', [2, 300]);
			});
			$('#cardot4').click(function () {
				$('.book-slider').trigger('to.owl.carousel', [3, 300]);
			});
			$('#cardot5').click(function () {
				$('.book-slider').trigger('to.owl.carousel', [4, 300]);
			});
			$('#cardot6').click(function () {
				$('.book-slider').trigger('to.owl.carousel', [5, 300]);
			});
			
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
		});
		
	document.getElementById('screenshotBtn').addEventListener('click', function() {
    var element = document.getElementById('sumtablediv');
    
    var width = element.offsetWidth;
    var height = element.offsetHeight;
    
    var scale = Math.min(window.innerWidth / width, window.innerHeight / height);
    
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); 
    var yyyy = today.getFullYear();
    var dateStr = yyyy + '-' + mm + '-' + dd;
    
    html2canvas(element, {
        scale: scale,  
        scrollX: 0,   
        scrollY: 0,
        useCORS: true,  
        ignoreElements: (el) => el.tagName === "BUTTON" || el.tagName === "INPUT",
    }).then(function(canvas) {
        var imageData = canvas.toDataURL('image/png');
        
        var link = document.createElement('a');
        link.href = imageData;
        link.download = 'Booking-' + dateStr + '.png';
        link.click(); 
    });
});

		
		
		
		
	</script>
</html>

