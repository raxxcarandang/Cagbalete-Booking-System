<div class="modal fade" id="proofm" data-bs-backdrop="static"
data-bs-keyboard="false" tabindex="-1" aria-labelledby="Action Modal" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="updatetitle">
				<span x-text="proof"></span>&nbsp;TRANSACTION</h5>&emsp;&emsp;&emsp;
                <button type="button" id="updcancel" class="btn btn-secondary" data-bs-dismiss="modal" style="color: red;">X</button>
			</div>
            <div class="modal-body">
                <img :src="'/images/proof/' + proofname" alt="No Proof Image Found" id="imgmodalprev"/>
			</div>
            <div class="modal-footer">

                <button type="button" id="imgmodalcancel" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
				  <a :href="'/images/proof/' + proofname" :download="proofname" class="btn btn-primary">
                    Download Image
				</a>
			</div>
		</div>
	</div>
</div>
