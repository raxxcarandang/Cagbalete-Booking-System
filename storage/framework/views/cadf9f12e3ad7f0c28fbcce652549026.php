
<section class="home-slider owl-carousel">
	
	<div class="slider-item" style="background-image:url(/images/resort/header/bg_1.jpg);">
      	<div class="overlay"></div>
        <div class="container">
			<div class="row no-gutters slider-text align-items-center justify-content-center">
				<div class="col-md-12 ftco-animate text-center">
					<div class="text mb-5 pb-3">
						<h1 class="mb-3">Cagbalete Island</h1>
						<h2>Mauban's Paradise</h2>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<?php $__currentLoopData = $accommodationsliders->shuffle(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $accommodation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<?php if($accommodation->name == 'Other') {} else {
		echo '
			<div class="slider-item" style="background-image:url(/images/resort/header/'. $accommodation->slider .');">
      	<div class="overlay"></div>
        <div class="container">
			<div class="row no-gutters slider-text align-items-center justify-content-center">
				<div class="col-md-12 ftco-animate text-center">
					<div class="text mb-5 pb-3">
						<h1 class="mb-3">'. $accommodation->name .'</h1>
						<h2><a href="'.url("accommodation").'?supplier=' . $accommodation->id . '" id = "bookbtn">Book Now</a></h2>
					</div>
				</div>
			</div>
		</div>
	</div>
		';
	}
	?>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	
</section>

<?php /**PATH /home/u101594241/domains/maubantourism.com/public_html/resources/views/components/header.blade.php ENDPATH**/ ?>