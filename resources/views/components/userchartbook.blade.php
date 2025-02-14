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
	); 
	} else if(stssort == 2) {
	
	sorted = itrsorted.filter(booking => 
	booking.status === 'DENIED'
	); 
	} else if(stssort == 3) {
	
	sorted = itrsorted.filter(booking => 
	booking.status === 'APPROVED'
	); 
	} else {
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
				<select class = "form-select" x-model="perpage" @change="cpage = 1; $dispatch('bookload');" id = "rowview">
					<option value="3">3 Rows</option>
					<option value="6">6 Rows</option>
					<option value="9">9 Rows</option>
					<option value="12">12 Rows</option>
					<option value="15">15 Rows</option>
				</select>
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
				&emsp;
			</div>
			<div>
				&emsp;
			</div>
			<div>
				&emsp;
			</div>
			<div>
				<button 
				title = 'Reset Table'
				class = "sortbtn"
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
				&emsp;
				<button 
				title = 'Sort By Status'
				class = "sortbtn"
				@click="
				if(stssort == 4) { 
				stssort = 1; 
				stsicon = 'warning';
				scolor = 'orange';
				} else if(stssort == 1) {
				stssort = 2; 
				stsicon = 'exit'; 
				scolor = 'red';
				} else if(stssort == 2) {
				stssort = 3; 
				stsicon = 'checkmark-circle-outline';
				scolor = 'green';
				} else if(stssort == 3) {
				stssort = 4; 
				stsicon = 'clipboard';
				scolor = 'black';
				} 
				cpage = 1;
				$dispatch('bookload');
				">
					<i :class = "'ion-ios-' + stsicon" :style="'font-size: 1.25rem; color: ' + scolor + ';'"></i>
				</button>
				&emsp;
				
			</div>
			<div>
				<button type = 'button' 
				name = 'createbtn'  
				class = "btn sortbtn"
				id = "btncrt"
				title = 'ADD NEW BOOKING' 
				@click="document.location.href = '{{ url('booking') }}';"
				:disabled="currentBookings.length > 0"
				>
					<i class='ion-md-add-circle-outline'></i>&nbsp;BOOK NEW
				</button>
			</div>
			
		</div>
		<table class="table table-bordered table=striped text-center mt-1" id="table">
			<thead id='thead'>
				<tr>
					<th scope="col" class="cursor-pointer" 
					@click="
					if(sorter == 17 || sorter > 2) { 
					sorter = 2; 
					} else if(sorter == 2) {
					sorter = 1; 
					} else if(sorter == 1) {
					sorter = 17; 
					} 
					$dispatch('bookload')">
						BOOKING ID
						<template x-if="gup">
							<i class="ion-ios-arrow-up"></i> 
						</template> 
						<template x-if="gdown">
							<i class="ion-ios-arrow-down"></i>
						</template>
					</th>
					<th scope="col" class="cursor-pointer" 
					@click="
					if(sorter == 17 || sorter > 2) { 
					sorter = 2; 
					} else if(sorter == 2) {
					sorter = 1; 
					} else if(sorter == 1) {
					sorter = 17; 
					} 
					$dispatch('bookload')">
						STATUS
						<template x-if="gup">
							<i class="ion-ios-arrow-up"></i> 
						</template> 
						<template x-if="gdown">
							<i class="ion-ios-arrow-down"></i>
						</template>
					</th>
					<th scope="col">REMARK</th>
				</tr>
			</thead>
			<tbody>
				<template x-for="booking in filteredbookings" :key="booking.id">
					<tr class="hover:bg-gray-200 text-gray-900 text-xs" 	
					
					x-data = "{  
					stsg: '',
					stscolor: '',
					stsclass: '',
					stslight: '',
					}"
					
					@stsload.window = "
					if (booking.status === 'PENDING') {	
					stsg = 'PENDING';
					stscolor = 'black';
					stslight = '';
					stsclass = 'separator';
					} 
					else if (booking.status === 'APPROVED') {
					stsg = 'APPROVED';
					stscolor = 'green';
					stslight = '#cefad0';
					stsclass = 'separatorapv';
					} 
					else if (booking.status === 'DENIED') {
					stsg = 'DENIED';
					stscolor = 'red';
					stslight = '#FFCCCB';
					stsclass = 'separatordny';
					} 
					else if (booking.status === 'CANCELLED') {
					stsg = 'CANCELLED';
					stscolor = 'blue';
					stslight = ' #A1D9D1';
					stsclass = 'separatorcnl';
					} " 
					
					:style="'background: ' + stslight + ';'">
						
						<td id = "guesttd" 
						>
							{{---------------------------------Start Booking ID Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}  
							
							
							<span id = "bookid">Booking # <span x-text="booking.id"></span></span>
							
							
							{{---------------------------------End Booking ID Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
						</td>
						
						<td id = "guesttd" 
						>
							{{---------------------------------Start Status Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}  
							
							
							<span id = "sts"><span x-text="stsg"></span>
							</span>
							
							
							{{---------------------------------End Status Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
						</td>
						
						<td id = "remtd">
							{{---------------------------------Start Remark Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
							<span x-text="booking.remark"></span><span x-show="booking.remark == ''">N/A</span>
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
