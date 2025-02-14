<div class = "row mt-2">
	<div class = "col-12 dashrow mr-2" 
	style="display: flex; justify-content: center; align-items: center; min-height: 100%; flex-direction: column;"
	
	x-show = "currentBookings.length < 1"
	
	x-init = "
	sorter = 17;
	setTimeout(() => $dispatch('bookload'), 7000);
	">
		<h5 class="mt-2 mb-0 fw-bold">
			&nbsp;Booking Summary2
		</h5>
		
		<div class="home-slider owl-carousel">
			
			<div class="slider-item" style="background-image:url(/images/resort/header/bg_1.jpg);">
				<div class="overlay"></div>
				<div class="container">
					<div class="row no-gutters slider-text align-items-center justify-content-center">
						<div class="col-md-12 ftco-animate text-center">
							<div class="text mb-5 pb-3">
								<h1 class="mb-3">No Booking Yet?</h1>
								<h2><a href="{{url('booking')}}" id = "bookbtn">Book Now</a></h2>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			@foreach ($accommodationsliders->shuffle() as $accommodation)
			<?php if($accommodation->name == 'Other') {} else {
				echo '
				<div class="slider-item" style="background-image:url(/images/resort/header/'. $accommodation->slider .');">
				<div class="overlay"></div>
				<div class="container">
				<div class="row no-gutters slider-text align-items-center justify-content-center">
				<div class="col-md-12 ftco-animate text-center">
				<div class="text mb-5 pb-3">
				<h1 class="mb-3">'. $accommodation->name .'</h1>
				<h2><a href="'.url("booking").'?booking=' . $accommodation->id . '" id = "bookbtn">Book Now</a></h2>
				</div>
				</div>
				</div>
				</div>
				</div>
				';
			}
			?>
			@endforeach
			
		</div>
	</div>
</div>
