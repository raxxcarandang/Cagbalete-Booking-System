
<div class = "row mt-2">
	<div class = "col-12 dashrow mr-2" 
	x-data = "{
	gup: false,
	gdown: false,
	tyup: false,
	tydown: false,
	acup: false,
	acdown: false,
	paup: false,
	padown: false,
	bup: false,
	bdown: false,
	tmup: false,
	tmdown: false,
	puup: false,
	pudown: false,
	itup: false,
	itdown: false,
	}"
	x-init = "
	sorter = 17;
	setTimeout(() => $dispatch('bookload'), 2000);
	">
		<h5 class="mt-2 mb-0 fw-bold">
			&nbsp;Past Bookings
		</h5>
		<div class="table-responsive w-auto" style="width:100%; height:100%; margin-left: 1rem; margin-right: 1rem;" 
		@bookload.window="
		
		if(itrsort == 1) {
		
		itrsorted = bookings.filter(booking => 
		booking.itinerary === 'Day Tour'
		); 
		} else if(itrsort == 2) {
		
		itrsorted = bookings.filter(booking => 
		booking.itinerary === 'Overnight'
		); 
		} else if(itrsort == 3) {
		
		itrsorted = bookings.filter(booking => 
		booking.itinerary === '2 Nights'
		); 
		} else if(itrsort == 4) {
		
		itrsorted = bookings.filter(booking => 
		booking.itinerary === '3 Nights'
		); 
		} else if(itrsort == 5) {
		
		itrsorted = bookings.filter(booking => 
		booking.itinerary === '4 Nights'
		); 
		}  else if(itrsort == 6) {
		
		itrsorted = bookings.filter(booking => 
		booking.itinerary === '5+ Nights'
		); 
		} else {
		itrsorted = bookings;
		}
		
		if(stssort == 1) {
		
		sorted = itrsorted.filter(booking => 
		booking.status === 'PENDING'
		)
			} else if(stssort == 2) {
		
		sorted = itrsorted.filter(booking => 
		booking.status === 'ARRIVED'
		); 
			} else if(stssort == 3) {
		
		sorted = itrsorted.filter(booking => 
		booking.status === 'RESCHEDULED'
		);  
			}	else if(stssort == 4) {
		
		sorted = itrsorted.filter(booking => 
		booking.status === 'CANCELLED'
		);  
			}	else if(stssort == 5) {
		
		sorted = itrsorted.filter(booking => 
		booking.status === 'DELINQUENT'
		); 
		
		} 	else {
		sorted = itrsorted;
		}
		
		if(contsort == 1) {
		usbook = users.filter(user => 
		user.country == 'PHILIPPINES'
		);
		booktosort = sorted.filter(booking => 
		booking.userid.toString().toLowerCase().includes(usbook.map(userb => userb.id))
		); 
		} 
		
		else if(contsort == 2) {
		usbook = users.filter(user => 
		user.country == 'MAUBAN'
		);
		booktosort = sorted.filter(booking => 
		booking.userid.toString().toLowerCase().includes(usbook.map(userb => userb.id))
		); 
		} 
		
		else if(contsort == 3) {
		usbook = users.filter(user => 
		user.country == 'INTERNATIONAL'
		);
		booktosort = sorted.filter(booking => 
		booking.userid.toString().toLowerCase().includes(usbook.map(userb => userb.id))
		); 
		} 
		
		else {
		booktosort = sorted;
		}
		
		if(sorter == 1) {
		sortedbookings = booktosort.sort((a, b) => a.id - b.id);
		gup = true;
		gdown = false;
		tyup =  false;
		tydown =  false;
		acup =  false;
		acdown =  false;
		paup =  false;
		padown =  false;
		bup =  false;
		bdown =  false;
		tmup =  false;
		tmdown =  false;
		puup =  false;
		pudown =  false;
		itup =  false;
		itdown =  false;
		}
		else if (sorter == 2) {
		sortedbookings = booktosort.sort((a, b) => b.id - a.id);
		gdown = true;
		gup = false;
		tyup =  false;
		tydown =  false;
		acup =  false;
		acdown =  false;
		paup =  false;
		padown =  false;
		bup =  false;
		bdown =  false;
		tmup =  false;
		tmdown =  false;
		puup =  false;
		pudown =  false;
		itup =  false;
		itdown =  false;
		}
		else if(sorter == 3) {
		sortedbookings = booktosort.sort((a, b) => a.totalvisitors - b.totalvisitors);
		gdown = false;
		gup = false;
		tyup =  false;
		tydown =  true;
		acup =  false;
		acdown =  false;
		paup =  false;
		padown =  false;
		bup =  false;
		bdown =  false;
		tmup =  false;
		tmdown =  false;
		puup =  false;
		pudown =  false;
		itup =  false;
		itdown =  false;
		}
		else if(sorter == 4) {
		sortedbookings = booktosort.sort((a, b) => b.totalvisitors - a.totalvisitors);
		gdown = false;
		gup = false;
		tyup =  true;
		tydown =  false;
		acup =  false;
		acdown =  false;
		paup =  false;
		padown =  false;
		bup =  false;
		bdown =  false;
		tmup =  false;
		tmdown =  false;
		puup =  false;
		pudown =  false;
		itup =  false;
		itdown =  false;
		}
		else if(sorter == 5) {
		sortedbookings = booktosort.sort(function (a, b) {
		var accA = a.accommodation.toLowerCase(), accB = b.accommodation.toLowerCase();
		if(accA < accB) { 
		return -1; 
		}
		else if(accA > accB) {
		return 1;
		}
		return 0;
		});
		gdown = false;
		gup = false;
		tyup =  false;
		tydown =  false;
		acup =  true;
		acdown =  false;
		paup =  false;
		padown =  false;
		bup =  false;
		bdown =  false;
		tmup =  false;
		tmdown =  false;
		puup =  false;
		pudown =  false;
		itup =  false;
		itdown =  false;
		}
		else if(sorter == 6) {
		sortedbookings = booktosort.sort(function (a, b) {
		var accA = a.accommodation.toLowerCase(), accB = b.accommodation.toLowerCase();
		if(accA > accB) { 
		return -1; 
		}
		else if(accA < accB) {
		return 1;
		}
		return 0;
		});
		gdown = false;
		gup = false;
		tyup =  false;
		tydown =  false;
		acup =  false;
		acdown =  true;
		paup =  false;
		padown =  false;
		bup =  false;
		bdown =  false;
		tmup =  false;
		tmdown =  false;
		puup =  false;
		pudown =  false;
		itup =  false;
		itdown =  false;
		}
		else if(sorter == 7) {
		sortedbookings = booktosort.sort(function (a, b) {
		var parkA = a.parking.toLowerCase(), parkB = b.parking.toLowerCase();
		if(parkA < parkB) { 
		return -1; 
		}
		else if(parkA > parkB) {
		return 1;
		}
		return 0;
		});
		gdown = false;
		gup = false;
		tyup =  false;
		tydown =  false;
		acup =  false;
		acdown =  false;
		paup =  true;
		padown =  false;
		bup =  false;
		bdown =  false;
		tmup =  false;
		tmdown =  false;
		puup =  false;
		pudown =  false;
		itup =  false;
		itdown =  false;
		}
		else if(sorter == 8) {
		sortedbookings = booktosort.sort(function (a, b) {
		var parkA = a.parking.toLowerCase(), parkB = b.parking.toLowerCase();
		if(parkA > parkB) { 
		return -1; 
		}
		else if(parkA < parkB) {
		return 1;
		}
		return 0;
		});
		gdown = false;
		gup = false;
		tyup =  false;
		tydown =  false;
		acup =  false;
		acdown =  false;
		paup =  false;
		padown =  true;
		bup =  false;
		bdown =  false;
		tmup =  false;
		tmdown =  false;
		puup =  false;
		pudown =  false;
		itup =  false;
		itdown =  false;
		}
		else if(sorter == 9) {
		sortedbookings = booktosort.sort(function (a, b) {
		var boatA = a.boating.toLowerCase(), boatB = b.boating.toLowerCase();
		if(boatA < boatB) { 
		return -1; 
		}
		else if(boatA > boatB) {
		return 1;
		}
		return 0;
		});
		gdown = false;
		gup = false;
		tyup =  false;
		tydown =  false;
		acup =  false;
		acdown =  false;
		paup =  false;
		padown =  false;
		bup =  true;
		bdown =  false;
		tmup =  false;
		tmdown =  false;
		puup =  false;
		pudown =  false;
		itup =  false;
		itdown =  false;
		}
		else if(sorter == 10) {
		sortedbookings = booktosort.sort(function (a, b) {
		var boatA = a.boating.toLowerCase(), boatB = b.boating.toLowerCase();
		if(boatA > boatB) { 
		return -1; 
		}
		else if(boatA < boatB) {
		return 1;
		}
		return 0;
		});
		gdown = false;
		gup = false;
		tyup =  false;
		tydown =  false;
		acup =  false;
		acdown =  false;
		paup =  false;
		padown =  false;
		bup =  false;
		bdown =  true;
		tmup =  false;
		tmdown =  false;
		puup =  false;
		pudown =  false;
		itup =  false;
		itdown =  false;
		}
		else if(sorter == 11) {
		sortedbookings = booktosort.sort(function (a, b) {
		var tmeansA = a.travelmeans.toLowerCase(), tmeansB = b.travelmeans.toLowerCase();
		if(tmeansA < tmeansB) { 
		return -1; 
		}
		else if(tmeansA > tmeansB) {
		return 1;
		}
		return 0;
		});
		gdown = false;
		gup = false;
		tyup =  false;
		tydown =  false;
		acup =  false;
		acdown =  false;
		paup =  false;
		padown =  false;
		bup =  false;
		bdown =  false;
		tmup =  true;
		tmdown =  false;
		puup =  false;
		pudown =  false;
		itup =  false;
		itdown =  false;
		}
		else if(sorter == 12) {
		sortedbookings = booktosort.sort(function (a, b) {
		var tmeansA = a.travelmeans.toLowerCase(), tmeansB = b.travelmeans.toLowerCase();
		if(tmeansA > tmeansB) { 
		return -1; 
		}
		else if(tmeansA < tmeansB) {
		return 1;
		}
		return 0;
		});
		gdown = false;
		gup = false;
		tyup =  false;
		tydown =  false;
		acup =  false;
		acdown =  false;
		paup =  false;
		padown =  false;
		bup =  false;
		bdown =  false;
		tmup =  false;
		tmdown =  true;
		puup =  false;
		pudown =  false;
		itup =  false;
		itdown =  false;
		}
		else if(sorter == 13) {
		sortedbookings = booktosort.sort(function (a, b) {
		var purposeA = a.purpose.toLowerCase(), purposeB = b.purpose.toLowerCase();
		if(purposeA < purposeB) { 
		return -1; 
		}
		else if(purposeA > purposeB) {
		return 1;
		}
		return 0;
		});
		gdown = false;
		gup = false;
		tyup =  false;
		tydown =  false;
		acup =  false;
		acdown =  false;
		paup =  false;
		padown =  false;
		bup =  false;
		bdown =  false;
		tmup =  false;
		tmdown =  false;
		puup =  true;
		pudown =  false;
		itup =  false;
		itdown =  false;
		}
		else if(sorter == 14) {
		sortedbookings = booktosort.sort(function (a, b) {
		var purposeA = a.purpose.toLowerCase(), purposeB = b.purpose.toLowerCase();
		if(purposeA > purposeB) { 
		return -1; 
		}
		else if(purposeA < purposeB) {
		return 1;
		}
		return 0;
		});
		gdown = false;
		gup = false;
		tyup =  false;
		tydown =  false;
		acup =  false;
		acdown =  false;
		paup =  false;
		padown =  false;
		bup =  false;
		bdown =  false;
		tmup =  false;
		tmdown =  false;
		puup =  false;
		pudown =  true;
		itup =  false;
		itdown =  false;
		}
		else if(sorter == 15) {
		sortedbookings = booktosort.sort(function (a, b) {
		var arrA = a.arrival.toLowerCase(), arrB = b.arrival.toLowerCase();
		if(arrA < arrB) { 
		return -1; 
		}
		else if(arrA > arrB) {
		return 1;
		}
		return 0;
		});
		gdown = false;
		gup = false;
		tyup =  false;
		tydown =  false;
		acup =  false;
		acdown =  false;
		paup =  false;
		padown =  false;
		bup =  false;
		bdown =  false;
		tmup =  false;
		tmdown =  false;
		puup =  false;
		pudown =  false;
		itup =  true;
		itdown =  false;
		}
		else if(sorter == 16) {
		sortedbookings = booktosort.sort(function (a, b) {
		var arrA = a.arrival.toLowerCase(), arrB = b.arrival.toLowerCase();
		if(arrA > arrB) { 
		return -1; 
		}
		else if(arrA < arrB) {
		return 1;
		}
		return 0;
		});
		gdown = false;
		gup = false;
		tyup =  false;
		tydown =  false;
		acup =  false;
		acdown =  false;
		paup =  false;
		padown =  false;
		bup =  false;
		bdown =  false;
		tmup =  false;
		tmdown =  false;
		puup =  false;
		pudown =  false;
		itup =  false;
		itdown =  true;
		}
		else if(sorter == 17){
		sortedbookings = booktosort.sort(function (a, b) {
		var stsA = a.status.toLowerCase(), stsB = b.status.toLowerCase();
		if(stsA > stsB) { 
		return -1; 
		}
		else if(stsA < stsB) {
		return 1;
		}
		return 0;
		});
		gdown = false;
		gup = false;
		tyup =  false;
		tydown =  false;
		acup =  false;
		acdown =  false;
		paup =  false;
		padown =  false;
		bup =  false;
		bdown =  false;
		tmup =  false;
		tmdown =  false;
		puup =  false;
		pudown =  false;
		itup =  false;
		itdown =  false;
		}
		
		if (searchint == '') {
		filteredbookings = sortedbookings.slice((cpage-1) * perpage).slice(0, perpage);
		pages = booktosort.length;
		} else {
		userbook = users.filter(user => 
		user.name.toString().toLowerCase().includes(searchint) || user.lname.toString().toLowerCase().includes(searchint) || user.gender.toString().toLowerCase().includes(searchint)
		|| user.contactno.toString().toLowerCase().includes(searchint) || user.country.toString().toLowerCase().includes(searchint) || user.region.toString().toLowerCase().includes(searchint)
		|| user.email.toString().toLowerCase().includes(searchint)
		);
		if (userbook.length > 0 ) {
		searchbook = sortedbookings.filter(booking => 
		booking.userid.toString().toLowerCase().includes(userbook.map(userb => userb.id))
		); 
		}
		else {
		searchbook = sortedbookings.filter(booking => 
		booking.id.toString().toLowerCase().includes(searchint) || booking.accommodation.toString().toLowerCase().includes(searchint) || booking.arrival.toString().toLowerCase().includes(searchint) 
		|| booking.departure.toString().toLowerCase().includes(searchint) || booking.foreigners.toString().toLowerCase().includes(searchint) || booking.filipinos.toString().toLowerCase().includes(searchint) 
		|| booking.maubanins.toString().toLowerCase().includes(searchint) || booking.totalmale.toString().toLowerCase().includes(searchint) || booking.totalfemale.toString().toLowerCase().includes(searchint)
		|| booking.totalvisitors.toString().toLowerCase().includes(searchint) || booking.specialneeds.toString().toLowerCase().includes(searchint) || booking.zeroto7yold.toString().toLowerCase().includes(searchint)
		|| booking.thirteento50yold.toString().toLowerCase().includes(searchint) || booking.above60yold.toString().toLowerCase().includes(searchint) || booking.travelmeans.toString().toLowerCase().includes(searchint)
		|| booking.parking.toString().toLowerCase().includes(searchint) || booking.boating.toString().toLowerCase().includes(searchint) || booking.purpose.toString().toLowerCase().includes(searchint) || booking.status.toString().toLowerCase().includes(searchint)
		); 
		}
		pages = searchbook.length;
		filteredbookings = searchbook.slice((cpage-1) * perpage).slice(0, perpage);
		}
		tpages = Math.ceil(pages / perpage);
		if (bookings.length === 0) {
		showbook = false;
		hidebook = true;
		} else {
		showbook = true;
		hidebook = false;	
		}
		
		$dispatch('stsload');
		$dispatch('mapload');
		$dispatch('tmeansload');
		$dispatch('boatload');
		$dispatch('userload');
		"
		
		x-init="
		$watch('searchint', value => $dispatch('bookload'));
		$watch('cpage', value => $dispatch('bookload'));
		$watch('perpage', value => $dispatch('bookload'));
		"
		>
			
			<div class="flex justify-between items-center">
				<div class="flex space-x-2 items-center">
					<select class = "form-select" x-model="perpage" @change="cpage = 1" id = "rowview">
						<option value="3">3 Rows</option>
						<option value="6">6 Rows</option>
						<option value="9">9 Rows</option>
						<option value="12">12 Rows</option>
						<option value="15">15 Rows</option>
					</select>
					<input x-model="searchint" @input.change="cpage = 1" type="text" class="form-control px-2 py-1 border rounded focus:outline-none" placeholder="Search...">
					<button 
					title = 'Advanced Filter'
					class = "sortbtn"
					@click="
					advanced = !advanced;
					"
					>
						<i class = "ion-ios-settings" :style="{ color: advanced ? 'red' : 'green', fontSize: '1.25rem', marginLeft: '0.25rem' }"></i>
					</button>
				</div>
				
				<div>
					&emsp;
				</div>
				<div>
					&emsp;
				</div>
				<div>
					&emsp;
				</div>
				<div>
					&emsp;
				</div>
				<div>
					&emsp;
				</div>
				<div>
					&emsp;
				</div>
				
				<div>
				<!--
					<select
					id="stsselect"
					title = 'Sort By Status'
					class = "form-select sortselector"
					x-model="stssort"
					x-show="advanced"
					@input.change="
					cpage = 1;
					$dispatch('bookload');
					
					">
						<option value="6">All Status</option>
						<option value="1">Pending</option>
						<option value="2">Arrived</option>
						<option value="3">Rescheduled</option>
						<option value="4">Cancelled</option>
						<option value="5">Delinquent</option>
					</select>
					-->
				</div>
				<div>
				<!--
					<select
					id="itrselect"
					class = "form-select sortselector"
					title = 'Sort by Itinerary' 
					x-model="itrsort"
					x-show="advanced"
					@input.change="
					cpage = 1;
					$dispatch('bookload');
					
					"
					>
						<option value="7">All Itinerary</option>
						<option value="1">DAYTOUR</option>
						<option value="2">OVERNIGHT</option>
						<option value="3">2 NIGHTS</option>
						<option value="4">3 NIGHTS</option>
						<option value="5">4 NIGHTS</option>
						<option value="6">5+ NIGHTS</option>
					</select>
					-->
				</div>
				<div>
					<button 
					title = 'Reset Table'
					class = "sortbtn"
					id="resetbtn"
					@click="
					stssort = 4;
					contsort = 4;
					stsicon = 'clipboard';
					cont = 'wh';
					scolor = 'black';
					cpage = 1;
					searchint = '';
					$dispatch('bookload');
					"
					>
						<i class = "ion-ios-sync" style="color:green; font-size: 1.25rem;"></i>
					</button>
				</div>
				<div>
					<button type = 'button' 
					name = 'createbtn'  
					class = "btn sortbtn2"
					id = "btncrt"
					title = 'ADD NEW BOOKING' 
					@click="document.location.href = '{{ url('booking') }}';"
					>
						<i class='ion-md-add-circle-outline'></i>&nbsp;BOOK NEW
					</button>
				</div>
				
			</div>
			<table class="table table-borderless text-center mt-1" id="table">
				<thead id='thead'>
					<tr>
						<th scope="col" class="cursor-pointer" @click="if(sorter == 17 || sorter > 2) { sorter = 2; } else if(sorter == 2) { sorter = 1; } else if(sorter == 1) { sorter = 17; } $dispatch('bookload')">BOOKING ID<template x-if="gup"> <i class="ion-ios-arrow-up"></i> </template> <template x-if="gdown"> <i class="ion-ios-arrow-down"></i></template></th>
						<th scope="col" class="cursor-pointer" @click="if(sorter == 17 || sorter < 3 || sorter > 4 ) { sorter = 4; } else if(sorter == 4) { sorter = 3; } else if(sorter == 3) { sorter = 17; } $dispatch('bookload')">TYPE <template x-if="tyup"> <i class="ion-ios-arrow-up"></i> </template> <template x-if="tydown"> <i class="ion-ios-arrow-down"></i></template></th>
						<th scope="col" class="cursor-pointer" @click="if(sorter == 17 || sorter < 5 || sorter > 6 ) { sorter = 6; } else if(sorter == 6) { sorter = 5; } else if(sorter == 5) { sorter = 17; } $dispatch('bookload')">ACCOMMODATION <template x-if="acup"> <i class="ion-ios-arrow-up"></i> </template> <template x-if="acdown"> <i class="ion-ios-arrow-down"></i></template></th>
						<th scope="col" class="cursor-pointer" @click="if(sorter == 17 || sorter < 15) { sorter = 16; } else if(sorter == 16) { sorter = 15; } else if(sorter == 15) { sorter = 17; } $dispatch('bookload')">ITINERARY <template x-if="itup"> <i class="ion-ios-arrow-up"></i> </template> <template x-if="itdown"> <i class="ion-ios-arrow-down"></i></template></th>
						<th scope="col" class="cursor-pointer" @click="if(sorter == 17 || sorter < 11 || sorter > 12 ) { sorter = 12; } else if(sorter == 12) { sorter = 11; } else if(sorter == 11) { sorter = 17; } $dispatch('bookload')">T.MEANS <template x-if="tmup"> <i class="ion-ios-arrow-up"></i> </template> <template x-if="tmdown"> <i class="ion-ios-arrow-down"></i></template></th>
						<th scope="col" class="cursor-pointer" @click="if(sorter == 17 || sorter < 7 || sorter > 8 ) { sorter = 8; } else if(sorter == 8) { sorter = 7; } else if(sorter == 7) { sorter = 17; } $dispatch('bookload')">PARKING <template x-if="paup"> <i class="ion-ios-arrow-up"></i> </template> <template x-if="padown"> <i class="ion-ios-arrow-down"></i></template></th>
						<th scope="col" class="cursor-pointer" @click="if(sorter == 17 || sorter < 9  || sorter > 10 ) { sorter = 10; } else if(sorter == 10) { sorter = 9; } else if(sorter == 9) { sorter = 17; } $dispatch('bookload')">BOAT <template x-if="bup"> <i class="ion-ios-arrow-up"></i> </template> <template x-if="bdown"> <i class="ion-ios-arrow-down"></i></template></th>
						<th scope="col" class="cursor-pointer" @click="if(sorter == 17 || sorter < 13 || sorter > 14 ) { sorter = 14; } else if(sorter == 14) { sorter = 13; } else if(sorter == 13) { sorter = 17; } $dispatch('bookload')">PURPOSE <template x-if="puup"> <i class="ion-ios-arrow-up"></i> </template> <template x-if="pudown"> <i class="ion-ios-arrow-down"></i></template></th>
						<th scope="col">REMARK</th>
						
						
					</tr>
				</thead>
				<tbody>
					<template x-for="booking in filteredbookings" :key="booking.id">
						<tr class="maintabletd" class="hover:bg-gray-200 text-gray-900 text-xs" 	
						
						x-data = "{  
						stsg: '',
						stscolor: '',
						stsclass: '',
						stslight: '',
						}"
						
						@stsload.window = "
						
						if (booking.status === 'PENDING') {	
						
						stscolor = 'black';
						stslight = '';
						stsclass = 'separator';
						} 
						else if (booking.status === 'ARRIVED') {
						
						stscolor = 'black';
						stslight = booking.color;
						stsclass = 'separator';
						} 
						
						else if (booking.status === 'CANCELLED') {
						
						stscolor = 'black';
						stslight = '#FFFDD0';
						stsclass = 'separator';
						}
						else if (booking.status === 'RESCHEDULED') {
						
						stscolor = 'black';;
						stslight = '#D3D3D3';
						stsclass = 'separator';
						}
						
						"  :style="'background: ' + stslight + ';'">
							
							<td id = "guesttd" 
							>
								{{---------------------------------Start Lead Guest Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}  
								
								<div :class="stsclass">
									
									<span class = "dbinfo" x-text = "booking.status" x-bind:style = "'color: ' + stscolor + ';'"></span> 
									
								</span> 
							</div>
							<br>
							<span id = "bookid">Booking # <span x-text="booking.id"></span>
							</span>
							<br>
							<br>
							<div :class="stsclass" x-show="advanced" >
								
								<span class = "dbinfo" x-text = "booking.status" x-bind:style = "'color: ' + stscolor + ';'"></span> 
								
							</span> 
						</div>
						
						{{---------------------------------End Lead Guest Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
					</td>
					
					<td id = "typetd">
						{{---------------------------------Start Visitor Type Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
						
						<table class="table table-borderless text-center" id="tablen2" :style="'background: ' + stslight + ';'">
							<tr>
								<td  id = "tottd2" colspan="2">
									D: ₱<span class = "dbinfot" x-text="booking.discount"></span>
								</td>
								<td id = "tottd2" colspan="2">
									
									<span class = "dbinfot" x-text="booking.totalvisitors"></span>
									<strong>GUESTS</strong>
									
									
									
								</td>
								<td id = "tottd2" colspan="2">
									N: ₱<span class = "dbinfot" x-text="booking.namount"></span>
								</td>
								
							</tr>
							
							
							<tr x-show="advanced">
								<td class="tdborder" id = "totmtd">
									{{---------------------------------Start Total Male Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
									
									
									<span class = "dbinfon" x-text="booking.totalmale"></span>
									
									
									
									
									
									{{---------------------------------End Total Male Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
								</td>
								<td class="tdborder2">
									<strong>MALE</strong>
								</td>
								
								
								<td class="tdborder" id = "totftd">
									{{---------------------------------Start Total Female  Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
									
									
									<span class = "dbinfont" x-text="booking.totalfemale"></span>
									
									
									
									
									{{---------------------------------End Total Female Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
								</td>
								<td class="tdborder2">
									<strong>FEMALE</strong>
								</td>
								<td class="tdborder" id = "agetd">
									{{---------------------------------Start Priority Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
									
									
									
									<span class = "dbinfon" x-text="booking.specialneeds" id ="spcspan"></span>
									
									
									
									
									
									
									{{---------------------------------End Priority Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
								</td>
								<td class="tdborder2">
									<strong>PRIORITY</strong>
								</td>
								
							</tr>
							<tr x-show="advanced">
								
								<td class="tdborder" id = "nattd">
									{{---------------------------------Start Nationality 3 Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
									
									
									<span class = "dbinfon" x-text="booking.foreigners"></span>
									
									
									
									
									{{---------------------------------End Nationality Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
								</td>
								<td class="tdborder2">
									<strong>TOURIST</strong> 
								</td>
								
								<td class="tdborder" id = "nattd">
									{{---------------------------------Start Nationality 1 Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
									
									
									<span class = "dbinfon" x-text="booking.maubanins"></span>
									
									
									
									
									{{---------------------------------End Nationality Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
								</td>
								
								<td class="tdborder2">
									<strong>MAUBANIN</strong>
								</td>
								
								
								<td class="tdborder" id = "nattd">
									{{---------------------------------Start Nationality 2 Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
									
									
									<span class = "dbinfon" x-text="booking.filipinos"></span>
									
									
									
									
									
									{{---------------------------------End Nationality Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
								</td>
								<td class="tdborder2">
									<strong>FILIPINO</strong>
								</td>
								
								
								
								
							</tr>
							<tr x-show="advanced">
								<td class="tdborder" id = "agetd">
									{{---------------------------------Start Age 1 Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
									
									
									<span class = "dbinfon" x-text="booking.zeroto7yold"></span>
									
									
									{{---------------------------------End Age Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
								</td>
								<td class="tdborder2">
									<strong>(0-7)Y.O.</strong>
								</td>
								<td class="tdborder" id = "agetd">
									{{---------------------------------Start Age 2 Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
									
									
									<span class = "dbinfon" x-text="booking.thirteento50yold" id = "maturespan"></span>	
									
									{{---------------------------------End Age Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
								</td>
								<td class="tdborder2">
									<strong>(13-50)Y.O.</strong>
								</td>
								<td class="tdborder" id = "agetd">
									{{---------------------------------Start Age 3 Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
									
									
									<span class = "dbinfon" x-text="booking.above60yold"></span>
									
									{{---------------------------------End Age Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
								</td>
								
								<td class="tdborder2">
									<strong>(60+)Y.O.</strong>
								</td>
								
								
							</tr>
							
						</table>
						
						
						{{---------------------------------End Visitor Type Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
					</td>
					
					<td id = "acctd">
						{{---------------------------------Start Accommodation Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}  
						<span class = "dbinfo" x-text="booking.accommodation"></span>
						{{---------------------------------Start Accommodation Type Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
					</td>
					
					<td id = "itrtd">
						{{---------------------------------Start Itinerary Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
						<span class = 'dbinfo'> (<span x-text="booking.itinerary"></span>)<span x-show="advanced" ><br><br><span x-text="new Date(booking.arrival).toLocaleDateString('en-US', { year: '2-digit', month: '2-digit', day: '2-digit' } )"></span><br>↓<br><span x-text="new Date(booking.departure).toLocaleDateString('en-US', { year: '2-digit', month: '2-digit', day: '2-digit' } )"></span></span></span>
						{{---------------------------------End Itinerary Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
					</td>
					
					<td>
						{{---------------------------------Start Travel Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}  
						<span class="dbinfo" x-text="booking.travelmeans"></span>
						
						
						{{---------------------------------End Travel Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}  							
					</td>
					<td>
						{{---------------------------------Start Parking Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}
						<span class = 'dbinfo'><span class = "dbinfo" x-text="booking.parking"></span> </span>
						{{---------------------------------End Parking Column-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
					</td>
					
					<td>
						{{---------------------------------Start Boat Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}
						<span class = 'dbinfo'><span class = "dbinfo" x-text="booking.boating"></span> </span>
						{{---------------------------------End Boat Column-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
					</td>
					
					<td>
						{{---------------------------------Start Purpose Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}  
						<span class = 'dbinfo'> <span class = "dbinfo" x-text="booking.purpose"></span> </span>
						{{---------------------------------End Purpose Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}
					</td>
					
					<td id = "remtd">
						{{---------------------------------Start Remark Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
						<span x-text="booking.remark"></span><span x-show="booking.remark == NULL">N/A</span>
						{{---------------------------------End Remark Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
					</td>
					
					
				</tr>
			</template>
			<tr x-show="cpage > tpages">
				<td colspan="100%" class="text-center py-3 text-gray-900 text-sm">No matching records found.</td>
			</tr>
		</tbody>
	</table>
	<div class="flex mt-2 justify-center">
		<div id = "pgbtn" class="border px-2 cursor-pointer"
		@click = "cpage = 1;
		$dispatch('bookload');
		"
		>
			<span class="text-gray-700">First</span>
		</div>
		<div id = "pgbtn" class="border px-2 cursor-pointer" 
		@click = "if (cpage > 1) {
		cpage--;
		$dispatch('bookload');
		}"
		>
			<span class="text-gray-700"><</span>
			</div>
			<div class="flex content-end">
				&nbsp;Page&nbsp;<input type="number" class="form-control" x-model="cpage" style="max-height: 1.47rem; max-width: 5.7rem; font-size: 0.9rem; text-align: center;" />&nbsp;of&nbsp;<span class="text-gray-700" x-text="tpages"></span>&nbsp;
			</div>
			<div id = "pgbtn" class="border px-2 cursor-pointer" 
			@click = "if (cpage < tpages) {
			cpage++;
			$dispatch('bookload');
			}
			"
			>
				<span class="text-gray-700">></span>
			</div>
			<div id = "pgbtn" class="border px-2 cursor-pointer"
			@click = "cpage = tpages;
			$dispatch('bookload');
			"
			>
				<span class="text-gray-700">Last</span>
			</div>
			</div>
			
		</div>
	</div>
	
	
</div>






