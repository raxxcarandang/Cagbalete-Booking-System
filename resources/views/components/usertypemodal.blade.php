
<div class="modal fade" id="typem" data-bs-backdrop="static"
data-bs-keyboard="false" tabindex="-1" aria-labelledby="Action Modal" aria-hidden="true">
	<div class="modal-dialog">
		<form method = "POST" id = "typeuser" x-data="typeuser()" @submit.prevent="typeData">
			@csrf 
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="consenttitle">
					CHANGE USER TYPE</h1>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col">
							<div class="form-floating mb-2">
								<select class="form-select" name = "type" id = "typeipt" x-model = "role" data-error-msg=' ' x-validate.required>
									<option value="" disabled selected> Select New User Type</option>
									<option value="1">User</option>  
									<option value="797">Admin</option>
								</select>
								<label for="status">User Type</label>
							</div>
						</div>
					</div>
					<div class="mb-3">
						<label for="remarea" class="form-label" style="color: black;">Remark<span x-text = "bookid"></span></label>
						<textarea class="form-control" x-model="remark" id="remarea" name="remark" rows="7"></textarea>
					</div>
				</div>
				<div class="modal-footer" x-init="$dispatch('upuser');">
					<button type="button" class="btn btn-secondary" id="typecancel" data-bs-dismiss="modal">CANCEL</button>
					<button type="submit" id="typebtn" class="btn btn-success"  
					aria-label="YES" @click="" :disabled="formLoading"> <span x-text="buttonText" id="typetxt"></span></button>
					
				</div>
			</div>
		</form> 
	</div>
</div>


