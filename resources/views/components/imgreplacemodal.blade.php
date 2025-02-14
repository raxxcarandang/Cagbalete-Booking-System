<div class="modal fade" id="updm" data-bs-backdrop="static"
data-bs-keyboard="false" tabindex="-1" aria-labelledby="Action Modal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="consenttitle">
				REPLACE IMAGE</h1>
			</div>
			<div class="modal-body">
				<h3>REPLACE IMAGE ( <span x-text = "imgname"></span> )?</h3>
				<form method = "POST" id = "deletebook" x-data = "accrepimg()" @submit.prevent="replaceImg">
					@csrf 
					
					<input type="hidden" id = "imgseq" name="seqid" x-model = "seqid" :value = "idseq"/>
					<input type="hidden" id = "accrepid" name="accid" x-model = "accid" :value = "accnum"/>
					<input type="hidden" id = "repname" name="name" x-model = "name" :value = "imgname"/>
					<img id="repimgprev" />
					<!--
					<input type="file"  @change="handleFileUpload" onchange="document.getElementById('repimgprev').src = window.URL.createObjectURL(this.files[0])"  />
					-->
					<div class="mb-3">
						<label for="imgFile" class="form-label">Upload Image Here</label>
						<input class="form-control" type="file" id="imgFile" @change="handleFileUpload" onchange="document.getElementById('repimgprev').src = window.URL.createObjectURL(this.files[0])">
					</div>
				</div>
				<div class="modal-footer" x-data="accrepimg()">
					
					<button type="submit" name="repbtn" id ="repbtnid" class="btn btn-success" style="background: green;" data-bs-dismiss="modal" 
					aria-label="YES" @click="$dispatch('accimgload');" :disabled = "formLoading"><span x-text="buttonText" id  = "repbtntext"></span></button>
					<button type="button" class="btn btn-secondary" id="repcancel" data-bs-dismiss="modal">CANCEL</button>
					
				</form> 
			</div>
		</div>
	</div>
</div>

