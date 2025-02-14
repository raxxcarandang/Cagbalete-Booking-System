<nav x-data="{ 
open: false, 
notificationsOpen: false, 
activitiesOpen: false, 

clearActivities() {
axios.post('/clear-activities', { 
_token: '<?php echo e(csrf_token()); ?>' 
}).then(response => {
this.unreadActivities = 0; 
this.activities = []; 
}).catch(error => {
console.error('Error clearing activities:', error);
});
},

clearNotifications() {
axios.post('/clear-notifications', { 
_token: '<?php echo e(csrf_token()); ?>' 
}).then(response => {
this.unreadNotifications = 0; 
this.notifications = []; 
}).catch(error => {
console.error('Error clearing notifications:', error);
});
}
}" class="bg-gray border-b border-gray-100" id="appnav">
	
    <div class="max-w-7xl mx-auto py-1 px-4 sm:px-6 lg:px-8">
        <div x-data="activityNotificationComponent()" class="flex justify-between items-center h-8">
            <div class="flex-grow"></div>
            <div class="flex items-center space-x-14 relative">
				<!--
				
				 <div class="relative">
                    <button @click="location.href='https://forms.gle/qB1oWPJwjwoq1Vvr6'" class="text-gray-500 hover:text-gray-700">
					<i class="ion-ios-paper relative text-2xl"></i> Survey
					</button>
				</div>
				
				-->
				
                <!-- Actions Button 
                <div class="relative">
                    <button @click="activitiesOpen = !activitiesOpen" class="text-gray-500 hover:text-gray-700">
                        <i class="ion-ios-alarm relative text-2xl"></i> Actions
                        
						<span x-show="unreadActivitiesCount > 0" class="absolute top-0 right-0 text-xs font-bold text-red-500 bg-white rounded-full px-1" id="actcount" x-text="unreadActivitiesCount"></span>
						
					</button>
                    <div x-show="activitiesOpen" x-transition class="mt-2 w-96 bg-white shadow-lg rounded-md absolute left-1/2 transform -translate-x-1/2 z-10 max-h-60 overflow-y-auto">
                        <div class="table-responsive w-auto" style="width:100%; height:100%; margin-left: 1rem;">
                            <table class="table table-borderless text-center" id="table">
                                <tbody>
                                   
                                    <tr x-show="unreadActivities.length === 0">
                                        <td colspan="4" class="text-center text-gray-400">No recent actions</td>
									</tr>
								</tbody>
							</table>
                            <button @click="clearActivities; $dispatch('refresh');" class="w-full text-red-500 hover:text-red-700 mt-2 py-2 border-t border-gray-200">Clear Actions</button>
						</div>
					</div>
				</div>
				-->
				
                <!-- Notifications Button 	-->
                <div class="relative">
                    <button @click="notificationsOpen = !notificationsOpen" class="text-gray-500 hover:text-gray-700">
                        <i class="ion-ios-notifications relative text-2xl"></i> Actions
                        <span x-show="unreadNotificationsCount > 0" class="absolute top-0 right-0 text-xs font-bold text-red-500 bg-white rounded-full px-1" id="notifcount">
                            <span x-text="logCount"></span>
						</span>
					</button>
                    <div x-show="notificationsOpen" x-transition class="mt-2 w-96 bg-white shadow-lg rounded-md absolute left-1/2 transform -translate-x-1/2 z-10 max-h-60 overflow-y-auto">
                        <div class="table-responsive w-auto" style="width:100%; height:100%; margin-left: 1rem;">
                            <table class="table table-borderless text-center" id="table">
                                <tbody>
                                     <template x-for="(activity, index) in unreadActivities" :key="index">
                                        <tr style="border-bottom: 1px solid black;">
                                            <td x-text="formatDate(activity.created_at)"></td>
                                            <td x-text="activity.updatemsg"></td>
                                            <td x-text="activity.remark || 'No remark'"></td>
                                            
										</tr>
									</template>
                                    <template x-for="(notification, index) in unreadNotifications" :key="index">
                                        <tr style="border-bottom: 1px solid black;">
                                            <td x-text="formatDate(notification.created_at)"></td>
                                            <td x-text="notification.msg"></td>
                                            <td x-text="notification.remark || 'No remark'"></td>
                                            
										</tr>
									</template>
                                    <tr x-show="unreadNotifications.length === 0 && unreadActivities.length === 0">
                                        <td colspan="4" class="text-center text-gray-400">No recent actions</td>
									</tr>
								</tbody>
							</table>
                            <button @click="clearActivities(); clearNotifications(); $dispatch('refresh');" class="w-full text-red-500 hover:text-red-700 mt-2 py-2 border-t border-gray-200">Clear Actions</button>
						</div>
					</div>
				</div>
			
                <!-- Settings Dropdown -->
                <div>
                    <?php if (isset($component)) { $__componentOriginaldf8083d4a852c446488d8d384bbc7cbe = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldf8083d4a852c446488d8d384bbc7cbe = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown','data' => ['align' => 'right','width' => '48']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['align' => 'right','width' => '48']); ?>
                         <?php $__env->slot('trigger', null, []); ?> 
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div><?php echo e(Auth::user()->name); ?></div>
                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
									</svg>
								</div>
							</button>
						 <?php $__env->endSlot(); ?>
						
                         <?php $__env->slot('content', null, []); ?> 
                            <?php if (isset($component)) { $__componentOriginal68cb1971a2b92c9735f83359058f7108 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal68cb1971a2b92c9735f83359058f7108 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown-link','data' => ['href' => route('adminprofile.edit')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('adminprofile.edit'))]); ?>
                                <?php echo e(__('Profile')); ?>

							 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $attributes = $__attributesOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__attributesOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $component = $__componentOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__componentOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginal68cb1971a2b92c9735f83359058f7108 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal68cb1971a2b92c9735f83359058f7108 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown-link','data' => ['href' => route('index')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('index'))]); ?>
                                <?php echo e(__('Go To Main Site')); ?>

							 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $attributes = $__attributesOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__attributesOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $component = $__componentOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__componentOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
                            
                            <form method="POST" action="<?php echo e(route('logout')); ?>">
                                <?php echo csrf_field(); ?>
                                <?php if (isset($component)) { $__componentOriginal68cb1971a2b92c9735f83359058f7108 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal68cb1971a2b92c9735f83359058f7108 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown-link','data' => ['href' => route('logout'),'onclick' => 'event.preventDefault(); this.closest(\'form\').submit();']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('logout')),'onclick' => 'event.preventDefault(); this.closest(\'form\').submit();']); ?>
                                    <?php echo e(__('Log Out')); ?>

								 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $attributes = $__attributesOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__attributesOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $component = $__componentOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__componentOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
							</form>
						 <?php $__env->endSlot(); ?>
					 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldf8083d4a852c446488d8d384bbc7cbe)): ?>
<?php $attributes = $__attributesOriginaldf8083d4a852c446488d8d384bbc7cbe; ?>
<?php unset($__attributesOriginaldf8083d4a852c446488d8d384bbc7cbe); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldf8083d4a852c446488d8d384bbc7cbe)): ?>
<?php $component = $__componentOriginaldf8083d4a852c446488d8d384bbc7cbe; ?>
<?php unset($__componentOriginaldf8083d4a852c446488d8d384bbc7cbe); ?>
<?php endif; ?>
				</div>
				
			</div>
		</div>
	</div>
</nav><?php /**PATH /home/u101594241/domains/maubantourism.com/public_html/resources/views/components/adminnavigation.blade.php ENDPATH**/ ?>