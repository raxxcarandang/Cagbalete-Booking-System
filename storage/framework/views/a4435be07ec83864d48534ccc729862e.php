<div class="modal fade" id="actm" data-bs-backdrop="static"
data-bs-keyboard="false" tabindex="-1" aria-labelledby="Action Modal" aria-hidden="true">
	<div class="modal-dialog">
		<form method = "POST" id = "deletebook" x-data="deletebook()" @submit.prevent="deleteData">
			<?php echo csrf_field(); ?> 
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="consenttitle">
				DELETE <span x-text = "bname"></span>'s BOOKING # <span x-text = "bookid"></span>?</h1>
			</div>
			<div class="modal-body">
					
				<div class="mb-3">
					<label for="resarea" class="form-label" style="color: black;">Reason for Deletion</label>
					<textarea class="form-control" x-model="reason" id="resarea" name="reason" rows="7"></textarea>
				</div>
			</div>
			<div class="modal-footer">
				
					<input type="hidden" name="id" id="bookin" x-model="id" :value = "bookid"/>
					<input type="hidden" name="client" id = "clientin" x-model="client" :value = "bname"/>
				<button type="button" class="btn btn-secondary" id="delcancel" data-bs-dismiss="modal">CANCEL</button>
				<button type="submit" id="delbtn" class="btn btn-danger" 
					aria-label="YES" @click="" :disabled=" reason == '' || formLoading"> <span x-text="buttonText" id="deltxt"></span></button>
				
			</div>
		</div>
		</form> 
	</div>
</div>

<?php /**PATH /home/u101594241/domains/maubantourism.com/public_html/resources/views/components/deletemodal.blade.php ENDPATH**/ ?>