<div class = "row">
	<div class = "col-12 dashrow" 
	x-data = "{
		
	}"
	x-init = "
	users = {};
	">
		
		<div class="table-responsive w-auto" style="width:100%; height:100%; margin-left: 1rem; margin-right: 1rem;">
			
			<div class="flex justify-between items-center">
				
				<div class="flex space-x-2 items-center">
				
					<select class = "form-select" x-model="perpage" @change="
         $nextTick(() => {
           cpage = 1;
           fetchUsers();
         })
      " id = "rowview">
						<option value="5">5 Rows</option>
						<option value="10">10 Rows</option>
						<option value="25">25 Rows</option>
						<option value="50">50 Rows</option>
						<option value="100">100 Rows</option>
					</select>
					<input x-model="searchTerm"   @input="
    $nextTick(() => {
      cpage = 1;
      fetchUsers();
    })
  "  type="text" class="form-control border rounded focus:outline-none" id = "usersearch" placeholder="Search...">
				
				<button 
				title = 'Advanced View'
				class = "sortbtn"
				@click="
				advanced = !advanced;
				"
				>
					<i class = "ion-ios-settings" :style="{ color: advanced ? 'red' : 'green', fontSize: '1.25rem', marginLeft: '1rem' }"></i>
				</button>
				
				</div>
				
				<div>
					<select
					id="stsselect"
					title = 'Sort By Status'
					class = "form-select sortselector"
					x-model="stssort"
					x-show="advanced"
				@change="
         $nextTick(() => {
           cpage = 1;
           fetchUsers();
         })
      ">
						<option value="4" selected >All Status</option>
						<option value="1">Unverified</option>
						<option value="2">Verified</option>
						<option value="3">Suspended</option>
					</select>
				</div>
				
				<div>
					<select
					id="stsselect"
					title = 'Sort By User Type'
					class = "form-select sortselector"
					x-model="typesort"
					x-show="advanced"
					@change="
         $nextTick(() => {
           cpage = 1;
           fetchUsers();
         })
      ">
						<option value="3" selected >All Types</option>
						<option value="1">User</option>
						<option value="797">Admin</option>
						
					</select>
				</div>
				
				<div>
					<select 
					id="contselect"
					title = 'Sort By Country'
					class = "form-select sortselector"
					x-model="contsort"
					x-show="advanced"
					@change="
         $nextTick(() => {
           cpage = 1;
           fetchUsers();
         })
      ">
						<option value="4" selected >All Country</option>
						<option value="1">PH</option>
						<option value="2">MAUBAN</option>
						<option value="3">INT'L</option>
					</select>
				</div>
				
				
				<div>
					<button 
					title = 'Reset Table'
					class = "sortbtn"
					@click="
					stssort = 3;
					contsort = 4;
					typesort = 4;
					sorter = 17;
					cpage = 1;
					searchTerm = '';
					fetchUsers();
					"
					>
						<i class = "ion-ios-sync" style="color:green; font-size: 1.25rem;"></i>
					</button>
					
				</div>
			</div>
			<table class="table table-borderless text-center" id="table">
				<thead id="thead">
					<tr 
					x-data="{
					
					
					handleSort(column) {
					if (this.sorter === 7 || this.sorter < column[0] || this.sorter > column[1]) {
					this.sorter = column[1];
					} else if (this.sorter === column[1]) {
					this.sorter = column[0];
					} else if (this.sorter === column[0]) {
					this.sorter = 7; 
					}
					fetchUsers();
					},
					
					
					setSortState(column) {
					if (this.sorter === column[0]) {
					return { up: true, down: false };
					} else if (this.sorter === column[1]) {
					return { up: false, down: true };
					}
					return { up: false, down: false };
					
					}
					}"
					>
						
						<th scope="col" class="cursor-pointer" @click="handleSort([1, 2]);">
							GUEST
							<template x-if="setSortState([1, 2]).up">
								<i class="ion-ios-arrow-up"></i>
							</template>
							<template x-if="setSortState([1, 2]).down">
								<i class="ion-ios-arrow-down"></i>
							</template>
						</th>
						<th scope="col" class="cursor-pointer" @click="handleSort([3, 4]);">
							STATUS
							<template x-if="setSortState([3, 4]).up">
								<i class="ion-ios-arrow-up"></i>
							</template>
							<template x-if="setSortState([3, 4]).down">
								<i class="ion-ios-arrow-down"></i>
							</template>
						</th>
						<th scope="col" class="cursor-pointer" @click="handleSort([5, 6]);">
							REGISTERED ON
							<template x-if="setSortState([5, 6]).up">
								<i class="ion-ios-arrow-up"></i>
							</template>
							<template x-if="setSortState([5, 6]).down">
								<i class="ion-ios-arrow-down"></i>
							</template>
						</th>
						
						
						<th scope="col">ACTION</th>
					</tr>
				</thead>
				<tbody>
					<template x-for="user in filteredUsers" :key="user.id">
						
						<tr class="text-gray-900 text-xs" id="usertr" >
							<td id="usertd"
							x-data="{ stsg: '', stscolor: '', stsclass: '',  gender: '', gcolor: '', country: '', today: new Date(), birthdate: '', age: '', m: '', gclass: '',
							
			
					 getage(bdate) {
                            const birthdate = new Date(bdate);
                            let calculatedAge = this.today.getFullYear() - birthdate.getFullYear();
                            const m = this.today.getMonth() - birthdate.getMonth();
                            if (m < 0 || (m === 0 && this.today.getDate() < birthdate.getDate())) {
                                calculatedAge--;
                            }
                            this.age = calculatedAge;
                            return calculatedAge;
                        },
							
							}"
						
							>
								<span id="bookid">User # <span x-text="user.id"></span></span>
								<br>
								<div class="separator">
									<span class="dbinfosts" x-text="user.role_id === 1 ?  'USER' : 'ADMIN'" x-bind:style="'color: ' + stscolor + ';'"></span>
								</div>
								<span>
									<span class="dbinfo" x-text="user.name || 'No name available'"></span>
									<span class="dbinfo" x-text="user.mname || 'No M.I. available'"></span>
									<span class="dbinfo" x-text="user.lname || 'No surname available'"></span>, 
									<span class="dbinfo" x-text="getage(user.bdate) || 'No age available'"></span>, 
									<span class="dbinfo" x-text="user.gender === 'Male' ? 'M' : 'F' "></span>
								</span>
								
								<span id="emailspan"  x-show="advanced">
								<br>	<span class="dbinfo" x-text="user.email || 'No email available'"></span>
								</span>
								
								<i class="ion-md-person" id="useric"></i>
								<span x-show="advanced">
									<br><span class="dbinfo" x-text="user.contactno || 'No contact available'" ></span>
								</span>
								<br>
								<div class="separator" x-show="advanced">
									<span class="dbinfosts" x-text="user.role_id === 1 ?  'USER' : 'ADMIN'" x-bind:style="'color: ' + stscolor + ';'"></span>
								</div> 
								<span x-show="advanced">
									<table class="table table-borderless text-center" id="countrytable">
										<tr>
											<td style="width: 33%;">
												<span class="dbinfo">
													 <img 
                                                        x-bind:src="'/images/nation/' + (user?.country === 'INTERNATIONAL' ? 'INTL' : (user?.country === 'PHILIPPINES' ? 'PH1' : 'MN1')) + '.webp'" 
                                                        :alt="'country'" 
                                                        style="width: 2rem; height: 1.25rem; display: inline-flex; color: black;" 
                                                    />
												</span>
											</td>
											<td>
												<span class="dbinfo" x-text="user.region || 'No region available'"></span>
											</td>
										</tr>
									</table>
								</span>
							</td>
							<td id="ststd">
								<span class="dbinfo" x-text="user.status"></span>
							</td>
							<td id="crtd" x-data="{
							formatdate (date) {
							return new Date(date).toLocaleString('en-US', {
							year: 'numeric',
							month: 'numeric',
							day: 'numeric',
							hour: 'numeric',
							minute: 'numeric',
							second: 'numeric',
							hour12: true,
							});
							
							}
							}">
								<span class="dbinfo" x-text="formatdate(user.created_at)"></span>
							</td>
							
							<td id="uacttd">
								
								<?php echo csrf_field(); ?> 
								<table class="table table-borderless text-center" id="tableact">
									<tr>
										<td colspan="2" x-show="advanced">
											<button type="submit" id="accountbtn" class="btn actbtn" title="CHANGE ACCOUNT TYPE" data-bs-toggle="modal"
											data-bs-target="#typem" style="color: gray;"
											@click="$dispatch('upuser'); uid = user.id; uname = user.lname;"
											>
												<i class="ion-ios-person-add"></i>
											</button>
										</td>
									
										
										<td>
											<form action="<?php echo e(route('userstatus')); ?>" method="POST" id="bookstatus" x-data="statusform()" @submit.prevent="submitData">
												<button type="submit" name="sts" id="pndbtn" class="btn actbtn" title="SET ACTIVE"
												data-toggle="tooltip" style="color: green;" @click="ustatus = 'Verified'; uid = user.id; uname = user.lname;">
													<i class="ion-ios-checkmark-circle-outline"></i>
												</button>
											</form>
										</td>
										<td>
											<form action="<?php echo e(route('userstatus')); ?>" method="POST" id="bookstatus" x-data="statusform()" @submit.prevent="submitData">
												<button type="submit" name="sts" id="dnybtn" class="btn actbtn" title="SUSPEND"
												data-toggle="tooltip" style="color: red;" @click="ustatus = 'Suspended'; uid = user.id; uname = user.lname;">
													<i class="ion-md-exit"></i>
												</button>
											</form>
										</td>
										
									
										
										<td x-show="advanced">
											<button type="button" name="updbtn" class="btn actbtn" id="btnupd" title="UPDATE" data-bs-toggle="modal"
											data-bs-target="#updm" style="color: black;" @click="uid = user.id; uname = user.lname; $dispatch('upuser');">
												<i class="icon-pencil"></i>
											</button>
										</td>
										<td x-show="advanced">
											<button type="button" class="btn actbtn" title="DELETE" data-bs-toggle="modal"
											data-bs-target="#delm" style="color: orange;" @click="uid = user.id; uname = user.lname;">
												<i class="ion-ios-trash"></i>
											</button>
										</td>
									</tr>
									
									
								</table>
								
							</td>
						</tr>
					</template>
					<tr x-show="cpage > totalPages">
						<td colspan="9" class="text-center py-3 text-gray-900 text-sm">No matching records found.</td>
					</tr>
				</tbody>
			</table>
			
			
			<div class="flex mt-2 justify-center">
				<div class="border px-2 cursor-pointer"
				@click = "cpage = 1;
				fetchUsers();
				"
				>
				<span class="text-gray-700">First</span>
				</div>
			<div class="border px-2 cursor-pointer" 
			@click = "if (cpage > 1) {
			cpage--;
			fetchUsers();
			}"
			>
				<span class="text-gray-700"><</span>
				</div>
				<div class="flex content-end">
					&nbsp;Page&nbsp;<input type="number" class="form-control" x-model="cpage" style="max-height: 1.47rem; max-width: 5.7rem; font-size: 0.9rem; text-align: center;" />&nbsp;of&nbsp;<span class="text-gray-700" x-text="totalPages"></span>&nbsp;
				</div>
				<div class="border px-2 cursor-pointer" 
				@click = "if (cpage < totalPages) {
				cpage++;
				fetchUsers();
				}
				"
				>
					<span class="text-gray-700">></span>
				</div>
				<div class="border px-2 cursor-pointer"
				@click = "cpage = totalPages;
				fetchUsers();
				"
				>
					<span class="text-gray-700">Last</span>
				</div>
				</div>
				
			</div>
			</div>
		</div>
		
		
		
		
		
		<?php /**PATH /home/u101594241/domains/maubantourism.com/public_html/resources/views/components/usertablefull.blade.php ENDPATH**/ ?>