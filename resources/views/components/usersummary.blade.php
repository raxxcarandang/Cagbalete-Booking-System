
<div class="col-12 dashrow mr-2"

x-show = "currentBookings.length < 1"

x-init = "
sorter = 17;
"
>
	<h5 class="mt-2 ml-2 mb-0 fw-bold">
		&emsp;No Booking Found
	</h5>
	<br>
	
	<p style="color: black; text-align: center; font-size: 1rem;">No booking yet? No worries—Cagbalete Island is just a <a href="{{url('/booking')}}">click</a> away!</p>
	
</div>
<div class = "col-12 dashrow mr-2" 

x-show = "currentBookings.length > 0"

x-init = "
sorter = 17;
">
	<h5 class="mt-2 mb-0 fw-bold">
		&emsp;Summary
	</h5>
	
	<div class="table-responsive w-auto mt-2" style="width:100%; height:100%; margin-left: 1rem;">
		<div id = "summarytable">
			<table class="table table-borderless text-center" id="table">
				<thead id='thead'>
					<tr>
						<th scope="col">MAIN GUEST</th>
						<th scope="col">BOOKING ID</th>
						<th scope="col">ACCOMMODATION</th>
						<th scope="col">ITINERARY</th>
						<th scope="col">T.MEANS</th>
						<th scope="col">PARKING</th>
						<th scope="col">BOAT</th>
						<th scope="col">PURPOSE</th>
					</tr>
				</thead>
				<tbody>
					<template x-if="currentBookings.length > 0">
						<tr class="hover:bg-gray-200 text-gray-900 text-xs">
							
							<td id = "guesttd" 
							x-init="
							$dispatch('userload');
							$dispatch('mapload');
							setTimeout(() => $dispatch('userload'), 7000); 
							setTimeout(() => $dispatch('mapload'), 7000);
							cadate = currentBookings[0].arrival;
							crdate = currentBookings[0].departure;
							"
							>
								{{---------------------------------Start Lead Guest Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}  
								
								
								
								<span 
								x-data = "{
								gender: '',
								gcolor: '',
								today: '',
								birthdate: '',
								age: '',
								m: '',
								gclass: '',
								}"
								@userload.window = "
								
								if (user[0].gender === 'Male') {
								gender = 'male';
								gcolor = '#000080';
								gclass = 'ion-ios-male';
								} 
								
								else if (user[0].gender === 'Female') {
								gender = 'female';
								gcolor = '#AA336A';
								gclass = 'ion-ios-female';
								} 
								
								today = new Date();
								birthdate = new Date(user[0].bdate);
								age = today.getFullYear() - birthdate.getFullYear();
								m = today.getMonth() - birthdate.getMonth();
								if (m < 0 || (m === 0 && today.getDate() < birthdate.getDate())) {
								age--;
								}
								
								">
									
									<span class = "dbinfo" x-text="user[0].name"></span> <span class = "dbinfo" x-text="user[0].mname"></span> <span class = "dbinfo" x-text="user[0].lname"></span>, <span class = "dbinfo" x-text="age"></span>, <span class = "dbinfo"><i :class="gclass"  :style="'color:' + gcolor + ';'"></i></span>
								</span>
								<br>
								<span id = "emailspan">
									<span class = "dbinfo" x-text="user[0].email"></span>
									
								</span>
								<br>
								<i class="ion-md-person" id = "useric"></i>
								<span>
									<span class = "dbinfo" x-text="user[0].contactno"></span>
									
								</span>
								<br>
								<span 
								x-data = "{
								country: '',
								}"
								@mapload.window = "
								
								if (user[0].country == 'INTERNATIONAL') {
								country = 'un';
								} else if (user[0].country == 'PHILIPPINES') {
								country = 'ph';
								} else if (user[0].country == 'MAUBAN') {
								country = 'mn';
								} 
								
								">
									<table class ="table table-borderless text-center" id = "countrytable">
										<tr>
											<td style = "width: 33%;">
												<span class = "dbinfo"><img x-bind:src="'/images/nation/' + country + '.webp'" x-model = "country" style = "width: 2rem; height: 1.25rem; display: inline-flex;" /></span>
												
											</td>
											<td>
												<span class = "dbinfo" x-text="user[0].region"></span>
												
											</td>
										</tr>
									</table>
								</span>
								
								
								
								{{---------------------------------End Lead Guest Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
							</td>
							
							<td id = "booktd">
								{{---------------------------------Start Booking ID Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}  
								
								
								<span id = "bookid">Booking # <span x-text="currentBookings[0].id"></span>
								</span>
								
								
								
								{{---------------------------------End Booking ID Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
							</td>
							
							
							
							<td id = "acctd">
								{{---------------------------------Start Accommodation Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}  
								<span class = "dbinfo" x-text="currentBookings[0].accommodation"></span>
								{{---------------------------------Start Accommodation Type Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
							</td>
							
							<td id = "itrtd">
								{{---------------------------------Start Itinerary Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
								<span class = 'dbinfo'><br>(<span x-text="currentBookings[0].itinerary"></span>)<br><strong><span x-text="new Date(currentBookings[0].arrival).toLocaleDateString('en-US', { year: '2-digit', month: '2-digit', day: '2-digit' } )"></span>&nbsp;->&nbsp;<span x-text="new Date(currentBookings[0].departure).toLocaleDateString('en-US', { year: '2-digit', month: '2-digit', day: '2-digit' } )"></span></strong><br><br></span>
								{{---------------------------------End Itinerary Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
							</td>
							
							<td>
								{{---------------------------------Start Travel Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}  
								<span class="dbinfo" x-text="currentBookings[0].travelmeans"></span>
								
								
								{{---------------------------------End Travel Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}  							
							</td>
							<td>
								{{---------------------------------Start Parking Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}
								<span class = 'dbinfo'><span class = "dbinfo" x-text="currentBookings[0].parking"></span> </span>
								{{---------------------------------End Parking Column-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
							</td>
							
							<td>
								{{---------------------------------Start Boat Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}
								<span class = 'dbinfo'><span class = "dbinfo" x-text="currentBookings[0].boating"></span> </span>
								{{---------------------------------End Boat Column-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
							</td>
							
							<td>
								{{---------------------------------Start Purpose Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}  
								<span class = 'dbinfo'> <span class = "dbinfo" x-text="currentBookings[0].purpose"></span> </span>
								{{---------------------------------End Purpose Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}
							</td>
							
						</tr>
					</template>
					<tr x-show="currentBookings.length < 1">
						<td colspan="100%" class="text-center py-3 text-gray-900 text-sm">No matching records found.</td>
					</tr>
				</tbody>
			</table>
			
			<table class="table table-borderless text-center" id="tableguests">
				<thead id='thead'>
					<tr>
						<th scope="col" colspan="2" @click="advanced = !advanced; ">GUESTS <span x-show="advanced == false"><i class="ion-ios-arrow-down"></i></span><span x-show="advanced == true"><i class="ion-ios-arrow-up"></i></span></th>
					</tr>
				</thead>
				
				<template x-if="currentBookings.length > 0">
					<tbody >
						<tr x-show="advanced">
							<td></td>
							<td></td>
						</tr>
						<tr x-show="advanced">
							<td id = "agetd">
								{{---------------------------------Start Age 1 Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
								
								<table id="tabledemonest">
									<tr>
										<td>
											<span class = "dbinfon" x-text="currentBookings[0].zeroto7yold"></span>
										</td>
										<td>
											<strong><img src ="/images/symbol/kid.png" id= "bookkid"/> 0-12 YEARS OLD</strong>
										</td>
										
									</tr>
								</table>
								
								
								
								{{---------------------------------End Age Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
							</td>
							<td id = "nattd">
								{{---------------------------------Start Nationality 3 Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
								
								<table id="tabledemonest">
									<tr>
										<td>
											<span class = "dbinfon" x-text="currentBookings[0].foreigners"></span>
										</td>
										<td>
											<strong>&nbsp;<img src ="/images/nation/un.webp" id= "bookun" /> TOURIST </strong> 
										</td>
										
									</tr>
								</table>	
								
								
								
								{{---------------------------------End Nationality Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
							</td>
							
							
							
							
						</tr>
						<tr x-show="advanced">
							<td id = "agetd">
								{{---------------------------------Start Age 2 Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
								
								<table id="tabledemonest">
									<tr>
										<td>
											<span class = "dbinfon" x-text="currentBookings[0].thirteento50yold" id = "maturespan"></span>
										</td>
										<td>
											<strong><img src ="/images/symbol/mature.png" id= "bookmature"/> 13-59 YEARS OLD </strong>
										</td>
										
									</tr>
								</table>	
								
								{{---------------------------------End Age Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
							</td>
							
							<td id = "nattd">
								{{---------------------------------Start Nationality 1 Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
								
								<table id="tabledemonest">
									<tr>
										<td>
											<span class = "dbinfon" x-text="currentBookings[0].maubanins"></span>
										</td>
										<td>
											<strong>&nbsp;<img src ="/images/nation/mn.webp" id= "bookmn"/> MAUBANIN </strong>
										</td>
										
									</tr>
								</table>	
								
								
								{{---------------------------------End Nationality Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
							</td>
							
							
							
							
						</tr>
						<tr x-show="advanced">
							<td id = "agetd">
								{{---------------------------------Start Age 3 Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
								
								<table id="tabledemonest">
									<tr>
										<td>
											<span class = "dbinfon" x-text="currentBookings[0].above60yold"></span>
										</td>
										<td>
											<strong><img src ="/images/symbol/old.png" id= "bookold"/> 60+ YEARS OLD </strong>
										</td>
										
									</tr>
								</table>
								
								{{---------------------------------End Age Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
							</td>
							<td id = "nattd">
								{{---------------------------------Start Nationality 2 Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
								
								<table id="tabledemonest">
									<tr>
										<td>
											<span class = "dbinfon" x-text="currentBookings[0].filipinos"></span>
										</td>
										<td>
											<strong>&nbsp;<img src ="/images/nation/ph.webp" id= "bookph"/> FILIPINO </strong>
										</td>
										
									</tr>
								</table>	
								
								
								{{---------------------------------End Nationality Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
							</td>
							
							
						</tr>
						
						<tr x-show="advanced">
							<td id = "agetd">
								{{---------------------------------Start Age 4 Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
								
								
								<table id="tabledemonest">
									<tr>
										<td>
											<span class = "dbinfon" x-text="currentBookings[0].specialneeds" id ="spcspan"></span>
										</td>
										<td>
											<strong><img src ="/images/symbol/spc.png" id= "bookspc"/> PRIORITY GUEST </strong>
										</td>
										
									</tr>
								</table>
								
								
								
								{{---------------------------------End Age Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
							</td>
							
							<td id = "tottd">
								{{---------------------------------Start Total Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
								
								<table id="tabledemonest">
									<tr>
										<td>
											<span class = "dbinfon" x-text="currentBookings[0].totalmale"></span>
										</td>
										<td>
											<strong>&nbsp;<i class="ion-ios-male" style="color: #000080;"></i> MALE </strong>
										</td>
										<td>
											<span class = "dbinfont" x-text="currentBookings[0].totalfemale"></span>
										</td>
										<td>
											<strong>&nbsp;<i class="ion-ios-female" style="color: #AA336A;"></i> FEMALE </strong>
										</td>
									</tr>
									
								</table>	
								
								{{---------------------------------End Total Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
							</td>
						</tr>
						
						<tr >
							<td id = "tottd" colspan="2">
								<table id="tabledemonesttot">
									<tr>
										
										<td>
											<strong>TOTAL GUESTS</strong>
										</td>
										<td>
											<span class = "dbinfot2" x-text="currentBookings[0].totalvisitors"></span>
										</td>
										
									</tr>
								</table>
							</td>
						</tr>
						
					</template>
					<tr x-show="currentBookings.length < 1">
						<td colspan="100%" class="text-center py-3 text-gray-900 text-sm">No matching records found.</td>
					</tr>
				</tbody>
			</table>
			<table class="table table-borderless" id="tablefee">
				<thead id='thead'>
					<tr>
						<th scope="col" colspan="2">FEES (PAYABLE AT FRONT DESK)</th>
						<th scope="col">AMOUNT</th>
					</tr>
				</thead>
				
				<template x-if="currentBookings.length > 0">
					<tbody>
						<tr>
							<td colspan="2" x-show="advanced">
								ENVIRONMENTAL TOURISM AND ADMINISTRATIVE FEE (<span x-text="currentBookings[0].totalvisitors"></span> <span x-text="currentBookings[0].totalvisitors > 1 ? 'GUESTS' : 'GUEST'"></span>)
							</td>
							<td>
								<span x-text="currentBookings[0].amount" x-show="advanced"></span>
							</td>
						</tr>
						<tr>
							<td colspan="2" x-show="advanced">
								DISCOUNT (0-7 Y.O., SENIOR, PWD, ETC.)
							</td>
							<td>
								<span x-text="currentBookings[0].discount" x-show="advanced"></span>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								NET AMOUNT
							</td>
							<td>
								<span x-text="currentBookings[0].namount"></span>
							</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
					</tbody>
				</template>
				<tr x-show="currentBookings.length < 1">
					<td colspan="100%" class="text-center py-3 text-gray-900 text-sm">No matching records found.</td>
				</tr>
				
			</table>
			<br><br>
		</div>
		<div id = "btndiv1" style="margin-bottom: 1rem;" x-init="$dispatch('bookload');">
			<button 
			x-show="currentBookings.length >= 1"
			type="button"
			name="cancelbtn"  
			class="btn sortbtn"
			id="btncancel"
			title="CANCEL BOOKING"
			data-bs-toggle="modal"
			data-bs-target="#cancelModal"
			@click="bookid = currentBookings.map(book => book.id);"
		
			>
				CANCEL
			</button>
			
			
			
			
			
			<button x-show="currentBookings.length >= 1"
			type = 'button' 
			name = 'printbtn'  
			class = "btn sortbtn"
			id = "btnprint"
			title = 'PRINT BOOKING'
			:value="currentBookings.map(book => book.id);" 
			>
				SAVE
			</button>
			
			
				<button 
				type = 'button' 
				name = 'confirmbtn'  
				class = "btn sortbtn"
				id = "btnconfirm"
				title = 'RECOUNT GUESTS'
				data-bs-toggle="modal"
				data-bs-target="#tallym"
				@click = 'bookid = currentBookings.map(book => book.id); tmale = currentBookings.map(book => book.totalmale); tfemale = currentBookings.map(book => book.totalfemale); tvisitor = currentBookings.map(book => book.totalvisitors); tfilipino = currentBookings.map(book => book.filipinos); tmaubanin = currentBookings.map(book => book.maubanins); tforeigner = currentBookings.map(book => book.foreigners); tthirth = currentBookings.map(book => book.thirteento50yold); t60 = currentBookings.map(book => book.above60yold); tzero7 = currentBookings.map(book => book.zeroto7yold); tpriority = currentBookings.map(book => book.specialneeds);'
				:disabled="!['PENDING', 'RESCHEDULED'].includes(currentBookings[0].status)">
				EDIT BOOKING
				</button>
			
			
			<button x-show="currentBookings.length >= 1"
			type = 'button' 
			name = 'reschedbtn' 
			class = 'btn sortbtn' 
			id = "btnresched"
			title = 'RESCHEDULE' 
			data-bs-toggle="modal"
			data-bs-target="#reschedmodal" 
			@click = 'bookid = currentBookings.map(book => book.id); arrivaldb = currentBookings.map(book => book.arrival); returndb = currentBookings.map(book => book.departure);'
			:disabled="!['PENDING', 'UNCONFIRMED', 'APPROVED', 'CANCELLED', 'RESCHEDULED'].includes(currentBookings[0].status)">
				RESCHEDULE
			</button>
			
		</div>
		
	</div>
</div>	






