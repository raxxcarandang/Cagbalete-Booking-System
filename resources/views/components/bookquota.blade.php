<div 
x-data ="{

tpending(accommodationName) {

accommodationlist = [
'Aquazul Hotel and Resort',
'Dona Choleng Camping Resort',
'Rio del Sol Beach Resort',
'Jovencio`s Resort',
'MVT Sto. Niño Beach Resort',
'Nilandingan Cove Resort',
'Villa Cleofas (Cagbalete Island Camping Resort)',
'Villa Escaparde Camping and Beach Resort',
'Villa Noe Beach Resort',
'Villa Pilarosa Beach Resort',
'Tita Pinay Beach Resort',
'Aguho Playa Beach Resort',
'Tent Place',
'Orlan Beach Resort'
];

if (accommodationlist.includes(accommodationName)) {
const pendingVisitors = pendings.filter(item => item.accommodation === accommodationName);
return pendingVisitors.length;
} else {

const pendingVisitors = pendings.filter(item => !accommodationlist.includes(item.accommodation));
return pendingVisitors.length;
}
},

tarrived(accommodationName) {

accommodationlist = [
'Aquazul Hotel and Resort',
'Dona Choleng Camping Resort',
'Rio del Sol Beach Resort',
'Jovencio`s Resort',
'MVT Sto. Niño Beach Resort',
'Nilandingan Cove Resort',
'Villa Cleofas (Cagbalete Island Camping Resort)',
'Villa Escaparde Camping and Beach Resort',
'Villa Noe Beach Resort',
'Villa Pilarosa Beach Resort',
'Tita Pinay Beach Resort',
'Aguho Playa Beach Resort',
'Tent Place',
'Orlan Beach Resort'
];

if (accommodationlist.includes(accommodationName)) {
const arrivedVisitors = arrivals.filter(item => item.accommodation === accommodationName);
return arrivedVisitors.length;
} else {

const arrivedVisitors = arrivals.filter(item => !accommodationlist.includes(item.accommodation));
return arrivedVisitors.length;
}
},


totalCapacity() {
return Object.values(this.accommodations).reduce((total, accommodation) => total + (accommodation.capacity === 0 ? 0 : accommodation.capacity), 0);
},

getTotalVisitors(accommodation) {
const totalVisitors = arrivals
.filter(a => a.accommodation === accommodation)  
.reduce((sum, arrival) => sum + arrival.totalvisitors, 0); 

return totalVisitors; 
},


}"

>
    <div class="row">
        <div class="col-12">
            <span id="bookingtitle">Arrivals</span>
		</div>
	</div>
    <div class="row">
        <div class="col-12">
            <input type="date" x-model="statsort" @change="$dispatch('refresh');" x-init="statsort = new Date().toISOString().split('T')[0];" id="statfilter" />
		</div>
	</div>
    <div class="table-responsive w-auto" id="stattable" >
        <div class="flex justify-between items-center">
            <table class="table table-bordered text-center" id="tablestat2">
                <thead id="thead">
                    <tr>
                        <th scope="col">RESORT</th>
                        <th scope="col">CAPACITY</th>
                        <th scope="col">ARRIVED</th>
						<th scope="col">PRE-ARRIVAL</th>
						
					</tr>
				</thead>
                <tbody>
                    <tr style="border-bottom: 1px solid rgba(127, 140, 141, .25);">
                        <td>ALL (<span x-text="accommodations.length"></span>)</td>
                        <td>
							
							<span x-text="tarrivals"></span> /
							<span x-text="totalCapacity()"></span>
						</td>
						<td>
                            <span x-text="arrivals.length"></span>
						</td>
                        <td>
                            <span x-text="pendings.length"></span>
						</td>
						
						
					</tr>
					<template x-for="(accommodation, index) in accommodations" :key="accommodation.id || index">
						
						
                        <tr class="hover:bg-gray-200 text-gray-900 text-xs">
                            <td><span x-text="getAcronym(accommodation.name)" :title="accommodation.name"></span></td>
                            <td>
								
								<span x-text="getTotalVisitors(accommodation.name)"></span> /
								<span x-text="accommodation.capacity == 0 ? 'N/A' : accommodation.capacity"></span>
								
							</td>
							<td><span x-text="tarrived(accommodation.name)"></span></td>
                            <td><span x-text="tpending(accommodation.name)"></span></td>
						</span></td>
						
				</tr>
			</template>
			<tr x-show="accommodations.length == 0">
				<td colspan="100%" class="text-center py-3 text-gray-900 text-sm">No matching records found.</td>
			</tr>
		</tbody>
	</table>
</div>
</div>
</div>
