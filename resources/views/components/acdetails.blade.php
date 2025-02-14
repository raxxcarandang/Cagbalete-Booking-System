@php
use App\Models\Accommodation;

	$accommodations = collect();
			$allaccommodations = Accommodation::chunk(1000, function($getaccommodations) use ($accommodations) {
				foreach($getaccommodations as $getaccommodation) {
					$accommodations->push($getaccommodation);
				}
			});
			
@endphp
<section class="ftco-section bg-light" id = "acdetailsdiv"
    x-data="{
    accload() {
        if(this.beachsort) {
            this.bsort = this.accommodations.filter(ac => 
                ac.type.toLowerCase().includes('beach')
            ); 
        } else {
            this.bsort = this.accommodations;
        }

        if(this.campsort) {
            this.csort = this.bsort.filter(ac => 
                ac.type.toLowerCase().includes('camping')
            ); 
        } else {
            this.csort = this.bsort;
        }

        if(this.poolsort) {
            this.psort = this.csort.filter(ac => 
                ac.type.toLowerCase().includes('beach')
            ); 
        } else {
            this.psort = this.csort;
        }

        if(this.airsort) {
            this.asort = this.psort.filter(ac => 
                ac.lodge.toLowerCase().includes('ac')
            ); 
        } else {
            this.asort = this.psort;
        }

        if(this.hutsort) {
            this.hsort = this.asort.filter(ac => 
                ac.lodge.toLowerCase().includes('hut')
            ); 
        } else {
            this.hsort = this.asort;
        }

        if(this.poolsort) {
            this.psort = this.asort.filter(ac => 
                ac.type.toLowerCase().includes('pool')
            ); 
        } else {
            this.psort = this.hsort;
        }

        this.loadacc = this.psort.slice((this.cpage-1) * this.perpage).slice(0, this.perpage);
        this.pages = this.psort.length;
        this.tpages = Math.ceil(this.pages / this.perpage);
    },
}"

    >
	<div class="container">
		<div class="row">
	        <div class="col-lg-9">
				<div class="row" 
				x-init="
				accommodations = {{$accommodations}};
				
				function shuffle(array) {
				for (let i = array.length - 1; i > 0; i--) {
				const j = Math.floor(Math.random() * (i + 1));
				[array[i], array[j]] = [array[j], array[i]]; // Swap elements
				}
				return array;
				}
				accommodations = shuffle(accommodations);
				
				accload();
				"	>
					
					<template x-for="accommodation in loadacc" :key="accommodation.id">
						<div class="col-sm col-md-6 col-lg-4" id="acccont" x-show="accommodation.name != 'Other'">
							<div class="room" id="acccontroom">
								<a :href="'{{ url('accommodation') }}?supplier=' + accommodation.id" class="img d-flex justify-content-center align-items-center" :style="'background-image: url(images/resort/thumbnail/' + accommodation.thumbnail ">
									<div class="icon d-flex justify-content-center align-items-center">
										<span class="icon-search2"></span>
									</div>
								</a>
								<div class="text p-3 text-center" id="accbooknow">
									<h3 class="mb-3" id="acctitle" style="min-height: 6rem;">
										<a :href="'{{ url('accommodation') }}?supplier=' + accommodation.id">
											<span x-text="accommodation.name"></span>
										</a>
									</h3>
									<ul class="list">
										<li><span>Type:</span> <span style="color:black;" x-text="accommodation.type"></span></li>
										<li><span>Lodging:</span> <span style="color:black;" x-text="accommodation.lodge"></span></li>
									</ul>
									<hr>
									<p class="pt-1">
										<a :href="'{{ url('booking') }}?booking=' + accommodation.id" class="btn-custom">
											Book Now <span class="icon-long-arrow-right"></span>
										</a>
									</p>
								</div>
							</div>
						</div>
					</template>
					
				</div>
				<div class="flex mt-2 justify-center">
					<div id = "pgbtn" class="border px-2 cursor-pointer"
					@click = "cpage = 1;
					accload();
					document.getElementById('acdetailsdiv').scrollIntoView({ behavior: 'smooth' });
					"
					>
						<span class="text-gray-700">First</span>
					</div>
					<div id = "pgbtn" class="border px-2 cursor-pointer" 
					@click = "if (cpage > 1) {
					cpage--;
					accload();
					document.getElementById('acdetailsdiv').scrollIntoView({ behavior: 'smooth' });
					}"
					>
						<span class="text-gray-700"><</span>
						</div>
						<div class="flex content-end">
							&nbsp;Page&nbsp;<span x-text="cpage"></span>&nbsp;of&nbsp;<span class="text-gray-700" x-text="tpages"></span>&nbsp;
						</div>
						<div id = "pgbtn" class="border px-2 cursor-pointer" 
						@click = "if (cpage < tpages) {
						cpage++;
						accload();
						document.getElementById('acdetailsdiv').scrollIntoView({ behavior: 'smooth' });
						}
						"
						>
							<span class="text-gray-700">></span>
						</div>
						<div id = "pgbtn" class="border px-2 cursor-pointer"
						@click = "cpage = tpages;
						accload();
						document.getElementById('acdetailsdiv').scrollIntoView({ behavior: 'smooth' });
						"
						>
							<span class="text-gray-700">Last</span>
						</div>
						</div>
						<br><br>
					</div>
					<div class="col-lg-3 sidebar" x-init="accload();">
						
						<div class="sidebar-wrap bg-light ftco-animate">
							<!-- Add Search Panel -->
						
							
							<!-- Adjust to match Resort and lodging types -->
							<h3 class="heading mb-4">Amenity</h3>
							<form method="post" class="star-rating">
								<div class="form-check">
									<input type="checkbox" x-model="beachsort" @change="accload(); cpage = 1;" @click="accload(); cpage = 1; document.getElementById('acdetailsdiv').scrollIntoView({ behavior: 'smooth' });" @blur="accload(); cpage = 1;" class="form-check-input" id="checksort1">
									<label class="form-check-label" for="checksort1">
										<p class="rate"><span><i class="ion-ios-sunny"></i>Beach</span></p>
									</label>
								</div>
								<div class="form-check">
									<input type="checkbox" x-model="poolsort" @change="accload(); cpage = 1;" @click="accload(); cpage = 1; document.getElementById('acdetailsdiv').scrollIntoView({ behavior: 'smooth' });" @blur="accload(); cpage = 1;" class="form-check-input" id="checksort2">
									<label class="form-check-label" for="checksort2">
										<p class="rate"><span><i class="icon-pool"></i>Pool</span></p>
									</label>
								</div>
								<div class="form-check">
									<input type="checkbox" x-model="campsort" @change="accload(); cpage = 1;" @click="accload(); cpage = 1; document.getElementById('acdetailsdiv').scrollIntoView({ behavior: 'smooth' });" @blur="accload(); cpage = 1;" class="form-check-input" id="checksort3">
									<label class="form-check-label" for="checksort3">
										<p class="rate"><span><i class="icon-free-code-camp"></i>Camping</span></p>
									</label>
								</div>
								
							</form>
							
						</div>
						
						<div class="sidebar-wrap bg-light ftco-animate">
							<h3 class="heading mb-4">Lodging</h3>
							<form method="post" class="star-rating">
								<div class="form-check">
									<input type="checkbox" x-model="airsort" @change="accload(); cpage = 1; document.getElementById('acdetailsdiv').scrollIntoView({ behavior: 'smooth' });" @click="accload(); cpage = 1;" @blur="accload(); cpage = 1;" class="form-check-input" id="checksort4">
									<label class="form-check-label" for="checksort4">
										<p class="rate"><span><i class="ion-ios-snow"></i>Air Conditioned Room</span></p>
									</label>
								</div>
								<div class="form-check">
									<input type="checkbox" x-model="hutsort" @change="accload(); cpage = 1; document.getElementById('acdetailsdiv').scrollIntoView({ behavior: 'smooth' });" @click="accload(); cpage = 1;" @blur="accload(); cpage = 1;" class="form-check-input" id="checksort5">
									<label class="form-check-label" for="checksort5">
										<p class="rate"><span><i class="ion-ios-home"></i>Hut Cottages</span></p>
									</label>
								</div>
							</form>
								<button class="form-control" id="booknowbtn"
							    @click="
							    beachsort = false;
							    campsort = false;
							    poolsort = false;
							    airsort = false;
							    hutsort = false;
							    accload();
							    "
							>SHOW ALL</button>
						</div>
					</div>
				</div>
			</div>
		</section>																																															