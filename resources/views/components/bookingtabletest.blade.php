<div class = "row">
	<div class = "col-12" 
	x-data = "{
	users: {},
	accommodations: {},
	booking: {},
	bookings: {},
	showbook: false,
	hidebook: false,
	databook: {},
	}"
	>
		<div id="dynacontent"></div>
		<div class="table-responsive w-auto" style="width:100%; height:100%; margin-left: 1rem; margin-right: 1rem;">
			<div x-data="dataTable()"
			x-init="
			initData()
			$watch('searchInput', value => {
			search(value)
			})" 
			@bookload.window="
			items = bookings.sort(compareOnKey('accommodation', 'asc'));
			if (bookings.length === 0) {
			showbook = false;
			hidebook = true;
			} else {
			showbook = true;
			hidebook = false;	
			}"
			class="bg-white p-5 shadow-md w-full flex flex-col">
				<div class="flex justify-between items-center">
					<div class="flex space-x-2 items-center">
						<p>Show</p>
						<select x-model="view" @change="changeView()">
							<option value="3">3</option>
							<option value="6">6</option>
							<option value="9">9</option>
							<option value="12">12</option>
							<option value="15">15</option>
						</select>
					</div>
					<div>
						<input x-model="searchInput" type="text" class="px-2 py-1 border rounded focus:outline-none" placeholder="Search...">
					</div>
				</div>
				<table class="table table-bordered table=striped text-center" id="table">
					<thead class="border-b-2">
						<th>
							<div class="flex space-x-2">
								<span>
									GUEST
								</span>
							</span>
							<div class="flex flex-col">
								<svg @click="sort('id', 'asc')" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24" stroke="currentColor" class="h-3 w-3 cursor-pointer text-gray-500 fill-current" x-bind:class="{'text-blue-500': sorted.field === 'id' && sorted.rule === 'asc'}"><path d="M5 15l7-7 7 7"></path></svg>
								<svg @click="sort('id', 'desc')" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24" stroke="currentColor" class="h-3 w-3 cursor-pointer text-gray-500 fill-current" x-bind:class="{'text-blue-500': sorted.field === 'id' && sorted.rule === 'desc'}"><path d="M19 9l-7 7-7-7"></path></svg>
							</div>
						</div>
					</th>
					<th>
						<div class="flex space-x-2">
							<span>
								VISITOR TYPE
							</span>
						</span>
						<div class="flex flex-col">
							<svg @click="sort('totalvisitors', 'asc')" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24" stroke="currentColor" class="h-3 w-3 cursor-pointer text-gray-500 fill-current" x-bind:class="{'text-blue-500': sorted.field === 'totalvisitors' && sorted.rule === 'asc'}"><path d="M5 15l7-7 7 7"></path></svg>
							<svg @click="sort('totalvisitors', 'desc')" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24" stroke="currentColor" class="h-3 w-3 cursor-pointer text-gray-500 fill-current" x-bind:class="{'text-blue-500': sorted.field === 'totalvisitors' && sorted.rule === 'desc'}"><path d="M19 9l-7 7-7-7"></path></svg>
						</div>
					</div>
				</th>
				<th>
					<div class="flex space-x-2">
						<span>
							ACCOMMODATION
						</span>
					</span>
					<div class="flex flex-col">
						<svg @click="sort('accommodation', 'asc')" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24" stroke="currentColor" class="h-3 w-3 cursor-pointer text-gray-500 fill-current" x-bind:class="{'text-blue-500': sorted.field === 'accommodation' && sorted.rule === 'asc'}"><path d="M5 15l7-7 7 7"></path></svg>
						<svg @click="sort('accommodation', 'desc')" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24" stroke="currentColor" class="h-3 w-3 cursor-pointer text-gray-500 fill-current" x-bind:class="{'text-blue-500': sorted.field === 'accommodation' && sorted.rule === 'desc'}"><path d="M19 9l-7 7-7-7"></path></svg>
					</div>
				</div>
			</th>
			<th>
				<div class="flex space-x-2">
					<span>
						PARKING
					</span>
				</span>
				<div class="flex flex-col">
					<svg @click="sort('parking', 'asc')" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24" stroke="currentColor" class="h-3 w-3 cursor-pointer text-gray-500 fill-current" x-bind:class="{'text-blue-500': sorted.field === 'parking' && sorted.rule === 'asc'}"><path d="M5 15l7-7 7 7"></path></svg>
					<svg @click="sort('parking', 'desc')" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24" stroke="currentColor" class="h-3 w-3 cursor-pointer text-gray-500 fill-current" x-bind:class="{'text-blue-500': sorted.field === 'parking' && sorted.rule === 'desc'}"><path d="M19 9l-7 7-7-7"></path></svg>
				</div>
			</div>
		</th>
		<th>
			<div class="flex space-x-2">
				<span>
					BOAT
				</span>
			</span>
			<div class="flex flex-col">
				<svg @click="sort('boating', 'asc')" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24" stroke="currentColor" class="h-3 w-3 cursor-pointer text-gray-500 fill-current" x-bind:class="{'text-blue-500': sorted.field === 'boating' && sorted.rule === 'asc'}"><path d="M5 15l7-7 7 7"></path></svg>
				<svg @click="sort('boating', 'desc')" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24" stroke="currentColor" class="h-3 w-3 cursor-pointer text-gray-500 fill-current" x-bind:class="{'text-blue-500': sorted.field === 'boating' && sorted.rule === 'desc'}"><path d="M19 9l-7 7-7-7"></path></svg>
			</div>
		</div>
	</th>
	<th>
		<div class="flex space-x-2">
			<span>
				T. MEANS
			</span>
		</span>
		<div class="flex flex-col">
			<svg @click="sort('travelmeans', 'asc')" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24" stroke="currentColor" class="h-3 w-3 cursor-pointer text-gray-500 fill-current" x-bind:class="{'text-blue-500': sorted.field === 'travelmeans' && sorted.rule === 'asc'}"><path d="M5 15l7-7 7 7"></path></svg>
			<svg @click="sort('travelmeans', 'desc')" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24" stroke="currentColor" class="h-3 w-3 cursor-pointer text-gray-500 fill-current" x-bind:class="{'text-blue-500': sorted.field === 'travelmeans' && sorted.rule === 'desc'}"><path d="M19 9l-7 7-7-7"></path></svg>
		</div>
	</div>
</th>
<th>
	<div class="flex space-x-2">
		<span>
			PURPOSE
		</span>
	</span>
	<div class="flex flex-col">
		<svg @click="sort('purpose', 'asc')" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24" stroke="currentColor" class="h-3 w-3 cursor-pointer text-gray-500 fill-current" x-bind:class="{'text-blue-500': sorted.field === 'purpose' && sorted.rule === 'asc'}"><path d="M5 15l7-7 7 7"></path></svg>
		<svg @click="sort('purpose', 'desc')" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24" stroke="currentColor" class="h-3 w-3 cursor-pointer text-gray-500 fill-current" x-bind:class="{'text-blue-500': sorted.field === 'purpose' && sorted.rule === 'desc'}"><path d="M19 9l-7 7-7-7"></path></svg>
	</div>
</div>
</th>
<th>
	<div class="flex space-x-2">
		<span>
			ITINERARY
		</span>
	</span>
	<div class="flex flex-col">
		<svg @click="sort('arrival', 'asc')" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24" stroke="currentColor" class="h-3 w-3 cursor-pointer text-gray-500 fill-current" x-bind:class="{'text-blue-500': sorted.field === 'arrival' && sorted.rule === 'asc'}"><path d="M5 15l7-7 7 7"></path></svg>
		<svg @click="sort('arrival', 'desc')" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24" stroke="currentColor" class="h-3 w-3 cursor-pointer text-gray-500 fill-current" x-bind:class="{'text-blue-500': sorted.field === 'arrival' && sorted.rule === 'desc'}"><path d="M19 9l-7 7-7-7"></path></svg>
	</div>
</div>
</th>
<th scope="col">ACTION</th>
</thead>
<tbody>
	<template x-for="(item, index) in items" :key="index">
		<tr x-show="checkView(index + 1)" class="hover:bg-gray-200 text-gray-900 text-xs">
			<td id = "guesttd">
				{{---------------------------------Start Lead Guest Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}  
				<span id = "bookid">Booking # <span x-text="item.id"></span>
				</span>
				<br>
				<div x-data = "{  
				stsg: null,
				stscolor: null,
				stsclass: null,
				}"
				@stsload.window = "
				if (item.status === 0) {	
				stsg = 'Pending';
				stscolor = 'black';
				stsclass = 'separator';
				} 
				else if (item.status === 1) {
				stsg = 'Approved';
				stscolor = 'green';
				stsclass = 'separatorapv';
				} 
				else if (item.status === 2) {
				stsg = 'Denied';
				stscolor = 'red';
				stsclass = 'separatordny';
				}"
				:class="stsclass">
					
					<span class = "dbinfo" x-text = "stsg" x-bind:style = "'color: ' + stscolor + ';'"></span> 
					
				</span> <input type='text' value=" " name = 'status' id='tstatus' class='form-control form-control-sm updform' placeholder = 'status' required />
			</div>
			<span 
			x-data = "{
			gender: null,
			gcolor: null,
			today: null,
			birthdate: null,
			age: null,
			m: null,
			gclass: '',
			}"
			@userload.window = "
			
			if (users[item.userid - 1].gender === 'Male') {
			gender = 'male';
			gcolor = '#000080';
			gclass = 'ion-ios-male';
			} 
			
			else if (users[item.userid - 1].gender === 'Female') {
			gender = 'female';
			gcolor = '#AA336A';
			gclass = 'ion-ios-female';
			} 
			
			today = new Date();
			birthdate = new Date(users[item.userid - 1].bdate);
			age = today.getFullYear() - birthdate.getFullYear();
			m = today.getMonth() - birthdate.getMonth();
			if (m < 0 || (m === 0 && today.getDate() < birthdate.getDate())) {
			age--;
			}
			
			">
				
				<span class = "dbinfo" x-text="users[item.userid - 1].name"></span>  <span class = "dbinfo" x-text="users[item.userid - 1].lname"></span>, <span class = "dbinfo" x-text="age"></span>, <span class = "dbinfo"><i :class="gclass"  :style="'color:' + gcolor + ';'"></i></span>
			</span>
			<br>
			<span id = "emailspan">
				<span class = "dbinfo" x-text="users[item.userid - 1].email"></span>
				<input type='email' value='' name = 'email' id='temail' class='form-control form-control-sm updform' placeholder = 'example@yahoo.com' required /> 
			</span>
			<br>
			<i class="ion-md-person" id = "useric"></i>
			<span>
				<span class = "dbinfo" x-text="users[item.userid - 1].contactno"></span>
				<input type = 'text' value = '' name = 'contactno' id='tcontact' class='form-control form-control-sm updform' placeholder = '09123456789' required />		
			</span>
			<br>
			<div x-data = "{  
			stsg: null,
			stscolor: null,
			stsclass: null,
			}"
			@stsload.window = "
			
			if (item.status === 0) {	
			stsg = 'Pending';
			stscolor = 'black';
			stsclass = 'separator';
			} 
			else if (item.status === 1) {
			stsg = 'Approved';
			stscolor = 'green';
			stsclass = 'separatorapv';
			} 
			else if (item.status === 2) {
			stsg = 'Denied';
			stscolor = 'red';
			stsclass = 'separatordny';
			} 
			"
			:class="stsclass">
				
				<span class = "dbinfo" x-text = "stsg" x-bind:style = "'color: ' + stscolor + ';'"></span> 
				
			</span>
		</div>
		<span 
		x-data = "{
		country: null,
		}"
		@mapload.window = "
		
		if (users[item.userid - 1].country == 0) {
		country = 'un';
		} else if (users[item.userid - 1].country == 1) {
		country = 'ph';
		} else if (users[item.userid - 1].country == 2) {
		country = 'mn';
		} 
		
		">
			<table class ="table table-borderless text-center" id = "countrytable">
				<tr>
					<td style = "width: 33%;">
						<span class = "dbinfo"><img x-bind:src="'/images/nation/' + country + '.webp'" x-model = "country" style = "width: 2rem; height: 1.25rem; display: inline-flex;" /></span>
						<input type = 'text' value = '' name = 'country' id='tcountry' class='form-control form-control-sm updform' placeholder = 'PH' required />
					</td>
					<td>
						<span class = "dbinfo" x-text="users[item.userid - 1].region"></span>
						<input type = 'text' value = '' name = 'region' id='tregion' class='form-control form-control-sm updform' placeholder = 'VII' required />
					</td>
				</tr>
			</table>
		</span>
		
		
		
		{{---------------------------------End Lead Guest Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
	</td>
	
	<td id = "typetd">
		{{---------------------------------Start Visitor Type Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
		<table class="table table-bordered table=striped text-center" id="tablen2">
			<tbody>
				<tr>
					<td>∑ <span class = "dbinfo" x-text="item.totalvisitors"></span><input type = 'number' value = '' min = '0' name = 'visitorc' id='tvisitorc' class='form-control form-control-sm updform' placeholder = '7' required /></td>
					<td><i class="ion-ios-male" style="color: #000080;"> </i><span class = "dbinfo" x-text="item.totalmale"></span></td>
					<td><i class="ion-ios-female" style="color: #AA336A;"> </i><span class = "dbinfo" x-text="item.totalfemale"></span></td>
				</tr>
				<tr>
					<td><img src ="/images/nation/ph.webp" id= "bookph"/> <span class = "dbinfo" x-text="item.filipinos"></span></td>
					<td><img src ="/images/nation/mn.webp" id= "bookmn"/> <span class = "dbinfo" x-text="item.maubanins"></span></td>
					<td><img src ="/images/nation/un.webp" id= "bookun" /> <span class = "dbinfo" x-text="item.foreigners"></span></td>
				</tr>
				<tr>
					<td rowspan="2"><img src ="/images/symbol/spc.png" id= "bookspc"/> <span class = "dbinfo" x-text="item.specialneeds" id ="spcspan"></span></td>
					<td><img src ="/images/symbol/kid.png" id= "bookkid"/> <span class = "dbinfo" x-text="item.zeroto7yold"></span></td>
					<td rowspan="2"> <img src ="/images/symbol/mature.png" id= "bookmature"/><span class = "dbinfo" x-text="item.thirteento50yold" id = "maturespan"></span></td>
				</tr>
				<tr>
					<td><img src ="/images/symbol/old.png" id= "bookold"/> <span class = "dbinfo" x-text="item.above60yold"></span></td>
				</tr>
			</tbody>
		</table>
		{{---------------------------------End Visitor Type Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
	</td>
	<td>
		{{---------------------------------Start Accommodation Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}  
		<span class = "dbinfo" x-text="item.accommodation"></span> <input type = 'text' value = '' name = 'resort' id='tresort' class='form-control form-control-sm updform' placeholder = 'Magic Resort' required />
		{{---------------------------------Start Accommodation Type Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
	</td>
	
	<td>
		{{---------------------------------Start Parking Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}
		<span class = 'dbinfo'><span class = "dbinfo" x-text="item.parking"></span> </span><input type = 'text' value = '' name = 'parking' id='tparking' class='form-control form-control-sm updform' placeholder = 'Flying Parking' required />
		{{---------------------------------End Parking Column-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
	</td>
	
	<td x-data = "{
	boating: null,
	}"
	@boatload.window = "
	if (item.boating == 0) {
	boating = 'Public Boat';
	} else if (item.boating == 1) {
	boating = 'Private Boat';
	}  else if (item.boating == 2) {
	boating = 'Boat Provided by Resort';
	}"
	>
		{{---------------------------------Start Boat Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}
		<span class = 'dbinfo'><span class = "dbinfo" x-html="boating"></span> </span><input type = 'text' value = '' name = 'boat' id='tboat' class='form-control form-control-sm updform' placeholder = 'Boat' required />
		{{---------------------------------End Boat Column-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
	</td>
	
	<td 
	
	x-data = "{
	vehicle: null,
	}"
	@tmeansload.window = "
	if (item.travelmeans == 0) {
	vehicle = 'Private Vehicle';
	} else if (item.travelmeans == 1) {
	vehicle = 'Public Utility Vehicle';
	} 
	">
		{{---------------------------------Start Travel Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}  
		<span class="dbinfo" x-html="vehicle"></span>
		
		<input type = 'text' value = '' name = 'travelmeans' id='ttmeans' class='form-control form-control-sm updform' placeholder = 'Travelling' required />
		{{---------------------------------End Travel Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}  							
	</td>
	
	<td>
		{{---------------------------------Start Purpose Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}  
		<span class = 'dbinfo'> <span class = "dbinfo" x-text="item.purpose"></span> </span><input type = 'text' value = '' name = 'purpose' id='tpurpose' class='form-control form-control-sm updform' placeholder = 'Purpose' required /> 
		{{---------------------------------End Purpose Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}
	</td>
	<td id = "itrtd">
		{{---------------------------------Start Itinerary Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
		<span class = 'dbinfo'> <span class = "dbinfo" x-text="item.arrival"></span> - <span class = "dbinfo" x-text="item.departure"></span></span><input type = 'text' value = '' name = 'itinerary' id='titinerary' class='form-control form-control-sm updform' placeholder = 'ON' required />
		{{---------------------------------End Itinerary Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
	</td>
	<td id = "acttd">
		{{---------------------------------Start Action Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}
		<form action = "{{url('bookingstatus')}}" method ="POST" id="bookstatus" x-data = "statusform()" @submit.prevent="submitData">
			@csrf 
			<table class = "table table-borderless text-center" id = "tableact">
				<tr>
					<td>
						<button type = "submit" 
						name="sts"
						id="apvbtn" 
						value="1"
						class="btn actbtn" 
						title="APPROVE" 
						data-toggle="tooltip"
						style="color: green;"
						@click="formData.id = booking.id; formData.status = 1">
							
							<i class="ion-md-checkmark-circle-outline"></i>
						</button>
					</td>
					<td>
						<button type="submit" 
						name="sts"
						id="dnybtn"  
						value="2" 
						class="btn actbtn" 
						title="DENY"
						data-toggle="tooltip" 
						style="color: red;"
						@click="formData.id = booking.id; formData.status = 2">
							<i class="ion-md-exit"></i>
						</button>
					</td>
					<td>
						<button type="submit"
						name="sts"
						id="pndbtn"  
						value="0" 
						class="btn actbtn" 
						title="PENDING"
						data-toggle="tooltip" 
						style="color: yellow;"
						@click="formData.id = booking.id; formData.status = 0">
							<i class="ion-ios-warning"></i>
						</button>
					</form>
					
				</td>
				<td>
					<button type="button" 
					class="btn actbtn" 
					title="DELETE" 
					data-bs-toggle="modal"
					data-bs-target="#actm" 
					style="color: red;"
					@click="bookid = booking.id">
						
						<i class="ion-ios-trash"></i>
					</button>
					
				</td>
				<td>
					<button type = 'button' 
					name = 'updbtn' 
					class = 'btn actbtn' 
					id = "btnupd"
					title = 'UPDATE' 
					data-bs-toggle="modal"
					data-bs-target="#updm" 
					style='color: blue;'
					@click="bookid = booking.id"
					>
						<i class='ion-md-sync'></i>
					</button>
				</td>
			</tr>
		</table>
		{{---------------------------------End Action Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
	</td>					
</tr>
</template>
<tr x-show="isEmpty()">
	<td colspan="9" class="text-center py-3 text-gray-900 text-sm">No matching records found.</td>
</tr>
</tbody>
</table>
<div class="flex mt-5">
	<div class="border px-2 cursor-pointer" @click.prevent="changePage(1)">
		<span class="text-gray-700">First</span>
	</div>
	<div class="border px-2 cursor-pointer" @click="changePage(currentPage - 1)">
		<span class="text-gray-700"><</span>
		</div>
		<template x-for="item in pages">
			<div @click="changePage(item)" class="border px-2 cursor-pointer" x-bind:class="{ 'bg-gray-300': currentPage === item }">
				<span class="text-gray-700" x-text="item"></span>
			</div>
		</template>
		<div class="border px-2 cursor-pointer" @click="changePage(currentPage + 1)">
			<span class="text-gray-700">></span>
		</div>
		<div class="border px-2 cursor-pointer" @click.prevent="changePage(pagination.lastPage)">
			<span class="text-gray-700">Last</span>
		</div>
		</div>
	</div>
</div>
</div>
</div>


