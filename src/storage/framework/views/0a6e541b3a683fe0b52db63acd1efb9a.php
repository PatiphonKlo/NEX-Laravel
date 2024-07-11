

<?php $__env->startSection('content'); ?>
<?php if (isset($component)) { $__componentOriginald54a8339dcc38c6ef8d160194421035b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald54a8339dcc38c6ef8d160194421035b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.quotation','data' => ['test1' => ''.e($documentData['EDITED_BY']).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('quotation'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['test1' => ''.e($documentData['EDITED_BY']).'']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald54a8339dcc38c6ef8d160194421035b)): ?>
<?php $attributes = $__attributesOriginald54a8339dcc38c6ef8d160194421035b; ?>
<?php unset($__attributesOriginald54a8339dcc38c6ef8d160194421035b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald54a8339dcc38c6ef8d160194421035b)): ?>
<?php $component = $__componentOriginald54a8339dcc38c6ef8d160194421035b; ?>
<?php unset($__componentOriginald54a8339dcc38c6ef8d160194421035b); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('CONTENT_MANAGEMENT_SYSTEM/layout/defaultLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\my-project\miscibles-platform-development\src\resources\views/CONTENT_MANAGEMENT_SYSTEM/page/quotation_view.blade.php ENDPATH**/ ?>