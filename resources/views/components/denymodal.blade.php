<div class="modal fade" id="actdeny" data-bs-backdrop="static"
data-bs-keyboard="false" tabindex="-1" aria-labelledby="Action Modal" aria-hidden="true">
	<div class="modal-dialog">
		<form method = "POST" id = "denybook" x-data="denybook()" @submit.prevent="denyData">
			@csrf 
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="consenttitle">
				DENY <span x-text = "bname"></span>'s BOOKING # <span x-text = "bookid"></span>?</h1>
			</div>
			<div class="modal-body">
					
				<div class="mb-3">
					<label for="resarea" class="form-label" style="color: black;">Reason for Denial</label>
					<textarea class="form-control" x-model="remark" id="resdnyarea" name="remark" rows="7"></textarea>
				</div>
			</div>
			<div class="modal-footer">
				
					<input type="hidden" name="id" id="bookin" x-model="id" :value = "bookid"/>
					<input type="hidden" name="client" id = "clientin" x-model="client" :value = "bname"/>
				<button type="button" class="btn btn-secondary" id="dnycancel" data-bs-dismiss="modal">CANCEL</button>
				<button type="submit" id="denybtn" class="btn btn-danger" 
					aria-label="YES" @click="" :disabled=" remark == '' || formLoading"> <span x-text="buttonText" id="dnytxt"></span></button>
				
			</div>
		</div>
		</form> 
	</div>
</div>

