<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Booking;
use App\Models\Accommodation;
use App\Models\User;

$accommodations = collect();
$allaccommodations = Accommodation::chunk(1000, function($getaccommodations) use ($accommodations) {
foreach($getaccommodations as $getaccommodation) {
$accommodations->push($getaccommodation);
}
});

$users = collect();
$allusers = User::chunk(1000, function($getusers) use ($users) {
foreach($getusers as $getuser) {
$users->push($getuser);
}
});


$ubookings = DB::table('bookings')
->where('userid', '=', Auth::id())
->orderBy('created_at', 'desc') 
->limit(7) 
->get();

?>

<form id = "bookmainform" method="POST" enctype="multipart/form-data"
x-data ="bookUser()" x-validate.input @submit="$validate.submit" @submit.prevent="submitBook"
novalidate>
	<?php echo csrf_field(); ?>
	<div x-data="{
	
	etaf() { 
    var base = isNaN(parseInt(this.base)) ? 0 : parseInt(this.base);
    var visitor = isNaN(parseInt(this.tvisitor)) ? 0 : parseInt(this.tvisitor);
    var discount = isNaN(parseInt(this.discount)) ? 0 : parseInt(this.discount);
    var deducted = isNaN(parseInt(this.deducted)) ? 0 : parseInt(this.deducted);
    var zero7 = isNaN(parseInt(this.tzero7)) ? 0 : parseInt(this.tzero7);
    var t60 = isNaN(parseInt(this.t60)) ? 0 : parseInt(this.t60);
    var priority = isNaN(parseInt(this.tpriority)) ? 0 : parseInt(this.tpriority);
    var maubanin = isNaN(parseInt(this.tmaubanin)) ? 0 : parseInt(this.tmaubanin);
    
    this.amount = base * visitor;
    this.discount = discount > this.amount ? this.amount : (base - deducted) * (zero7 + t60 + priority);
    this.namount = Math.max(0, this.amount - this.discount - (base * maubanin));
},

    

    parkinfo(parkintro, park, parkdesc, parktext, parknum, parkreq, parkinq, parkbef, tmeanspuv, oparkdiv, showpcheck, parkcheck, parkblock) {
        // static
			if(this.fileName1 != '') {
				document.getElementById('filepark').value = '';
				this.fileName1= '';
				this.imagePreview1= null;
				this.showImagePreview1= false;
			    this.fileData1= null;
				}
		
		//dynamic
		this.parkintro = parkintro;
        this.park = park;
        this.parkdesc = parkdesc;
        this.parktext = parktext;
        this.parknum = parknum;
        this.parkreq = parkreq;
        this.parkinq = parkinq;
        this.parkbef = parkbef;
        this.tmeanspuv = tmeanspuv;
        this.oparkdiv = oparkdiv; 
        this.showpcheck = showpcheck;
        this.parkcheck = parkcheck; 
         this.parkblock = parkblock; 
        
        
},

checkpark() {
  if (!this.means || !this.parkcheck || !this.park) { 
    this.parkblock = true; 
    document.getElementById('cardot2').style = 'background: red;';
  } 
  else { 
    document.getElementById('cardot2').style = 'background: #1e62d8; border: gold solid 2px;';
    this.parkblock = false; 
  }
  updateProgressBar();
},

changetmeans() {
  if (this.means == 'Private Vehicle') { 
    this.showpuv = false;
    this.showpv = true;
    this.tmeans = 'Private Vehicle'; 
    this.park = '';
  } else { 
    this.oparkdiv = false;
    this.showpv = false;
    this.showpuv = true;
    this.tmeans = this.tmeanspuv;
    this.parkinfo('Travel & Parking', '', '', '', '', '', '', '', '', false, false, true, true);
  }
},

changepurpose() {
    let pselect = document.getElementById('purposeselect');
if (pselect.selectedIndex == 3) {
  this.opurposediv = true;
  this.opurpose = 'Enter Purpose Here';
} else {
  this.opurposediv = false; 
  if (pselect.selectedIndex == 2) {
    this.opurpose = 'Business';
  } 
  if (pselect.selectedIndex == 1) {
    this.opurpose = 'Leisure';
  } 
}
},

boatinfo(boatintro, boat, boatdesc, boattext, boatnum, boatreq, boatinq, boatbef, boatcheck, boatblock) {
        // static
        this.showbcheck = true;
			if(this.fileName2 != '') {
				document.getElementById('fileboat').value = '';
				this.fileName2= '';
				this.imagePreview2= null;
				this.showImagePreview2= false;
			    this.fileData2= null;
				}
		
		//dynamic
		this.boatintro = boatintro;
        this.boat = boat;
        this.boatdesc = boatdesc;
        this.boattext = boattext;
        this.boatnum = boatnum;
        this.boatreq = boatreq;
        this.boatinq = boatinq;
        this.boatbef = boatbef;
        this.boatcheck = boatcheck; 
         this.boatblock = boatblock; 
        
        
},

checkboat() {
   
  if (!this.$validate.isComplete('boatset') || this.purpose == '' || !this.boatcheck || this.opurpose == 'Enter Purpose Here') { 
    this.boatblock = true; 
    document.getElementById('cardot3').style = 'background: red;';
  } else { 
    if (this.opurposediv == true && !this.opurpose) {
      this.boatblock = true; 
      document.getElementById('cardot3').style = 'background: red;';
    } else {
      this.boatblock = false; 
      document.getElementById('cardot3').style = 'background: #1e62d8; border: gold solid 2px;';
    }
  }
 updateProgressBar();
},

accselect() {
  let selement = document.getElementById('selectacc');

  if (selement.selectedIndex == 15) {
    this.oaccdiv = true;
    this.accimg = 'other.webp';
  } else {
    this.oaccdiv = false;
    this.oacc = this.acc;
  }

  <?php foreach ($accommodations as $accommodation): ?>
    if (selement.selectedIndex == '<?= $accommodation->id ?>') {
      this.accimg = '<?= $accommodations->firstWhere('id', $accommodation->id)->thumbnail ?>';
      this.accdesc = '<?= $accommodations->firstWhere('id', $accommodation->id)->description ?>';

      <?php if ($accommodation->name == 'Other'): ?>
        this.acctext = 'Kindly Indicate Other Accommodation';
        this.accnum = '';
        this.accintro = '';
        this.oacc = 'Enter Accommodation Here';
        this.accbef = '';
        this.accreq = '';
        this.accinq = '';
      <?php else: ?>
        this.acctext = '<?= $accommodations->firstWhere('id', $accommodation->id)->name ?>';
        this.accnum = '<?= $accommodations->firstWhere('id', $accommodation->id)->contactno ?>';
        this.accintro = '';
        this.oacc = this.acctext;
        this.accreq = 'Please Secure Necessary Arrangements';
        this.accbef = 'Before Proceeding to the Next Step';
        this.accinq = 'By Inquiring First at';
      <?php endif; ?>

      if (this.fileData3 !== '') {
        this.fileName3 = '';
        this.imagePreview3 = null;
        this.showImagePreview3 = false;
        this.fileData3 = null;
        this.showacheck = true;
        this.acccheck = false;
      }
    }
  <?php endforeach; ?>

},

checkacc() {
    
    
    if ( !this.acccheck 
        || acc == '' 
       || !this.adate 
        || !this.rdate 
        || this.oacc == 'Enter Accommodation Here') { 

        this.accblock = true; 
        document.getElementById('cardot4').style = 'background: red;';
    } else { 
        this.accblock = false; 
        document.getElementById('cardot4').style = 'background: #1e62d8; border: gold solid 2px;';
    }
    if (!this.adate) { 
        this.adate = '<?php echo date('Y-m-d') ?>'; 
    }
      updateProgressBar();
},

preset() {
    let booking = this.bookings.find(b => b.id == this.$el.value);
    if (booking) {
        this.selectedBooking = booking;
        
        this.tmale = booking.totalmale;
        this.tfemale = booking.totalfemale;
        this.tmaubanin = booking.maubanins;
        this.tfilipino = booking.filipinos;
        this.tforeigner = booking.foreigners;
        this.tzero7 = booking.zeroto7yold;
        this.tthirth = booking.thirteento50yold;
        this.t60 = booking.above60yold;
        this.tpriority = booking.specialneeds;
    }
    this.$nextTick(() => {
        document.getElementById('guestipt').focus();
        document.getElementById('maleint').focus();
        document.getElementById('femaleint').focus();
        document.getElementById('afam').focus();
        document.getElementById('mauban').focus();
        document.getElementById('pinoy').focus();
        document.getElementById('oldie').focus();
        document.getElementById('teen').focus();
        document.getElementById('kids').focus();
        document.getElementById('priorityipt').focus();
    });
    document.getElementById('guestipt').focus();
    document.getElementById('maleint').focus();
    document.getElementById('femaleint').focus();
    document.getElementById('afam').focus();
    document.getElementById('mauban').focus();
    document.getElementById('pinoy').focus();
    document.getElementById('oldie').focus();
    document.getElementById('teen').focus();
    document.getElementById('kids').focus();
    document.getElementById('priorityipt').focus();
    document.getElementById('priorityipt').focus();
},


checkperson() {
    this.$validate.isComplete('visitorset');

    if ((parseInt(this.tmaubanin) + parseInt(this.tfilipino) + parseInt(this.tforeigner)) !== parseInt(this.tvisitor)) {
        this.natblock = true;
        document.getElementById('mauban').style = 'border: 1px solid red';
        document.getElementById('pinoy').style = 'border: 1px solid red';
        document.getElementById('afam').style = 'border: 1px solid red';
    } else {
        document.getElementById('mauban').style = 'border: none';
        document.getElementById('pinoy').style = 'border: none';
        document.getElementById('afam').style = 'border: none';
        this.natblock = false;
    }

    if ((parseInt(this.tzero7) + parseInt(this.tthirth) + parseInt(this.t60)) !== parseInt(this.tvisitor)) {
        this.ageblock = true;
        document.getElementById('kids').style = 'border: 1px solid red';
        document.getElementById('teen').style = 'border: 1px solid red';
        document.getElementById('oldie').style = 'border: 1px solid red';
    } else {
        document.getElementById('kids').style = 'border: none';
        document.getElementById('teen').style = 'border: none';
        document.getElementById('oldie').style = 'border: none';
        this.ageblock = false;
    }

    if (parseInt(this.tzero7) > 0 && parseInt(this.tthirth) === 0 && parseInt(this.t60) === 0) {
        this.childblock = true;
        document.getElementById('teen').style = 'border: 1px solid red';
        document.getElementById('oldie').style = 'border: 1px solid red';
    } else {
        this.childblock = false;
    }

    if (this.natblock || this.ageblock || this.childblock || this.tpriority > this.tvisitor || this.tvisitor <= 0 ) { 
        this.personblock = true; 
        document.getElementById('cardot5').style = 'background: red;';
    } else { 
        this.personblock = false;
        document.getElementById('cardot5').style = 'background: #1e62d8; border: gold solid 2px;';
    }

    updateProgressBar();
},


getitinerary() {
    this.timediff = Math.abs(Date.parse(this.rdate) - Date.parse(this.adate)); 
    this.datediff = Math.floor(this.timediff / (1000 * 60 * 60 * 24)); 
    
    if (this.datediff == 0) {
        this.itinerary = 'Day Tour';
    } else if (this.datediff == 1) {
        this.itinerary = 'Overnight';
    } else if (this.datediff == 2) {
        this.itinerary = '2 Nights';
    } else if (this.datediff == 3) {
        this.itinerary = '3 Nights';
    } else if (this.datediff == 4) {
        this.itinerary = '4 Nights';
    } else {
        this.itinerary = '5+ Nights';
    }
},


noblank() {
    this.tmale = (this.tmale == '' || !this.tmale) ? 0 : this.tmale;
    this.tfemale = (this.tfemale == '' || !this.tfemale) ? 0 : this.tfemale;
    this.tfilipino = (this.tfilipino == '' || !this.tfilipino) ? 0 : this.tfilipino;
    this.tmaubanin = (this.tmaubanin == '' || !this.tmaubanin) ? 0 : this.tmaubanin;
    this.tforeigner = (this.tforeigner == '' || !this.tforeigner) ? 0 : this.tforeigner;
    this.tzero7 = (this.tzero7 == '' || !this.tzero7) ? 0 : this.tzero7;
    this.tthirth = (this.tthirth == '' || !this.tthirth) ? 0 : this.tthirth;
    this.t60 = (this.t60 == '' || !this.t60) ? 0 : this.t60;
    this.tpriority = (this.tpriority == '' || !this.tpriority) ? 0 : this.tpriority;
},

checkform() {
    if (!this.means || !this.park) {
        document.getElementById('cardot2').style = 'background: red;';
    } else {
        document.getElementById('cardot2').style = 'background: #1e62d8; border: gold solid 2px;';
    }

    if (!this.$validate.isComplete('boatset') || this.opurpose === 'Enter Purpose Here') {
        document.getElementById('cardot3').style = 'background: red;';
    } else {
        document.getElementById('cardot3').style = 'background: #1e62d8; border: gold solid 2px;';
    }

    if (!this.$validate.isComplete('accset') || this.oacc === 'Enter Accommodation Here') {
        document.getElementById('cardot4').style = 'background: red;';
    } else {
        document.getElementById('cardot4').style = 'background: #1e62d8; border: gold solid 2px;';
    }

    if (!this.$validate.isComplete('visitorset')) {
        document.getElementById('cardot5').style = 'background: red;';
    } else {
        document.getElementById('cardot5').style = 'background: #1e62d8; border: gold solid 2px;';
    }

    updateProgressBar();
}


	}">
		<section class="book-slider owl-carousel" id = "start">
			<div class="slider-item" style="background-image:url(/images/promo/cagba6.webp);">
				<div class="overlay"></div> <br><br>
				<div class="container">
					<div class="row no-gutters slider-text align-items-center justify-content-center">
						<div class="col-md-12 ftco-animate text-center">
							
							<h1 id="formintro">Cagbalete Island</h1>
							<br>
							<h2>Booking Form</h2>
							<br><br>
							<h4 id="formtext">
								Mabuhay! This online registration is the first step of seamless registration. Before accomplishing this form, be sure that you have already booked an accommodation in Cagbalete Island, parking area (if any), and boat transfer. Kindly complete this form and present the confirmation to the front desk at the Mauban Tourist Port before paying the environmental and tourism administrative fee (ETAF) and proceeding to the next step.
							</h4>
							<br>
							<h2>Booking Form</h2>
						</div>
						<br>
						<button type="button" class="next-btn" @click="nopark = false;">Start</button>
					</div>
				</div>
			</div>
			<div class="slider-item" style="background-image:url(/images/promo/cagba4.webp);">
				<div class="overlay"></div> <br><br>
				<div class="container">
					<div class="row no-gutters slider-text2 align-items-center justify-content-center">
						<div class="col-md-6 ftco-animate p-md-1 img img-2 d-flex justify-content-center">
							<div class = "row" id  = "parkrow1" 
							x-init = "
							$watch('means', value => checkpark());
							$watch('park', value => checkpark());
							$watch('parkcheck', value => checkpark());"
							>
								<fieldset id = "travelset" name= "ttravel">
									<div class="form-group">
										<span class="form-label">Travel Means</span>
										<br>
										<select class="form-select" name="tmeans" id = "travelmeans" x-model = "means" 
										@change = "
										changetmeans();
										checkpark();
										"
										@click="
										checkpark();
									    "
										
										@blur="
										checkpark();
										"
										
									    :style="{ border: means === '' ? '2px solid red' : 'none' }"

										data-error-msg='Invalid Travel Means'
										
										x-validate.Required>
											<option value = "" disabled selected> Select Travel Means</option>
											<option value = "Public Vehicle">Public Utility Vehicle</option>  
											<option value = "Private Vehicle">Private Vehicle</option>
										</select>
										<br><br>
										<template x-if="showpv">
											
											
											
											<div>
												<span class="form-label">Pay Parking Space </span>
												<table class="radtable">
													<tr>
														<td>
															<label class="image-label">
																<input x-validate.group class = "radimg" name = "parking" id = "tpark" type = "radio" value="Metro Park Cagbalete Parking" 
																@click="
																parkinfo(
																'',
																'Metro Park Cagbalete Parking',
																'Metropark provides a worry-free parking experience, ensuring that your vehicle is safe and secure.',
																'Metro Park Cagbalete Parking',
																'+63-946-033-5938 / +63-910-914-1363',
																'Please Secure Necessary Arrangements',
																'By Inquiring First at',
																'Before Proceeding to the Next Step',
																'',
																false,
																true,
																false,
																true
																);
																" 
																
																data-error-msg='Parking Required'
																>
																<img class = "radimg" src = "/images/parking/metropark2.jpg">
																<div class="overlay17">
																	<span class="overlay-text">Metro Park Cagbalete Parking</span>
																</div>
															</label>
														</td>
														<td>
															<label class="image-label">
																<input x-validate.group class = "radimg" name = "parking" id = "tpark" type = "radio" value="Don`s Parking Rental" 
																@click="
																parkinfo (
																'',
																'Don`s Parking Rental',
																'Don`s Parking Rental Spaces provides clients with top-notch parking solutions that cater to their needs.',
																'Don`s Parking Rental',
																'+63-917-158-1808',
																'Please Secure Necessary Arrangements',
																'By Inquiring First at',
																'Before Proceeding to the Next Step',
																'',
																false,
																true,
																false,
																false,
																true
																);
																"
																
																data-error-msg='Parking Required'
																>
																<img class = "radimg" src = "/images/parking/metropark3.jpg">
																<div class="overlay17">
																	<span class="overlay-text">Don's Parking Rental</span>
																</div>
															</label>
														</td>
													</tr>
													<tr>
														<td>
															<label>
																<input x-validate.group class = "radimg" name = "parking" id = "tpark" type = "radio" :value ="park" 
																@click="parktext = 'Please Indicate Other Prefereed Parking Space'; 
																parkinfo(
																'',
																park,
																'By choosing these unregistered parking spots, you help those who know and love the place continue their tradition of hospitality.',
																parktext,
																'',
																'',
																'',
																'',
																'',
																true,
																true,
																false,
																true,
															
																);
															
																"
																
																data-error-msg='Parking Required'
																>
																<img class = "radimg" id = "othersymbol" src = "/images/symbol/other.png">
															</label>
														</td>
														<td>
															<template  x-if="oparkdiv">
																<div id = "oparkdiv">
																	<span class="form-label">Other Parking</span>
																	<!-- <input x-validate.required class="form-control" type="text" name="parking" id = "opark" x-model="park" @input.change="checkpark();" @click="checkpark();" @blur="checkpark();"  data-error-msg='Other Parking Required' ></input>
																	-->
																	<textarea  x-validate.required class="form-control" rows="2" name="parking" id = "opark" x-model="park" @input.change="checkpark();" @click="checkpark();" @blur="checkpark();"  data-error-msg='Other Parking Required'> </textarea>
																</div>
															</template>
														</td>
													</tr>
												</table>
												
												
											</div>
										</template>
										
										<template x-if="showpuv">
											
											<div>
												<span class="form-label">Public Vehicle</span>
												<table class="radtable">
													<tr>
														<td>
															<input type="hidden" name="parking" value="N/A" />
															<label class="image-label">
																<input x-validate.group class = "radimg" name = "tmeans" id = "tm1" type = "radio" value="Jeepney" 
																@click="
																parkinfo(
																'',
																'Jeepney',
																'The jeepney to Mauban offers a comfortable, eco-friendly, and efficient travel experience. Equipped with air conditioning, digital fare systems, and spacious seating, it provides a reliable and sustainable transportation option. Ideal for both commuters and travelers, it operates on a fixed route for easy access and convenience.',
													            'Jeepney',
													            '',
													            '',
													            '',
													            '',
													            'Jeepney',
													            false,
													            false,
													            true,
													            false
																);

																" 
																
																data-error-msg='PUV Required'
																>
																<img class = "radimg" src = "/images/parking/puv4.jpg">
																<div class="overlay17">
																	<span class="overlay-text">Jeepney</span>
																</div>
															</label>
														</td>
														<td>
															<label class="image-label">
																<input x-validate.group class = "radimg" name = "tmeans" id = "tm2" type = "radio" value="Bus" 
																@click="
																parkinfo(
																'',
																'Bus',
																'Awaken your spirit of adventure by going off the beaten path, away from the usual tourist destinations. The Southern Tagalog region offers a wealth of exciting experiences—art, nature, culture and leisure trips—for the intrepid traveler. No need to fly on a plane or drive for long hours to get there...',
													            'Bus',
													            '',
													            '',
													            '',
													            '',
													            'Bus',
													            false,
													            false,
													            true,
													            false
																);
																"
																
																data-error-msg='PUV Required'
																>
																<img class = "radimg" src = "/images/parking/bus.jpg">
																<div class="overlay17">
																	<span class="overlay-text">Bus</span>
																</div>
															</label>
														</td>
													</tr>
													<tr>
														<td>
															<label class="image-label">
																<input x-validate.group class = "radimg"  name = "tmeans" id = "tm3" type = "radio" value="Taxi" 
																@click="
																parkinfo(
																'',
																'Taxi',
																'A taxi to Mauban provides a convenient and personalized transportation option, offering door-to-door service with comfort and privacy. With metered fares, experienced drivers, and 24/7 availability, it’s an ideal choice for those seeking direct, hassle-free travel.',
													            'Taxi',
													            '',
													            '',
													            '',
													            '',
													            'Taxi',
													            false,
													            false,
													            true,
													            false
																);
																"
																
																data-error-msg='PUV Required'
																>
																<img class = "radimg" src = "/images/parking/taxi.jpg">
																<div class="overlay17">
																	<span class="overlay-text">Taxi</span>
																</div>
															</label>
														</td>
													</tr>
												</table>
											</div>
										</template>
										
										<div x-show="!showpv && !showpuv" >
											
											<label class="image-label mt-2">
												<img :src="'images/parking/' + tmeanimg" id="tmeanpreview" />
												<div class="overlay17">
													<span class="overlay-text" x-text="tmeanname"></span>
												</div>
											</label>
											<p id="tmeantext" x-text="tmtext"></p>
											
										</div>
										
										
									</div>
								</div>
							</div>
							<div class="col-md-6 ftco-animate text-center">
								<div class="text mb-5 pb-3" id="tmeandesc">
									<h2>Travel Means</h2>
									<h1 x-text="parkintro"></h1>
									<h4 class="mb-2" style="color: white;" x-text="parktext"></h4>
									<h5 x-text="parkdesc" style="color: white;"></h5>
									<h5 class="mt-3" style="color: white; font-weight: bold;" x-text="parkreq"></h5>
									<h5 class="mt-2" style="color: white; font-weight: bold;" x-text="parkinq"></h5>
									<h4 class="mt-2" style="color: white; font-weight: bold;" x-text="parknum"></h4>
									
									<template x-if="showpcheck">
										<div class="mb-1" id="pimginput">
											
											
											<label for="filepark" class="form-label uploadlbl" >Upload Picture of Transaction, etc. (Max: 5MB)</label>
											<div class="flex items-center space-x-2">
												<template x-if="imagePreview1">
													<button 
													type="button" 
													class="bg-blue-100 p-2 rounded-full text-blue-600 hover:text-blue-800 hover:bg-blue-200 focus:outline-none" 
													@click="showImagePreview1 = true">
														<i class = "ion-ios-search" style="font-size: 1.5rem;"></i>
													</button>
												</template>
												<input 
												id="filepark" 
												
												type="file" 
												class="form-control form-control-sm" 
												:style="fileName1 === '' ? 'border: 2px solid red;' : ''"
												@change="previewImage1; parkcheck = true;" 
												accept="image/*" 
												/>
												
												
											</div>
											
											
											<template x-if="showImagePreview1">
												<div 
												class="fixed z-10 inset-0 flex items-center justify-center">
													<div class="bg-white rounded-lg overflow-hidden w-3/4 max-w-lg">
														<div class="flex justify-between items-center p-4 border-b">
															<h5 class="font-semibold">Parking Transaction</h5>
															<button 
															type="button" 
															class="text-red-500 hover:text-black rounded-full text-5xl" 
															@click="showImagePreview1 = false">
																X
															</button>
														</div>
														<div class="p-4">
															<img 
															:src="imagePreview1" 
															alt="Preview" 
															class="w-full h-auto max-h-[27rem] object-contain mx-auto" 
															/>
														</div>
													</div>
												</div>
											</template>
										</div>
										
										
									</template>
									
									<h2>Travel Means</h2>
								</fieldset>
								<br><br>
								<button type="button" class="prev-btn">Previous</button>
								<button type="button" class="next-btn" 
								:disabled="parkblock" @click = "noboat = false;"
								>Next</button>
							</div>
						</div>
						
						
						
					</div>
					
				</div>
			</div>
			
			<div class="slider-item" style="background-image:url(/images/promo/cagba5.webp);">
				<div class="overlay"></div> <br><br><br>
				<div class="container">
					<div class="row no-gutters slider-text2 align-items-center justify-content-center">
						<div class="col-md-6 ftco-animate p-md-1 img img-2 d-flex justify-content-center">
							<div class = "row" id  = "boatrow1"
							x-init = "	
							$watch('purpose', value => checkboat());
							$watch('opurpose', value => checkboat());
							$watch('boat', value => checkboat());
							$watch('boatcheck', value => checkboat());"
							>
								<fieldset id = "boatset" name = "tboat">
									<div class="form-group">
										<span class="form-label" id = "purposelabel">Purpose of Visit to Mauban</span>
										<br>
										<select class="form-select" name = "purpose" id="purposeselect"
										x-model = "purpose" 
										@change="
										changepurpose();
										"
										@click="
										checkboat();
										"
										@blur="
										checkboat();
										"
										:style="{ border: purpose === '' ? '2px solid red' : 'none' }"

										data-error-msg='Purpose Required'>
											
											<option value = "" disabled selected> Select Purpose</option>
											<option value = "Leisure">Leisure</option>   
											<option value = "Business">Business</option>  
											<option :value = "opurpose">Other</option> 
										</select>
										<template x-if="opurposediv">
											<div>
												<span class="form-label">Purpose</span>
												<input x-validate.required class="form-control" type="text" id = "opurpose" @input.change="checkboat();"
												:style="opurpose == 'Enter Purpose Here' ? 'border: 2px solid red;' : ''"
												@blur="checkboat(); document.getElementById('purposeselect').selectedIndex = 3;"
												
												x-model="opurpose"
												@click="if(opurpose == 'Leisure' || opurpose == 'Business' || opurpose == 'Enter Purpose Here') { $el.value = ''; } checkboat();" data-error-msg='Purpose Required'>
												</input>
											</div>
										</template>
										<span class="form-label">Boat Classification</span>
										<table class="radtable">
											<tr>
												<td>
													<label class="image-label">
														<input x-validate.group class = "radimg" name = "boat" id = "tboat" type = "radio" value="Public Boat" 
														@click="
														boatinfo(
														'',
														'Public Boat',
														'The public boat ride to Cagbalete Island is priced incredibly affordable, allowing you to enjoy the stunning views without breaking the bank.',
														'Public Boat',
														'+63-912-640-3190',
														'Please Secure Necessary Arrangements',
														'By Inquiring First at',
														'Before Proceeding to the Next Step',
														false,
														true
														);
													
														"
														data-error-msg='Boat Required'
														>
														<img class = "radimg" src = "/images/boat/public.jpg">
														<div class="overlay17">
															<span class="overlay-text">Public Boat</span>
														</div>
													</label>
												</td>
												<td>
													<label class="image-label">
														<input x-validate.group class = "radimg" name = "boat" id = "tboat" type = "radio" value="Private Boat" 
														@click="
														boatinfo(
														'',
														'Private Boat',
														'A private boat ride to Cagbalete Island offers unparalleled efficiency. No more waiting around; just hop on and you`re off to your island adventure!',
														'Private Boat',
														'+63-912-640-3190',
														'Please Secure Necessary Arrangements',
														'By Inquiring First at',
														'Before Proceeding to the Next Step',
														false,
														true
														);
											
														"
														data-error-msg='Boat Required'
														>
														<img class = "radimg" src = "/images/boat/private.jpg">
														<div class="overlay17">
															<span class="overlay-text">Private Boat</span>
														</div>
													</label>
												</td>
											</tr>
											<tr>
												<td>
													<label class="image-label">
														<input x-validate.group class = "radimg" name = "boat" id = "tboat" type = "radio" value="Boat Provided by Resort" 
														@click="
														boatinfo(
														'',
														'Boat Provided by Resort',
														The resort`s boat service to Cagbalete Island is designed to offer maximum efficiency. You`ll arrive at the island relaxed and ready to explore, rather than frazzled and stressed.',
														'Boat Provided by Resort',
														'+63-912-640-3190',
														'Please Secure Necessary Arrangements',
														'By Inquiring First at',
														'Before Proceeding to the Next Step',
														false,
														true
														);
														"
														data-error-msg='Boat Required'
														>
														<img class = "radimg" src = "/images/boat/bpresort.jpg">
														<div class="overlay17">
															<span class="overlay-text">Boat Provided by Resort</span>
														</div>
													</label>
												</td>
											</tr>
										</table>
									</div>
									
								</div>
								
							</div>
							<div class="col-md-6 ftco-animate text-center">
								<div class="text mb-3 pb-3" id="boatdesc">
									
									<h2>Boat Class</h2>
									<br>
									<h1 x-text="boatintro"></h1>
									<h4 class="mb-2" style="color: white;" x-text="boattext"></h1>
									<h5 x-text="boatdesc" style="color: white;"></h5>
									<h5 class="mt-3" style="color: white; font-weight: bold;" x-text="boatreq"></h5>
									<h5 class="mt-2" style="color: white; font-weight: bold;" x-text="boatinq"></h5>
									<h4 class="mt-2" style="color: white; font-weight: bold;" x-text="boatnum"></h4>
									
									<template x-if="showbcheck">
										<div class="mb-1">
											
											<label for="fileboat" class="form-label uploadlbl" >Upload Picture of Transaction, etc. (Max: 5MB)</label>
											<div class="flex items-center space-x-2">
												<template x-if="imagePreview2">
													<button 
													type="button" 
													class="bg-blue-100 p-2 rounded-full text-blue-600 hover:text-blue-800 hover:bg-blue-200 focus:outline-none" 
													@click="showImagePreview2 = true">
														<i class = "ion-ios-search" style="font-size: 1rem;"></i>
													</button>
												</template>
												<input 
												id="fileboat" 
												
												type="file" 
												class="form-control form-control-sm" 
												:style="fileName2 === '' ? 'border: 2px solid red;' : ''"
												@change="previewImage2; boatcheck = true;" 
												accept="image/*" 
												/>
												
												
												
											</div>
											
											
											<template x-if="showImagePreview2">
												<div 
												class="fixed z-10 inset-0 flex items-center justify-center">
													<div class="bg-white rounded-lg overflow-hidden w-3/4 max-w-lg">
														<div class="flex justify-between items-center p-4 border-b">
															<h5 class="font-semibold">Boat Transaction</h5>
															<button 
															type="button" 
															class="text-red-500 hover:text-black rounded-full text-5xl" 
															@click="showImagePreview2 = false">
																X
															</button>
														</div>
														<div class="p-4">
															<img 
															:src="imagePreview2" 
															alt="Preview" 
															class="w-full h-auto max-h-[27rem] object-contain mx-auto" 
															/>
														</div>
													</div>
												</div>
											</template>
										</div>
									</template>
									<h2>Boat Class</h2>
								</fieldset>
								<br><br>
								<button type="button" class="prev-btn">Previous</button>
								<button type="button" class="next-btn" 
								:disabled = "boatblock"  @click="noacc = false; if(opurposediv) {
								purpose = opurpose;
								} 
								
								<?php if (isset($_GET['booking'])) { 
									echo 'acc = \'' . addslashes($accommodations->firstWhere("id", $_GET["booking"])->name) . '\'; oacc = acc + \'ㅤ\';'; 
								} ?>"
								>
									Next
								</button>
							</div>
						</div>
						
					</div>
				</div>
			</div>
			
			<div class="slider-item" style="background-image:url(/images/promo/cagba8.webp);">
				<div class="overlay"></div> <br><br>
				<div class="container">
					<div class="row no-gutters slider-text2 align-items-center justify-content-center">
						<div class="col-md-6 ftco-animate p-md-1 img img-2 d-flex justify-content-center">
							<div id = "accrow" 
							x-init = "
							$watch('acc', value => checkacc(););
							$watch('adate', value => checkacc(););
							$watch('rdate', value => checkacc(););
							$watch('acccheck', value => checkacc(););
							">
								<fieldset id = "accset" name = "tacc">
									<div class="form-group">
										<span class="form-label">Accommodation</span>
										<select class="form-select" name="acc" id = "selectacc"
										x-model = "acc" 

										@change=" 
										accselect();
										if(fileName3 != ''){
										document.getElementById('fileacc').value = '';
										}
										" 
										@blur="
										checkacc();
										" 
										@click="
										checkacc();
										" 
									
										:style="{ border: acc === '' ? '2px solid red' : 'none' }"
										x-init="accselect();
										"
										data-error-msg='Accommodation Required'
										>
											<option value = "" disabled selected> Select An Accommodation</option>
											
											<?php 
												foreach ($accommodations as $accommodation) {
													if($accommodation->name == 'Other') {} else {
														if(isset($_GET['booking'])){
															
															echo '<option value = "'. $accommodation->name .'" :selected="' . $accommodation->id . '=='. $_GET['booking']. '" x-init = " oacc = \'' . $accommodation->name . '\'; $dispatch(\'accselect\');">'. $accommodation->name .'</option>';
															} else {
															echo '<option value = "'. $accommodation->name .'">'. $accommodation->name .'</option>';
														}
													}
												}
												
												
											?>
											
											<option :value="oacc">Other</option>
										</select>
										<template x-if="oaccdiv">
											<div>
												<span class="form-label">Other Accommodation</span>
												<input class="form-control" x-validate.required type="text" id = "oacc" 
												@click=" if(oacc == 'Enter Accommodation Here') { $el.value = ''; } checkacc();"
												x-model="oacc" 
												@input.change="checkacc();"
												@blur="checkacc();" data-error-msg='Invalid Accommodation'
												:style="oacc === 'Enter Accommodation Here' ? 'border: 2px solid red;' : ''"
												/>
											</div>
										</template>
									</div>
									
									<div class="col-12 mx-auto">
										<img :src="'/images/resort/thumbnail/'+ accimg" id ="accpreview"/>
									</div>
									
									<div class="row">
										
										<div class="col-6">
											<div class="form-group">
												<span class="form-label">Arrival</span>
												<input class="form-control" name="arrival" x-model="adate" id = "arrdate" type="date" min = "<?php echo date('Y-m-d') ?>" x-init= "document.getElementById('arrdate').value = '<?php echo date('Y-m-d') ?>'" :max = "rdate" @input.change="checkacc();" @click="checkacc();" @blur="checkacc();" data-error-msg='Invalid Arrival Date' x-validate.required>
											</div>
										</div>
										
										<div class="col-6">
											<div class="form-group">
												<span class="form-label">Return</span>
												<input class="form-control" name="departure" x-model="rdate" id = "retdate" type="date" :min = "adate" :style="rdate === '' ? 'border: 2px solid red;' : ''" @input.change="checkacc();" @click="checkacc();" @blur="checkacc();" data-error-msg='Invalid Return Date' x-validate.required>
											</div>
										</div>
										
									</div>
									<input type = "hidden" :value = "itinerary" name = "itinerary" id = "itr" />
								</div>
							</div>
							<div class="col-md-6 ftco-animate text-center">
								<div class="text mb-5 pb-3" id="accdesc">
									<h2>Accommodation</h2>
									<h1 class="mb-3" style="color: white;" x-text="accintro"></h1>
									<br>
									<h4 x-text="acctext" style="color:white;"></h4>
									<h5 x-text="accdesc" style="color: white;"></h5>
									<h5 class="mt-3" style="color: white; font-weight: bold;" x-text="accreq"></h5>
									<h5 class="mt-2" style="color: white; font-weight: bold;" x-text="accinq"></h5>
									<h4 class="mt-2" style="color: white; font-weight: bold;" x-text="accnum"></h4>
									
									<template x-if="showacheck">
										<div class="mb-1">
											
											
											<label for="fileUpload" class="form-label uploadlbl" >Upload Picture of Transaction, etc. (Max: 5MB)</label>
											<div class="flex items-center space-x-2">
												<template x-if="imagePreview3">
													<button 
													type="button" 
													class="bg-blue-100 p-2 rounded-full text-blue-600 hover:text-blue-800 hover:bg-blue-200 focus:outline-none" 
													@click="showImagePreview3 = true">
														<i class = "ion-ios-search" style="font-size: 1.5rem;"></i>
													</button>
												</template>
												<input 
												id="fileacc"
												type="file" 
												class="form-control form-control-sm" 
												:style="fileName3 === '' ? 'border: 2px solid red;' : ''"
												@change="previewImage3; acccheck = true;" 
												accept="image/*" 
												/>
												
												
												
											</div>
											
											
											<template x-if="showImagePreview3">
												<div 
												class="fixed z-10 inset-0 flex items-center justify-center">
													<div class="bg-white rounded-lg overflow-hidden w-3/4 max-w-lg">
														<div class="flex justify-between items-center p-4 border-b">
															<h5 class="font-semibold">Accommodation Transaction</h5>
															<button 
															type="button" 
															class="text-red-500 hover:text-black rounded-full text-5xl" 
															@click="showImagePreview3 = false">
																X
															</button>
														</div>
														<div class="p-4">
															<img 
															:src="imagePreview3" 
															alt="Preview" 
															class="w-full h-auto max-h-[27rem] object-contain mx-auto" 
															/>
														</div>
													</div>
												</div>
											</template>
										</div>
									</template>
									<h2>Accommodation</h2>
								</fieldset>
								<br><br>
								<button type="button" class="prev-btn">Previous</button>
								<button type="button" class="next-btn" 
							
								@click="
								if(oaccdiv) 
								{
								acc = oacc;
								}
								noperson = false;
								
								getitinerary();
								"
								
								@mouseover="checkacc();"
								:disabled="accblock" 
								>
									Next
								</button>
							</div>
							
						</div>
						
					</div>
				</div>
			</div>
			
			<div class="slider-item" style="background-image:url(/images/promo/cagba2.webp);" 
			x-init="
			$watch('tvisitor', value => checkperson());
			$watch('tmale', value => checkperson());
			$watch('tfemale', value => checkperson());
			$watch('tmaubanin', value => checkperson());
			$watch('tfilipino', value => checkperson());
			$watch('tforeigner', value => checkperson());
			$watch('tzero7', value => checkperson());
			$watch('tthirth', value => checkperson());
			$watch('t60', value => checkperson());
			$watch('tpriority', value => checkperson());
			">
				<div class="overlay"></div>
				<div class="container">
					<div class="row no-gutters slider-text2 align-items-center justify-content-center">
						<div class="col-md-6 ftco-animate p-md-1 img img-2 d-flex justify-content-center">
							
							<div id = "tallydiv">
								<fieldset id = "visitorset" name = "tvisitor">
									<div class="row" x-data="{ bookings: <?php echo e($ubookings); ?>, selectedBooking: null, }">
										<div class="col-sm-4">
											<span class="form-label">Specify By:</span>
										</div>
										<div class="col-sm-4" x-show="bookings.length > 0">
											<select class="form-select" name="preset" id="preselect"
											@change="
										        preset();
											"
											>
												
												<option value="" disabled selected>Preset From Past Bookings</option>
												
												<?php
													$seenVisitors = []; 
													foreach ($ubookings as $ubooking):
													
													if (in_array($ubooking->totalvisitors, $seenVisitors)) {
														continue;
													}
													
													$seenVisitors[] = $ubooking->totalvisitors;
												?>
												<option value="<?= $ubooking->id ?>">Preset B#<?= $ubooking->id ?> (<?= $ubooking->totalvisitors ?> Guests)</option>
												<?php endforeach; ?>
												
											</select>
										</div>
										<div :class="bookings.length > 0 ? 'col-sm-4' : 'col-sm-8'">
											
											<div class="input-group input-group-sm mb-1">
												<div class="input-group-prepend">
													<span class="input-group-text flex-shrink-0" id="inputGroup-sizing-default-tg" style="font-size: 0.77rem" >Total Guests</span>
												</div>
												<input type="number" id="guestipt" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" x-model ="tvisitor" min="0" max="999" @input.change="checkperson();" @click="checkperson();" @blur="checkperson();" disabled>
												
											</div>
											
											<input type="hidden" name="visitors" x-model="tvisitor" />
											
										</div>
										<span class="form-label">Sex</span>
										<div class="col-6">
											<div class="input-group input-group-sm mb-1">
												<div class="input-group-prepend">
													<span class="input-group-text flex-shrink-0" id="inputGroup-sizing-default-g" style="font-size: 0.77rem" >&nbsp;<i class="ion-ios-male" style="color: #000080;"></i>&nbsp;&nbsp;Male</span>
												</div>
												<input type="number" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="male" id="maleint" x-model ="tmale" min="0" max="999" @input.change="checkperson(); tvisitor = parseInt(tmale) + parseInt(tfemale); " @click="checkperson(); tvisitor = parseInt(tmale) + parseInt(tfemale); noblank();  " @blur="checkperson(); tvisitor = parseInt(tmale) + parseInt(tfemale);  noblank(); " x-validate.required>
												<div class="error-msg text-sm text-red-600 col-12">
													Invalid Amount
												</div>
											</div>
											
										</div>
										<div class="col-6">
											<div class="input-group input-group-sm mb-1">
												<div class="input-group-prepend">
													<span class="input-group-text flex-shrink-0" id="inputGroup-sizing-default-g" style="font-size: 0.77rem" ><i class="ion-ios-female" style="color: #AA336A;"></i>&nbsp;Female</span>
												</div>
												<input type="number" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="female" id="femaleint" x-model ="tfemale" min="0" max="999" @input.change="checkperson(); tvisitor = parseInt(tmale) + parseInt(tfemale);  " @click="checkperson(); tvisitor = parseInt(tmale) + parseInt(tfemale); noblank(); " @blur="checkperson(); tvisitor = parseInt(tmale) + parseInt(tfemale);  noblank(); " x-validate.required  />
												<div class="error-msg text-sm text-red-600 col-12">
													Invalid Amount
												</div>
											</div>
											
										</div>
									</div>
									<div class="row">
										
										<div class="col-6">
											<span class="form-label">Nationality</span>&nbsp;<span x-show='(parseInt(tmaubanin) + parseInt(tfilipino) + parseInt(tforeigner)) != parseInt(tvisitor) && !isNaN(tvisitor) && tvisitor != ""' id = "tallyerror">∑(<span x-text="tvisitor"></span>)</span>
											<div class="input-group input-group-sm mb-1">
												<div class="input-group-prepend">
													<span class="input-group-text flex-shrink-0" id="inputGroup-sizing-default" style="font-size: 0.77rem" >&nbsp;&nbsp;<img src ="/images/nation/un.webp" id= "bookun" />&nbsp;Foreigners</span>
												</div>
												<input type="number" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="afam" name="foreigners" x-model ="tforeigner" min="0" max="999"  @input.change="checkperson();" @click="checkperson(); noblank(); " @blur="checkperson();  noblank();" x-validate.required  />
												<div class="error-msg text-sm text-red-600 col-12">
													Invalid Amount
												</div>
											</div>
											
											
										</div>
										<div class="col-6">
											<span class="form-label">Age</span>&nbsp;<span x-show='(parseInt(tzero7) + parseInt(tthirth) + parseInt(t60)) != parseInt(tvisitor) && tvisitor != "" && !isNaN(tvisitor)' id = "tallyerror">∑(<span x-text="tvisitor"></span>)</span>
											<div class="input-group input-group-sm mb-1">
												<div class="input-group-prepend">
													<span class="input-group-text flex-shrink-0" id="inputGroup-sizing-default" style="font-size: 0.77rem" >&nbsp;&nbsp;<img src ="/images/symbol/kid.png" id= "bookkid"/>&nbsp;0 - 7 Y. O.</span>
												</div>
												<input type="number" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="kids" name="zero7" x-model ="tzero7" min="0" max="999" @input.change="checkperson();" @click="checkperson(); noblank(); " @blur="checkperson();  noblank();" x-validate.required  />
												<div class="error-msg text-sm text-red-600 col-12">
													Invalid Amount
												</div>
											</div>
											
										</div>
										<div class="col-6">
											<div class="input-group input-group-sm mb-1">
												<div class="input-group-prepend">
													<span class="input-group-text flex-shrink-0" id="inputGroup-sizing-default" style="font-size: 0.77rem" ><img src ="/images/nation/mn.webp" id= "bookmn"/>&nbsp;Maubanin</span>
												</div>
												<input type="number" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="mauban" name="maubanins" x-model ="tmaubanin" min="0" max="999" @input.change="checkperson();" @click="checkperson(); noblank(); " @blur="checkperson();  noblank();" x-validate.required  />
												<div class="error-msg text-sm text-red-600 col-12">
													Invalid Amount
												</div>
											</div>
											
										</div>
										
										<div class="col-6">
											<div class="input-group input-group-sm mb-1">
												<div class="input-group-prepend">
													<span class="input-group-text flex-shrink-0" id="inputGroup-sizing-default" style="font-size: 0.77rem" >&nbsp;<img src ="/images/symbol/mature.png" id= "bookmature"/>&nbsp;13 - 59 Y. O.</span>
												</div>
												<input type="number" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="teen" name="thirth" x-model ="tthirth" min="0" max="999" @input.change="checkperson();" @click="checkperson(); noblank(); " @blur="checkperson();  noblank();" x-validate.required  />
												<div class="error-msg text-sm text-red-600 col-12">
													Invalid Amount
												</div>
											</div>
											
											
										</div>
										<div class="col-6">
											<div class="input-group input-group-sm mb-1">
												<div class="input-group-prepend">
													<span class="input-group-text flex-shrink-0" id="inputGroup-sizing-default" style="font-size: 0.7rem" ><img src ="/images/nation/ph.webp" id= "bookph"/>&nbsp;Non-Maubanin</span>
												</div>
												<input type="number" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="pinoy" name="filipinos" x-model ="tfilipino" min="0" max="999" @input.change="checkperson();" @click="checkperson(); noblank(); " @blur="checkperson();  noblank();" x-validate.required  />
												<div class="error-msg text-sm text-red-600 col-12">
													Invalid Amount
												</div>
											</div>
											
										</div>
										<div class="col-6">
											<div class="input-group input-group-sm mb-1">
												<div class="input-group-prepend">
													<span class="input-group-text flex-shrink-0" id="inputGroup-sizing-default" style="font-size: 0.77rem" >&nbsp;&nbsp;<img src ="/images/symbol/old.png" id= "bookold"/>&nbsp;60+ Y. O.</span>
												</div>
												<input type="number" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="oldie" name="above60" x-model ="t60" min="0" max="999" @input.change="checkperson();" @click="checkperson(); noblank(); " @blur="checkperson();  noblank();" x-validate.required  />
												<div class="error-msg text-sm text-red-600 col-12">
													Invalid Amount
												</div>
											</div>
											
										</div>
									</div>
									
									
									
									
									
									<div class="row">
										<div class="col-1">
											
										</div>
										<div class="col-10">
											<span class="form-label">Vulnerable</span>
											<div class="input-group input-group-sm mb-1">
												<div class="input-group-prepend">
													<span class="input-group-text flex-shrink-0" id="inputGroup-sizing-default-pg" style="font-size: 0.77rem" ><img src ="/images/symbol/spc.png" id= "bookspc"/>&nbsp;Vulnerable</span>
												</div>
												<input type="number" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="priority" id="priorityipt" x-model ="tpriority" min="0" max="999" @input.change="checkperson();" @click="checkperson(); noblank(); " @blur="checkperson();" x-validate.required='$el.value <= parseInt(tvisitor)';  />
												
												<div class="error-msg text-sm text-red-600 col-12">
													Invalid Amount
												</div>
											</div>
											
											
										</div>
										<div class="col-1">
											
										</div>
									</div>
									<input type="hidden" name="remark" value="N/A" />
								</fieldset>
							</div>
							
						</div>
						<div class="col-md-6 ftco-animate text-center" id="tallybottomdiv">
							<div class="text mb-5 pb-3">
								<br><br><br><br>
								<h2>GUESTS</h2>
								<h1 class="mb-3">Tally of Guests</h1>
								<h2>GUESTS</h2>
								<br><br>
								<button type="button" class="prev-btn">Previous</button>
								<button type="button" class="next-btn" 
								:disabled="personblock"
							
								@click= "
								nosum = false;
								noblank();
							    etaf();
								"
								@mouseover= "checkperson()"
								>
									Next
								</button>
							</div>
							
						</div>
						
					</div>
				</div>
			</div>
			
			<div class="slider-item" style="background-image:url(/images/promo/cagba6.webp);">
				<div class="overlay"></div> <br><br><br>
				<div class="container">
					<div class="row no-gutters slider-text2 align-items-center justify-content-center">
						
						<!-- 9x8 Table -->
						
						<div class="table-responsive w-auto"  id = "sumtablediv" style="width:100%; height:100%;">
							<table class="table table-borderless text-center" id="sumtable">
								
								<tbody>
									<tr>
										<td>&nbsp;</td>
										<td id = "sumlogotd"><br><img src = "/images/promo/macto.webp" id = "sumlogo" /><b>Booking Summary</b></td>
										<td></td>
										<td></td>
										<td></td>
										<td id="lastcol"></td>
										
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td rowspan="6" id = "leadtd">
											<span style="color:black;"><b>LEAD GUEST</b></span><br>
											<?php echo e($users->firstWhere('id', Auth::id())->name); ?>  <?php echo e($users->firstWhere('id', Auth::id())->lname); ?>, <?php echo e(date_diff(date_create($users->firstWhere('id', Auth::id())->bdate), date_create(date('Y-m-d')))->y); ?>, <?php if($users->firstWhere('id', Auth::id())->gender === 'Male'): ?><b>M</b> <?php elseif($users->firstWhere('id', Auth::id())->gender === 'Female'): ?><b>F</b>  <?php endif; ?>
											<br><?php echo e($users->firstWhere('id', Auth::id())->email); ?><br>
											<?php echo e($users->firstWhere('id', Auth::id())->contactno); ?><br><br>
											<span style="color:black;"><b>COUNTRY</b></span><br>
											<?php if($users->firstWhere('id', Auth::id())->country === 'INTERNATIONAL'): ?><img src ="/images/nation/un.webp" style = "width: 2rem; height: 1rem; display: inline-flex;" alt="INT" />
											<?php elseif($users->firstWhere('id', Auth::id())->country === 'PHILIPPINES'): ?><img src ="/images/nation/ph.webp" style = "width: 2rem; height: 1rem; display: inline-flex;" alt="PH" />  
											<?php elseif($users->firstWhere('id', Auth::id())->country === 'MAUBAN'): ?><img src ="/images/nation/mn.webp" style = "width: 2rem; height: 1.5rem; display: inline-flex;" alt="MN" />  
											<?php endif; ?>
											&nbsp;<?php echo e($users->firstWhere('id', Auth::id())->region); ?>

										</td>
										<td><b><span x-text="showpuv == false ? 'PARKING' : 'TRAVEL MEAN' "></span></b></td>
										<td><b>ACCOMMODATION</b></td>
										<td><b>BOAT CLASSIFICATION</b></td>
										<td colspan="3"id="lastcol"><b>AMOUNT</b></td>
										
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td rowspan="3">
											<div class="sumimgparent">
												<label class="image-label">
													<img onerror="this.src='/images/parking/metropark3.jpg'" class = "sumimg" :src = "'images/parking/' + parkimg" />
													<div class="overlay18">
														<span class="overlay-text" x-text="park"></span>
													</div>
												</label>
											</div>
										</td>
										<td rowspan="3">
											<div class="sumimgparent">
												<label class="image-label">
													<img onerror="this.src='/images/bg_1.jpg'" class = "sumimg" :src = "'images/resort/thumbnail/' + accimg" />
													<div class="overlay18">
														<span class="overlay-text" x-text="oacc"></span>
													</div>
												</label>
												
											</div>
										</td>
										<td rowspan="3">
											<div class="sumimgparent">
												<label class="image-label">
													<img onerror="this.src='/images/boat/public2.jpg'" class = "sumimg" :src = "'images/boat/' + boatimg" />
													<div class="overlay18">
														<span class="overlay-text" x-text="boat"></span>
													</div>
												</label>					
											</div>
										</td>
										<td colspan="3" id="lastcol">₱<span x-text = "amount"></span></td>
										
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td id="lastcol">&nbsp;</td>
										<td>&nbsp;</td>
										<td> &nbsp;</td>
									</tr>
									<tr>
										<td>&nbsp;</td>		
										<td id="lastcol" colspan="3"><b>DISCOUNT</b></td>				
										
										
										
									</tr>
									<tr>
										<td></td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td id="lastcol" colspan="3">₱<span x-text = "discount"></span></td>				
										
										
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td><b>ARRIVAL DATE</b></td>
										<td><b>ITINERARY</b></td>
										<td><b>RETURN DATE</b></td>
										
										<td colspan="3" id="lastcol"></td>
										
										
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td x-text = "adate"></td>
										<td x-text = "itinerary"></td>
										<td x-text = "rdate"></td>
										
										<td colspan="3" id="lastcol"></td>
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td><b>PURPOSE OF VISIT</b></td>
										
										<td colspan = "3" rowspan = "6"> 
											<table class="table table-borderless text-center" id="tableguests">
												<thead id='thead'>
													<tr>
														<th scope="col" colspan="3">GUESTS</th>
													</tr>
												</thead>
												
												<tbody>
													<tr>
														<td></td>
														<td></td>
													</tr>
													<tr>
														<td id = "agetd">
															 
															
															<table id="tabledemonest">
																<tr>
																	<td>
																		<span class = "dbinfon" x-text="tzero7"></span>
																	</td>
																	<td>
																		<strong><img src ="/images/symbol/kid.png" id= "bookkid"/> 0-7 YEARS OLD</strong>
																	</td>
																	
																</tr>
															</table>
															
															
															
															 
														</td>
														<td id = "nattd">
															 
															
															<table id="tabledemonest">
																<tr>
																	<td>
																		<span class = "dbinfon" x-text="tforeigner"></span>
																	</td>
																	<td>
																		&nbsp;<strong><img src ="/images/nation/un.webp" id= "bookun" /> TOURIST </strong> 
																	</td>
																	
																</tr>
															</table>	
															
															
															
															 
														</td>
														
														
														
														
													</tr>
													<tr>
														<td id = "agetd">
															 
															
															<table id="tabledemonest">
																<tr>
																	<td>
																		<span class = "dbinfon" x-text="tthirth" id = "maturespan"></span>
																	</td>
																	<td>
																		&nbsp;&nbsp;<strong><img src ="/images/symbol/mature.png" id= "bookmature"/> 13-50 YEARS OLD </strong>
																	</td>
																	
																</tr>
															</table>	
															
															 
														</td>
														<td id = "nattd">
															 
															
															<table id="tabledemonest">
																<tr>
																	<td>
																		<span class = "dbinfon" x-text="tmaubanin"></span>
																	</td>
																	<td>
																		&nbsp;<strong><img src ="/images/nation/mn.webp" id= "bookmn"/> MAUBANINS </strong>
																	</td>
																	
																</tr>
															</table>	
															
															
															 
														</td>
														
														
														
														
													</tr>
													<tr>
														<td id = "agetd">
															 
															
															<table id="tabledemonest">
																<tr>
																	<td>
																		<span class = "dbinfon" x-text="t60"></span>
																	</td>
																	<td>
																		<strong><img src ="/images/symbol/old.png" id= "bookold"/> 60+ YEARS OLD </strong>
																	</td>
																	
																</tr>
															</table>
															
															 
														</td>
														<td id = "nattd">
															 
															
															<table id="tabledemonest">
																<tr>
																	<td>
																		<span class = "dbinfon" x-text="tfilipino"></span>
																	</td>
																	<td>
																		&nbsp;&nbsp;&nbsp;<strong><img src ="/images/nation/ph.webp" id= "bookph"/> NON-LOCAL </strong>
																	</td>
																	
																</tr>
															</table>	
															
															
															 
														</td>
														
														
													</tr>
													
													<tr>
														<td id = "agetd">
															 
															
															
															<table id="tabledemonest">
																<tr>
																	<td>
																		<span class = "dbinfon" x-text="tpriority" id ="spcspan"></span>
																	</td>
																	<td>
																		<strong><img src ="/images/symbol/spc.png" id= "bookspc"/> PRIORITY GUEST </strong>
																	</td>
																	
																</tr>
															</table>
															
															
															
															 
														</td>
														
														<td id = "tottd">
															 
															
															<table id="tabledemonest">
																<tr>
																	<td>
																		<span class = "dbinfon" x-text="tmale"></span>
																	</td>
																	<td>
																		&nbsp;&nbsp;&nbsp;<strong><i class="ion-ios-male" style="color: #000080;"></i> MALE </strong>
																	</td>
																	<td>
																		<span class = "dbinfont" x-text="tfemale"></span>
																	</td>
																	<td>
																		&nbsp;<strong><i class="ion-ios-female" style="color: #AA336A;"></i> FEMALE </strong>
																	</td>
																</tr>
																
															</table>	
															
															 
														</td>
													</tr>
													
													<tr>
														<td id = "tottd2" colspan="3">
															<table id="tabledemonesttot">
																<tr>
																	
																	<td>
																		<strong>TOTAL &nbsp;</strong>
																	</td>
																	<td>
																		<span class = "dbinfot" x-text="tvisitor"></span>&nbsp;<strong><span x-show="tvisitor > 1">GUESTS</span><span x-show="tvisitor == 1">GUEST</span></strong>
																	</td>
																	
																</tr>
															</table>
														</td>
													</tr>
													
													
													
												</tbody>
											</table>
										</td>
										<td  id="lastcol">&nbsp;</td>				
										<td>&nbsp;</td>				
										<td>&nbsp;</td>				
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td x-text = "opurpose"></td>
										<td  id="lastcol" colspan = "3"> <b>NET AMOUNT</b></td>
										
									</tr>
									<tr>
										<td>&nbsp;</td>		
										<td>&nbsp;</td>	
										
										<td colspan="3" id="lastcol">₱<span x-text = "namount"></span></td>
										
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td><b>TRAVEL MEANS</b></td>	
										
										
										<td colspan="3" id="lastcol"></td>
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td x-text ="tmeans"></td>
										<td id="lastcol">&nbsp;KINDLY</td>				
										<td>PAY</td>		
										<td>ETAF&nbsp;</td>	
									</tr>
									<tr>
										<td>&nbsp;</td>
										
										<td>&nbsp;</td>
										<td id="lastcol">AT</td>
										<td>FRONT&nbsp;</td>				
										<td>DESK&nbsp;</td>
									</tr>
								</tbody>
								
							</table>
						</div>
						
						
						<input type="hidden" name="amount" id="amt" :value = "amount" />
						
						<input type="hidden" name="discount" id="diss" :value = "discount" />
						
						<input type="hidden" name="namount" id="namt" :value = "namount" />
						<br>
						
						<button type="button" class="prev-btn">Previous</button>
						&nbsp;
						<button type="button" id="screenshotBtn" class="sav-btn" x-show="!inphone">Save</button>
						&nbsp;
						<button type="submit" class="sav-btn" id="submitBtn"

						@click="
						checkform();
						"
						@blur="
						checkform();
						"
						><span x-text="buttonText" id="submitTxt">Submit</span></button>
					</div>
				</form>
				
				
				
			</div>
		</div>
		<div class="slider-item" style="background-image:url(/images/promo/cagba6.webp);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row no-gutters slider-text align-items-center justify-content-center">
					<div class="col-md-12 ftco-animate text-center">
						<h1>Thanks for Booking</h1>
						<h2 id="successhead">BOOKING SUCCESS</h2>
						<h4 id="submittext">
							Thank you for your submission! We're pleased to confirm that your booking has been successfully received. You can easily modify your booking at any time through your <a href="<?php echo e(url('dashboard')); ?>" id="dashbtn">dashboard</a> if needed.
							<br><br>
							A friendly reminder: Please ensure that you arrive on time for your booking to help us provide you with the best possible experience. 
							<br><br>
							Should you have any questions or require further assistance, please don’t hesitate to reach out to us. We’re here to help and look forward to welcoming you!
						</h4>
						
						<br>
						<h4 style="color:white;"><i class= "ion-ios-mail"></i> maubanact@gmail.com &emsp;&emsp;&emsp; <i class= "ion-ios-phone-portrait"></i> +63-951-582-2030</h4>
						<br>
						<h2 id="successhead">BOOKING SUCCESS</h2>
						<br><br>
						<div class="row">
							<div class="col-6">
								<button type="button" class="sav-btn" @click="document.location.href = '<?php echo e(url('/')); ?>';">Home</button>
							</div>
							<div class="col-6">
								<button type="button" class="sav-btn" @click="document.location.href = '<?php echo e(Auth::user()->role_id == 979 ? route('admin.dashboard') : (Auth::user()->role_id == 797 ? route('owner.dashboard') : route('user.dashboard'))); ?>';">Dashboard</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="ftco-booking">
		<template x-if="forminprogress">
			<div class="container" id = "progcont">
				
				<div class="row" id = "progrow">
				<div class="col-lg-12" id ="progcol">
					
					<form action="#" class="booking-form" id="multi-step-form">
						<div class="progress px-1" style="height: 3px;">
							<div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
						
						<div class="row" id="cardotrow">
							
							<table class = "table table-borderless text-center" id = "tableact">
								<tr>
									<td>
										<button type="button" class="cardot" id = "cardot1" onclick="displayStep(1)"><i class="ion-md-hand"></i></button>
									</td>
									
									<td>
										<button type="button" class="cardot" id = "cardot2" onclick="displayStep(2)" :disabled = "nopark" ><i class="ion-ios-car"></i></button>
									</td>
									
									<td>
									<button type="button" class="cardot" id = "cardot3" onclick="displayStep(3)" :disabled = "noboat"><i class="ion-ios-boat"></i></button>
									</td>
									
									<td>
									<button type="button" class="cardot" id = "cardot4" onclick="displayStep(4)" :disabled = "noacc" ><i class="icon-beach_access"></i></button>
								</td>
								
								<td>
									<button type="button" class="cardot" id = "cardot5" onclick="displayStep(5)" :disabled = "noperson" ><i class="ion-ios-person"></i></button>
								
								</td>
								
								<td>
									<button type="button" class="cardot" id = "cardot6" onclick="displayStep(6)" :disabled = "nosum"
									@click = "
										
                                     etaf();
                                        											
										getitinerary();
										
												checkform();
											"
										@blur = "checkform();"
									>
									<i class="ion-ios-clipboard"></i>
								</button>
								</td>
							</tr>
					</table>
			
		</div>
		
	</form>
	
	</div>
	</div>
	
	</div>
	</template>
</section>
</div>
</div>

<?php /**PATH /home/u101594241/domains/maubantourism.com/public_html/resources/views/components/bookingformv2.blade.php ENDPATH**/ ?>