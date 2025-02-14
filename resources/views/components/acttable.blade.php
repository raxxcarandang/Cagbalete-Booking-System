
<h5 class="mt-2 mb-0 fw-bold">
	&nbsp;Actions
</h5>

<div class="table-responsive w-auto mt-2" style="width:100%; height:100%; margin-left: 0.25rem;"

@updateaload.window = "

loadactupdates = allactivities.slice((acpage-1) * aperpage).slice(0, aperpage);
apages = allactivities.length;
atpages = Math.ceil(apages / aperpage);

"
x-init="$nextTick( () => { $dispatch('updateaload') } ); $nextTick(() => {
setTimeout(() => {
$dispatch('updateaload');
}, 5000);
});"
>
	
	<table class="table table-borderless text-center" id="table">
		<thead id='thead'>
			<tr>
				<th scope="col">TIME</th>
				<th scope="col">ACTION</th>
				<th scope="col">PAST REMARK</th>
			</tr>
		</thead>
		<tbody>
			<template x-for="act in loadactupdates" :key="act.id">
				<tr class="hover:bg-gray-200 text-gray-900 text-xs">
					
					
					
					<td id = "uptd">
						{{---------------------------------Start Time Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}  
						
						
						<span id="bookid" x-data="{ createdAt: act.created_at }">
							<span x-text="new Date(createdAt).toLocaleString()"></span>
						</span>
						
					</span>
					
					
					
					{{---------------------------------End Time Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
				</td>
				
				
				
				<td id = "msgtd">
					{{---------------------------------Start Msg Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}  
					<span class = "dbinfo" x-text="act.updatemsg"></span>
					{{---------------------------------Start Msg Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
				</td>
				
				<td id = "remtd">
					{{---------------------------------Start Rem Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}  
					<span class = "dbinfo" x-text="act.remark"></span>
					{{---------------------------------Start Rem Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
				</td>
				
			</tr>
		</template>
		<tr x-show="activities.length < 1">
			<td colspan="100%" class="text-center py-3 text-gray-900 text-sm">No activity found.</td>
		</tr>
	</tbody>
</table>
<div class="flex mt-2 justify-center" x-show = "atpages > 0">
	<div id = "pgbtn" class="border px-2 cursor-pointer"
	@click = "acpage = 1;
	$dispatch('updateaload');
	"
	>
		<span class="text-gray-700">First</span>
	</div>
	<div id = "pgbtn" class="border px-2 cursor-pointer" 
	@click = "if (acpage > 1) {
	acpage--;
	$dispatch('updateaload');
	}"
	>
		<span class="text-gray-700"><</span>
		</div>
		<div class="flex content-end">
			&nbsp;Page&nbsp;<span class="text-gray-700" x-text="acpage"></span>&nbsp;of&nbsp;<span class="text-gray-700" x-text="atpages"></span>&nbsp;
		</div>
		<div id = "pgbtn" class="border px-2 cursor-pointer" 
		@click = "if (acpage < atpages) {
		acpage++;
		$dispatch('updateaload');
		}
		"
		>
			<span class="text-gray-700">></span>
		</div>
		<div id = "pgbtn" class="border px-2 cursor-pointer"
		@click = "acpage = atpages;
		$dispatch('updateaload');
		"
		x-init="$nextTick( () => { $dispatch('updateaload') } )"
		>
			<span class="text-gray-700">Last</span>
		</div>
		</div>
	</div>
	
	
	
	
	
	
