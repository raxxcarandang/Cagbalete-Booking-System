<!DOCTYPE html>

<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
		
        <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
         <meta name="description" content="
Discover the best of Mauban, Quezon! Explore the stunning beauty of Cagbalete Island, home to serene beaches and top resorts like Aquazul Hotel and Resort, Dona Choleng Camping Resort, Rio del Sol Beach Resort, and Villa Cleofas. Relax at Mauban's finest coastal destinations, including Jovencio's Resort, MVT Sto. Niño Beach Resort, Nilandingan Cove Resort, and Villa Noe Beach Resort. Enjoy beachfront serenity at Villa Pilarosa, Tita Pinay Beach Resort, Aguho Playa Beach Resort, Tent Place, and Orlan Beach Resort. Plan your perfect island escape with crystal-clear waters, lush landscapes, and unforgettable experiences.">
		<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <title>Accommodations</title>
		
        <?php echo app('Illuminate\Foundation\Vite')(['resources/js/app.js']); ?>
		
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i" rel="stylesheet">
		
		
		
        <!-- Styles -->
        <style>
            
		</style>
		
	</head>
	
    <body>
		
		<?php if (isset($component)) { $__componentOriginala591787d01fe92c5706972626cdf7231 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala591787d01fe92c5706972626cdf7231 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.navbar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('navbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala591787d01fe92c5706972626cdf7231)): ?>
<?php $attributes = $__attributesOriginala591787d01fe92c5706972626cdf7231; ?>
<?php unset($__attributesOriginala591787d01fe92c5706972626cdf7231); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala591787d01fe92c5706972626cdf7231)): ?>
<?php $component = $__componentOriginala591787d01fe92c5706972626cdf7231; ?>
<?php unset($__componentOriginala591787d01fe92c5706972626cdf7231); ?>
<?php endif; ?>
		
		<?php if (isset($component)) { $__componentOriginald9bd3fc65f7262ad83b447620b5f4115 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald9bd3fc65f7262ad83b447620b5f4115 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.headsr','data' => ['accommodation' => $accommodation]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('headsr'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['accommodation' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($accommodation)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald9bd3fc65f7262ad83b447620b5f4115)): ?>
<?php $attributes = $__attributesOriginald9bd3fc65f7262ad83b447620b5f4115; ?>
<?php unset($__attributesOriginald9bd3fc65f7262ad83b447620b5f4115); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald9bd3fc65f7262ad83b447620b5f4115)): ?>
<?php $component = $__componentOriginald9bd3fc65f7262ad83b447620b5f4115; ?>
<?php unset($__componentOriginald9bd3fc65f7262ad83b447620b5f4115); ?>
<?php endif; ?>
		
		<?php if (isset($component)) { $__componentOriginal0e31b5eac16bb25e1d7d210913a4cc29 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0e31b5eac16bb25e1d7d210913a4cc29 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.srdetail','data' => ['accommodation' => $accommodation,'images' => $images]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('srdetail'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['accommodation' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($accommodation),'images' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($images)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0e31b5eac16bb25e1d7d210913a4cc29)): ?>
<?php $attributes = $__attributesOriginal0e31b5eac16bb25e1d7d210913a4cc29; ?>
<?php unset($__attributesOriginal0e31b5eac16bb25e1d7d210913a4cc29); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0e31b5eac16bb25e1d7d210913a4cc29)): ?>
<?php $component = $__componentOriginal0e31b5eac16bb25e1d7d210913a4cc29; ?>
<?php unset($__componentOriginal0e31b5eac16bb25e1d7d210913a4cc29); ?>
<?php endif; ?>
		
		<?php if (isset($component)) { $__componentOriginal6360d3e552867d1f7144d5ed6e53a75c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6360d3e552867d1f7144d5ed6e53a75c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.hinstapics','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('hinstapics'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6360d3e552867d1f7144d5ed6e53a75c)): ?>
<?php $attributes = $__attributesOriginal6360d3e552867d1f7144d5ed6e53a75c; ?>
<?php unset($__attributesOriginal6360d3e552867d1f7144d5ed6e53a75c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6360d3e552867d1f7144d5ed6e53a75c)): ?>
<?php $component = $__componentOriginal6360d3e552867d1f7144d5ed6e53a75c; ?>
<?php unset($__componentOriginal6360d3e552867d1f7144d5ed6e53a75c); ?>
<?php endif; ?>
		
		<?php if (isset($component)) { $__componentOriginal8a8716efb3c62a45938aca52e78e0322 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a8716efb3c62a45938aca52e78e0322 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.footer','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8a8716efb3c62a45938aca52e78e0322)): ?>
<?php $attributes = $__attributesOriginal8a8716efb3c62a45938aca52e78e0322; ?>
<?php unset($__attributesOriginal8a8716efb3c62a45938aca52e78e0322); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8a8716efb3c62a45938aca52e78e0322)): ?>
<?php $component = $__componentOriginal8a8716efb3c62a45938aca52e78e0322; ?>
<?php unset($__componentOriginal8a8716efb3c62a45938aca52e78e0322); ?>
<?php endif; ?>
		
		<?php if (isset($component)) { $__componentOriginald5d051f243b37508d39f8ce3d92a5684 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald5d051f243b37508d39f8ce3d92a5684 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.loader','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('loader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald5d051f243b37508d39f8ce3d92a5684)): ?>
<?php $attributes = $__attributesOriginald5d051f243b37508d39f8ce3d92a5684; ?>
<?php unset($__attributesOriginald5d051f243b37508d39f8ce3d92a5684); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald5d051f243b37508d39f8ce3d92a5684)): ?>
<?php $component = $__componentOriginald5d051f243b37508d39f8ce3d92a5684; ?>
<?php unset($__componentOriginald5d051f243b37508d39f8ce3d92a5684); ?>
<?php endif; ?>
		
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
		<script src="/js/jquery.timepicker.min.js"></script>
		<script src="/js/scrollax.min.js"></script>
		<script src="/js/main.js"></script>
		<script src="/js/alpine.validate.min.js"></script>
		
		<script>
			
		</script>
		
		
	</body>
	

</html>
<?php /**PATH /home/u101594241/domains/maubantourism.com/public_html/resources/views/supplier.blade.php ENDPATH**/ ?>