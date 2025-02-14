<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" id="regform">
        @csrf
		<div 
		x-data="{
		country: null,
		region: null,
		showregion: true,
		countryCode: '',
		contactNumber: '',
		}">
			<!-- Email Address -->
			<div class="mt-4">
				<x-input-label for="email" :value="__('Email')" />
				<x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
				<x-input-error :messages="$errors->get('email')" class="mt-2" />
			</div>
			
			<!-- Password -->
			<div class="mt-4">
				<x-input-label for="password" :value="__('Password')" />
				
				<x-text-input id="password" class="block mt-1 w-full"
				type="password"
				name="password"
				required autocomplete="new-password" />
				
				<x-input-error :messages="$errors->get('password')" class="mt-2" />
			</div>
			
			<!-- Confirm Password -->
			<div class="mt-4">
				<x-input-label for="password_confirmation" :value="__('Confirm Password')" />
				
				<x-text-input id="password_confirmation" class="block mt-1 w-full"
				type="password"
				name="password_confirmation" required autocomplete="new-password" />
				
				<x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
			</div>
			
			<div class="row mt-4">
				<!-- First Name -->
				<div class="col-4">
					<x-input-label for="name" :value="__('First Name')" />
					<x-text-input id="name" class="block mt-1 w-full " oninput="capitalizeFirstLetter(this)" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
					<x-input-error :messages="$errors->get('name')" class="mt-2" />
				</div>
				
			<!-- Middle Name -->
            <div class="col-3">
                <x-input-label for="mname" :value="__('M.I.')" />
                <input 
                    id="mname" 
                    type="text" 
                    class="block mt-1 w-full" 
                    name="mname" 
                    required 
                    autofocus 
                    autocomplete="mname" 
                    maxlength="2" 
                    placeholder="M.I."
                />
                <x-input-error :messages="$errors->get('mname')" class="mt-2" />
            </div>

				
				
				
				<!-- Last Name -->
				<div class="col-5">
					<x-input-label for="lname" :value="__('Last Name')" />
					<x-text-input id="lname" class="block mt-1 w-full " oninput="capitalizeFirstLetter(this)" type="text" name="lname" :value="old('lname')" required autofocus autocomplete="lname" />
					<x-input-error :messages="$errors->get('lname')" class="mt-2" />
				</div>
			</div>
			<!-- Birthday -->
			<div class="mt-4">
				<x-input-label for="bdate" :value="__('Birthdate')" />
				<x-text-input id="bdate" class="block mt-1 w-full" type="date" name="bdate" :value="old('bdate')"  min="{{ \Carbon\Carbon::now()->subYears(122)->toDateString() }}"  
				max="{{ \Carbon\Carbon::now()->subYears(13)->toDateString() }}"   required autofocus autocomplete="bdate" />
				<x-input-error :messages="$errors->get('bdate')" class="mt-2" />
			</div>
			
			<!-- Gender -->
			<div class="mt-4">
				<x-input-label for="gender" :value="__('Gender')" />
                <input id="male" class="mx-1" type="radio" name="gender" value = "Male" : required autofocus autocomplete="gender" /><label for = "male">Male</label>
                <input id="female" class="mx-1" type="radio" name="gender" value = "Female" : required autofocus autocomplete="gender" /><label for = "female">Female</label>
				<x-input-error :messages="$errors->get('gender')" class="mt-2" />
			</div>
			
			<!-- Contact Number -->
			<div class="mt-4">
				<x-input-label for="contactno" :value="__('Contact Number')" />
				
				<!-- Country Code Select Dropdown -->
				<div class="flex items-center">
					<select 
					id="country_code" 
					class="block mt-1 w-1/4 mr-2" 
					x-model="countryCode" 
					@input.change="contactNumber = document.getElementById('country_code').value"
					x-init="$nextTick(() => countryCode = '+63')"  <!-- Default country code PH -->
					>
					<option value="+63" selected>+63 (Philippines)</option>
					<option value="+1">+1 (USA/Canada)</option>
					<option value="+44">+44 (United Kingdom)</option>
					<option value="+61">+61 (Australia)</option>
					<option value="+91">+91 (India)</option>
					<option value="+81">+81 (Japan)</option>
					<option value="+33">+33 (France)</option>
					<option value="+49">+49 (Germany)</option>
					<option value="+55">+55 (Brazil)</option>
					<option value="+34">+34 (Spain)</option>
					<option value="+39">+39 (Italy)</option>
					<option value="+52">+52 (Mexico)</option>
					<option value="+7">+7 (Russia/Kazakhstan)</option>
					<option value="+86">+86 (China)</option>
					<option value="+27">+27 (South Africa)</option>
					<option value="+62">+62 (Indonesia)</option>
					<option value="+64">+64 (New Zealand)</option>
					<option value="+966">+966 (Saudi Arabia)</option>
					<option value="+971">+971 (United Arab Emirates)</option>
					<option value="+971">+973 (Bahrain)</option>
					<option value="+60">+60 (Malaysia)</option>
					<option value="+20">+20 (Egypt)</option>
					<option value="+92">+92 (Pakistan)</option>
					<option value="+43">+43 (Austria)</option>
					<option value="+48">+48 (Poland)</option>
					<option value="+1">+1 (Cuba)</option>
					<option value="+66">+66 (Thailand)</option>
					<option value="+53">+53 (Cuba)</option>
					<option value="+32">+32 (Belgium)</option>
					<option value="+30">+30 (Greece)</option>
					<option value="+961">+961 (Lebanon)</option>
					<option value="+255">+255 (Tanzania)</option>
					<option value="+962">+962 (Jordan)</option>
					<option value="+354">+354 (Iceland)</option>
					<option value="+973">+973 (Bahrain)</option>
					<option value="+354">+354 (Iceland)</option>
					<option value="+351">+351 (Portugal)</option>
					<option value="+41">+41 (Switzerland)</option>
					<option value="+351">+351 (Portugal)</option>
					<option value="+62">+62 (Indonesia)</option>
					<option value="+44">+44 (United Kingdom)</option>
				</select>
				
				<!-- Contact Number Input -->
				<x-text-input 
				id="contactno" 
				class="block mt-1 w-full" 
				type="text" 
				name="contactno" 
				:value="old('contactno')" 
				required 
				autocomplete="username" 
				x-ref="contactno" 
				x-model="contactNumber" 
				x-init="$nextTick(() => contactNumber = countryCode)" 
				placeholder="Enter phone number" 
				/>
			</div>
			
			<x-input-error :messages="$errors->get('contactno')" class="mt-2" />
		</div>
		
		
		<!-- Country -->
		<div class="mt-4">
			<x-input-label for="country" :value="__('Residence')" />
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
				<option value="PHILIPPINES">Philippines</option>
				<option value="MAUBAN">Mauban, Philippines</option>
				<option value="INTERNATIONAL">International</option>
			</select>
			<x-input-error :messages="$errors->get('country')" class="mt-2" />
		</div>
		
		<!-- Optional Region -->
		<div class="mt-4" id = "optregion" x-show="showregion">
			<x-input-label for="region" :value="__('Region')" />
			<select name = "region" id="tregion" :value="region" class="form-control" required> 
				<option value="" disabled selected>Select a Region</option>
				<option value="(I) ILOCOS">Region I - Ilocos Region</option>
				<option value="(II) CAGAYAN">Region II - Cagayan Valley</option>
				<option value="(III) C. LUZON">Region III - Central Luzon</option>
				<option value="(IV-A) CALABARZON">CALABARZON Region</option>
				<option value="(IV-B) MIMAROPA">MIMAROPA Region</option>
				<option value="(V) BICOL">Region V -  Bicol Region</option>
				<option value="(VI) W. VISAYAS">Region VI - Western Visayas</option>
				<option value="(VII) C. VISAYAS">Region VII - Central Visayas</option>
				<option value="(VIII) E. VISAYAS">Region VIII - Eastern Visayas</option>
				<option value="(IX) ZAMBOANGA">Region IX -  Zamboanga Peninsula</option>
				<option value="(X) N. MINDANAO">Region X - Northern Mindanao</option>
				<option value="(XI) DAVAO">Region XI -  Davao Region</option>
				<option value="(XII) SOCCSKSARGEN">Region XII -  SOCCSKSARGEN</option>
				<option value="(XIII) CARAGA">Region XIII - Caraga</option>
				<option value="NCR">NCR - National Capital Region</option>
				<option value="CAR">CAR - Cordillera Administrative Region</option>
				<option value="BARMM">BARMM-Bangsamoro Autonomous Region in Muslim Mindanao</option>
				<option value="INTERNATIONAL" hidden>N/A</option>
			</select>
			<x-input-error :messages="$errors->get('region')" class="mt-2" />
		</div>
		
		<div class="flex items-center justify-end mt-4">
			<a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
				{{ __('Already registered?') }}
			</a>
			
			<x-primary-button class="ms-4">
				{{ __('Register') }}
			</x-primary-button>
		</div>
	</div>
</form>
<script src="/js/bookingform.js"></script>
</x-guest-layout>
