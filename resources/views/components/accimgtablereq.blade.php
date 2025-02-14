
<div class = "row mt-1">
	<div class = "col-12 dashrow" 
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
	images = {{$images}};
	sorter = 17;
	">
		<h5 class="mt-1 mb-0 fw-bold">
			&nbsp;Image
		</h5>
		<div class="table-responsive w-auto" style="width:100%; height:100%; margin-left: 1rem;" 
		@accimgload.window="
		if(accnum == 0) {} 
		
		else {
		sortedimages = images.filter(image => image.accid.toString().toLowerCase().includes(accnum))
		if (searchint == '') {
		filteredimages = sortedimages.slice((cpage-1) * perpage).slice(0, perpage);
		pages = sortedimages.length;
		} else {
		userbook = users.filter(user => 
		user.name.toString().toLowerCase().includes(searchint) || user.lname.toString().toLowerCase().includes(searchint) || user.gender.toString().toLowerCase().includes(searchint)
		|| user.contactno.toString().toLowerCase().includes(searchint) || user.country.toString().toLowerCase().includes(searchint) || user.region.toString().toLowerCase().includes(searchint)
		|| user.email.toString().toLowerCase().includes(searchint)
		);
		if (userbook.length > 0 ) {
		searchbook = sortedimages.filter(image => 
		image.userid.toString().toLowerCase().includes(userbook.map(userb => userb.id))
		); 
		}
		else {
		searchbook = sortedimages.filter(image => 
		image.id.toString().toLowerCase().includes(searchint) || image.accommodation.toString().toLowerCase().includes(searchint) || image.arrival.toString().toLowerCase().includes(searchint) 
		|| image.departure.toString().toLowerCase().includes(searchint) || image.foreigners.toString().toLowerCase().includes(searchint) || image.filipinos.toString().toLowerCase().includes(searchint) 
		|| image.maubanins.toString().toLowerCase().includes(searchint) || image.totalmale.toString().toLowerCase().includes(searchint) || image.totalfemale.toString().toLowerCase().includes(searchint)
		|| image.totalvisitors.toString().toLowerCase().includes(searchint) || image.specialneeds.toString().toLowerCase().includes(searchint) || image.zeroto7yold.toString().toLowerCase().includes(searchint)
		|| image.thirteento50yold.toString().toLowerCase().includes(searchint) || image.above60yold.toString().toLowerCase().includes(searchint) || image.travelmeans.toString().toLowerCase().includes(searchint)
		|| image.parking.toString().toLowerCase().includes(searchint) || image.boating.toString().toLowerCase().includes(searchint) || image.purpose.toString().toLowerCase().includes(searchint) || image.status.toString().toLowerCase().includes(searchint)
		); 
		}
		pages = searchbook.length;
		filteredimages = searchbook.slice((cpage-1) * perpage).slice(0, perpage);
		}
		tpages = Math.ceil(pages / perpage);
		if (images.length === 0) {
		showbook = false;
		hidebook = true;
		} else {
		showbook = true;
		hidebook = false;	
		}
		}
		"
		
		x-init="
		$watch('searchint', value => $dispatch('accimgload'));
		$watch('cpage', value => $dispatch('accimgload'));
		$watch('perpage', value => $dispatch('accimgload'));
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
					<input x-model="searchint" @input.change="cpage = 1" type="text" class="form-control px-2 py-1 border rounded focus:outline-none" placeholder="Search...">
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
						<th scope="col" class="cursor-pointer" @click="if(sorter == 17 || sorter > 2) { sorter = 2; } else if(sorter == 2) { sorter = 1; } else if(sorter == 1) { sorter = 17; } $dispatch('accimgload')">IMAGE <template x-if="gup"> <i class="ion-ios-arrow-up"></i> </template> <template x-if="gdown"> <i class="ion-ios-arrow-down"></i></template></th>
						<th scope="col" class="cursor-pointer" @click="if(sorter == 17 || sorter < 3 || sorter > 4 ) { sorter = 4; } else if(sorter == 4) { sorter = 3; } else if(sorter == 3) { sorter = 17; } $dispatch('accimgload')">NAME <template x-if="tyup"> <i class="ion-ios-arrow-up"></i> </template> <template x-if="tydown"> <i class="ion-ios-arrow-down"></i></template></th>
						<th scope="col" class="cursor-pointer" @click="if(sorter == 17 || sorter < 15) { sorter = 16; } else if(sorter == 16) { sorter = 15; } else if(sorter == 15) { sorter = 17; } $dispatch('accimgload')">DATE UPLOADED <template x-if="itup"> <i class="ion-ios-arrow-up"></i> </template> <template x-if="itdown"> <i class="ion-ios-arrow-down"></i></template></th>
						<th scope="col">ACTION</th>
					</tr>
				</thead>
				<tbody>
					<template x-for="image in filteredimages" :key="image.id">
						<tr class="hover:bg-gray-200 text-gray-900 text-xs">
							
							<td id = "imgtd" 
							>
								{{---------------------------------Start Image Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}  
								<button
								data-bs-toggle="modal"
								data-bs-target="#previmg" 
								id = "previewbtn"
								@click = "previewimgname = image.name"
								>
									<img :src="'/images/resort/supplier'+ accnum +  '/' + image.name" class ="imgpreview" :id=" 'img' + image.id" />
								</button>
								{{---------------------------------End Image Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
							</td>
							
							<td id = "nametd">
								{{---------------------------------Start Name Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
								<span id = "imgid"><span x-text="image.name"></span>
									{{---------------------------------End Name Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
								</td>
								<td id = "datetd">
									{{---------------------------------Start Date Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}  
									<span class = "dbinfo" x-text="image.uploaddate"></span>
									{{---------------------------------Start Date Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
								</td>
								
								<td id = "acttd">
									{{---------------------------------Start Action Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}
									
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
											<button id = "loadaccimg" style="opacity: 0;" @click="$dispatch('accimgload');">Reload</button>
										</tr>
									</table>
									{{---------------------------------End Action Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
								</td>					
							</tr>
						</template>
						<tr x-show="cpage > tpages">
							<td colspan="9" class="text-center py-3 text-gray-900 text-sm">No matching records found.</td>
						</tr>
					</tbody>
				</table>
				<div class="flex mt-2 justify-center" x-init="$dispatch('accimgload')">
					<div id = "pgbtn" class="border px-2 cursor-pointer"
					@click = "cpage = 1;
					$dispatch('accimgload');
					"
					>
						<span class="text-gray-700">First</span>
					</div>
					<div id = "pgbtn" class="border px-2 cursor-pointer" 
					@click = "if (cpage > 1) {
					cpage--;
					$dispatch('accimgload');
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
						$dispatch('accimgload');
						}
						"
						>
							<span class="text-gray-700">></span>
						</div>
						<div id = "pgbtn" class="border px-2 cursor-pointer"
						@click = "cpage = tpages;
						$dispatch('accimgload');
						"
						>
							<span class="text-gray-700">Last</span>
						</div>
						</div>
						
					</div>
				</div>
			</div>
			
			
			
			
			
				