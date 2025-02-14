
<div class="modal fade" id="previmgthmb" data-bs-backdrop="static"
data-bs-keyboard="false" tabindex="-1" aria-labelledby="Action Modal" aria-hidden="true" 
>
	<div class="modal-dialog modal-lg modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title fs-5" id="updatetitle">
				THUMBNAIL (<span x-text="previewimgname"></span>)</h5>&emsp;&emsp;&emsp;<button type="button" id = "updcancel" class="btn btn-secondary" data-bs-dismiss="modal">X</button>
			</div>
			<div class="modal-body">
				<img :src="'/images/resort/thumbnail/'+ previewimgname" id ="thumbmodalprev"/>
				<br>
				<form id = "thumbform" enctype="multipart/form-data" x-data ="thumbupdate()" @submit.prevent="submitThumb">
					<?php echo csrf_field(); ?>
					<input type="hidden" id = "accidthmb" name="accid" x-model="accid" :value = "accidup" />
					<!--
					<input type="file" @change="handleFileUpload"  onchange="document.getElementById('thumbmodalprev').src = window.URL.createObjectURL(this.files[0])" :disabled = "accidup == 0" />
				-->
				<div class="mb-3">
						<label for="thumbFile" class="form-label">Upload Thumbnail Here</label>
						<input class="form-control" type="file" id="thumbFile" @change="handleFileUpload"  onchange="document.getElementById('thumbmodalprev').src = window.URL.createObjectURL(this.files[0])">
					</div>
			</div>
			<div class="modal-footer" x-data="thumbupdate()">
				<button type="submit" id = "thmbchange" class="btn btn-success" :disabled = "accidup == 0 || formLoading"><span x-text="buttonText" id="thumbtxt"></span></button>
				</form>
				<button type="button" id = "thmbcancel" class="btn btn-secondary" data-bs-dismiss="modal" @click="document.getElementById('previmgthmb').reset();" >CLOSE</button>
			</div>
		</div>
	</div>
</div>																			<?php /**PATH /home/u101594241/domains/maubantourism.com/public_html/resources/views/components/thumbmodal.blade.php ENDPATH**/ ?>