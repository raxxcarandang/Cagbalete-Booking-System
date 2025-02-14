<div class="modal fade" id="cancelModal" data-bs-backdrop="static"
data-bs-keyboard="false" tabindex="-1" aria-labelledby="Action Modal" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h1  class="modal-title fs-5" id="consenttitle">CANCEL BOOKING # <span x-text = "bookid"></span>?</h1>
			</div>
			<div class="modal-body">
				
				<table class="table table-borderless text-center" id="table">
					<thead id='thead'>
						<tr>
							<th scope="col">LEAD GUEST</th>
							<th scope="col">BOOKING ID</th>
							<th scope="col">ACCOMMODATION</th>
							<th scope="col">ITINERARY</th>
							<th scope="col">TRAVEL MEANS</th>
							<th scope="col">PARKING</th>
							<th scope="col">BOAT</th>
							<th scope="col">PURPOSE</th>
						</tr>
					</thead>
					<tbody>
						<template x-for="cbooking in currentBookings" :key="cbooking.id">
							<tr class="hover:bg-gray-200 text-gray-900 text-xs">
								
								<td id = "guesttd" 
								x-init="
								$dispatch('userload');
								$dispatch('mapload');
								setTimeout(() => $dispatch('userload'), 7000); 
								setTimeout(() => $dispatch('mapload'), 7000);
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
										
										<span class = "dbinfo" x-text="user[0].name"></span>  <span class = "dbinfo" x-text="user[0].lname"></span>, <span class = "dbinfo" x-text="age"></span>, <span class = "dbinfo"><i :class="gclass"  :style="'color:' + gcolor + ';'"></i></span>
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
									
									
									<span id = "bookid">Booking # <span x-text="cbooking.id"></span>
									</span>
									
								</div>
								
								{{---------------------------------End Booking ID Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
							</td>
							
							<td id = "acctd">
								{{---------------------------------Start Accommodation Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}  
								<span class = "dbinfo" x-text="cbooking.accommodation"></span>
								{{---------------------------------Start Accommodation Type Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
							</td>
							
							<td id = "itrtd">
								{{---------------------------------Start Itinerary Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
								<span class = 'dbinfo'><br>(<span x-text="cbooking.itinerary"></span>)<br><strong><span x-text="new Date(cbooking.arrival).toLocaleDateString('en-US', { year: '2-digit', month: '2-digit', day: '2-digit' } )"></span><br>↓<br><span x-text="new Date(cbooking.departure).toLocaleDateString('en-US', { year: '2-digit', month: '2-digit', day: '2-digit' } )"></span></strong><br><br></span>
								{{---------------------------------End Itinerary Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
							</td>
							
							<td>
								{{---------------------------------Start Travel Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}  
								<span class="dbinfo" x-text="cbooking.travelmeans"></span>
								
								
								{{---------------------------------End Travel Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}  							
							</td>
							<td>
								{{---------------------------------Start Parking Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}
								<span class = 'dbinfo'><span class = "dbinfo" x-text="cbooking.parking"></span> </span>
								{{---------------------------------End Parking Column-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
							</td>
							
							<td>
								{{---------------------------------Start Boat Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}
								<span class = 'dbinfo'><span class = "dbinfo" x-text="cbooking.boating"></span> </span>
								{{---------------------------------End Boat Column-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
							</td>
							
							<td>
								{{---------------------------------Start Purpose Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}  
								<span class = 'dbinfo'> <span class = "dbinfo" x-text="cbooking.purpose"></span> </span>
								{{---------------------------------End Purpose Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}
							</td>
							
						</tr>
					</template>
					<tr x-show="currentBookings.length < 1">
						<td colspan="100%" class="text-center py-3 text-gray-900 text-sm">No matching records found.</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="modal-footer">
			<form method = "POST" id = "cancelbook" x-data="cancelbook()" @submit.prevent="cancelData">
				@csrf 
				<input type="hidden" name="id" id="bookin" x-model="id" :value = "bookid"/>
				
				<br>
				
				<button type="button" class="btn btn-secondary" id="exitbtn" data-bs-dismiss="modal">NO</button>
				<button type="submit" id="cancelbtn" class="btn btn-danger"
				aria-label="YES" @click="" :disabled="formLoading"> <span x-text="buttonText" id="canceltxt"></span></button>
				
			</form> 
		</div>
	</div>
</div>
</div>

