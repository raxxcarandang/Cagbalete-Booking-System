<div 
x-data="{
bookingData: {},
chartInstance: null,
dates: [], 
dateRange: '', 
dateRangeType: 'week', 

async reloadchart() {
try {
const response = await fetch('<?php echo e(route('loadbookchart')); ?>?dateRange=' + this.dateRangeType);
const data = await response.json();
this.bookingData = data.bookingData;
this.dates = data.dates;
this.updateDateRange(); 
this.loadchart();
} catch (error) {
console.error('Error fetching booking data:', error);
}
},

updateDateRange() {
if (this.dates.length > 0) {
const startDate = this.dates[0];  
const endDate = this.dates[this.dates.length - 1];  
this.dateRange = `${startDate} - ${endDate}`; 
}
},

labels: function() {
return this.dates.map(date => date);
},

statusColors: {
COMBINED_PENDING: '#95a5a6', 
ARRIVED: '#2ecc71'
},

datasets: function() {
const combinedPending = this.dates.map(date => 
(this.bookingData['PRE-ARRIVAL'][date] || 0) + 
(this.bookingData['RESCHEDULED'][date] || 0)
);

const arrivedData = this.dates.map(date => 
this.bookingData['ARRIVED'][date] || 0
);

return [
{
label: 'Pending & Rescheduled',
data: combinedPending,
backgroundColor: this.statusColors['COMBINED_PENDING'],
borderColor: this.statusColors['COMBINED_PENDING'],
borderWidth: 1,
},
{
label: 'Arrived',
data: arrivedData,
backgroundColor: this.statusColors['ARRIVED'],
borderColor: this.statusColors['ARRIVED'],
borderWidth: 1,
}
];
},

chartConfig: function() {
return {
type: 'bar',
data: {
labels: this.labels(),  
datasets: this.datasets(),
},
options: {
responsive: true,
plugins: {
legend: {
position: 'top',
labels: {
usePointStyle: true,
},
},
title: {
display: true,
text: `${this.dateRange}`,
font: {
size: 18,
weight: 'bold',
family: 'sans-serif',
}
}
},
scales: {
x: {
beginAtZero: true,
ticks: {
maxRotation: 45,
minRotation: 30,
stepSize: 1,
},
offset: true,
},
y: {
beginAtZero: true,
title: {
display: true,
text: 'Total Bookings',
},
ticks: {
stepSize: 1,
},
},
},
elements: {
bar: {
borderRadius: 4,
},
},
layout: {
padding: {
left: 20,
right: 20,
top: 20,
bottom: 20,
},
},
},
};
},

loadchart() {
this.$nextTick(() => {
const ctx = document.getElementById('bookcast').getContext('2d');

if (this.chartInstance) {
this.chartInstance.destroy();  
}

this.chartInstance = new Chart(ctx, this.chartConfig());
});
},

toggleDateRange(type) {
this.dateRangeType = type;
this.reloadchart();
},

init() {
this.reloadchart();
}
}"
>
    <div class="row flex space-x-0 items-center">
        <div class="col-12">
            <button @click="reloadchart;" id="chartfresh">
                <i class="ion-md-refresh" id="refreshicon" style="color: black; font-size: 1.25rem;"></i>
			</button>
            <span id="bookingtitle">Status</span>
		</div>
        <div class="col-12">
            <select @change="toggleDateRange($event.target.value)" id="monthselect" class="form-select">
                <option value="week" :selected="dateRangeType === 'week'">Weekly</option>
                <option value="month" :selected="dateRangeType === 'month'">Monthly</option>
			</select>
		</div>
	</div>
    
    <canvas id="bookcast"></canvas>
</div>
<?php /**PATH /home/u101594241/domains/maubantourism.com/public_html/resources/views/components/bookingforecast.blade.php ENDPATH**/ ?>