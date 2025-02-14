
<div class="modal fade" id="previmg" data-bs-backdrop="static"
data-bs-keyboard="false" tabindex="-1" aria-labelledby="Action Modal" aria-hidden="true" 
>
	<div class="modal-dialog modal-lg modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title fs-5" id="updatetitle">
						PREVIEW OF <span x-text="previewimgname"></span></h5>&emsp;&emsp;&emsp;<button type="button" id = "updcancel" class="btn btn-secondary" data-bs-dismiss="modal">X</button>
			</div>
			<div class="modal-body">
				<img :src="'/images/resort/supplier'+ accnum +  '/' + previewimgname" id ="imgmodalprev"/>
			</div>
			<div class="modal-footer">
				<button type="button" id = "imgmodalcancel" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
		</div>
	</div>
</div>
</div>																			<?php /**PATH /home/u101594241/domains/maubantourism.com/public_html/resources/views/components/imgmodal.blade.php ENDPATH**/ ?>