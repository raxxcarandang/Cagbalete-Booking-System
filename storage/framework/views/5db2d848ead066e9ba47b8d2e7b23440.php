<?php
use App\Models\Accommodation;

	$accommodations = collect();
			$allaccommodations = Accommodation::chunk(1000, function($getaccommodations) use ($accommodations) {
				foreach($getaccommodations as $getaccommodation) {
					$accommodations->push($getaccommodation);
				}
			});
			
?>
<section class="ftco-section bg-light" id="minroom"
    x-data="{
        accload() {
        this.loadacc = this.accommodations.slice((this.cpage-1) * this.perpage).slice(0, this.perpage);
		this.pages = this.accommodations.length;
		this.tpages = Math.ceil(this.pages / this.perpage);
		}
    }"
    >
	<div class="container">
		<div class="row justify-content-center mb-5 pb-3">
			<div class="col-md-7 heading-section text-center ftco-animate">
				<h2 class="mb-4">Accommodations</h2>
			</div>
		</div>    		
		<div class="row" 
		x-init="
		accommodations = <?php echo e($accommodations); ?>;
		
		function shuffle(array) {
		for (let i = array.length - 1; i > 0; i--) {
		const j = Math.floor(Math.random() * (i + 1));
		[array[i], array[j]] = [array[j], array[i]]; 
		}
		return array;
		}
		accommodations = shuffle(accommodations);
		
		accload();
		">
			
			<template x-for="accommodation in loadacc" :key="accommodation.id">
				<div class="col-sm col-md-6 col-lg-4" id="acccont" x-show="accommodation.name != 'Other'">
					<div class="room" id="acccontroom">
						<a :href="'<?php echo e(url('accommodation')); ?>?supplier=' + accommodation.id" class="img d-flex justify-content-center align-items-center" :style="'background-image: url(images/resort/thumbnail/' + accommodation.thumbnail ">
							<div class="icon d-flex justify-content-center align-items-center">
								<span class="icon-search2"></span>
							</div>
						</a>
						<div class="text p-3 text-center" id="accbooknow">
							<h3 class="mb-3" id="acctitle" style="min-height: 4rem;">
								<a :href="'<?php echo e(url('accommodation')); ?>?supplier=' + accommodation.id">
									<span x-text="accommodation.name"></span>
								</a>
							</h3>
							<ul class="list">
								<li><span>Type:</span> <span style="color:black;" x-text="accommodation.type"></span></li>
								<li><span>Lodging:</span> <span style="color:black;" x-text="accommodation.lodge"></span></li>
							</ul>
							<hr>
							<p class="pt-1">
								<a :href="'<?php echo e(url('booking')); ?>?booking=' + accommodation.id" class="btn-custom">
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
			document.getElementById('minroom').scrollIntoView({ behavior: 'smooth' });
			"
			>
				<span class="text-gray-700">First</span>
			</div>
			<div id = "pgbtn" class="border px-2 cursor-pointer" 
			@click = "if (cpage > 1) {
			cpage--;
			accload();
			document.getElementById('minroom').scrollIntoView({ behavior: 'smooth' });
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
				document.getElementById('minroom').scrollIntoView({ behavior: 'smooth' });
				}
				"
				>
					<span class="text-gray-700">></span>
				</div>
				<div id = "pgbtn" class="border px-2 cursor-pointer"
				@click = "cpage = tpages;
				accload();
				document.getElementById('minroom').scrollIntoView({ behavior: 'smooth' });
				"
				>
					<span class="text-gray-700">Last</span>
				</div>
				</div>
			</div>
			<span x-init="accload();"></span>
		</section>
		<?php /**PATH /home/u101594241/domains/maubantourism.com/public_html/resources/views/components/minroom.blade.php ENDPATH**/ ?>