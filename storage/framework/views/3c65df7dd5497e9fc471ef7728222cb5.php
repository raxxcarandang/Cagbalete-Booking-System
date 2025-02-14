<div class="modal fade" id="actm" data-bs-backdrop="static"
data-bs-keyboard="false" tabindex="-1" aria-labelledby="Action Modal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="consenttitle">
				DELETE IMAGE</h1>
			</div>
			<div class="modal-body">
				<h3>DELETE IMAGE ( <span x-text = "imgname"></span> )?</h3>
				<form method = "POST" id = "deletebook" x-data = "accdelimg()" @submit.prevent="deleteImg">
					<?php echo csrf_field(); ?> 
					<input type="hidden" id = "deleteid" name="id" x-model = "id" :value = "imgid"/>
					<input type="hidden" id = "accdelid" name="accid" x-model = "accid" :value = "accnum"/>
					<input type="hidden" id = "delname" name="name" x-model = "name" :value = "imgname"/>
					<img id="imguploadprev" alt="Please Upload an Image" :src="'/images/resort/supplier'+ accnum +  '/' + imgname" />
				</div>
				<div class="modal-footer" x-data="accdelimg()">
					
					<button type="submit" name="delbtn" id = "delbtnid" class="btn btn-danger" style="background: red;" data-bs-dismiss="modal" 
					aria-label="YES" @click="$dispatch('accimgload');"><span x-text="buttonText" id = "deltxt"></span></button>
					<button type="button" class="btn btn-secondary" id="delcancel" data-bs-dismiss="modal">CANCEL</button>
					
				</form> 
			</div>
		</div>
	</div>
</div>

<?php /**PATH /home/u101594241/domains/maubantourism.com/public_html/resources/views/components/imagedeletemodal.blade.php ENDPATH**/ ?>