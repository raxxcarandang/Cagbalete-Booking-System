

<div class="modal fade" id="updm" data-bs-backdrop="static"
data-bs-keyboard="false" tabindex="-1" aria-labelledby="Action Modal" aria-hidden="true" 
x-data = "{

upusers: {},
namedb: '',
mnamedb: '',
lnamedb: '',
genderdb: '',
bdatedb: '',
contactnodb: '',
countrydb: '',
regiondb: '',
emaildb: '',
statusdb: '',
showregion: true,

}"
@upuser.window = "
if (filteredUsers.length > 0) {
upusers = filteredUsers.filter(user => 
user.id === uid
); 
namedb = upusers.map(upuser => upuser.name);
mnamedb = upusers.map(upuser => upuser.mname);
lnamedb = upusers.map(upuser => upuser.lname);
genderdb = upusers.map(upuser => upuser.gender);
bdatedb = upusers.map(upuser => upuser.bdate);
contactnodb = upusers.map(upuser => upuser.contactno);
countrydb = upusers.map(upuser => upuser.country);
regiondb = upusers.map(upuser => upuser.region);
emaildb = upusers.map(upuser => upuser.email);
}
name = namedb[0];
mname = mnamedb[0];
lname = lnamedb[0];
bdate = bdatedb[0];
email = emaildb[0];
contactno = contactnodb[0];

if (countrydb[0] == 'INTERNATIONAL') {
showregion = false;
region = 'INTERNATIONAL';
}
if (countrydb[0] == 'PHILIPPINES') {
showregion = true;
region = '';
}
if (countrydb[0] == 'MAUBAN') {
showregion = false;
region = 'IVA CALABARZON';
}

"

x-init="

$nextTick(() => { $dispatch('upuser'); });

"
>
	<div class="modal-dialog modal-lg modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title fs-5" id="updatetitle">
				UPDATE USER # <span x-text="uid"></span></h5>
			</div>
			
			<div class="modal-body">
				<h5>USER UPDATE FORM</h5>
				<form action = "{{ route('updateuser') }}" method = "POST" id = "updatebook" x-data="updateuser()" @submit.prevent="updateData" x-validate.input @submit="$validate.submit" novalidate>
					@csrf 
					<div class = "row">
						<div class="col-12">
							<div class="form-floating mb-2" style="min-width: 100%;">
								<input type="text" name = "email" class="form-control" id="email" :value="emaildb[0]" x-model="email" data-error-msg='Invalid Amount' x-validate.required>
								<label for="email">E-mail</label>
							</div>
						</div>
					</div>
					<div class = "row">
						<div class="col">
							<div class="form-floating mb-2">
								<input type="text" name = "name" class="form-control" id="name" :value="namedb[0]"  x-model="name" data-error-msg='Invalid Amount' x-validate.required>
								<label for="name">First Name</label>
							</div>
						</div>
					
						<div class="col">
							<div class="form-floating mb-2">
								<input type="text" name = "mname" class="form-control" id="mname" :value="mnamedb[0]"  x-model="mname" data-error-msg='Invalid Amount' x-validate.required>
								<label for="name">M.I.</label>
							</div>
						</div>
				
						<div class="col">
							<div class="form-floating mb-2">
								<input type="text" name = "lname" class="form-control" id="lname" :value="lnamedb[0]"  x-model="lname" data-error-msg='Invalid Amount' x-validate.required>
								<label for="lname">Last Name</label>
							</div>
						</div>
					</div>
					<div class = "row">
						<div class="col">
							<div class="form-floating mb-2">
								<input type="date" name = "bdate" class="form-control" id="bdate" placeholder="12/25/2011" :value="bdatedb[0]" x-model="bdate" data-error-msg='Invalid Date' x-validate.required>
								<label for="bdate">Birth Date</label>
							</div>
						</div>
						
						<div class="col" id = "genderdiv">
						&emsp; &emsp;	&emsp;	&emsp;
							<input id="male" class="mx-1" type="radio" name="gender" :checked="genderdb[0] == 'Male'"  value = "Male"  /><label for = "male">Male</label>
						&emsp;	&emsp;	&emsp;	
							<input id="female" class="mx-1" type="radio" name="gender" :checked="genderdb[0] == 'Female'"  value = "Female"  /><label for = "female">Female</label>
							
						</div>
						
					</div>
					
					<div class = "row">
						<div class="col-12">
							<div class="form-floating mb-2">
								<input type="text" name = "contactno" class="form-control" id="contact" :value="contactnodb[0]" x-model="contactno" data-error-msg='Invalid Amount' x-validate.required>
								<label for="contact">Contact Number</label>
							</div>
						</div>
					</div>
					<div class = "row">
						<div class="col">
							<select name = "country" id="tcountry" class="form-control" x-model="country" 
							@change="
							if (country == 'INTERNATIONAL') {
							showregion = false;
							region = 'INTERNATIONAL';
							}
							if (country == 'PHILIPPINES') {
							showregion = true;
							region = '';
							}
							if (country == 'MAUBAN') {
							showregion = false;
							region = 'IVA CALABARZON';
							}" required> 
								<option value="" disabled selected>Select Residence</option>
								<option value="PHILIPPINES" :selected="countrydb[0] == 'PHILIPPINES'">Philippines</option>
								<option value="MAUBAN" :selected="countrydb[0] == 'MAUBAN'">Mauban, Philippines</option>
								<option value="INTERNATIONAL" :selected="countrydb[0] == 'INTERNATIONAL'">International</option>
							</select>
						</div>
						<div class="col"  x-show="showregion">
							<select name = "region" id="tregion" x-model="region" class="form-control" required> 
								<option value="" disabled selected>Select a Region</option>
								<option value="(I) ILOCOS" :selected="regiondb[0] == '(I) ILOCOS'">Region I - Ilocos Region</option>
								<option value="(II) CAGAYAN" :selected="regiondb[0] == '(II) CAGAYAN'">Region II - Cagayan Valley</option>
								<option value="(III) C. LUZON" :selected="regiondb[0] == '(III) C. LUZON'">Region III - Central Luzon</option>
								<option value="(IV-A) CALABARZON" :selected="regiondb[0] == '(IV-A) CALABARZON'">CALABARZON Region</option>
								<option value="(IV-B) MIMAROPA" :selected="regiondb[0] == '(IV-B) MIMAROPA'">MIMAROPA Region</option>
								<option value="(V) BICOL" :selected="regiondb[0] == '(V) BICOL'">Region V -  Bicol Region</option>
								<option value="(VI) W. VISAYAS" :selected="regiondb[0] == '(VI) W. VISAYAS'">Region VI - Western Visayas</option>
								<option value="(VII) C. VISAYAS" :selected="regiondb[0] == 'VII) C. VISAYAS'">Region VII - Central Visayas</option>
								<option value="(VIII) E. VISAYAS" :selected="regiondb[0] == '(VIII) E. VISAYAS'">Region VIII - Eastern Visayas</option>
								<option value="(IX) ZAMBOANGA" :selected="regiondb[0] == '(IX) ZAMBOANGA'">Region IX -  Zamboanga Peninsula</option>
								<option value="(X) N. MINDANAO" :selected="regiondb[0] == '(X) N. MINDANAO'">Region X - Northern Mindanao</option>
								<option value="(XI) DAVAO" :selected="regiondb[0] == '(XI) DAVAO'">Region XI -  Davao Region</option>
								<option value="(XII) SOCCSKSARGEN" :selected="regiondb[0] == '(XII) SOCCSKSARGEN'">Region XII -  SOCCSKSARGEN</option>
								<option value="(XIII) CARAGA" :selected="regiondb[0] == '(XIII) CARAGA'">Region XIII - Caraga</option>
								<option value="NCR" :selected="regiondb[0] == 'NCR'">NCR - National Capital Region</option>
								<option value="CAR" :selected="regiondb[0] == 'CAR'">CAR - Cordillera Administrative Region</option>
								<option value="BARMM" :selected="regiondb[0] == 'BARMM'">BARMM-Bangsamoro Autonomous Region in Muslim Mindanao</option>
								<option value="INTERNATIONAL" :selected="regiondb[0] == 'INTERNATIONAL'" hidden>N/A</option>
							</select>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" id = "updcancel" class="btn btn-secondary" data-bs-dismiss="modal">CANCEL</button>
						<button type="submit" id="updbtn" class="btn btn-success" aria-label="UPDATE" @click="">
							UPDATE
						</button>
					</form> 
				</div>
			</div>
		</div>
		<span x-init="
		
		$nextTick(() => { $dispatch('upuser'); });
		
		"></span>
	</div>		
</div>