
<div class="modal fade" id="createm" data-bs-backdrop="static"
data-bs-keyboard="false" tabindex="-1" aria-labelledby="Action Modal" aria-hidden="true" 
x-data = "{
tmeans: '',
opurpose: '',

purpose: '',
opurpose: '',
opurposediv: '',

oacc: '',
oaccdiv: '',
boat: '',

parking: '',
oparkingdiv: '',
oparking: '',

userdata: {},
userexist: '',
username: '',
usererror: '',
useridinput: '',

itinerary: '',
timediff: null,
datediff: null,
}"

x-init = "
$watch('useridinput', value => $dispatch('checkuser'));
"
>
	<div class="modal-dialog modal-lg modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title fs-5" id="createtitle">
				CREATE NEW BOOKING </h5>
			</div>
			<div class="modal-body">
				<h5>BOOKING CREATION FORM</h5>
				<form action = "<?php echo e(route('adminbook')); ?>" method = "POST" id = "createbook">
					<?php echo csrf_field(); ?> 
					<div class="row">
						<div class="col">
							<div class="form-floating mb-2">
								<input class="form-control" name = "userid" id = "userbookid" x-model="useridinput" :aria-invalid="userexist ? 'true' : 'false' " :data-error-msg = "usererror" 
								@checkuser.window = "if (filteredBookings.filter(user => user.userid.toString().includes(useridinput)).length == 0) {
									userdata = users.filter(user => user.id.toString().includes(useridinput));
									username = userdata.map(userdata => userdata.lname);
									userexist = true;
									usererror = 'User #' + useridinput + ' Does not exist';
								} else {
									userexist = false;
									usererror = 'Invalid User ID';
								}
									" 
									@input.change = "$dispatch('checkuser')"
									@blur = "$dispatch('checkuser')"
								@resetuser.window="$el.value = ''" required />
								<input type="hidden" :value = "username" id = "uname" />
								<label for="userbookid">User ID</label>
							</div>
						</div>
						<div class="col">
							<div class="form-floating mb-2">
								<select class="form-select" name = "status" id = "status" x-model = "status" @resetstatus.window="$el.selectedIndex = 0"  data-error-msg=' ' required>
									    <option value="PRE-ARRIVAL">Pre-arrival</option>  
										<option value="ARRIVED">Arrived</option>
										<option value="CANCELLED">Cancelled</option> 
										<option value="RESCHEDULED">Rescheduled</option>   
										<option value="DELINQUENT">Delinquent</option>
								</select>
								<label for="status">Status</label>
							</div>
						</div>
					</div>
					<div class = "row">
						<div class="col">
							<div class="form-floating mb-2">
								<select class="form-select" name="acc" 	id = "acc"
								
								@change="
								if($el.selectedIndex == 16)
								{
								oaccdiv = true;
								} else {
								oaccdiv = false;
								oacc = '';
								}
								"
								@resetacc.window="$el.selectedIndex = 0;
								if($el.selectedIndex == 16)
								{
								oaccdiv = true;
								} else {
								oaccdiv = false;
								oacc = '';
								}
								"
								 data-error-msg=' '
								required
								>
									<option value="" disabled selected> Select Accommodation</option>
									<template x-for="accommodation in accommodations">
										
										<option :value = "accommodation.name" x-text="accommodation.name" x-show="accommodation.name != 'Other'"></option>
									</template>
									<option>Other</option>
								</select>
								<label for="acc">Accommodation</label>
							</div>
						</div>
						<template  x-if="oaccdiv">
							<div class="col">
								<div class="form-floating mb-2">
									<input class="form-control" required type="text" id = "oacc" x-model="oacc"  data-error-msg='Invalid Accommodation' required />
									<label for="oacc">Other Accommodation</label>
								</div>
							</div>
						</template>
						
					</div>
					<div class = "row">
						<div class="col">
							<div class="form-floating mb-2">
								<input type="date" name = "arrival" class="form-control" id="arrival" placeholder="12/25/2024" x-model="adate" @resetadate.window="$el.value = ''" max = "rdate" data-error-msg='Invalid Date' required />
								<label for="arrival">Arrival Date</label>
							</div>
						</div>
						<div class="col">
							<div class="form-floating mb-2">
								<input type="date" name = "departure" class="form-control" id="departure" placeholder="01/01/2025" x-model="rdate" @resetrdate.window="$el.value = ''" min = "adate" data-error-msg='Invalid Date' required />
								<label for="departure">Return Date</label>
							</div>
						</div>
						<input type = "hidden" :value = "itinerary" name = "itinerary" id = "itr" />
					</div>
					<div class="row">
						<div class="col">
							<div class="form-floating mb-2">
								<select class="form-select" name = "boat" @resetboat.window="$el.selectedIndex = 0" data-error-msg=' ' required >
									<option value="" disabled selected> Select Boat</option>
									<option value = "Public Boat">Public Boat</option>  
									<option value = "Private Boat">Private Boat</option>   
									<option value="Boat Provided By Resort">Boat Provided by Resort</option> 
								</select>
								<label for="boat">Boat</label>
							</div>
						</div>
						<div class="col">
							<div class="form-floating mb-2">
								
								<select class="form-select" name = "parking"
								data-error-msg=' '
								@change="if($el.selectedIndex == 4){oparkingdiv = true;} else {oparkingdiv = false; oparking = '';}"
								@resetpark.window="$el.selectedIndex = 0;
								if($el.selectedIndex == 4){oparkingdiv = true;} else {oparkingdiv = false; oparking = '';}
								"
								required
								>
									<option value="" disabled selected> Select Parking</option>
									<option value = "La Riche Parking">La Riche Parking</option>  
									<option value = "Metro Park Cagbalete Parking">Metro Park Cagbalete Island Parking</option>   
									<option value = "Don`s Parking Rental">Don's Parking Rental</option>
									<option :value = "oparking">Other</option> 
								</select>
								<label for="parking">Parking</label>
							</div>
						</div>
						
						<template x-if="oparkingdiv">
							<div class="col">
								
								<div class="form-floating mb-2">
									<input required class="form-control" type="text" id = "oparking" x-model="oparking" data-error-msg='Invalid Parking' required ></input>
									<label for="oparking">Other Parking</label>
								</div>
								
							</div>
						</template>
						
						
					</div>
					<div class="row">
						<div class="col">
							<div class="form-floating mb-2">
								<select class="form-select" name = "tmeans" id = "tmeans" x-model = "tmeans" @resetmeans.window="$el.selectedIndex = 0" data-error-msg=' ' required >
									<option value="" disabled selected> Select Travel Means</option>
									<option value = "Public Utility Vehicle">Public Utility Vehicle</option>  
									<option value = "Private Vehicle">Private Vehicle</option>   
								</select>
								<label for="tmeans">Travel Means</label>
							</div>
						</div>
						<div class="col">
							<div class="form-floating mb-2">
								<select class="form-select" name = "purpose" id = "purpose" x-model = "purpose" data-error-msg=' '
								@change="if($el.selectedIndex == 3){opurposediv = true;} else {opurposediv = false;}"
								@resetpurpose.window="$el.selectedIndex = 0;
								if($el.selectedIndex == 3){opurposediv = true;} else {opurposediv = false;}
								"
								required
								>
									<option value="" disabled selected> Select Purpose</option>
									<option value = "Leisure">Leisure</option>   
									<option value = "Business">Business</option>  
									<option :value = "opurpose">Other</option> 
								</select>
								<label for="purpose">Purpose</label>
							</div>
						</div>
						<template  x-if="opurposediv">
							<div class="col">
								<div class="form-floating mb-2">
									<input class="form-control" type="text" id = "opurpose" x-model="opurpose" data-error-msg='Invalid Purpose' required ></input>
									<label for="opurpose">Other Purpose</label>
								</div>
							</div>
						</template>
					</div>
					<div class = "row">
						<div class="col">
							<div class="form-floating mb-2">
								<input type="number" name = "foreigners" class="form-control" id="foreigners" placeholder="5" data-error-msg='Invalid Amount' @resetforeigner.window="$el.value = ''" required />
								<label for="foreigners">Foreigners</label>
							</div>
						</div>
						<div class="col">
							<div class="form-floating mb-2">
								<input type="number" name = "filipinos" class="form-control" id="filipinos" placeholder="7" data-error-msg='Invalid Amount' @resetfilipino.window="$el.value = ''" required />
								<label for="filipinos">Filipinos</label>
							</div>
						</div>
						<div class="col">
							<div class="form-floating mb-2">
								<input type="number" name = "maubanins" class="form-control" id="maubanins" placeholder="5" data-error-msg='Invalid Amount' @resetmaubanin.window="$el.value = ''" required />
								<label for="maubanins">Maubanins</label>
							</div>
						</div>
					</div>
					<div class = "row">
						<div class="col">
							<div class="form-floating mb-2">
								<input type="number" name = "visitors" class="form-control" id="visitors" placeholder="5" data-error-msg='Invalid Amount' @resetvisitor.window="$el.value = ''" required />
								<label for="visitors">Visitors</label>
							</div>
						</div>
						<div class="col">
							<div class="form-floating mb-2">
								<input type="number" name = "male" class="form-control" id="male" placeholder="7" data-error-msg='Invalid Amount' @resetmale.window="$el.value = ''" required />
								<label for="male">Male</label>
							</div>
						</div>
						<div class="col">
							<div class="form-floating mb-2">
								<input type="number" name = "female" class="form-control" id="female" placeholder="5" data-error-msg='Invalid Amount' @resetfemale.window="$el.value = ''" required />
								<label for="female">Female</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-floating mb-2">
								<input type="number" name = "zero7" class="form-control" id="zero7" placeholder="7" data-error-msg='Invalid Amount' @resetzero7.window="$el.value = ''" required />
								<label for="zero7">0 - 7 Old</label>
							</div>
						</div>
						<div class="col">
							<div class="form-floating mb-2">
								<input type="number" name = "thirth" class="form-control" id="thirth" placeholder="5" data-error-msg='Invalid Amount' @resetthirth.window="$el.value = ''" required />
								<label for="thirth">13-59 Old</label>
							</div>
						</div>
						<div class="col">
							<div class="form-floating mb-2">
								<input type="number" name = "above60" class="form-control" id="above60" placeholder="5" data-error-msg='Invalid Amount' @resetsixty.window="$el.value = ''" required />
								<label for="above60">60+ Old</label>
							</div>
						</div>
						<div class="col">
							<div class="form-floating mb-2">
								<input type="number" name = "priority" class="form-control" id="priority" placeholder="5" data-error-msg='Invalid Amount' @resetpriority.window="$el.value = ''" required />
								<label for="priority">Priority</label>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" id = "createcancel" class="btn btn-secondary" data-bs-dismiss="modal">CANCEL</button>
					<button type="submit" id="createbtn" class="btn btn-success" aria-label="CREATE" 
					@click="
										
										timediff = Math.abs(Date.parse(rdate) - Date.parse(adate)); 
										datediff = Math.floor(timediff / (1000 * 60 * 60 * 24)); 
										
										if (datediff == 0) {
										itinerary = 'Day Tour';
										}
										if (datediff == 1) {
										itinerary = 'Overnight';
										}
										if (datediff == 2) {
										itinerary = '2 Nights';
										}
										if (datediff == 3) {
										itinerary = '3 Nights';
										}
										if (datediff == 4) {
										itinerary = '4 Nights';
										}
										if (datediff >= 5) {
										itinerary = '5+ Nights';
										}
										">
						CREATE
					</button>
				</form> 
			</div>
		</div>
	</div>
</div>												<?php /**PATH /home/u101594241/domains/maubantourism.com/public_html/resources/views/components/createmodal.blade.php ENDPATH**/ ?>