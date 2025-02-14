
<div class="modal fade" id="reschedmodal" data-bs-backdrop="static"
data-bs-keyboard="false" tabindex="-1" aria-labelledby="Action Modal" aria-hidden="true" 

>
	<div class="modal-dialog modal-lg modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title fs-5" id="updatetitle">
				RESCHEDULE BOOKING # <span x-text="bookid"></span>?</h5>
			</div>
			<div class="modal-body">
				
				<form action = "{{ route('rescheduser') }}" method = "POST" id = "reschedbook" >
					@csrf 
					<input type="hidden" name="id" :value="bookid" id = "bookidin" />
					
					<div class = "row">
						<div class="col">
							<div class="form-floating mb-2">
								<input type="date" name = "arrival" class="form-control" id="arrival" placeholder="12/25/2024" min = "<?php echo date('Y-m-d', strtotime('+1 day'));  ?>" :max = "rdate" :value="arrivaldb" x-model="adate" data-error-msg='Invalid Date' x-validate.required>
								<label for="arrival">New Arrival Date</label>
							</div>
						</div>
						<div class="col">
							<div class="form-floating mb-2">
								<input type="date" name = "departure" class="form-control" id="departure" placeholder="01/01/2025" :min = "adate" :value="returndb" x-model="rdate" data-error-msg='Invalid Date' x-validate.required>
								<label for="departure">New Return Date</label>
							</div>
						</div>
						<input type = "hidden" :value = "itinerary" name = "itinerary" id = "itr" />
					</div>
					
				</div>
				<div class="modal-footer">
					<button type="button" id = "reschedcancel" class="btn btn-secondary" data-bs-dismiss="modal">CANCEL</button>
					<button type="submit" id="reschedbtn" class="btn btn-success" aria-label="RESCHEDULE" @click="
					
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
						RESCHEDULE
					</button>
				</form> 
			</div>
		</div>
	</div>
</div>																									