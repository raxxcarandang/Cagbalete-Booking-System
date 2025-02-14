<div class="modal fade" id="imgupm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="Action Modal" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="updatetitle">UPLOAD NEW IMAGES</h5>
                <button type="button" id="updcancel" class="btn btn-secondary" data-bs-dismiss="modal">X</button>
			</div>
            <div class="modal-body justify-center">
                <form enctype="multipart/form-data" id="uploadimg" x-data="imageform()" @submit.prevent="submitImg">
                    @csrf
                    <input type="hidden" id="idacc" x-model="accid" />
                    <input type="hidden" x-model="uploaddate" value="{{ date('Y-m-d') }}" />
                    <br>
					
						<input id = "imguploader" type="file" name="images[]" multiple @change="handleFileUpload" />
					
                    <div class="image-preview mt-3 grid grid-cols-3 gap-4" id="image-preview">
                        <template x-for="(image, index) in images" :key="index">
                            <div class="preview-item relative">
                                <img :src="image" alt="Image Preview" class="img-thumbnail" />
                                <button type="button" class="close-button" @click="removeImage(index)">×</button>
							</div>
						</template>
					</div>
					
				</div>
				<div class="modal-footer" x-data="imageform()">
					<button type="submit" id="uploadbtn" class="btn btn-success" :disabled="formLoading" @click="$dispatch('accimgload')">
						<span x-text="buttonText" id ="upbtntext"></span>
					</button>
				</form>
                <button type="button" id="uplcancel" class="btn btn-secondary" data-bs-dismiss="modal" @click="$dispatch('accimgload')">CLOSE</button>
			</div>
		</div>
	</div>
</div>
