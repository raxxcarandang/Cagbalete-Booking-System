<div class = "row mt-2">
	<div class = "col-12 dashrow mr-2" 
	
	x-init = "
	sorter = 17;
	setTimeout(() => $dispatch('bookload'), 7000);
	">
		<h5 class="mt-2 mb-0 fw-bold">
			&nbsp;Overview
		</h5>
		
		<div class="row">
			<div class="col-12 col-md-6 ">
				<div class="card  border-0">
					<div class="card-body py-4">
						<h5 class="mb-2 fw-bold">
							Accommodation Overview
						</h5>
						<div id="accommodation_chart"></div>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-6 ">
				<div class="card  border-0">
					<div class="card-body py-4">
						<h5 class="mb-2 fw-bold">
							Booking Overview
						</h5>
						<div id="booking_chart"></div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>
