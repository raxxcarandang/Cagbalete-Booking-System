
<h5 class="mt-2 mb-0 fw-bold">
	&emsp;Status
</h5>
<div x-show = "currentBookings.length < 1">
<br>
	
	<p style="color: black; text-align: center; font-size: 1rem;">No booking to view status for. Make a new <a href="{{url('booking')}}">booking?</a></p>
</div>
<div class="table-responsive w-auto mt-2" style="width:100%; height:100%; margin-left: 1rem;"
		x-show = "currentBookings.length > 0">
	
	<table class="table table-borderless text-center" id="tablests">
		<thead id='thead'>
			<tr>
				<th scope="col">STATUS</th>
				<th scope="col">REMARK</th>
			</tr>
		</thead>
		<tbody>
			<template x-for="cbooking in currentBookings" :key="cbooking.id">
				<tr class="hover:bg-gray-200 text-gray-900 text-xs" 
				
				x-data = "{  
				
				stslight: '',
				}"
				
				@stsload.window = "
				if (cbooking.status === 'PENDING') {	
				
				
				
				} 
				else if (cbooking.status === 'APPROVED') {
				
				
				stslight = '#cefad0';
				
				} 
				else if (cbooking.status === 'DENIED') {
				
				stslight = '#FFCCCB';
				
				} 
				else if (booking.status === 'CANCELLED') {
				stslight = ' #A1D9D1';
				}" 
				:style="'background-color: ' + stslight + ';'"
				x-init="rdate = cbooking.departure;
				$nextTick(() => { $dispatch('stsload'); });
				
				"
				>
					
					<td>
						{{---------------------------------Start Status Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}  
						<span class = 'dbinfo'> <strong><span class = "dbinfo" x-text="cbooking.status"></span></strong> </span>
						{{---------------------------------End Status Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}
					</td>
					
					<td id = "remtd">
						{{---------------------------------Start Remark Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
						<span x-text="cbooking.remark"></span><span x-show="cbooking.remark == ''">N/A</span>
						{{---------------------------------End Remark Column--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}} 
					</td>
					
				</tr>
			</template>
			<tr x-show="currentBookings.length < 1">
				<td colspan="100%" class="text-center py-3 text-gray-900 text-sm">No matching records found.</td>
			</tr>
		</tbody>
	</table>
	
	
	
</div>







