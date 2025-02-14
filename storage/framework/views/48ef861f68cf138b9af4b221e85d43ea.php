<?php
use App\Models\Accommodation;

	$accommodations = collect();
			$allaccommodations = Accommodation::chunk(1000, function($getaccommodations) use ($accommodations) {
				foreach($getaccommodations as $getaccommodation) {
					$accommodations->push($getaccommodation);
				}
			});
			
?>


    <span  id="hidden-dates" style="display: none;" x-text="'Booking Demographic (' + datastart + ' - ' + dataend + ')'"></span>
	
    <div class="row">
        <div class="col">
            <span id="bookingtitle">Demographic</span>
				<select 
				  id="demofilteracc"
				x-model="demofilter"
				x-init="demofilter = 'all';"
				>
			    <option value = "all" selected> All Accommodations</option>
						<?php $__currentLoopData = $accommodations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $accommodation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if($accommodation->name == 'Other') {} else {
							echo '<option value = "'. $accommodation->name .'">'. $accommodation->name .'</option>';
						}
						?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<option value = "other" selected> Other</option>
			</select>
			
			<input 
			
			type="date" 
			x-model="datastart" 
			@change="$dispatch('refresh');" 
			x-init="datastart = new Date(new Date().getFullYear(), new Date().getMonth(), 1).toISOString().split('T')[0];" 
			id="datastart" />
		
		
			<input type="date" 
			
			x-model="dataend" 
			@change="$dispatch('refresh');" 
			x-init="dataend = new Date(new Date().getFullYear(), new Date().getMonth() + 1, 0).toISOString().split('T')[0];" 
			id="dataend" />
			
			<button type = 'button' 
			name = 'printbtn'  
			class = "btn sortbtn"
			id = "btnprint"
			title = 'PRINT DATA' 
			>
				PRINT
			</button>
		
			
			<button type = 'button' 
			name = 'exportbtn'  
			class = "btn sortbtn"
			id = "btnexp"
			title = 'EXPORT DATA' 
			
			>
				EXPORT
			</button>
			
		    </div>
		<div>
	
	</div>

    <div class="table-responsive w-full" id="stattablebig" >
        <div class="flex justify-between items-center">
            <table class="table table-bordered text-center" id="tablestat">
                <thead id="thead">
                    <tr>
                        <th scope="col">RESORT</th>
						<th scope="col">ARRIVED</th>
						<th scope="col">PRIORITY</th>
						<th scope="col">FOREIGNER</th>
						<th scope="col">MAUBANIN</th>
						<th scope="col">NON-MAUBANIN</th>
						<th scope="col">0-7 Y.O.</th>
						<th scope="col">13-50 Y.O.</th>
						<th scope="col">60+ Y.O.</th>
						<th scope="col">MALE</th>
						<th scope="col">FEMALE</th>
						<th scope="col">TOTAL</th>
						<th scope="col">ETAF</th>	
					</tr>
				</thead>
				<tbody>
                    
					<template x-for="(accommodation, name) in totaldemo" :key="name">
						<tr class="hover:bg-gray-200" x-show="demofilter == 'all' || demofilter == name">
							<td><span x-text="getAcronym(name)" :title="name"></span></td>
							<td><span x-text="accommodation.bcount"></span></td>
							<td><span x-text="accommodation.specialneeds"></span></td>
							<td><span x-text="accommodation.foreigners"></span></td>
							<td><span x-text="accommodation.maubanins"></span></td>
							<td><span x-text="accommodation.filipinos"></span></td>
							<td><span x-text="accommodation.zeroto7yold"></span></td>
							<td><span x-text="accommodation.thirteento50yold"></span></td>
							<td><span x-text="accommodation.above60yold"></span></td>
							<td><span x-text="accommodation.totalmale"></span></td>
							<td><span x-text="accommodation.totalfemale"></span></td>
							<td><span x-text="accommodation.totalvisitors"></span></td>
							<td><span x-show="accommodation.namount > 0">Php </span><span x-text="accommodation.namount"></span></td>
						</tr>
					</template>
					
					
					<tr class="hover:bg-gray-200" x-show="demofilter == 'all' || demofilter == 'other' ">
						<td>Other</td>
						<td><span x-text="notdemo.bcount"></span></td>
						<td><span x-text="notdemo.specialneeds"></span></td>
						<td><span x-text="notdemo.foreigners"></span></td>
						<td><span x-text="notdemo.maubanins"></span></td>
						<td><span x-text="notdemo.filipinos"></span></td>
						<td><span x-text="notdemo.zeroto7yold"></span></td>
						<td><span x-text="notdemo.thirteento50yold"></span></td>
						<td><span x-text="notdemo.above60yold"></span></td>
						<td><span x-text="notdemo.totalmale"></span></td>
						<td><span x-text="notdemo.totalfemale"></span></td>
						<td><span x-text="notdemo.totalvisitors"></span></td>
						<td><span x-show="notdemo.namount > 0">Php </span><span x-text="notdemo.namount"></span></td>
					</tr>
					
					<tr class="hover:bg-gray-200" style="border-bottom: 1px solid rgba(127, 140, 141, .25);" -show="demofilter == 'all'">
                        <td>ALL (<span x-text="accommodations.length"></span>)</td>
						<td>
							<span x-text="isNaN(sums.bcount + notdemo.bcount) ? '' : sums.bcount + notdemo.bcount"></span>
						</td>
						<td>
							<span x-text="isNaN(sums.specialneeds + notdemo.specialneeds) ? '' : sums.specialneeds + notdemo.specialneeds"></span>
						</td>
						<td>
							<span x-text="isNaN(sums.foreigners + notdemo.foreigners) ? '' : sums.foreigners + notdemo.foreigners"></span>
						</td>
						<td>
							<span x-text="isNaN(sums.maubanins + notdemo.maubanins) ? '' : sums.maubanins + notdemo.maubanins"></span>
						</td>
						<td>
							<span x-text="isNaN(sums.filipinos + notdemo.filipinos) ? '' : sums.filipinos + notdemo.filipinos"></span>
						</td>
						<td>
							<span x-text="isNaN(sums.zeroto7yold + notdemo.zeroto7yold) ? '' : sums.zeroto7yold + notdemo.zeroto7yold"></span>
						</td>
						<td>
							<span x-text="isNaN(sums.thirteento50yold + notdemo.thirteento50yold) ? '' : sums.thirteento50yold + notdemo.thirteento50yold"></span>
						</td>
						<td>
							<span x-text="isNaN(sums.above60yold + notdemo.above60yold) ? '' : sums.above60yold + notdemo.above60yold"></span>
						</td>
						<td>
							<span x-text="isNaN(sums.totalmale + notdemo.totalmale) ? '' : sums.totalmale + notdemo.totalmale"></span>
						</td>
						<td>
							<span x-text="isNaN(sums.totalfemale + notdemo.totalfemale) ? '' : sums.totalfemale + notdemo.totalfemale"></span>
						</td>
						<td>
							<span x-text="isNaN(sums.totalvisitors + notdemo.totalvisitors) ? '' : sums.totalvisitors + notdemo.totalvisitors"></span>
						</td>
						<td>
							<span x-show="sums.namount > 0 || notdemo.namount > 0">Php </span><span x-text="isNaN(sums.namount + notdemo.namount) ? '' : sums.namount + notdemo.namount"></span>
						</td>
						
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php /**PATH /home/u101594241/domains/maubantourism.com/public_html/resources/views/components/demoreports.blade.php ENDPATH**/ ?>