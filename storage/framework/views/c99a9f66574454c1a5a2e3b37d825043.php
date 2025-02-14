
<section class="ftco-section" x-data="{
    stars: 0,
    booked: false,
}">
	<div class="container">
        <div class="row">
			<div class="col-lg-8">
				<div class="row">
					<div class="col-md-12 ftco-animate">
						
						<div class="single-slider owl-carousel">
							<?php if(count($images) === 0): ?>
							<div class="item">
								<div class="room-img" style="background-image: url(/images/noimg.webp); background-repeat: no-repeat; background-size: 100% 100%; background-position: 0rem center; "></div>
							</div>
							<?php else: ?>
							<?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
							
							<div class="item">
								<div class="room-img" style=" background-repeat: no-repeat; background-size: 100% 100%; background-position: 0rem center; background-image: url(/images/resort/<?php echo e('supplier' . $accommodation->first()->id . '/' . $image->name); ?>); "></div>
							</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php endif; ?>
							
						</div>
					</div>
					<div class="col-md-12 room-single mt-4 mb-5 ftco-animate">
						
						
						<p id = "justtext"><?php echo e($accommodation->first()->description); ?></p>
						
						<div class="d-md-flex mt-5 mb-5">
							<ul class="list">
								<li><span>Type:</span> <?php echo e($accommodation->first()->type); ?></li>
							</ul>
							<ul class="list ml-md-5">
								<li><span>Logdging:</span> <?php echo e($accommodation->first()->lodge); ?></li>
							</ul>
						</div>
					</div>
					
				</div>
			</div> <!-- .col-md-8 -->
			<div class="col-lg-4 sidebar ftco-animate">
				<div class="sidebar-box ftco-animate">
					<h3>Booking Inquiry</h3>
					<p>If you have any questions or need more details about <?php echo e($accommodation->first()->name); ?>, feel free to contact us:</p>
					<p id = "justtext"><strong>Contact Number<br></strong> <?php echo e($accommodation->first()->contactno); ?></p>
					<p id = "justtext"><strong>Address<br></strong> <?php echo e($accommodation->first()->address); ?></p>
					<p id="justtext" x-show="booked"><strong>Review</strong></p>


	<i x-show="booked" @click="stars = 1" 
   style="font-size: 3rem; margin-left: 1.5rem;" 
   :style="{ color: stars >= 1 ? 'gold' : 'gray' }" 
   :class="stars >= 1 ? 'icon-star' : 'icon-star-o'"></i>

<i x-show="booked" @click="stars = 2" 
   style="font-size: 3rem;" 
   :style="{ color: stars >= 2 ? 'gold' : 'gray' }" 
   :class="stars >= 2 ? 'icon-star' : 'icon-star-o'"></i>

<i x-show="booked" @click="stars = 3" 
   style="font-size: 3rem;" 
   :style="{ color: stars >= 3 ? 'gold' : 'gray' }" 
   :class="stars >= 3 ? 'icon-star' : 'icon-star-o'"></i>

<i x-show="booked" @click="stars = 4" 
   style="font-size: 3rem;" 
   :style="{ color: stars >= 4 ? 'gold' : 'gray' }" 
   :class="stars >= 4 ? 'icon-star' : 'icon-star-o'"></i>

<i x-show="booked" @click="stars = 5" 
   style="font-size: 3rem;" 
   :style="{ color: stars >= 5 ? 'gold' : 'gray' }" 
   :class="stars >= 5 ? 'icon-star' : 'icon-star-o'"></i>

			<button type="button" x-show="booked" class="form-control" id="booknowbtn">RATE</button>
							  

				
				<div class="sidebar-box">
					
						<div class="form-group">
							<span></span>
							<p id = "justtext"><strong>Ready for Cagbalete Island?</strong><br> Secure your booking now and experience Cagbalete paradise with <?php echo e($accommodation->first()->name); ?>.</p>
							<a href="<?php echo e(url('booking') . '?booking=' . $accommodation->first()->id); ?>">
								<button type="button" class="form-control" id="booknowbtn">BOOK NOW</button>
							</a>
						</div>
					
				</div>
			</div>
			
			
			
			
		</div>
	</div>
	</div>
</section>																																		<?php /**PATH /home/u101594241/domains/maubantourism.com/public_html/resources/views/components/srdetail.blade.php ENDPATH**/ ?>