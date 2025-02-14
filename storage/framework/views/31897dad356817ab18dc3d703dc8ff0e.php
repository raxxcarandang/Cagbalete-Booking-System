<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
		
        <title>Mauban Tourism</title>
		
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_green.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/classic.min.css"/>
		
		<!-- Fonts 
			<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700" rel="stylesheet">
			<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i" rel="stylesheet">
		-->
		
        <!-- Scripts -->
        <?php echo app('Illuminate\Foundation\Vite')(['resources/js/app.js']); ?>
	
	</head>
    <body class="font-sans antialiased">
		<!-- Page Heading -->
		<?php if(isset($header)): ?>
		<header class="shadow">
			<div class="max-w-7xl mx-auto pl-3 pr-1 sm:pl-6 sm:pr-4 lg:pl-8 lg:pr-6" id = "apphead">
				<?php echo e($header); ?>

			</div>
		</header>
		<?php endif; ?>
		
		<?php echo e($slot); ?>

		
		<!-- Page Content -->
		
	</body>
	
    <script type="text/javascript">
		
	</script>
	
</html>
<?php /**PATH /home/u101594241/domains/maubantourism.com/public_html/resources/views/layouts/app.blade.php ENDPATH**/ ?>