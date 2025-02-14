<?php if (isset($component)) { $__componentOriginal2f6ba3bb045fcfc874a029fcd88fe718 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2f6ba3bb045fcfc874a029fcd88fe718 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.bookreload','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('bookreload'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2f6ba3bb045fcfc874a029fcd88fe718)): ?>
<?php $attributes = $__attributesOriginal2f6ba3bb045fcfc874a029fcd88fe718; ?>
<?php unset($__attributesOriginal2f6ba3bb045fcfc874a029fcd88fe718); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2f6ba3bb045fcfc874a029fcd88fe718)): ?>
<?php $component = $__componentOriginal2f6ba3bb045fcfc874a029fcd88fe718; ?>
<?php unset($__componentOriginal2f6ba3bb045fcfc874a029fcd88fe718); ?>
<?php endif; ?><?php /**PATH /home/u101594241/domains/maubantourism.com/public_html/storage/framework/views/22d620d9b0078f3df646d5a5529fca5f.blade.php ENDPATH**/ ?>