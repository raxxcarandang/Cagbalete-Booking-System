
<div class="modal fade" id="previmgheader" data-bs-backdrop="static"
data-bs-keyboard="false" tabindex="-1" aria-labelledby="Action Modal" aria-hidden="true" 
>
	<div class="modal-dialog modal-lg modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title fs-5" id="updatetitle">
				HEADER (<span x-text="previewimgname"></span>)</h5>&emsp;&emsp;&emsp;<button type="button" id = "updcancel" class="btn btn-secondary" data-bs-dismiss="modal">X</button>
			</div>
			<div class="modal-body">
				<img id ="headmodalprev"/>
				<br>
				<form id = "headerupdateform" x-data = "headerupdate()" @submit.prevent="submitHeader">
					<input type="hidden" id = "accidhead" name="accid" x-model="accid" :value = "accidup" />
					<div class="mb-3">
						<label for="formFile" class="form-label">Upload Header Here</label>
						<input class="form-control" type="file" id="formFile" @change="handleFileUpload" onchange="document.getElementById('headmodalprev').src = window.URL.createObjectURL(this.files[0])" :disabled = "accidup == 0">
					</div>
					
					<!--
					<input type="file"  @change="handleFileUpload" onchange="document.getElementById('headmodalprev').src = window.URL.createObjectURL(this.files[0])" :disabled = "accidup == 0" />
					-->
					
				</div>
				<div class="modal-footer" x-data="headerupdate()">
					<span x-text="formMessage"></span>
					<button type="submit" id = "headchange" class="btn btn-success" :disabled = "accidup == 0 || formLoading"><span x-text="buttonText" id="headtxt"></span></button>
				</form>
				<button type="button" id = "headcancel" class="btn btn-secondary" data-bs-dismiss="modal" @click="document.getElementById('previmgheader').reset();" >CLOSE</button>
			</div>
		</div>
	</div>
</div>																			<?php /**PATH /home/u101594241/domains/maubantourism.com/public_html/resources/views/components/imgheadermodal.blade.php ENDPATH**/ ?>