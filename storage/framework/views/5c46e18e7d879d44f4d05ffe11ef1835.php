

<div class="modal fade" id="updm" data-bs-backdrop="static"
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

adate: '',
rdate: '',

upbookings: {},

parkdb: '',
tmeansdb: '',

boatdb: '',
purposedb: '',

accdb: '',
arrivaldb: '',
returndb: '',
adate: '',
rdate: '',

foreignerdb: '',
filipinodb: '',
maubanindb: '',
visitordb: '',
maledb: '',
femaledb: '',
zero7db: '',
thirthdb: '',
sixtydb: '',
prioritydb: '',
statusdb: '',
remarkdb: '',

itinerary: '',
timediff: null,
datediff: null,

parkarr: ['La Riche Parking', 'Metro Park Cagbalete Parking', 'Don`s Parking Rental', 'Metro Park Cagbalete Island Parking'],
accarr: ['Aquazul Hotel and Resort', 'Dona Choleng Camping Resort', 'Rio del Sol Beach Resort',  'Jovencio`s Resort', 'MVT Sto. Niño Beach Resort',  'Nilandingan Cove Resort', 'Villa Cleofas (Cagbalete Island Camping Resort)', 'Villa Escaparde Camping and Beach Resort', 'Villa Noe Beach Resort', 'Villa Pilarosa Beach Resort', 'Tita Pinay Beach Resort', 'Aguho Playa Beach Resort', 'Tent Place', 'Orlan Beach Resort'],
purposearr: ['Leisure', 'Business'],
}"
@upbook.window = "
if (filteredBookings.length > 0) {
upbookings = filteredBookings.filter(booking => 
booking.id === bookid
); 
boatdb = upbookings.map(upb => upb.boating);
accdb = upbookings.map(upb => upb.accommodation);
tmeansdb = upbookings.map(upb => upb.travelmeans);
purposedb = upbookings.map(upb => upb.purpose);
parkdb = upbookings.map(upb => upb.parking);
arrivaldb = upbookings.map(upb => upb.arrival);
returndb = upbookings.map(upb => upb.departure);
foreignerdb = upbookings.map(upb => upb.foreigners);
filipinodb = upbookings.map(upb => upb.filipinos);
maubanindb = upbookings.map(upb => upb.maubanins);
visitordb = upbookings.map(upb => upb.totalvisitors);
maledb = upbookings.map(upb => upb.totalmale);
femaledb = upbookings.map(upb => upb.totalfemale);
zero7db = upbookings.map(upb => upb.zeroto7yold);
thirthdb = upbookings.map(upb => upb.thirteento50yold);
sixtydb = upbookings.map(upb => upb.above60yold);
prioritydb = upbookings.map(upb => upb.specialneeds);
statusdb = upbookings.map(upb => upb.status);
remarkdb = upbookings.map(upb => upb.remark);
adate = arrivaldb;
rdate = returndb;
}
$dispatch('oparking');
$dispatch('opurpose');
$dispatch('oacc');
$validate.isComplete('updatebook');
"
x-init="
$nextTick(() => { $dispatch('upbook'); });
$watch('updmopen', value => $dispatch('upbook'));
$watch('oaccdiv', value => $dispatch('oacc'));
$watch('oparkingdiv', value => $dispatch('opurpose'));
$watch('opurposediv', value => $dispatch('oparking'));
"
>
	<div class="modal-dialog modal-lg modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title fs-5" id="updatetitle">
				UPDATE BOOKING # <span x-text="bookid"></span></h5>
			</div>
			<div class="modal-body">
				<h5>BOOKING INFORMATION UPDATE FORM</h5>
				<form action = "<?php echo e(route('updatebook')); ?>" method = "POST" id = "updatebook" x-validate.input @submit="$validate.submit" novalidate>
					<?php echo csrf_field(); ?> 
					<input type="hidden" name="id" :value="bookid" id = "bookidin" />
					<div class = "row">
						<div class="col">
							<div class="form-floating mb-2">
								<input type="date" name = "arrival" class="form-control" id="arrival" placeholder="12/25/2024" :value="arrivaldb" x-model="adate" data-error-msg='Invalid Date' x-validate.required>
								<label for="arrival">Arrival Date</label>
							</div>
						</div>
						<div class="col">
							<div class="form-floating mb-2">
								<input type="date" name = "departure" class="form-control" id="departure" placeholder="01/01/2025" :value="returndb" x-model="rdate" data-error-msg='Invalid Date' x-validate.required>
								<label for="departure">Return Date</label>
							</div>
						</div>
						<input type = "hidden" :value = "itinerary" name = "itinerary" id = "itr" />
					</div>
					<div class="row">
						<div class="col">
							<div class="form-floating mb-2">
								<select class="form-select" name="status" id="status" x-model="status" data-error-msg=" " x-validate.required>
                                    <option value="" disabled selected>Select Status</option>
                                    <option value="PRE-ARRIVAL" :selected="statusdb == 'PRE-ARRIVAL'">Pre-arrival</option>
                                    <option value="ARRIVED" :selected="statusdb == 'ARRIVED'">Arrived</option>
                                    <option value="CANCELLED" :selected="statusdb == 'CANCELLED'">Cancelled</option>
                                    <option value="RESCHEDULED" :selected="statusdb == 'RESCHEDULED'">Rescheduled</option>
                                    <option value="DELINQUENT" :selected="statusdb == 'DELINQUENT'">Delinquent</option>
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
								oacc = accdb;
								} else {
								oaccdiv = false;
								oacc = '';
								}
								"
								@oacc.window ="
								if($el.selectedIndex == 16)
								{
								oaccdiv = true;
								oacc = accdb;
								} else {
								oaccdiv = false;
								oacc = '';
								}"
								x-init = "$dispatch('oacc')"
								data-error-msg=' '
								x-validate.required
								>
									<option value="" disabled selected> Select Accommodation</option>
									<template x-for="accommodation in accommodations">
										
										<option :value = "accommodation.name" :selected = "accdb == accommodation.name" x-text="accommodation.name" x-show="accommodation.name != 'Other'"></option>
									</template>
									<option :value="oacc" :selected="accarr.filter(acc => acc.toString().includes(accdb)).length == 0">Other</option>
								</select>
								<label for="acc">Accommodation</label>
							</div>
						</div>
						<template x-if="oaccdiv">
							<div class="col">
								<div class="form-floating mb-2">
									<input class="form-control" required type="text" id = "oacc" x-model="oacc" data-error-msg='Invalid Accommodation' x-validate.required />
									<label for="oacc">Other Accommodation</label>
								</div>
							</div>
						</template>
					</div>
					
					<div class="row">
						<div class="col">
							<div class="form-floating mb-2">
								<select class="form-select" name = "boat" data-error-msg=' ' x-validate.required>
									<option value="" disabled selected> Select Boat</option>
									<option value = "Public Boat" :selected = "boatdb == 'Public Boat'">Public Boat</option>  
									<option value = "Private Boat" :selected = "boatdb == 'Private Boat'">Private Boat</option>   
									<option value="Boat Provided By Resort" :selected = "boatdb == 'Boat Provided by Resort'">Boat Provided by Resort</option> 
								</select>
								<label for="boat">Boat</label>
							</div>
						</div>
						<div class="col">
							<div class="form-floating mb-2">
								
								<select class="form-select" name = "parking" data-error-msg=' '
								@change="if($el.selectedIndex == 4){oparkingdiv = true;} else {oparkingdiv = false; oparking = '';}"
								
								@oparking.window = "if($el.selectedIndex == 4){oparkingdiv = true; oparking = parkdb} else {oparkingdiv = false; oparking = '';} "
								x-init = "$dispatch('oparking')"
								x-validate.required
								>
									<option value="" disabled selected> Select Parking</option>
									<option value = "La Riche Parking" :selected="parkdb  == 'La Riche Parking'">La Riche Parking</option>  
									<option value = "Metro Park Cagbalete Parking" :selected="parkdb  == 'Metro Park Cagbalete Parking'">Metro Park Cagbalete Island Parking</option>   
									<option value = "Don`s Parking Rental" :selected="parkdb  == 'Don`s Parking Rental'"> Don's Parking Rental</option>
									<option :value = "oparking" :selected=" parkarr.filter(park => park.toString().includes(parkdb)).length == 0 ">Other</option> 
								</select>
								<label for="parking">Parking</label>
							</div>
						</div>
						
						<template x-if="oparkingdiv">
							<div class="col">
								
								<div class="form-floating mb-2">
									<input required class="form-control" type="text" id = "oparking" x-model="oparking" data-error-msg='Invalid Parking'x-validate.required></input>
									<label for="oparking">Other Parking</label>
								</div>
								
							</div>
						</template>
					</div>
					
					<div class="row">
						<div class="col">
							<div class="form-floating mb-2">
								<select class="form-select" name = "tmeans" id = "tmeans" x-model = "tmeans" data-error-msg=' ' x-validate.required>
									<option value="" disabled selected> Select Travel Means</option>
									<option value = "Public Vehicle" :selected = "tmeansdb == 'Public Vehicle'">Public Vehicle</option>  
									<option value = "Private Vehicle" :selected = "tmeansdb == 'Private Vehicle'">Private Vehicle</option>   
								</select>
								<label for="tmeans">Travel Means</label>
							</div>
						</div>
						<div class="col">
							<div class="form-floating mb-2">
								<select class="form-select" name = "purpose" id = "purpose" x-model = "purpose" data-error-msg=' '
								@change="if($el.selectedIndex == 3){opurposediv = true; opurpose = purposedb;} else {opurposediv = false; opurpose = '';}"
								@opurpose.window = "if($el.selectedIndex == 3){opurposediv = true; opurpose = purposedb;} else {opurposediv = false; opurpose = '';}"
								x-init = "$dispatch('opurpose')"
								x-validate.required
								>
									<option value="" disabled selected> Select Purpose</option>
									<option value = "Leisure" :selected="purposedb == 'Leisure'">Leisure</option>   
									<option value = "Business" :selected="purposedb == 'Business'">Business</option>  
									<option :value = "opurpose" :selected="purposearr.filter(purpose => purpose.toString().includes(purposedb)).length == 0">Other</option> 
								</select>
								<label for="purpose">Purpose</label>
							</div>
						</div>
						<template x-if="opurposediv">
							<div class="col">
								<div class="form-floating mb-2">
									<input class="form-control" type="text" id = "opurpose" x-model="opurpose" data-error-msg='Invalid Purpose' x-validate.required></input>
									<label for="opurpose">Other Purpose</label>
								</div>
							</div>
						</template>
					</div>
					<div class = "row">
						<div class="col">
							<div class="form-floating mb-2">
								<input type="number" name = "foreigners" class="form-control" id="foreigners" placeholder="5" :value="foreignerdb" data-error-msg='Invalid Amount' x-validate.required>
								<label for="foreigners">Foreigners</label>
							</div>
						</div>
						<div class="col">
							<div class="form-floating mb-2">
								<input type="number" name = "filipinos" class="form-control" id="filipinos" placeholder="7" :value="filipinodb" data-error-msg='Invalid Amount' x-validate.required>
								<label for="filipinos">Filipinos</label>
							</div>
						</div>
						<div class="col">
							<div class="form-floating mb-2">
								<input type="number" name = "maubanins" class="form-control" id="maubanins" placeholder="5" :value="maubanindb" data-error-msg='Invalid Amount' x-validate.required>
								<label for="maubanins">Maubanins</label>
							</div>
						</div>
					</div>
					<div class = "row">
						<div class="col">
							<div class="form-floating mb-2">
								<input type="number" name = "visitors" class="form-control" id="visitors" placeholder="5" :value="visitordb" data-error-msg='Invalid Amount' x-validate.required>
								<label for="visitors">Visitors</label>
							</div>
						</div>
						<div class="col">
							<div class="form-floating mb-2">
								<input type="number" name = "male" class="form-control" id="male" placeholder="7" :value="maledb" data-error-msg='Invalid Amount' x-validate.required>
								<label for="male">Male</label>
							</div>
						</div>
						<div class="col">
							<div class="form-floating mb-2">
								<input type="number" name = "female" class="form-control" id="female" placeholder="5" :value="femaledb" data-error-msg='Invalid Amount' x-validate.required>
								<label for="female">Female</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-floating mb-2">
								<input type="number" name = "zero7" class="form-control" id="zero7" placeholder="7" :value="zero7db" data-error-msg='Invalid Amount' x-validate.required>
								<label for="zero7">0 - 7 Old</label>
							</div>
						</div>
						<div class="col">
							<div class="form-floating mb-2">
								<input type="number" name = "thirth" class="form-control" id="thirth" placeholder="5" :value="thirthdb" data-error-msg='Invalid Amount' x-validate.required>
								<label for="thirth">13-59 Old</label>
							</div>
						</div>
						<div class="col">
							<div class="form-floating mb-2">
								<input type="number" name = "above60" class="form-control" id="above60" placeholder="5" :value="sixtydb" data-error-msg='Invalid Amount' x-validate.required>
								<label for="above60">60+ Old</label>
							</div>
						</div>
						<div class="col">
							<div class="form-floating mb-2">
								<input type="number" name = "priority" class="form-control" id="priority" placeholder="5" :value="prioritydb" data-error-msg='Invalid Amount' x-validate.required>
								<label for="priority">Priority</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="mb-3">
							<label for="remarea" class="form-label" style="color: black;">Remark</label>
							<textarea class="form-control" id="remarea" name="remark" :value="remarkdb" rows="7" x-validate.required></textarea>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" id = "updcancel" class="btn btn-secondary" data-bs-dismiss="modal">CANCEL</button>
					<button type="submit" id="updbtn" class="btn btn-success" aria-label="UPDATE" @click="
					
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
					
					"
					>
						UPDATE
					</button>
				</form> 
			</div>
		</div>
	</div>
</div>																													<?php /**PATH /home/u101594241/domains/maubantourism.com/public_html/resources/views/components/updatemodal.blade.php ENDPATH**/ ?>