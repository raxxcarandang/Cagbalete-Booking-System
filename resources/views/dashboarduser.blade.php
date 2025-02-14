
<x-app-layout>
	@vite(['resources/js/user.js'])
    <x-slot name="header">
        <!--
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
		</h2> -->
		<div class="container-xxl position-relative bg-white d-flex p-0" >
			<div class="wrapper" id="dashwrapper"
			x-data = "{
			
			bookid: '',
			users: {},
			user: {},
			accommodations: {},
			booking: {},
			bookings: {},
			currentBookings: {},
			
			allactivities: {},
			cactivities: {},
			activities: {},
			notifications: {},
			
			unreadNotifications: '',
			unreadActivities: '',
			unreadNotificationsCount: '',
			unreadActivitiesCount: '',
			
			showbook: false,
			hidebook: false,
			
			perpage: 3,
			data: {},
			dtable: '',
			userbook: {},
			usbook: {},
			filteredbookings: {},
			searchint: '',
			searchbook: {},
			sorted: {},
			booktosort: {},
			itrsorted: {},
			
			pages: 0,
			tpages: 0,
			cpage: 1,
			gpage: 1,
			currentpage: 1,
			pgclass: '',
			
			stssort: 4,
			stsicon: 'clipboard',
			scolor: 'black',
			
			contsort: 4,
			itrsort: 7,
			cont: 'wh',
			sorter: 17,
			sorted: '',
			sortedbookings: {},
			opage: '',
			spage: '',
			
			adate: '',
			cadate: '',
			rdate: '',
			crdate: '',
			itinerary: '',
			stsgiven: '',
			id: '',
			client: '',
			
			arrivaldb: '',
			returndb: '',
			
			loadupdates: {},
			updates: {},
			bid: '',
			bsts: '',
			bname: '',
			
			tmale: 0,
			tfemale: 0,
			tmaubanin: 0,
			tfilipino: 0,
			tforeigner: 0,
			tzero7: 0,
			tthirth: 0,
			t60: 0,
			tpriority: 0,
			tvisitor: 0,
			
			natblock: false,
			ageblock: false,
			childblock: false,
			personblock: false,
			
			discount: 0,
			amount: 0,
			namount: 0,
			
			base: 80,
			deducted: 64,
			
			advanced: false,
			
			}">
			
			@include('layouts.navigation')
			
				<x-sbaruser  />
				
				
				<div class="main"
				
				x-init = "document.getElementById('btndash').setAttribute('style', 'color: #39B54A !important; border-left: 3px solid #3b7ddd !important;');
				"
				>
					
					<div id="dynamicContent"></div>
					
					<x-cancel-modal />
					
					<x-userreschedmodal />
					
					<x-userconfirmmodal />
					
					<x-tallymodal />
					
					<div class="container-fluid pt-2 px-4">
						<div class="row">
							<div class = "col-12 col-sm-12 col-md-12 col-xl-6 dashrowch">
								<x-userbookstatus />
							</div>
							<div class = "col-12 col-sm-12 col-md-12 col-xl-6 dashrowch4">
								<x-userchartbookupdate />
							</div>
						</div>
					</div>
					<div class="container-fluid pt-2 px-4">
						<div class="row">
							<x-usersummary />
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</x-slot>
	
	<script src="/js/jquery-3.7.1.min.js"></script>
	<script src="/js/jquery-migrate-3.0.1.min.js"></script>
	<script src="/js/popper.min.js"></script>
	<script src="/js/bootstrap.bundle.min.js"></script>
	<script src="/js/jquery.easing.1.3.js"></script>
	<script src="/js/jquery.waypoints.min.js"></script>
	<script src="/js/jquery.stellar.min.js"></script>
	<script src="/js/owl.carousel.min.js"></script>
	<script src="/js/jquery.magnific-popup.min.js"></script>
	<script src="/js/aos.js"></script>
	<script src="/js/jquery.animateNumber.min.js"></script>
	<script src="/js/bootstrap-datepicker.js"></script>
	<script src="/js/scrollax.min.js"></script>
	<script src="/js/main.js"></script>
	<script src="/js/alpine.validate.min.js"></script>
    <script src="/js/sbar.js"></script>
	<script src="/js/toastmsg.js"></script>
<script src="/js/html2canvas.js"></script>

<script>

  window.addEventListener('pageshow', function(event) {
        if (event.persisted) {
            window.location.reload();
        }
    });
    
function booktable() {
var csrfToken = "{{ csrf_token() }}";

const loadtable = new XMLHttpRequest();
loadtable.onload = function() {
document.getElementById('dynamicContent').innerHTML = this.responseText;
}
loadtable.open("POST", "{{url('loaduserinfo')}}");
loadtable.setRequestHeader('X-CSRF-TOKEN', csrfToken);
loadtable.send();
}

booktable();

// Booking Cancel Fetch API Submission
function cancelbook() {
return {
formData: new FormData(),
formMessage: "",
formLoading: false,
buttonText: "YES",
id: "",
deleted: "",
client: "",

cancelData() {
this.formData.append('_token', "{{ csrf_token() }}");
this.formData.append('id', document.getElementById('bookin').value);

this.formMessage = "";
this.formLoading = true;
document.getElementById('cancelbtn').disabled = true;
this.buttonText = "CANCELLING...";
document.getElementById('canceltxt').innerHTML = "CANCELLING...";

fetch("{{url('cancelbooking')}}", {
method: "POST",
body: this.formData,
})
.then(response => {
console.log(response); 


if (!response.ok) {
const contentType = response.headers.get("content-type");
return response.text().then(text => {
console.log("Response text:", text); 

if (contentType && contentType.includes("application/json")) {

try {
const errorResponse = JSON.parse(text);
const message = errorResponse.message || "An error occurred.";
throw new Error(message);
} catch (e) {
console.warn("Ignoring JSON parse error:", e);
throw new Error("Received error response: " + text);
}
} else {

const newWindow = window.open();
newWindow.document.write(text);
newWindow.document.close();
throw new Error("Unexpected server response. Please check the new window for details.");
}
});
}


return response.json().catch(() => {

return Promise.resolve({}); 
});
})
.then(data => {
location.reload();
this.formMessage = "Booking deleted successfully!";
})
.catch(error => {
this.formMessage = `Error: ${error.message}`;
})
.finally(() => {
this.formLoading = false;
document.getElementById('cancelbtn').disabled = false;
this.buttonText = "CANCEL";
document.getElementById('canceltxt').innerHTML = "CANCEL";
document.getElementById('exitbtn').click();
});
}
};
}
// end of Booking Cancel Fetch API
document.addEventListener('alpine:init', () => {

Alpine.data('activityNotificationComponent', () => ({
markActivityAsRead(id) {
event.preventDefault();
let form = this.$refs['activityReadForm' + id]; 
if (form) {
this.submitForm(form, 'activity', id);

}
},
markNotificationAsRead(id) {
event.preventDefault();
let form = this.$refs['notificationReadForm' + id]; 
if (form) {
this.submitForm(form, 'notification', id);

}
},
async submitForm(form, type, id) {
try {
event.preventDefault(); 
const formData = new FormData(form);
const response = await fetch(form.action, {
method: 'POST',
body: formData,
});

if (!response.ok) {
throw new Error('Failed to mark as read');
}

if (type === 'activity') {
this.unreadActivities--;
} else if (type === 'notification') {
this.unreadNotifications--;
}

} catch (error) {
console.error(error);
alert('An error occurred while marking as read.');
}
},
formatDate(dateString) {
const date = new Date(dateString);
return date.toLocaleString(); 
}
}));


document.getElementById('btnprint').addEventListener('click', function() {
var element = document.getElementById('summarytable');


var width = element.offsetWidth;
var height = element.offsetHeight;


var scale = Math.min(window.innerWidth / width, window.innerHeight / height);


var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); 
var yyyy = today.getFullYear();
var dateStr = yyyy + '-' + mm + '-' + dd;  


html2canvas(element, {
scale: scale,  
scrollX: 0,   
scrollY: 0,
useCORS: true,  
}).then(function(canvas) {

var imageData = canvas.toDataURL('image/png');


var link = document.createElement('a');
link.href = imageData;
link.download = 'Booking#' + document.getElementById('btnprint').value  + '-' + dateStr + '.png';
link.click(); 
});
});
});

$('#reschedbook').on('submit', function(event) {


var submitButton = $('#reschedbtn'); 
submitButton.prop('disabled', true).text('RESCHEDULING...');

$.ajax({
url:"{{ route('rescheduser') }}",
data:$('#reschedbook').serialize(),
type:"post",



success:function(result){



submitButton.prop('disabled', false).text('RESCHEDULE'); 
$('#reschedcancel').click();

},

error: function(data){
var errors = data.responseJSON;
submitButton.prop('disabled', false).text('RESCHEDULE'); 


console.log(errors);
}


});
});

$('#confirmbook').on('submit', function(event) {


var submitButton = $('#reschedbtn'); 
submitButton.prop('disabled', true).text('CONFIRMING...');

$.ajax({
url:"{{ route('confirmbooking') }}",
data:$('#confirmbook').serialize(),
type:"post",



success:function(result){



submitButton.prop('disabled', false).text('CONFIRM'); 
$('#reschedcancel').click();

},

error: function(data){
var errors = data.responseJSON;
submitButton.prop('disabled', false).text('CONFIRM'); 

console.log(errors);
}


});
});

</script>
</x-app-layout>
