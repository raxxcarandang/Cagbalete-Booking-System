
<div class="row mt-1">
	
	<div class="col-12 dashrow2">
		<div class="row">
			<div class="col">
				<h5 class="mt-2 mb-0 fw-bold">
					&nbsp;Accommodation
				</h5>
			</div>
			
		</div>
		
		
		<div class = "row mt-1">
			<div class = "row">
				
				<div class = "col-12">
					<select class="form-select"
				    x-ref="accselect"
					@change="
					accload();
					imgload();
					" 
					@blur="
					accload();
					imgload();
					" 
					@click="
					accload();
					imgload();
					" 
					
					id="accselect"
					
					>
						<option value = "" disabled selected> Select An Accommodation</option>
						@foreach ($accommodations as $accommodation)
						<?php if($accommodation->name == 'Other') {} else {
							echo '<option value = "'. $accommodation->name .'">'. $accommodation->name .'</option>';
						}
						?>
						@endforeach
					</select>
				</div>
				
			</div>
			<div class = "row mt-1">
				<div class = "col-12">
					<button
					type = "button"
					data-bs-toggle="modal"
					data-bs-target="#previmgheader"
					title="Click to Change Header"
					id = "previewheadbtn"
					@click = "document.getElementById('headmodalprev').src='/images/resort/header/' + acchead + '?id=' + generateRandomQueryString(); previewimgname = acchead; accimgdir = accimg; accidup = accnum; imginc = accimginc;"
					>
						<img :src="'/images/resort/header/'+ acchead" id ="accheadpreview"/>
					</button>
				</div>
			</div>
		</div>
		<form id = "accdescform" x-data = "accnamedesc()" @submit.prevent="submitData">
			<fieldset id = "accdescset">
				<div class="row mt-1">
					<div class = "col-6">
						<input type="hidden" id = "acciddesc" name="accid" x-model="accid" :value = "accnum" />
						<div class="row">
							<div class="col-6">
								<div class="form-floating mt-1">
									<input class= "form-control" type = "text" id = "accname" name = "name" x-model = "name" :value="acctext" style="min-width: 100%;" />
									<label for="accname">Name</label>
								</div>
							</div>
							<div class="col-6">
								<div class="form-floating mt-1">
									<input class= "form-control" type = "text" id = "acccontact" name = "contactno" x-model = "contactno" :value="accconnum" style="min-width: 100%;" />
									<label for="acccontact">Contact #</label>
								</div>
							</div>
						</div>
						<div class="row mt-1">
							<div class="col-6">
								<div class="form-floating mt-1">
									<input class= "form-control" type = "text" id = "acctype" name = "type" x-model = "type" :value="acctype" style="min-width: 100%;" />
									<label for="acctype">Type</label>
								</div>
							</div>
							<div class="col-6">
								<div class="form-floating mt-1">
									<input class= "form-control" type = "text" id = "acclodge" name = "lodge" x-model = "lodge" :value="acclodge" style="min-width: 100%;" />
									<label for="acclodge">Lodging</label>
								</div>
							</div>
						</div>
						
						<div class="row mt-1">
						    <div class="col-12">
    							<div class="form-floating">
    								<input class= "form-control" type = "text" id = "accadd" name = "address" x-model = "address" :value="accadd" style="min-width: 100%;" />
    								<label for="accadd" style="margin-left: 1rem;">Address</label>
    							</div>
							</div>
						</div>
							<div class="row mt-1">
						    	<div class="col-12">
							    	<div class="form-floating">
								<textarea class = "form-control" id = "accdes" name = "description" rows="5" x-model = "description" :value="accdesc" style="min-width: 100%; "></textarea>
								<label for="accdesc" >Description</label>
						        	</div>
							</div>
						</div>
					
						
						<button type = 'submit' 
						name = 'setbtn'  
						class = "btn setbtn"
						id = "btnitr"
						title = 'Change Accommodation Name & Description' 
						:disabled = "accnum == 0 || formLoading"
						>
							<span id="setdetails" x-text="buttonText"></span>
						</button>
						
					</div>
					<div class = "col-6">
						<button
						type = "button"
						data-bs-toggle="modal"
						data-bs-target="#previmgthmb"
						title="Click to Change Thumbnail"
					id = "previewbtn"
					@click = "document.getElementById('thumbmodalprev').src='/images/resort/thumbnail/' + accimg + '?id=' + generateRandomQueryString(); previewimgname = accimg; accimgdir = accimg; accidup = accnum; imginc = accimginc;"
					>
						<img :src="'/images/resort/thumbnail/'+ accimg" id ="accpreview"/>
					</button>
					</div>
				</div>
				
			</fieldset>
		</form>
	</div>
</div>																					