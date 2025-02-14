
<div class = "row mt-1">
	<div class = "col-12 dashrow2" 
	x-data = "{
	gup: false,
	gdown: false,
	tyup: false,
	tydown: false,
	acup: false,
	acdown: false,
	paup: false,
	padown: false,
	bup: false,
	bdown: false,
	tmup: false,
	tmdown: false,
	puup: false,
	pudown: false,
	itup: false,
	itdown: false,
	}"
	x-init = "
	users = {};
	accommodations = {};
	image = {};
	images = {};
	sorter = 17;
	">
		<h5 class="mt-2 mb-0 fw-bold">
			&nbsp;Image
		</h5>
		<div class="table-responsive w-auto" style="width:100%; height:100%; margin-left: 1rem; margin-right: 1rem;" 
		
		
		x-init="
		$watch('searchint', value => imgload());
		$watch('cpage', value => imgload());
		$watch('perpage', value => imgload());
		"
		>
			
			<div class="flex justify-between items-center">
				<div class="flex space-x-2 items-center">
					<select class = "form-select" x-model="perpage" @change="cpage = 1" id = "rowview">
						<option value="5">5 Rows</option>
						<option value="10">10 Rows</option>
						<option value="25">25 Rows</option>
						<option value="50">50 Rows</option>
						<option value="100">100 Rows</option>
					</select>
				</div>
				
				<div>
					&emsp;
				</div>
				<div>
					&emsp;
				</div>
				<div>
					&emsp;
				</div>
				<div>
					&emsp;
				</div>
				<div>
					&emsp;
				</div>
				<div>
					&emsp;
				</div>
				<div>
					&emsp;
				</div>
				<div>
					&emsp;
				</div>
				<div>
					&emsp;
				</div>
				
				<div>
					<button type = 'button' 
					name = 'createbtn'  
					class = "btn sortbtn"
					id = "btncrt"
					title = 'Add New Image' 
					data-bs-toggle="modal"
					data-bs-target="#imgupm" 
					@click="document.getElementById('idacc').value = accnum; imginc = accimginc; document.getElementById('imguploadprev').src = '/images/symbol/other.png';"
					:disabled = "accnum == 0"
					>
						<i class='ion-md-add-circle-outline'></i>&nbsp;ADD NEW
					</button>
				</div>
				
			</div>
			<table class="table table-bordered table=striped text-center" id="table">
				<thead id='thead'>
					<tr>
						<th scope="col" >
                        IMAGE
                    </th>
                    <th scope="col" >
                        NAME
                    </th>
                    <th scope="col" >
                        DATE UPLOADED
                    </th>
                    <th scope="col">ACTION</th>

						
					</tr>
				</thead>
				<tbody>
					<template x-for="image in filteredimages" :key="image.id">
						<tr class="hover:bg-gray-200 text-gray-900 text-xs">
						
								<td id = "imgtd" 
								>
									  
									<button
									data-bs-toggle="modal"
									data-bs-target="#previmg" 
									id = "previewbtn"
									@click = "previewimgname = image.name"
									>
										<img :src="'/images/resort/supplier'+ accnum +  '/' + image.name" class ="imgpreview" :id=" 'img' + image.id" />
									</button>
									 
								</td>
								
								<td id = "nametd">
									 
									<span id = "imgid"><span x-text="image.name"></span>
										 
									</td>
									<td id = "datetd">
										  
										<span class = "dbinfo" x-text="image.uploaddate"></span>
										 
									</td>
									
									<td id = "acttd">
										
										
										<table class = "table table-borderless text-center" id = "tableact">
											<tr>
												
											<td>
												<button type="button" 
												class="btn actbtn" 
												title="DELETE" 
												data-bs-toggle="modal"
												data-bs-target="#actm" 
												style="color: red;"
												@click="imgid = image.id; imgname = image.name;">
													
													<i class="ion-ios-trash"></i>
												</button>
												
											</td>
											<td>
												<button type = 'button' 
												name = 'updbtn' 
												class = 'btn actbtn' 
												id = "btnupd"
												title = 'UPDATE' 
												data-bs-toggle="modal"
												data-bs-target="#updm" 
												style='color: green;'
												@click="document.getElementById('repimgprev').src='/images/resort/supplier' + accnum + '/' + image.name; imgid = image.id; imgname = image.name; idseq = image.sequence;"
												>
													<i class='ion-md-sync'></i>
												</button>
											</td>
											<button id = "loadaccimg" style="opacity: 0;" @click="imgload();">Reload</button>
										</tr>
									</table>
									 
									</td>					
								</tr>
							</template>
							<tr x-show="cpage > tpages">
								<td colspan="9" class="text-center py-3 text-gray-900 text-sm">No matching records found.</td>
							</tr>
						</tbody>
					</table>
					<div class="flex mt-2 justify-center">
						<div id = "pgbtn" class="border px-2 cursor-pointer"
						@click = "cpage = 1;
						imgload();
						"
						>
							<span class="text-gray-700">First</span>
						</div>
						<div id = "pgbtn" class="border px-2 cursor-pointer" 
						@click = "if (cpage > 1) {
						cpage--;
						imgload();
						}"
						>
							<span class="text-gray-700"><</span>
							</div>
							<div class="flex content-end">
								&nbsp;Page&nbsp;<input type="number" class="form-control" x-model="cpage" style="max-height: 1.47rem; max-width: 5.7rem; font-size: 0.9rem; text-align: center;" />&nbsp;of&nbsp;<span class="text-gray-700" x-text="tpages"></span>&nbsp;
							</div>
							<div id = "pgbtn" class="border px-2 cursor-pointer" 
							@click = "if (cpage < tpages) {
							cpage++;
							imgload();
							}
							"
							>
								<span class="text-gray-700">></span>
							</div>
							<div id = "pgbtn" class="border px-2 cursor-pointer"
							@click = "cpage = tpages;
							imgload();
							"
							>
								<span class="text-gray-700">Last</span>
							</div>
							</div>
							
						</div>
					</div>
				</div>
				
				
				
				
				
						<?php /**PATH /home/u101594241/domains/maubantourism.com/public_html/resources/views/components/accimgtable.blade.php ENDPATH**/ ?>