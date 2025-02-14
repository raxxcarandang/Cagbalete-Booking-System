<?php
    use App\Models\Visit;
    use Illuminate\Support\Facades\Cookie;

    $cookieName = 'unique_visitor';
    $visit = Visit::find(1);

    if (!Cookie::has($cookieName)) {
        if ($visit) {
            $visit->totalwebvisitors += 1;
            $visit->save();
        }

        Cookie::queue($cookieName, true, 1440);
    }

    $visits = $visit ? $visit->totalwebvisitors : 0;
?>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	<div class="container">
		
		<a class="navbar-brand" href="<?php echo e(url('/')); ?>"> <img src="/images/promo/macto.webp" alt="Mauban Tourism" style="width: 3rem; height: 3rem; display: inline-flex; margin-right: 0.5rem;"/> MAUBAN TOURISM </a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
		</button>
		<div class="collapse navbar-collapse" id="ftco-nav">
			<?php if(Route::has('login')): ?>
	        <ul class="navbar-nav ml-auto"  
	        x-data="{
      guests: <?php echo e($visits); ?>,
      
      abbreviate(number) {
        if (number >= 1_000_000_000) {
          return (number / 1_000_000_000).toFixed(1) + 'B';
        } else if (number >= 1_000_000) {
          return (number / 1_000_000).toFixed(1) + 'M';
        } else if (number >= 1000) {
          return (number / 1000).toFixed(1) + 'K';
        }
        return number;
      }
    }">
	            
				<?php if(auth()->guard()->check()): ?>
				<li class="nav-item <?php echo e(Route::currentRouteName() == 'index' ? 'active' : ' '); ?>"><a href="<?php echo e(url('/')); ?>" class="nav-link">Home</a></li>
				<li class="nav-item  <?php echo e(Route::currentRouteName() == 'accommodation' ? 'active' : ' '); ?>"><a href="<?php echo e(url('/details')); ?>" class="nav-link">Accommodation</a></li>
				<li class="nav-item  <?php echo e(Route::currentRouteName() == 'bookingform' ? 'active' : ' '); ?>"><a href="<?php echo e(url('/booking')); ?>" class="nav-link">Booking</a></li>
				<li class="nav-item  <?php echo e(Route::currentRouteName() == 'about' ? 'active' : ' '); ?>"><a href="<?php echo e(url('/about')); ?>" class="nav-link">About</a></li>
                <li class="nav-item" :title="'Since 2025, Over ' + guests + ' Have Visited for the Cagbalete Experience – Book Now!'">
				     <span class="nav-link" x-html="abbreviate(guests) + ' <i class=\'ion-ios-people\'></i>'"></span>
                 </li>
				<li class="nav-item ">
					<div class="dropdown">
						<button class="btn btn-secondary dropdown-toggle" type="button" id="userdropdown" data-bs-toggle="dropdown" aria-expanded="false">
							<i class="ion-md-person"></i>
						</button>
						<ul class="dropdown-menu" aria-labelledby="userdropdown">
							<li><a href="<?php echo e(Auth::user()->role_id == 979 ? route('admin.dashboard') : (Auth::user()->role_id == 797 ? route('subadmin.dashboard') : route('user.dashboard'))); ?>" class="nav-link">Dashboard</a>
							</li>
							<li>
								<form method="POST" action="<?php echo e(route('logout')); ?>">
									<?php echo csrf_field(); ?>
									<a href="<?php echo e(route('logout')); ?>" class="nav-link" style="margin-top: 0.9rem;" 
									onclick="event.preventDefault();
									this.closest('form').submit();">Log Out</a>
								</form></li>
						</ul>
					</div>
				</li>
				<?php else: ?>
				<li class="nav-item <?php echo e(Route::currentRouteName() == 'index' ? 'active' : ' '); ?>"><a href="<?php echo e(url('/')); ?>" class="nav-link">Home</a></li>
				<li class="nav-item <?php echo e(Route::currentRouteName() == 'accommodation' ? 'active' : ' '); ?> "><a href="<?php echo e(url('/details')); ?>" class="nav-link">Accommodation</a></li>
				<li class="nav-item <?php echo e(Route::currentRouteName() == 'about' ? 'active' : ' '); ?>"><a href="<?php echo e(url('/about')); ?>" class="nav-link">About</a></li>
				<li class="nav-item"><a href="<?php echo e(route('login')); ?>" class="nav-link">Log in</a></li>
				<?php if(Route::has('register')): ?>
				<li class="nav-item"><a href="<?php echo e(route('register')); ?>" class="nav-link">Register</a></li>
				<li class="nav-item" :title="'Since 2025, Over ' + guests + ' Have Visited for the Cagbalete Experience – Book Now!'">
				     <span class="nav-link" x-html="abbreviate(guests) + ' <i class=\'ion-ios-people\'></i>'"></span>
                 </li>
				<!--
				
				<li class="nav-item"><a href="https://forms.gle/v2VPGkiipMyyMs527" class="nav-link">Survey</a></li>
				
				-->
				
				<?php endif; ?>
				<?php endif; ?>
				
			    
			</ul>
			<?php endif; ?>
		</div>
	</div>
	
</nav><?php /**PATH /home/u101594241/domains/maubantourism.com/public_html/resources/views/components/navbar.blade.php ENDPATH**/ ?>