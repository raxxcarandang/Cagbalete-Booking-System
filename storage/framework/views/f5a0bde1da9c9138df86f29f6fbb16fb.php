
<div class="modal fade" id="actrem" data-bs-backdrop="static"
data-bs-keyboard="false" tabindex="-1" aria-labelledby="Action Modal" aria-hidden="true">
	<div class="modal-dialog">
		<form method = "POST" id = "rembook" x-data="rembook()" @submit.prevent="remarkData">
			<?php echo csrf_field(); ?> 
			<div class="modal-content" x-data="{
			statusdb: '',
			remarkdb: '',
			}"
			
			@upbook.window = "
			if(filteredBookings.length > 0) {
			upbookings = filteredBookings.filter(booking => 
			booking.id === bookid
			); 
			remarkdb = upbookings.map(upb => upb.remark);
			statusdb = upbookings.map(upb => upb.status);
			}
			"
			x-init="$dispatch('upbook');"
			>
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="consenttitle">
					Remark <span x-text = "bname"></span>'s Booking # <span x-text = "bookid"></span>?</h1>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col">
							<div class="form-floating mb-2">
								<select class="form-select" name = "status" id = "statusipt" data-error-msg=' ' x-validate.required>
									<option value="" disabled selected> Select Status</option>
									<option value="PENDING" :selected = "statusdb == 'PENDING'">Pending</option>  
									<option value="ARRIVED" :selected = "statusdb == 'ARRIVED'">Arrived</option>
									<option value="CANCELLED"  :selected = "statusdb == 'CANCELLED'">Cancelled</option> 
									<option value="RESCHEDULED" :selected = "statusdb == 'RESCHEDULED'">Rescheduled</option>   
									<option value="DELINQUENT" :selected = "statusdb == 'DELINQUENT'">Delinquent</option>
								</select>
								<label for="status">Status</label>
							</div>
						</div>
					</div>
					<div class="mb-3">
						<label for="remarea" class="form-label" style="color: black;">Remark For Booking #<span x-text = "bookid"></span></label>
						<textarea class="form-control" :value="remarkdb" x-model="remark" id="remarea" name="remark" rows="7"></textarea>
					</div>
				</div>
				<div class="modal-footer" x-init="$dispatch('upbook');">
					
					
					<input type="hidden" name="id" id="bookin" x-model="id" :value = "bookid"/>
					<input type="hidden" name="client" id = "clientin" x-model="client" :value = "bname"/>
					<button type="button" class="btn btn-secondary" id="remcancel" data-bs-dismiss="modal">CANCEL</button>
					<button type="submit" id="rembtn" class="btn btn-success"  
					aria-label="YES" @click="" :disabled="remark == '' || formLoading"> <span x-text="buttonText" id="remtxt"></span></button>
					
				</div>
			</div>
		</form> 
	</div>
</div>


<?php /**PATH /home/u101594241/domains/maubantourism.com/public_html/resources/views/components/remarkmodal.blade.php ENDPATH**/ ?>