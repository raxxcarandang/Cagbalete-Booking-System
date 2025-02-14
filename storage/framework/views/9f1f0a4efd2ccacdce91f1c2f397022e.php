<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
	<?php echo app('Illuminate\Foundation\Vite')(['resources/js/admin.js']); ?>
     <?php $__env->slot('header', null, []); ?> 
		
        <div class="container-xxl position-relative bg-white d-flex p-0">
			<div class="wrapper"
			x-data = "{
			advanced: false,
			searchTerm: '', 
			scolor: 'black',
			
			updmopen: false,
			crtmopen: false,
			
			bookid: '',
			users: {},
			accommodations: {},
			booking: {},
			bookings: {},
			images: {},
			
			showbook: false,
			hidebook: false,
			
			data: {},
			dtable: '',
			userbook: {},
			usbook: {},
			
			pgclass: '',
			
			stsicon: '',
			scolor: '',
			colors: '',
			
			
			opage: '',
			spage: '',
			itinerary: '',
			
			
			today: new Date().toISOString().split('T')[0], 
			tomorrow: new Date(new Date().setDate(new Date().getDate() + 1)).toISOString().split('T')[0], 
			selectedDate: '',
			
			formattedDate: '',
			dates: '',
			
			tpending: '',
			tarrived: '',
			trescheduled: '',
			tcancelled: '',
			tdelinquent: '',
			
			adate: '',
			rdate: '',
			
			stsgiven: '',
			
			bid: '',
			bsts: '',
			
			bname: '',
			id: '',
			client: '',
			
			resarea: '',
			resdnyarea: '',
			rescnlarea: '',
			remarea: '',
			rem: '',
			remarkarea: 'N/A',
			reason: '',
			
			arrivecolor: '',
			ids: '',
			selectedBookings: [],
			status: '',
			
			proof: '',
			proofname: '',
			
			report: '',
			reports: '',
			nocolor: false,
			
			showtallydetail: true,
			tallyicon: 'person',
			tallycolor: 'red',
			
			logCount: '',
			
			toggleBooking(id) {
			if (this.selectedBookings.includes(id)) {
			this.selectedBookings = this.selectedBookings.filter(bookId => bookId !== id);
			} else {
			this.selectedBookings.push(id);
			}
			},
			
			toggleSelectAll() {
			
			if (this.selectedBookings.length === this.filteredBookings.length) {
			this.selectedBookings = [];
			} else {
			
			this.selectedBookings = this.filteredBookings.map(booking => booking.id);
			}
			},
			getSelectedBookingsString() {
			return this.selectedBookings.join(', ');
			},
			allChecked() {
			
			return this.selectedBookings.length === this.filteredBookings.length;
			},
			
			resettable() {
			    sorter = 17;
				stssort = 6;
				contsort = 4;
				colorsort = '100';
				scolor = 'black';
				cpage = 1;
				itrsort = 7;
				document.getElementById('stsselect').selectedIndex = 0;
				document.getElementById('contselect').selectedIndex = 0;
				document.getElementById('itrselect').selectedIndex = 0;
				document.getElementById('colorselect').selectedIndex = 0;
				datesort = '';
				datesortend = '';
				searchTerm = '';
				
				selectedBookings = [];
			},
			
			
			}"
			>
				
				<div class="main" 
				x-data="bookingQuery()"
				x-init = "
				statsort =  <?php echo e(now()->addDay()->toDateString()); ?>;
				document.getElementById('btndash').setAttribute('style', 'color: #39B54A !important; border-left: 3px solid #3b7ddd !important;');

				">
                    <?php if (isset($component)) { $__componentOriginalf08e1e9a2f54f8de63a24639dbe74a3b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf08e1e9a2f54f8de63a24639dbe74a3b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.adminnavigation','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('adminnavigation'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf08e1e9a2f54f8de63a24639dbe74a3b)): ?>
<?php $attributes = $__attributesOriginalf08e1e9a2f54f8de63a24639dbe74a3b; ?>
<?php unset($__attributesOriginalf08e1e9a2f54f8de63a24639dbe74a3b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf08e1e9a2f54f8de63a24639dbe74a3b)): ?>
<?php $component = $__componentOriginalf08e1e9a2f54f8de63a24639dbe74a3b; ?>
<?php unset($__componentOriginalf08e1e9a2f54f8de63a24639dbe74a3b); ?>
<?php endif; ?>
                    
					<?php if (isset($component)) { $__componentOriginalf5aa7668090fe2b2f05f3b540ec0511a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf5aa7668090fe2b2f05f3b540ec0511a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.sbaradmin','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('sbaradmin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf5aa7668090fe2b2f05f3b540ec0511a)): ?>
<?php $attributes = $__attributesOriginalf5aa7668090fe2b2f05f3b540ec0511a; ?>
<?php unset($__attributesOriginalf5aa7668090fe2b2f05f3b540ec0511a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf5aa7668090fe2b2f05f3b540ec0511a)): ?>
<?php $component = $__componentOriginalf5aa7668090fe2b2f05f3b540ec0511a; ?>
<?php unset($__componentOriginalf5aa7668090fe2b2f05f3b540ec0511a); ?>
<?php endif; ?>
					
					<?php if (isset($component)) { $__componentOriginal960b84be72ea246851d006b4716d754a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal960b84be72ea246851d006b4716d754a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.toastcontainer','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('toastcontainer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal960b84be72ea246851d006b4716d754a)): ?>
<?php $attributes = $__attributesOriginal960b84be72ea246851d006b4716d754a; ?>
<?php unset($__attributesOriginal960b84be72ea246851d006b4716d754a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal960b84be72ea246851d006b4716d754a)): ?>
<?php $component = $__componentOriginal960b84be72ea246851d006b4716d754a; ?>
<?php unset($__componentOriginal960b84be72ea246851d006b4716d754a); ?>
<?php endif; ?>
					
					<?php if (isset($component)) { $__componentOriginal2444f52491403804f09b78001ed64159 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2444f52491403804f09b78001ed64159 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.createmodal','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('createmodal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2444f52491403804f09b78001ed64159)): ?>
<?php $attributes = $__attributesOriginal2444f52491403804f09b78001ed64159; ?>
<?php unset($__attributesOriginal2444f52491403804f09b78001ed64159); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2444f52491403804f09b78001ed64159)): ?>
<?php $component = $__componentOriginal2444f52491403804f09b78001ed64159; ?>
<?php unset($__componentOriginal2444f52491403804f09b78001ed64159); ?>
<?php endif; ?>
					
					<?php if (isset($component)) { $__componentOriginalcda7f618925695beb98ea1f8d9f0b0e1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcda7f618925695beb98ea1f8d9f0b0e1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.deletemodal','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('deletemodal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcda7f618925695beb98ea1f8d9f0b0e1)): ?>
<?php $attributes = $__attributesOriginalcda7f618925695beb98ea1f8d9f0b0e1; ?>
<?php unset($__attributesOriginalcda7f618925695beb98ea1f8d9f0b0e1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcda7f618925695beb98ea1f8d9f0b0e1)): ?>
<?php $component = $__componentOriginalcda7f618925695beb98ea1f8d9f0b0e1; ?>
<?php unset($__componentOriginalcda7f618925695beb98ea1f8d9f0b0e1); ?>
<?php endif; ?>
					
					<?php if (isset($component)) { $__componentOriginal1e95380df10658a7939d4b3e94e52cf1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1e95380df10658a7939d4b3e94e52cf1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.updatemodal','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('updatemodal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1e95380df10658a7939d4b3e94e52cf1)): ?>
<?php $attributes = $__attributesOriginal1e95380df10658a7939d4b3e94e52cf1; ?>
<?php unset($__attributesOriginal1e95380df10658a7939d4b3e94e52cf1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1e95380df10658a7939d4b3e94e52cf1)): ?>
<?php $component = $__componentOriginal1e95380df10658a7939d4b3e94e52cf1; ?>
<?php unset($__componentOriginal1e95380df10658a7939d4b3e94e52cf1); ?>
<?php endif; ?>
					
					<?php if (isset($component)) { $__componentOriginaldb7cdd91bd391c8dde8975098fce583b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldb7cdd91bd391c8dde8975098fce583b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.remarkmodal','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('remarkmodal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldb7cdd91bd391c8dde8975098fce583b)): ?>
<?php $attributes = $__attributesOriginaldb7cdd91bd391c8dde8975098fce583b; ?>
<?php unset($__attributesOriginaldb7cdd91bd391c8dde8975098fce583b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldb7cdd91bd391c8dde8975098fce583b)): ?>
<?php $component = $__componentOriginaldb7cdd91bd391c8dde8975098fce583b; ?>
<?php unset($__componentOriginaldb7cdd91bd391c8dde8975098fce583b); ?>
<?php endif; ?>
					
					<?php if (isset($component)) { $__componentOriginal45eb6acad0b263c7ead60180b4d8dc42 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal45eb6acad0b263c7ead60180b4d8dc42 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.reschedmodal','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('reschedmodal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal45eb6acad0b263c7ead60180b4d8dc42)): ?>
<?php $attributes = $__attributesOriginal45eb6acad0b263c7ead60180b4d8dc42; ?>
<?php unset($__attributesOriginal45eb6acad0b263c7ead60180b4d8dc42); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal45eb6acad0b263c7ead60180b4d8dc42)): ?>
<?php $component = $__componentOriginal45eb6acad0b263c7ead60180b4d8dc42; ?>
<?php unset($__componentOriginal45eb6acad0b263c7ead60180b4d8dc42); ?>
<?php endif; ?>
					
					<?php if (isset($component)) { $__componentOriginald7836fbe07eabe309dbe3adfac7007f0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald7836fbe07eabe309dbe3adfac7007f0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admincancelmodal','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admincancelmodal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald7836fbe07eabe309dbe3adfac7007f0)): ?>
<?php $attributes = $__attributesOriginald7836fbe07eabe309dbe3adfac7007f0; ?>
<?php unset($__attributesOriginald7836fbe07eabe309dbe3adfac7007f0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald7836fbe07eabe309dbe3adfac7007f0)): ?>
<?php $component = $__componentOriginald7836fbe07eabe309dbe3adfac7007f0; ?>
<?php unset($__componentOriginald7836fbe07eabe309dbe3adfac7007f0); ?>
<?php endif; ?>
					
					<?php if (isset($component)) { $__componentOriginalc4003f0209b19e7fa1466385cc0739c6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc4003f0209b19e7fa1466385cc0739c6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.batchmodal','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('batchmodal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc4003f0209b19e7fa1466385cc0739c6)): ?>
<?php $attributes = $__attributesOriginalc4003f0209b19e7fa1466385cc0739c6; ?>
<?php unset($__attributesOriginalc4003f0209b19e7fa1466385cc0739c6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc4003f0209b19e7fa1466385cc0739c6)): ?>
<?php $component = $__componentOriginalc4003f0209b19e7fa1466385cc0739c6; ?>
<?php unset($__componentOriginalc4003f0209b19e7fa1466385cc0739c6); ?>
<?php endif; ?>
					
					<?php if (isset($component)) { $__componentOriginald60c480c03beff211445bf16c995db8f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald60c480c03beff211445bf16c995db8f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.proofmodal','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('proofmodal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald60c480c03beff211445bf16c995db8f)): ?>
<?php $attributes = $__attributesOriginald60c480c03beff211445bf16c995db8f; ?>
<?php unset($__attributesOriginald60c480c03beff211445bf16c995db8f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald60c480c03beff211445bf16c995db8f)): ?>
<?php $component = $__componentOriginald60c480c03beff211445bf16c995db8f; ?>
<?php unset($__componentOriginald60c480c03beff211445bf16c995db8f); ?>
<?php endif; ?>
					
					<?php if (isset($component)) { $__componentOriginal3f4fac212687faf1f0e341d088696fa9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3f4fac212687faf1f0e341d088696fa9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.exportmodal','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('exportmodal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3f4fac212687faf1f0e341d088696fa9)): ?>
<?php $attributes = $__attributesOriginal3f4fac212687faf1f0e341d088696fa9; ?>
<?php unset($__attributesOriginal3f4fac212687faf1f0e341d088696fa9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3f4fac212687faf1f0e341d088696fa9)): ?>
<?php $component = $__componentOriginal3f4fac212687faf1f0e341d088696fa9; ?>
<?php unset($__componentOriginal3f4fac212687faf1f0e341d088696fa9); ?>
<?php endif; ?>
					
					<div class="container-fluid pt-2 px-2">
						<div class="row mt-1">
							<div class = "col-12 col-sm-12 col-md-12 col-xl-6 dashrowch">
								<?php if (isset($component)) { $__componentOriginal9b9c254dbccbd1f2a3b60601b9dc3033 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9b9c254dbccbd1f2a3b60601b9dc3033 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.bookquota','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('bookquota'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9b9c254dbccbd1f2a3b60601b9dc3033)): ?>
<?php $attributes = $__attributesOriginal9b9c254dbccbd1f2a3b60601b9dc3033; ?>
<?php unset($__attributesOriginal9b9c254dbccbd1f2a3b60601b9dc3033); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9b9c254dbccbd1f2a3b60601b9dc3033)): ?>
<?php $component = $__componentOriginal9b9c254dbccbd1f2a3b60601b9dc3033; ?>
<?php unset($__componentOriginal9b9c254dbccbd1f2a3b60601b9dc3033); ?>
<?php endif; ?>
							</div>
							<div class = "col-12 col-sm-12 col-md-12 col-xl-6 dashrowch">
								<?php if (isset($component)) { $__componentOriginalb616940e8c10ff7765686f663df984ca = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb616940e8c10ff7765686f663df984ca = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.bookingforecast','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('bookingforecast'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb616940e8c10ff7765686f663df984ca)): ?>
<?php $attributes = $__attributesOriginalb616940e8c10ff7765686f663df984ca; ?>
<?php unset($__attributesOriginalb616940e8c10ff7765686f663df984ca); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb616940e8c10ff7765686f663df984ca)): ?>
<?php $component = $__componentOriginalb616940e8c10ff7765686f663df984ca; ?>
<?php unset($__componentOriginalb616940e8c10ff7765686f663df984ca); ?>
<?php endif; ?>
							</div>
						</div>
					</div>
					<div class="container-fluid pt-2 px-2">
						<div class="row mt-1">
							<?php if (isset($component)) { $__componentOriginal4a9438d84d48d5c3a83ea6db7528847b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4a9438d84d48d5c3a83ea6db7528847b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.bookingtable','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('bookingtable'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4a9438d84d48d5c3a83ea6db7528847b)): ?>
<?php $attributes = $__attributesOriginal4a9438d84d48d5c3a83ea6db7528847b; ?>
<?php unset($__attributesOriginal4a9438d84d48d5c3a83ea6db7528847b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4a9438d84d48d5c3a83ea6db7528847b)): ?>
<?php $component = $__componentOriginal4a9438d84d48d5c3a83ea6db7528847b; ?>
<?php unset($__componentOriginal4a9438d84d48d5c3a83ea6db7528847b); ?>
<?php endif; ?>
						</div>
					</div>
					<span style="opacity:0;"
					x-init="$nextTick(() => { fetchBookings(); logcount = unreadActivitiesCount + unreadNotificationsCount;; });"
					></span>
				</div>
			</div>
		</div>
		
	 <?php $__env->endSlot(); ?>
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
<script src="/js/scrollax.min.js"></script>
<script src="/js/main.js"></script>
<script src="/js/alpine.validate.min.js"></script>
<script src="/js/sbar.js"></script>
<script src="/js/toastmsg.js"></script>
<script src="/js/chart.js"></script>
<script src="/js/spectrum.js"></script>
<script>

  window.addEventListener('pageshow', function(event) {
        if (event.persisted) {
            window.location.reload();
        }
    });


$("#colorselector").spectrum({
    showPaletteOnly: true,
    color: 'green',
    palette: [
        ['red', 'orange', 'gold', 'green', 'blue'],
        ['indigo', 'violet', 'purple', 'pink', 'lime'],
        ['aqua', 'fuchsia', 'turquoise', 'coral', 'maroon']
    ]
});

$("#colorselector2").spectrum({
    showPaletteOnly: true,
    color: 'green',
    palette: [
        ['red', 'orange', 'gold', 'green', 'blue'],
        ['indigo', 'violet', 'purple', 'pink', 'lime'],
        ['aqua', 'fuchsia', 'turquoise', 'coral', 'maroon']
    ]
});



//Main Booking & User Data Retrieval Fetch Api
function bookingQuery() {
return {
filteredBookings: [], 
dcolor: [],
unreadNotifications: [],
unreadActivities: [],
unreadNotificationsCount: [],
unreadActivitiesCount: [],
accommodations: [],
pendings: [],
arrivals: [],
tarrivals: 0,
totalBookings: 0,
fullBookings: 0,
displayedamount: 0,
totalamount: 0,
projectedamount: 0,
seenPages: 0,
totalPages: 0,         
currentPage: 1,        
searchTerm: '',        
perpage: 3,           
cpage: 1, 
bookpendcount: 0,
itrsort: 7,
stssort: 6,
contsort: 4,
sorter: 17,
colorsort: '',
datesort: '',
datesortend: '',
statsort: '2016',

fetchBookings() {



let url = "<?php echo e(route('bookingquery')); ?>?" +
`itrsort=${this.itrsort}` +
`&stssort=${this.stssort}` +
`&contsort=${this.contsort}` +
`&sorter=${this.sorter}` +
`&colorsort=${this.colorsort}` +
`&statsort=${this.statsort}` +
`&datesort=${this.datesort}` +
`&datesortend=${this.datesortend}` +
`&searchTerm=${this.searchTerm}` +
`&perpage=${this.perpage}` +
`&cpage=${this.cpage}`;

fetch(url, {
method: 'GET', 
headers: {
'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',  
'Content-Type': 'application/json', 
},
})
.then(response => response.json())
.then(data => {
this.filteredBookings = data.filteredBookings;
this.dcolor = data.dcolor;
this.totalPages = data.totalPages;
this.currentPage = data.currentPage;
this.unreadActivities = data.unreadActivities;
this.unreadNotifications = data.unreadNotifications;
this.unreadActivitiesCount = data.unreadActivitiesCount;
this.unreadNotificationsCount = data.unreadNotificationsCount;
this.accommodations = data.accommodations;
this.pendings = data.pendings;
this.arrivals = data.arrivals;
this.tarrivals = data.tarrivals;
this.bookpendcount = data.bookpendcount;
this.totalBookings = data.totalBookings;
this.fullBookings = data.fullBookings;
this.totalamount = data.totalamount;
this.projectedamount = data.projectedamount;
this.displayedamount = data.displayedamount;
this.seenPages = data.seenPages;
})
.catch(error => {
console.error("Error fetching bookings:", error);
alert("An error occurred while fetching the bookings.  Please try refreshing the page.");
});
},
};
}
//Main Booking & User Data Retrieval Fetch Api

function getAcronym(name) {
return name
.split(' ') 
.map(word => word.replace(/[()]/g, '').charAt(0).toUpperCase()) 
.join(''); 
}

document.addEventListener('alpine:init', () => {

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

$('#updcancel').click(function () {
document.getElementById('reschedbook').reset();
});

$('#createcancel').click(function () {
document.getElementById('createbook').reset();
});

$('#updatebook').on('submit', function(event) {
event.preventDefault();

var submitButton = $('#updbtn'); 
submitButton.prop('disabled', true).text('UPDATING...');

$.ajax({
url:"<?php echo e(route('updatebook')); ?>",
data:$('#updatebook').serialize(),
type:"post",



success:function(result){
document.getElementById('chartfresh').click();
showToast("Booking Updated", "Booking # " + document.getElementById('bookidin').value + " Updated Successfully", "success");

submitButton.prop('disabled', false).text('UPDATE'); 
$('#updcancel').click();

},

error: function(data){
var errors = data.responseJSON;
submitButton.prop('disabled', false).text('UPDATE'); 
showToast("Update Failed", "Booking # " + document.getElementById('bookidin').value + " Update Failed", "danger");

console.log(errors);
}


}).always(function() {
document.getElementById('chartfresh').click();
this.fetchBookings();
});
});

$('#reschedbook').on('submit', function(event) {
event.preventDefault();

var submitButton = $('#reschedbtn'); 
submitButton.prop('disabled', true).text('RESCHEDULING...');

$.ajax({
url:"<?php echo e(route('reschedbooking')); ?>",
data:$('#reschedbook').serialize(),
type:"post",



success:function(result){
document.getElementById('chartfresh').click();
showToast("Booking Rescheduled", "Booking # " + document.getElementById('bookidin').value + " Rescheduled Successfully", "success");

submitButton.prop('disabled', false).text('RESCHEDULE'); 
$('#reschedcancel').click();

},

error: function(data){
var errors = data.responseJSON;
submitButton.prop('disabled', false).text('RESCHEDULE'); 
showToast("Update Failed", "Booking # " + document.getElementById('bookidin').value + " Update Failed", "danger");

console.log(errors);
}


}).always(function() {

this.fetchBookings();
});
});

$('#createbook').on('submit', function(event) {
event.preventDefault();

var submitButton = $('#createbtn'); 
submitButton.prop('disabled', true).text('CREATING...');
$.ajax({
url:"<?php echo e(route('adminbook')); ?>",
data:$('#createbook').serialize(),
type:"post",



success:function(result){
document.getElementById('chartfresh').click();
showToast("Booking Created", "User # " + document.getElementById('userbookid').value + "'s Booking Inserted Successfully", "success");
submitButton.prop('disabled', false).text('CREATE'); 
$('#createcancel').click();
$('#createbook')[0].reset();
},

error: function(data){
var errors = data.responseJSON;
submitButton.prop('disabled', false).text('CREATE'); 
showToast("Booking Failed", "User # " + document.getElementById('userbookid').value + "'s Booking Failed", "danger");

console.log(errors);
}

}).always(function() {

this.fetchBookings();
});
});


Alpine.data('activityNotificationComponent', () => ({
markActivityAsRead(id) {
event.preventDefault();
let form = this.$refs['activityReadForm' + id]; 
if (form) {
this.submitForm(form, 'activity', id);

}
},
markNotificationAsRead(id) {
event.preventDefault();
let form = this.$refs['notificationReadForm' + id]; 
if (form) {
this.submitForm(form, 'notification', id);

}
},
async submitForm(form, type, id) {
try {
event.preventDefault(); 
const formData = new FormData(form);
const response = await fetch(form.action, {
method: 'POST',
body: formData,
});

if (!response.ok) {
throw new Error('Failed to mark as read');
}

if (type === 'activity') {
this.unreadActivities--;
} else if (type === 'notification') {
this.unreadNotifications--;
}

} catch (error) {
console.error(error);
alert('An error occurred while marking as read.');
}
},
formatDate(dateString) {
const date = new Date(dateString);
return date.toLocaleString(); 
}
}));


});

// Booking Delete Fetch API Submission
function deletebook() {
return {
formData: new FormData(),
formMessage: "",
formLoading: false,
buttonText: "DELETE",
id: "",
reason: "",
deleted: "",
client: "",

deleteData() {
this.formData.append('_token', "<?php echo e(csrf_token()); ?>");
this.formData.append('id', this.bookid);
this.formData.append('reason', this.reason);
this.client = document.getElementById('clientin').value;

this.formMessage = "";
this.formLoading = true;
document.getElementById('delbtn').disabled = true;
this.buttonText = "DELETING...";
document.getElementById('deltxt').innerHTML = "DELETING...";

fetch("<?php echo e(route('deletebooking')); ?>", {
method: "POST",
body: this.formData,
})
.then(response => {
console.log(response); 

/*
if (!response.ok) {
const contentType = response.headers.get("content-type");
return response.text().then(text => {
console.log("Response text:", text); 

if (contentType && contentType.includes("application/json")) {

try {
const errorResponse = JSON.parse(text);
const message = errorResponse.message || "An error occurred.";
throw new Error(message);
} catch (e) {
console.warn("Ignoring JSON parse error:", e);
throw new Error("Received error response: " + text);
}
} else {

const newWindow = window.open();
newWindow.document.write(text);
newWindow.document.close();
throw new Error("Unexpected server response. Please check the new window for details.");
}
});
}
*/

return response.json().catch(() => {

return Promise.resolve({}); 
});
})
.then(data => {
document.getElementById('chartfresh').click();
this.formMessage = "Booking deleted successfully!";
showToast("Booking Deleted", this.client + "'s Booking # " + this.bookid  + "<br> Deleted Successfully", "success");
document.getElementById('delcancel').click();
})
.catch(error => {
this.formMessage = `Error: ${error.message}`;
showToast("Delete Failed", this.client + "'s Booking # " + this.bookid  + "<br> Delete Failed", "danger");
})
.finally(() => { 
this.fetchBookings();
this.formLoading = false;
document.getElementById('delbtn').disabled = false;
this.buttonText = "DELETE";
document.getElementById('deltxt').innerHTML = "DELETE";
document.getElementById('resarea').reset();
});
}
};
}
// end of Booking Delete Fetch API

// Booking Remark Fetch API Submission
function rembook() {
return {
formData: new FormData(),
formMessage: "",
formLoading: false,
buttonText: "REMARK",
id: "",
remark: "",
status: "",
client: "",

remarkData() {
this.formData.append('_token', "<?php echo e(csrf_token()); ?>");
this.formData.append('id', this.bookid);
this.formData.append('remark', this.remark);
this.formData.append('status', document.getElementById('statusipt').value);
this.client = document.getElementById('clientin').value;

this.formMessage = "";
this.formLoading = true;
document.getElementById('rembtn').disabled = true;
this.buttonText = "REMARKING...";
document.getElementById('remtxt').innerHTML = "REMARKING...";

fetch("<?php echo e(route('remarkbooking')); ?>", {
method: "POST",
body: this.formData,
})
.then(response => {
console.log(response); 

/*
if (!response.ok) {
const contentType = response.headers.get("content-type");
return response.text().then(text => {
console.log("Response text:", text); 

if (contentType && contentType.includes("application/json")) {

try {
const errorResponse = JSON.parse(text);
const message = errorResponse.message || "An error occurred.";
throw new Error(message);
} catch (e) {
console.warn("Ignoring JSON parse error:", e);
throw new Error("Received error response: " + text);
}
} else {

const newWindow = window.open();
newWindow.document.write(text);
newWindow.document.close();
throw new Error("Unexpected server response. Please check the new window for details.");
}
});
}
*/

return response.json().catch(() => {

return Promise.resolve({}); 
});
})
.then(data => {
document.getElementById('chartfresh').click();						
this.formMessage = "Booking remarked successfully!";
showToast("Booking Remarked", this.client + "'s Booking # " + this.bookid  + "<br> Remarked Successfully", "success");
document.getElementById('remcancel').click();
})
.catch(error => {
this.formMessage = `Error: ${error.message}`;
showToast("Remarking Failure", this.client + "'s Booking # " + this.bookid  + "<br> Remarked Failed", "danger");
})
.finally(() => { 
this.fetchBookings();
this.formLoading = false;
document.getElementById('rembtn').disabled = false;
this.buttonText = "REMARK";
document.getElementById('remtxt').innerHTML = "REMARK";
this.remark = '';

});
}
};
}

// Booking Remark Fetch API Submission
function exportbook() {
return {
formData: new FormData(),
formMessage: "",
formLoading: false,
buttonText: "EXPORT",
reportdate: "",


exportData() {
this.formData.append('_token', "<?php echo e(csrf_token()); ?>");
this.formData.append('id', this.bookid);
this.formData.append('reportdate', this.reportdate);


this.formMessage = "";
this.formLoading = true;
document.getElementById('expbtn').disabled = true;
this.buttonText = "EXPORTING...";
document.getElementById('exptxt').innerHTML = "EXPORTING...";

fetch("<?php echo e(route('exportbooking')); ?>", {
method: "POST",
body: this.formData,
})
.then(response => {
console.log(response); 

/*
if (!response.ok) {
const contentType = response.headers.get("content-type");
return response.text().then(text => {
console.log("Response text:", text); 

if (contentType && contentType.includes("application/json")) {

try {
const errorResponse = JSON.parse(text);
const message = errorResponse.message || "An error occurred.";
throw new Error(message);
} catch (e) {
console.warn("Ignoring JSON parse error:", e);
throw new Error("Received error response: " + text);
}
} else {

const newWindow = window.open();
newWindow.document.write(text);
newWindow.document.close();
throw new Error("Unexpected server response. Please check the new window for details.");
}
});
}
*/

return response.json().catch(() => {

return Promise.resolve({}); 
});
})
.then(data => {					
this.formMessage = "Booking exported successfully!";
showToast("Booking Data Exported", "Booking Data Exported Successfully", "success");
document.getElementById('expcancel').click();
})
.catch(error => {
this.formMessage = `Error: ${error.message}`;
showToast("Export Failure", "Booking Data Export Failed", "danger");
})
.finally(() => { 
this.fetchBookings();
this.formLoading = false;
document.getElementById('expbtn').disabled = false;
this.buttonText = "EXPORT";					
});
}
};
}

// Booking Batch Fetch API Submission
function batchbook() {
return {
formData: new FormData(),
formMessage: "",
formLoading: false,
buttonText: "PROCEED",
remark: "",
status: "",
idbatch: "",
color: "",
arrival: "",
departure: "",
itinerary: "",

batchData() {
this.formData.append('_token', "<?php echo e(csrf_token()); ?>");
this.formData.append('remark', this.remarkarea);
this.formData.append('status', this.status);
this.formData.append('color', this.arrivecolor);
this.formData.append('idarray', document.getElementById('idarray').value);
this.formData.append('arrival', this.adate);
this.formData.append('departure', this.rdate);
this.formData.append('itinerary', this.itinerary);
this.client = document.getElementById('clientin').value;

this.formMessage = "";
this.formLoading = true;
document.getElementById('batchbtn').disabled = true;
this.buttonText = "PROCESSING...";
document.getElementById('batchtxt').innerHTML = "PROCESSING...";

fetch("<?php echo e(route('batchstatus')); ?>", {
method: "POST",
body: this.formData,
})
.then(response => {
console.log(response); 

/*
if (!response.ok) {
const contentType = response.headers.get("content-type");
return response.text().then(text => {
console.log("Response text:", text); 

if (contentType && contentType.includes("application/json")) {

try {
const errorResponse = JSON.parse(text);
const message = errorResponse.message || "An error occurred.";
throw new Error(message);
} catch (e) {
console.warn("Ignoring JSON parse error:", e);
throw new Error("Received error response: " + text);
}
} else {

const newWindow = window.open();
newWindow.document.write(text);
newWindow.document.close();
throw new Error("Unexpected server response. Please check the new window for details.");
}
});
}
*/

return response.json().catch(() => {

return Promise.resolve({}); 
});
})
.then(data => {
document.getElementById('chartfresh').click();
this.selectedBookings = [];
this.formMessage = "Booking Operation successful!";
showToast("Booking Operation", "Bookings" + this.idbatch  + "<br> Operation Successful", "success");
document.getElementById('batchcancel').click();
})
.catch(error => {
this.formMessage = `Error: ${error.message}`;
showToast("Operation Failure", "Bookings " + this.idbatch  + "<br> Operation Failed", "danger");
})
.finally(() => { 
this.fetchBookings();
this.formLoading = false;
document.getElementById('batchbtn').disabled = false;
this.buttonText = "PROCEED";
document.getElementById('batchtxt').innerHTML = "PROCEED";

});
}
};
}
// end of Booking Remark Fetch API



// Booking Delete Fetch API Submission
function cancelbook() {
return {
formData: new FormData(),
formMessage: "",
formLoading: false,
buttonText: "YES",
id: "",
remark: "",
deleted: "",
client: "",

cancelData() {
this.formData.append('_token', "<?php echo e(csrf_token()); ?>");
this.formData.append('id', this.bookid);
this.formData.append('remark', this.remark);
this.client = document.getElementById('clientin').value;

this.formMessage = "";
this.formLoading = true;
document.getElementById('cnlbtn').disabled = true;
this.buttonText = "PROCESSING...";
document.getElementById('cnltxt').innerHTML = "PROCESSING...";

fetch("<?php echo e(route('admincancelbooking')); ?>", {
method: "POST",
body: this.formData,
})
.then(response => {
console.log(response); 

/*
if (!response.ok) {
const contentType = response.headers.get("content-type");
return response.text().then(text => {
console.log("Response text:", text); 

if (contentType && contentType.includes("application/json")) {

try {
const errorResponse = JSON.parse(text);
const message = errorResponse.message || "An error occurred.";
throw new Error(message);
} catch (e) {
console.warn("Ignoring JSON parse error:", e);
throw new Error("Received error response: " + text);
}
} else {

const newWindow = window.open();
newWindow.document.write(text);
newWindow.document.close();
throw new Error("Unexpected server response. Please check the new window for details.");
}
});
}
*/

return response.json().catch(() => {

return Promise.resolve({}); 
});
})
.then(data => {
document.getElementById('chartfresh').click();
this.formMessage = "Booking cancelled successfully!";
showToast("Booking Cancelled", this.client + "'s Booking # " + this.bookid  + "<br> Cancelled Successfully", "success");
document.getElementById('cnlnobtn').click();
})
.catch(error => {
this.formMessage = `Error: ${error.message}`;
showToast("Cancel Failed", this.client + "'s Booking # " + this.bookid  + "<br> Cancel Failed", "danger");
})
.finally(() => { 
this.fetchBookings();
this.formLoading = false;
document.getElementById('cnlbtn').disabled = false;
this.buttonText = "YES";
document.getElementById('cnltxt').innerHTML = "YES";
document.getElementById('rescnlarea').value='';
});
}
};
}
// end of Booking Delete Fetch API

//Function for submitting the POST method to update status of booking
function statusform() {
return {
formData: {
_token: "<?php echo e(csrf_token()); ?>",
id: "",
status: "",
client: "",
color: "",
},
formMessage: "",
formLoading: false,
buttonText: "Submit",
submitData() {
this.formMessage = "";
this.formLoading = false;
this.buttonText = "Submitting...";
fetch("<?php echo e(route('bookingstatus')); ?>", {
method: "POST",
headers: {
"Content-Type": "application/json",
Accept: "application/json",
}, body: JSON.stringify(this.formData),})
.then(response => {
console.log(response); 

/*
if (!response.ok) {
const contentType = response.headers.get("content-type");
return response.text().then(text => {
console.log("Response text:", text); 

if (contentType && contentType.includes("application/json")) {

try {
const errorResponse = JSON.parse(text);
const message = errorResponse.message || "An error occurred.";
throw new Error(message);
} catch (e) {
console.warn("Ignoring JSON parse error:", e);
throw new Error("Received error response: " + text);
}
} else {

const newWindow = window.open();
newWindow.document.write(text);
newWindow.document.close();
throw new Error("Unexpected server response. Please check the new window for details.");
}
});
}
*/

return response.json().catch(() => {

return Promise.resolve({}); 
});
})
.then(() => {



if(this.formData.status == 'PRE-ARRIVAL') {
showToast("Booking Pended", this.formData.client + "'s Booking # " + this.formData.id  + "<br> Pre-arrived Successfully", "success");
}
if(this.formData.status == 'CANCELLED') {
showToast("Booking Cancelled", this.formData.client + "'s Booking # " + this.formData.id  + "<br> Cancelled Successfully", "success");
}
if(this.formData.status == 'ARRIVED') {
showToast("Booking Arrived", this.formData.client + "'s Booking # " + this.formData.id  + "<br> Arrived Successfully", "success");
}
if(this.formData.status == 'RESCHEDULED') {
showToast("Booking Rescheduled", this.formData.client + "'s Booking # " + this.formData.id  + "<br> Rescheduled Successfully", "success");
}
if(this.formData.status == 'DELINQUENT') {
showToast("Booking Marked for Delinquency", this.formData.client + "'s Booking # " + this.formData.id  + "<br> Marked as Delinquent Successfully", "success");
}
document.getElementById('chartfresh').click();
this.formData.id = "";
this.formData.status = "";
this.formData.message = "";
this.formMessage = "Form successfully submitted.";
})
.catch(() => {
this.formMessage = "Something went wrong.";
showToast("Operation Failed", this.formData.client + "'s Booking # " + this.formData.id  + "<br> Action Failed", "danger");


})
.finally(() => { 
this.fetchBookings();
this.formLoading = false;
this.buttonText = "Submit";

});
}
};
}
// end of status form



</script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH /home/u101594241/domains/maubantourism.com/public_html/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>