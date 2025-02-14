<form id = "accdescform" x-data = "accnamedesc()" @submit.prevent="submitData">
<div class="row mt-1">
	
	<div class="col-12 dashrow">
		<div class="row">
			<div class="col-8">
				<h5 class="mt-1 mb-0 fw-bold">
					&nbsp;Accommodation
				</h5>
			</div>
			<div class="col">
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
		</div>
		
		
		<div class = "row mt-1">
			@if (count($accommodation) > 0)
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
						<input type="file" name="" />
						<!-- Add Input for images here -->
					</button>
				</div>
			</div>
		</div>
		
		
			<fieldset id = "accdescset">
				<div class="row mt-1"
				@loadacc.window = "
				acchead = '{{$accommodation->first()->slider}}';
				accimg = '{{$accommodation->first()->thumbnail}}';
				accdesc = '{{$accommodation->first()->description}}';
				acctext = '{{$accommodation->first()->name}}';
				accnum = '{{$accommodation->first()->id}}';
				acctype = '{{$accommodation->first()->type}}';
				acclodge = '{{$accommodation->first()->lodge}}';
				accconnum = '{{$accommodation->first()->contactno}}';
				accadd = '{{$accommodation->first()->address}}';
				"
				>
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
							
							<div class="form-floating mt-1">
								<input class= "form-control" type = "text" id = "accadd" name = "address" x-model = "address" :value="accadd" style="min-width: 100%;" />
								<label for="accadd" style="margin-left: 1rem;">Address</label>
							</div>
							
						</div>
						
						<div class="row mt-1">
							<div class="form-floating mt-1">
								<textarea class = "form-control" id = "accdesc" name = "description" rows="5" x-model = "description" :value="accdesc" style="min-width: 100%; "></textarea>
								<label for="accdesc" style="margin-left: 1rem;">Description</label>
							</div>
						</div>
						
					</div>
					<div class = "col-6"  x-init="$dispatch('loadacc');">
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
		
		@else 
		<p style="color: black; text-align: center; font-size: 1rem;">No Resort? Please Contact Mauban Tourism at +63-951-582-2030</p>
		
		@endif
	</div>
</div>			
</form>