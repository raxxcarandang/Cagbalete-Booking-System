
<h5 class="mt-2 mb-0 fw-bold">
	&nbsp;Notifications
</h5>

<div class="table-responsive w-auto mt-2" style="width:100%; height:100%; margin-left: 0.25rem;"

@updateload.window = "

loadnotupdates = notifications.slice((cpage-1) * perpage).slice(0, perpage);
pages = notifications.length;
tpages = Math.ceil(pages / perpage);

"
x-init="$nextTick( () => { $dispatch('updateload') } ); $nextTick(() => {
setTimeout(() => {
$dispatch('updateload');
}, 5000);
});"
>
	
	<table class="table table-borderless text-center" id="table">
		<thead id='thead'>
			<tr>
				<th scope="col">TIME</th>
				<th scope="col">NOTIFICATION</th>
				<th scope="col">PAST REMARK</th>
			</tr>
		</thead>
		<tbody>
			<template x-for="not in loadnotupdates" :key="not.id">
				<tr class="hover:bg-gray-200 text-gray-900 text-xs">
					
					
					
					<td id = "uptd">
						{{---------------------------------Start Time Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}  
						
						
						<span id="bookid" x-data="{ createdAt: not.created_at }">
							<span x-text="new Date(createdAt).toLocaleString()"></span>
						</span>
						
					</span>
					
					
					
					{{---------------------------------End Time Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
				</td>
				
				
				
				<td id = "msgtd">
					{{---------------------------------Start Msg Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}  
					<span class = "dbinfo" x-text="not.updatemsg"></span>
					{{---------------------------------Start Msg Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
				</td>
				
				<td id = "remtd">
					{{---------------------------------Start Rem Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}  
					<span class = "dbinfo" x-text="not.remark"></span>
					{{---------------------------------Start Rem Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
				</td>
				
			</tr>
		</template>
		<tr x-show="notifications.length < 1">
			<td colspan="100%" class="text-center py-3 text-gray-900 text-sm">No notification found.</td>
		</tr>
	</tbody>
</table>
<div class="flex mt-2 justify-center" x-show = "tpages > 0">
	<div id = "pgbtn" class="border px-2 cursor-pointer"
	@click = "cpage = 1;
	$dispatch('updateload');
	"
	>
		<span class="text-gray-700">First</span>
	</div>
	<div id = "pgbtn" class="border px-2 cursor-pointer" 
	@click = "if (cpage > 1) {
	cpage--;
	$dispatch('updateload');
	}"
	>
		<span class="text-gray-700"><</span>
		</div>
		<div class="flex content-end">
			&nbsp;Page&nbsp;<span class="text-gray-700" x-text="cpage"></span>&nbsp;of&nbsp;<span class="text-gray-700" x-text="tpages"></span>&nbsp;
		</div>
		<div id = "pgbtn" class="border px-2 cursor-pointer" 
		@click = "if (cpage < tpages) {
		cpage++;
		$dispatch('updateload');
		}
		"
		>
			<span class="text-gray-700">></span>
		</div>
		<div id = "pgbtn" class="border px-2 cursor-pointer"
		@click = "cpage = tpages;
		$dispatch('updateload');
		"
		x-init="$nextTick( () => { $dispatch('updateload') } )"
		>
			<span class="text-gray-700">Last</span>
		</div>
		</div>
	</div>
	
	
	
	
	
	
