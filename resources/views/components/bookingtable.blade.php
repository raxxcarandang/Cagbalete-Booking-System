

<div class = "col-12 dashrow2" >
	<div class="row flex space-x-0 items-center">
		
		<div class="col-4">
			
			<button class="sortbtn" 
			title="Remove Table Colors"
			id="nocolorbtn"
			@click="nocolor = !nocolor;"
			>
				<i :class="nocolor == true ? 'ion-ios-color-wand' : 'ion-ios-color-palette'" style="color: black; font-size: 1.25rem"></i>
			</button>
			<span id="bookingtitle">
				Bookings
			</span>
			<button type = 'button' 
			name = 'createbtn'  
			class = "btn sortbtn"
			id = "btncrt"
			title = 'ADD NEW BOOKING' 
			data-bs-toggle="modal"
			data-bs-target="#createm" 
			@click="bookid = booking.id; crtmopen = !crtmopen; $dispatch('resetcreatemodal');"
			>
				<i class='ion-md-add-circle-outline'></i>&nbsp;ADD NEW
			</button>
		</div>
		<div class="col">
			<input type="date" x-model="datesort" x-show="advanced" id= "datefilter" @input.change="cpage = 1; selectedBookings = []; fetchBookings(); logcount = unreadActivitiesCount + unreadNotificationsCount;"  placeholder="Date Filter Start" />
		</div>
		
		<div class="col">
			<input type="date" x-model="datesortend" x-show="advanced" id= "datefilterend" @input.change="cpage = 1; selectedBookings = []; fetchBookings(); logcount = unreadActivitiesCount + unreadNotificationsCount;"  placeholder="Date Filter End" />
		</div>
		
		<div class="col">
			&nbsp;
		</div>
		<div class="col">
			&nbsp;
		</div>
		<div class="col">
		
			<select
			id="colorsel"
			x-model="colorselect" 
            class="py-2 px-4 pr-1 mr-3 rounded-md form-select"
             title = 'Set Color of Arrived'
             @change="$el.style.setProperty('background-color', colorselect, 'important')"
             x-init="
             colorselect = 'green';
             $el.style.setProperty('background-color', colorselect, 'important');
             "
            >
			
			<option value="green" style="background-color: green;">Green</option>
			<option value="chartreuse" style="background-color: chartreuse;">Chartreuse</option>
			<option value="crimson" style="background-color: crimson;">Crimson</option>
			<option value="gold" style="background-color: gold;">Gold</option>
			<option value="red" style="background-color: red;">Red</option>
			<option value="blue" style="background-color: blue;">Blue</option>
			<option value="indigo" style="background-color: indigo;">Indigo</option>
			<option value="violet" style="background-color: violet;">Violet</option>
			<option value="purple" style="background-color: purple;">Purple</option>
			<option value="pink" style="background-color: pink;">Pink</option>
			<option value="teal" style="background-color: teal;">Teal</option>
			<option value="aqua" style="background-color: aqua;">Aqua</option>
			<option value="fuchsia" style="background-color: fuchsia;">Fuchsia</option>
			<option value="turquoise" style="background-color: turquoise;">Turquoise</option>
			<option value="coral" style="background-color: coral;">Coral</option>
			<option value="maroon" style="background-color: maroon;">Maroon</option>

    </select>
		</div>
		
		
		
	</div>
	<div class="table-responsive w-auto pr-3" style="width:100%; height:100%; margin-left: 1rem;" >
		
		
		<div class="flex justify-between items-center">
			
			<div class=" flex space-x-2 items-center">
				
				
				<button 
				title = 'Reset Table'
				class = "sortbtn"
				@click="
				resettable();
				fetchBookings(); logcount = unreadActivitiesCount + unreadNotificationsCount;
				showToast('Table Filters Reset', 'Table Filters Reset Successful', 'success');
				"
				>
					<i class = "ion-ios-sync" style="color:green; font-size: 1.25rem;"></i>
				</button>
				<select class = "form-select sortselector" x-model="perpage" @change="cpage = 1; selectedBookings = []; $nextTick(() => { fetchBookings(); logcount = unreadActivitiesCount + unreadNotificationsCount; }); " id = "rowview">
					<option value="3">3 Rows</option>
					<option value="5">5 Rows</option>
					<option value="10">10 Rows</option>
					<option value="20">20 Rows</option>
					<option value="100">100 Rows</option>
				</select>
				
				<input x-model="searchTerm" @input="cpage = 1; $nextTick(() => { fetchBookings(); logcount = unreadActivitiesCount + unreadNotificationsCount; }); selectedBookings = [];" type="text" class="form-control border rounded focus:outline-none" id="searchbar" placeholder="Search..." />
				
				<button 
				title = 'Advanced Filter'
				class = "sortbtn"
				@click="
				advanced = !advanced;
				"
				>
					<i class = "ion-ios-settings" :style="{ color: advanced ? 'red' : 'green', fontSize: '1.25rem', marginLeft: '-1rem' }"></i>
				</button>
				
			</div>
			
			
			<div>
				<select
				id="stsselect"
				title = 'Sort By Status'
				class = "form-select sortselector"
				x-model="stssort"
				x-show="advanced"
				@change="
				cpage = 1;
				$nextTick(() => { fetchBookings(); logcount = unreadActivitiesCount + unreadNotificationsCount; });
				selectedBookings = [];
				
				">
					<option value="6">All Status</option>
					<option value="1">Pre-arrival</option>
					<option value="2">Arrived</option>
					<option value="3">Rescheduled</option>
					<option value="4">Cancelled</option>
					<option value="5">Delinquent</option>
				</select>
			</div>
			<div>
				<select 
				id="contselect"
				title = 'Sort By Country'
				class = "form-select sortselector"
				x-model="contsort"
				x-show="advanced"
				@change="
				cpage = 1;
				$nextTick(() => { fetchBookings(); logcount = unreadActivitiesCount + unreadNotificationsCount; });
				selectedBookings = [];
				
				">
					<option value="4" selected>All Country</option>
					<option value="1">PH</option>
					<option value="2">MAUBAN</option>
					<option value="3">INT'L</option>
				</select>
			</div>
			<div>
				
				<select
				id="itrselect"
				class = "form-select sortselector"
				title = 'Sort by Itinerary' 
				x-model="itrsort"
				x-show="advanced"
				@change="
				cpage = 1;
				$nextTick(() => { fetchBookings(); logcount = unreadActivitiesCount + unreadNotificationsCount; });
				selectedBookings = [];
				
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
			</div>
			<div>
				<select
				id="colorselect"
				title = 'Sort By Color'
				class = "form-select sortselector"
				x-model="colorsort"
				x-show="advanced"
				@change="
				cpage = 1;
				$nextTick(() => { fetchBookings(); logcount = unreadActivitiesCount + unreadNotificationsCount; });
				selectedBookings = [];
				
				"
				:style="'background-color:' + colorsort;"
				>
					<option value="100">All Colors</option>
					<template x-for="color in dcolor" :key="color.color">
						<option :value="color.color" :style="'background-color:' + color.color;"><span x-text="color.color"></span></option>
					</template>
				</select>
				
			</div>
			
			<div>
				
				<button type = 'button' 
				name = 'batchbtn'  
				class = "btn sortbtn"
				id = "btnbatch"
				title = 'BATCH ACTIONS' 
				data-bs-toggle="modal"
				data-bs-target="#batchm" 
				@click="$dispatch('focusmodal'); $nextTick(() => { arrivecolor = colorselect; }); ids = getSelectedBookingsString(); 
				setTimeout(() => {
				document.getElementById('idarea').focus();  
				}, 1000);"
				>
					&nbsp;BATCH <i class='ion-md-add-circle-outline'></i>
				</button>
			</div>
			
		</div>
		<table class="table table-borderless text-center" id="table">
			<thead id='thead'>
				<tr 
				x-data="{
				
				
				handleSort(column) {
				if (this.sorter === 17 || this.sorter < column[0] || this.sorter > column[1]) {
				this.sorter = column[1];
				} else if (this.sorter === column[1]) {
				this.sorter = column[0]; 
				} else if (this.sorter === column[0]) {
				this.sorter = 17; 
				}
				$nextTick(() => { fetchBookings(); logcount = unreadActivitiesCount + unreadNotificationsCount; });
				},
				
				
				setSortState(column) {
				if (this.sorter === column[0]) {
				return { up: true, down: false };
				} else if (this.sorter === column[1]) {
				return { up: false, down: true };
				}
				return { up: false, down: false };
				
				}
				}"
				
				>
					
					<th scope="col">
						<input type="checkbox" class="selectboxes" id="selectallbox"
						x-model="selectedBookings"
						:checked="allChecked()"
						@change="toggleSelectAll()"
						/>
					</th>
					
					<th scope="col" class="cursor-pointer" @click="handleSort([1, 2]); selectedBookings = [];">
						GUEST
						<template x-if="setSortState([1, 2]).up">
							<i class="ion-ios-arrow-up"></i>
						</template>
						<template x-if="setSortState([1, 2]).down">
							<i class="ion-ios-arrow-down"></i>
						</template>
					</th>
					
					
					<th scope="col" class="cursor-pointer" @click="handleSort([3, 4]); selectedBookings = [];">
						TYPE
						<template x-if="setSortState([3, 4]).up">
							<i class="ion-ios-arrow-up"></i>
						</template>
						<template x-if="setSortState([3, 4]).down">
							<i class="ion-ios-arrow-down"></i>
						</template>
					</th>
					
					
					<th scope="col" class="cursor-pointer" @click="handleSort([5, 6]); selectedBookings = [];">
						ACCOMMODATION
						<template x-if="setSortState([5, 6]).up">
							<i class="ion-ios-arrow-up"></i>
						</template>
						<template x-if="setSortState([5, 6]).down">
							<i class="ion-ios-arrow-down"></i>
						</template>
					</th>
					
					
					<th scope="col" class="cursor-pointer" @click="handleSort([15, 16]); selectedBookings = [];">
						ITINERARY
						<template x-if="setSortState([15, 16]).up">
							<i class="ion-ios-arrow-up"></i>
						</template>
						<template x-if="setSortState([15, 16]).down">
							<i class="ion-ios-arrow-down"></i>
						</template>
					</th>
					
					
					<th scope="col" class="cursor-pointer" @click="handleSort([11, 12]); selectedBookings = [];">
						T.MEANS
						<template x-if="setSortState([11, 12]).up">
							<i class="ion-ios-arrow-up"></i>
						</template>
						<template x-if="setSortState([11, 12]).down">
							<i class="ion-ios-arrow-down"></i>
						</template>
					</th>
					
					
					<th scope="col" class="cursor-pointer" @click="handleSort([7, 8]); selectedBookings = [];">
						PARKING
						<template x-if="setSortState([7, 8]).up">
							<i class="ion-ios-arrow-up"></i>
						</template>
						<template x-if="setSortState([7, 8]).down">
							<i class="ion-ios-arrow-down"></i>
						</template>
					</th>
					
					
					<th scope="col" class="cursor-pointer" @click="handleSort([9, 10]); selectedBookings = [];">
						BOAT
						<template x-if="setSortState([9, 10]).up">
							<i class="ion-ios-arrow-up"></i>
						</template>
						<template x-if="setSortState([9, 10]).down">
							<i class="ion-ios-arrow-down"></i>
						</template>
					</th>
					
					
					<th scope="col" class="cursor-pointer" @click="handleSort([13, 14]); selectedBookings = [];">
						PURPOSE
						<template x-if="setSortState([13, 14]).up">
							<i class="ion-ios-arrow-up"></i>
						</template>
						<template x-if="setSortState([13, 14]).down">
							<i class="ion-ios-arrow-down"></i>
						</template>
					</th>
					
					<th scope="col">
						ACTION
					</th>
				</tr>
			</thead>
			<tbody>
				<template x-for="booking in filteredBookings" :key="booking.id">
					<tr class="hover:bg-gray-200 text-gray-900 text-xs" 	
					
				
					
					:style="'background: ' + (nocolor == true ? '' : booking.status === 'ARRIVED' ? booking.color : booking.status === 'CANCELLED' ? '#FFFDD0' : '' ) + ';'">
						
						<td class="checkcolumn" id="checktd">
							<input type="checkbox" class="selectboxes"  
							:id="'selectbox' + booking.id" 
							:checked="selectedBookings.includes(booking.id)" 
							@change="toggleBooking(booking.id); console.log('selected:', selectedBookings)"
							
							/>
						</td>
						{{---------------------------------Start Lead Guest Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}  
						
						<td class="maintabletd" id="guesttd" 
						
						x-data="{
						
						gender: '',
						gcolor: '',
						gclass: '',
						age: '',
						today: new Date(),
						country: '',
						
					 getage(bdate) {
                            const birthdate = new Date(bdate);
                            let calculatedAge = this.today.getFullYear() - birthdate.getFullYear();
                            const m = this.today.getMonth() - birthdate.getMonth();
                            if (m < 0 || (m === 0 && this.today.getDate() < birthdate.getDate())) {
                                calculatedAge--;
                            }
                            this.age = calculatedAge;
                            return calculatedAge;
                        },
						
						}" >
							<span id="bookid">Booking # <span x-text="booking.id"></span></span>
							<br>
							<div class="separator">
								<span class="dbinfosts" style="color: black;"><span x-text="booking.status"></span></span>
							</div>
							
						<span class="dbinfo" x-text="booking.user?.name || 'No name available'"></span>
<span class="dbinfo" x-text="booking.user?.mname || 'N/A'"></span>
<span class="dbinfo" x-text="booking.user?.lname || 'No surname available'"></span>,
<span class="dbinfo" x-text="getage(booking.user?.bdate) || 'N/A'"></span>,
<span class="dbinfo" x-text="booking.user?.gender === 'Male' ? 'M' : (booking.user?.gender === 'Female' ? 'F' : 'Unknown')"></span>

<span id="emailspan" x-show="advanced">
    <span class="dbinfo" x-text="booking.user?.email || 'No email available'"></span>
    <i class="ion-md-person" id="booking.useric"></i>
</span>

<span x-show="advanced">
    <span class="dbinfo" x-text="booking.user?.contactno || 'No contact available'"></span>
    <br>
</span>
<!-- 
<div class="separator">
    <span class="dbinfosts" style="color: black;">
        <span x-text="booking.status || 'No status available'"></span>
    </span>
</div>
-->

<span x-show="advanced">
    <table class="table table-borderless text-center" id="countrytable">
        <tr>
            <td style="width: 33%;">
                <span class="dbinfo">
                    <img 
                        x-bind:src="'/images/nation/' + (booking.user?.country === 'INTERNATIONAL' ? 'INTL' : (booking.user?.country === 'PHILIPPINES' ? 'PH1' : 'MN1')) + '.webp'" 
                        :alt="'country'" 
                        style="width: 2rem; height: 1.25rem; display: inline-flex; color: black;" 
                    />
                </span>
            </td>
            <td>
                <span class="dbinfo" x-text="booking.user?.region || 'No region available'"></span>
            </td>
        </tr>
    </table>
</span>

							
							{{---------------------------------End Lead Guest Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
						</td>
						
						
						
						<td class="maintabletd" id = "typetd" style="border-left: 1px solid rgba(127, 140, 141, .33); border-right: 1px solid rgba(127, 140, 141, .33);">
							{{---------------------------------Start Visitor Type Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
							
							<table class="table table-borderless text-center" id="tablen2" :style="'background: ' + stslight + ';'">
								<!-- Mini headers Total -->
								<tr id="tottd2">
								    	<td colspan="2" class="head">
										<span><strong>GUESTS</strong></span>
									</td>
									
									<td colspan="2" class="head">
										<span><strong>DISCOUNT</strong></span>
									</td>
								
									<td colspan="2" class="head">
										<span><strong>NET</strong></span>
									</td>
								</tr>
								
								<tr>
								    	<td id = "tottd2" colspan="2">
										<span class = "dbinfot" x-text="booking.totalvisitors"></span>
										
										
										
										
									</td>
									<td  id = "tottd2" colspan="2">
										₱<span class = "dbinfot" x-text="booking.discount"></span>
									</td>
								
									<td id = "tottd2" colspan="2">
										₱<span class = "dbinfot" x-text="booking.namount"></span>
									</td>
									
								</tr>
								
								
								<tr x-show="advanced">
								<td class="head">
										<strong>M</strong>
									</td>
									
									<td class="tdborder" id = "totmtd">
										{{---------------------------------Start Total Male Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
										
										
										<span class = "dbinfon" x-text="booking.totalmale"></span>
										
										
										
										
										
										{{---------------------------------End Total Male Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
									</td>
									
									
									<td class="head">
										<strong>F</strong>
									</td>
									
									<td class="tdborder" id = "totftd">
										{{---------------------------------Start Total Female  Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
										
										
										<span class = "dbinfont" x-text="booking.totalfemale"></span>
										
										
										
										
										{{---------------------------------End Total Female Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
									</td>
									
									
									<td class="head">
										<strong>VUL</strong>
									</td>
									<td class="tdborder" id = "agetd">
										{{---------------------------------Start Priority Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
										
										
										
										<span class = "dbinfon" x-text="booking.specialneeds" id ="spcspan"></span>
										
										
										
										
										
										
										{{---------------------------------End Priority Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
									</td>
									
									
								</tr>
								<tr  x-show="advanced">
									<td class="head">
										<strong>INT'L</strong> 
									</td>
									
									<td class="tdborder" id = "nattd">
										{{---------------------------------Start Nationality 3 Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
										
										
										<span class = "dbinfon" x-text="booking.foreigners"></span>
										
										
										
										
										{{---------------------------------End Nationality Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
									</td>
									
									
									<td class="head">
										<strong>MN</strong>
									</td>
									<td class="tdborder" id = "nattd">
										{{---------------------------------Start Nationality 1 Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
										
										
										<span class = "dbinfon" x-text="booking.maubanins"></span>
										
										
										
										
										{{---------------------------------End Nationality Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
									</td>
									
									
									
									<td class="head">
										<strong>PH</strong>
									</td>
									<td class="tdborder" id = "nattd">
										{{---------------------------------Start Nationality 2 Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
										
										
										<span class = "dbinfon" x-text="booking.filipinos"></span>
										
										
										
										
										
										{{---------------------------------End Nationality Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
									</td>
									
									
									
									
									
								</tr>
								<tr  x-show="advanced">
								<td class="head">
										<strong>0-7 Y.O</strong>
									</td>
									<td class="tdborder" id = "agetd">
										{{---------------------------------Start Age 1 Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
										
										
										<span class = "dbinfon" x-text="booking.zeroto7yold"></span>
										
										
										{{---------------------------------End Age Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
									</td>
									
										<td class="head">
										<strong>13-50 Y.O</strong>
									</td>
									<td class="tdborder" id = "agetd">
										{{---------------------------------Start Age 2 Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
										
										
										<span class = "dbinfon" x-text="booking.thirteento50yold" id = "maturespan"></span>	
										
										{{---------------------------------End Age Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
									</td>
								
									<td class="head">
										<strong>60+ Y.O</strong>
									</td>
									<td class="tdborder" id = "agetd">
										{{---------------------------------Start Age 3 Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
										
										
										<span class = "dbinfon" x-text="booking.above60yold"></span>
										
										{{---------------------------------End Age Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
									</td>
									
									
									
									
								</tr>
								
							</table>
							
							
							{{---------------------------------End Visitor Type Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
						</td>
						<td class="maintabletd" id = "acctd">
							{{---------------------------------Start Accommodation Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}  
							<button  class="prooflink" @click="proof = 'ACCOMMODATION'; proofname= booking.accproof; " data-bs-toggle="modal" data-bs-target="#proofm"><span class = "dbinfoproof" x-text="booking.accommodation"></span></button>
							{{---------------------------------Start Accommodation Type Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
						</td>
						<td class="maintabletd"  id = "itrtd">
							{{---------------------------------Start Itinerary Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
						<span class = 'dbinfo'> (<span x-text="booking.itinerary"></span>)<span x-show="advanced == false"><br> <span x-text="new Date(booking.arrival).toLocaleDateString('en-US', { month: '2-digit', day: '2-digit' } )"></span>&nbsp;->&nbsp;<span x-text="new Date(booking.departure).toLocaleDateString('en-US', { month: '2-digit', day: '2-digit' } )"></span></span></span><span  x-show="advanced"> <br><br><span x-text="new Date(booking.arrival).toLocaleDateString('en-US', { year: '2-digit', month: '2-digit', day: '2-digit' } )"></span><br>↓<br><span x-text="new Date(booking.departure).toLocaleDateString('en-US', { year: '2-digit', month: '2-digit', day: '2-digit' } )"></span></span></span>
						{{---------------------------------End Itinerary Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
					</td>
					<td class="maintabletd" id="tmeantd">
						{{---------------------------------Start Travel Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}  
						<span class="dbinfo" x-text="booking.travelmeans"></span>
						
						
						{{---------------------------------End Travel Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}  							
					</td>
					<td class="maintabletd" id="parktd">
						{{---------------------------------Start Parking Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}
						<button  class="prooflink" :disabled="booking.parkproof === 'N/A'" @click="proof = 'PARKING'; proofname= booking.parkproof; " data-bs-toggle="modal" data-bs-target="#proofm"><span class = 'dbinfo'><span class = "dbinfoproof" x-text="booking.parking"></span> </span></button>
						{{---------------------------------End Parking Column-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
					</td>
					
					<td class="maintabletd" id="boattd">
						{{---------------------------------Start Boat Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}
						<button  class="prooflink" @click="proof = 'BOAT'; proofname= booking.boatproof; " data-bs-toggle="modal" data-bs-target="#proofm"><span class = 'dbinfo'><span class = "dbinfoproof" x-text="booking.boating"></span> </span></button>
						{{---------------------------------End Boat Column-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
					</td>
					
					<td class="maintabletd" id="purposetd">
						{{---------------------------------Start Purpose Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}  
						<span class = 'dbinfo'> <span class = "dbinfo" x-text="booking.purpose"></span> </span>
						{{---------------------------------End Purpose Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}
					</td>
					<!--
						<td class="maintabletd">
						{{---------------------------------Start Remark Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}  
						<span class = 'dbinfo'> <span class = "dbinfo" x-text="booking.remark"></span> </span>
						{{---------------------------------End Remark Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}
						</td>
					-->
					<td class="maintabletd" id = "acttd">
						{{---------------------------------Start Action Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}
						
						<table class = "table table-borderless text-center" id = "tablen2" :style="'background: ' + stslight + ';'">
							<tr>
								<tr>
									
									<td colspan="2">
										<form action = "{{route('bookingstatus')}}" method ="POST" id="bookstatus" x-data = "statusform()" @submit.prevent="submitData">
											@csrf 
											<button type="submit"
											name="sts"
											id="arrbtn"  
											
											class="btn actbtn" 
											title="ARRIVED"
											data-toggle="tooltip" 
											style="color: green;"
											:disabled = "booking.status == 'ARRIVED'"
											@click="formData.color = colorselect; formData.id = booking.id; formData.status = 'ARRIVED'; formData.client = booking.user.lname; stsgiven = 'Arrived'; bookid = booking.id;">
												<i class="ion-ios-checkmark-circle-outline"></i>
											</button>
										</form>
										
									</td>
									
									
									
								</tr>
								
								<td>
									<form action = "{{route('bookingstatus')}}" method ="POST" id="bookstatus" x-data = "statusform()" @submit.prevent="submitData">
										@csrf 
										<button type="submit"
										name="sts"
										id="pndbtn"  
										value="0" 
										class="btn actbtn" 
										title="PRE-ARRIVAL"
										data-toggle="tooltip" 
										style="color: #4B4B4B;"
										:disabled = "booking.status == 'PRE-ARRIVAL'"
										@click="formData.color = '';formData.id = booking.id; formData.status = 'PRE-ARRIVAL'; formData.client = booking.user.lname; stsgiven = 'Ready'; bookid = booking.id;">
											<i class="ion-ios-warning"></i>
										</button>
									</form>
									
								</td>
								<td>
									<button type = "button" 
									name="sts"
									id="cnlbtn" 
									value="3"
									class="btn actbtn" 
									title="CANCEL" 
									data-bs-toggle="modal"
									data-bs-target="#actcancel"
									:disabled = "booking.status == 'CANCELLED'"
									@click="bookid = booking.id; bname = booking.user.lname;"
									style='color: #E57373;'
									>
										<i class='ion-md-remove-circle'></i>
									</button>
									
								</td>
								
							</tr>
							<tr  x-show="advanced">
								<td>
									<button type="button" 
									class="btn actbtn" 
									title="REMARK" 
									data-bs-toggle="modal"
									data-bs-target="#actrem" 
									style="color: gray;"
									@click="bookid = booking.id; bname = booking.user.lname; remarea = booking.remark; $dispatch('upbook');">
										
										<i class="ion-ios-chatboxes"></i>
									</button>
									
								</td>
								<td>
									<button type = 'button' 
									name = 'reschedbtn' 
									class = 'btn actbtn' 
									id = "btnresched"
									title = 'RESCHEDULE' 
									data-bs-toggle="modal"
									data-bs-target="#updresched" 
									style='color: #F57F17;'
									@click="bookid = booking.id; $dispatch('upbook');"
									>
										<i class='ion-md-refresh'></i>
									</button>
								</td>
								
								
							</tr>
							
							
							<tr  x-show="advanced">
								<td>
									<button type = 'button' 
									name = 'updbtn' 
									class = 'btn actbtn' 
									id = "btnupd"
									title = 'UPDATE' 
									data-bs-toggle="modal"
									data-bs-target="#updm" 
									style='color: black;'
									@click="bookid = booking.id; updmopen = !updmopen; $dispatch('upbook');"
									>
										<i class='icon-pencil'></i>
									</button>
								</td>
								<td>
									<button type="button" 
									class="btn actbtn" 
									title="DELETE" 
									data-bs-toggle="modal"
									data-bs-target="#actm" 
									style="color: orange;"
									@click="bookid = booking.id; bname = booking.user.lname;">
										
										<i class="ion-ios-trash"></i>
									</button>
									
								</td>
								
								
							</tr>
							
							
							
							
						</table>
						{{---------------------------------End Action Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
					</td>					
				</tr>
			</template>
			<tr x-show="cpage > totalPages">
				<td colspan="100%" class="text-center py-3 text-gray-900 text-sm">No matching records found.</td>
			</tr>
		</tbody>
	</table>
	<div class="flex justify-center">
		<div class="col">
			<span class="text-gray-700" id="bottomtxt">Projected: ₱<span class="text-gray-700" x-text="projectedamount"></span> | Net Amount: ₱ <span class="text-gray-700" x-text="totalamount"></span> </span> 
		</div>
		<div class="flex justify-center col-6">
			<div id = "pgbtn" class="border px-2 cursor-pointer"
			@click = "cpage = 1;
			$nextTick(() => { fetchBookings(); logcount = unreadActivitiesCount + unreadNotificationsCount; });
			
			"
			>
				
				<span class="text-gray-700">First</span>
			</div>
			<div id = "pgbtn" class="border px-2 cursor-pointer" 
			@click = "if (cpage > 1) {
			cpage--;
			$nextTick(() => { fetchBookings(); logcount = unreadActivitiesCount + unreadNotificationsCount; });
			
			}"
			>
				<span class="text-gray-700"><</span>
				</div>
				<div class="flex content-end">
					&nbsp;Page&nbsp;<input type="number" min="1" :max="totalPages" @input="$nextTick(() => { fetchBookings(); logcount = unreadActivitiesCount + unreadNotificationsCount; });" class="form-control" x-model="cpage" style="max-height: 1.47rem; max-width: 5.7rem; font-size: 0.9rem; text-align: center;" />&nbsp;of&nbsp;<span class="text-gray-700" x-text="totalPages"></span>&nbsp;
				</div>
				<div id = "pgbtn" class="border px-2 cursor-pointer" 
				@click = "if (cpage < totalPages) {
				cpage++;
				$nextTick(() => { fetchBookings(); logcount = unreadActivitiesCount + unreadNotificationsCount; });
				
				}
				"
				>
					<span class="text-gray-700">></span>
				</div>
				<div id = "pgbtn" class="border px-2 cursor-pointer"
				@click = "cpage = totalPages;
				$nextTick(() => { fetchBookings(); logcount = unreadActivitiesCount + unreadNotificationsCount; });
				
				"
				>
					<span class="text-gray-700">Last</span>
				</div>
				
				</div>
				<div class="col" 
				x-init="
				">
					<div class="px-2">
						<span class="text-gray-700" id="bottomtxt2">&emsp;&emsp;Table: ₱ <span class="text-gray-700" x-text="displayedamount"></span> | <span class="text-gray-700" x-text="seenPages > fullBookings ? fullBookings : seenPages"></span> of <span class="text-gray-700" x-text="fullBookings"></span> Bookings</span>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	
	
	
	
	
	
	
	
