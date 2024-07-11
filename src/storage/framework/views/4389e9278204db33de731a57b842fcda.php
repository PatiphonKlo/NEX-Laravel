

<?php $__env->startSection('content'); ?>
<h1 class="ml-5 text-xl font-semibold text-gray-900 sm:text-2xl uppercase">Quotation: <?php echo e($quotationData['CODE']); ?></h1>
<div class="flex flex-col m-5">
    <form action="<?php echo e(config('app.env') == 'production' ? secure_url('admin/pdf-quotation') : url('admin/pdf-quotation')); ?>" method="GET">
        <?php echo csrf_field(); ?>
        <?php echo method_field('POST'); ?>
        <input type="hidden" value="<?php echo e($quotationData['KEY']); ?>" name="quotationKey">
        <input id="inputLayoutKey" type="hidden" onchange="quotationLayout()" name="quotationLayout">
        <?php if (isset($component)) { $__componentOriginal13113c9f32f6116c43cb9fbecee94495 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal13113c9f32f6116c43cb9fbecee94495 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.submit-button','data' => ['class' => 'h-12 w-[150px]']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('submit-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-12 w-[150px]']); ?>View PDF <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal13113c9f32f6116c43cb9fbecee94495)): ?>
<?php $attributes = $__attributesOriginal13113c9f32f6116c43cb9fbecee94495; ?>
<?php unset($__attributesOriginal13113c9f32f6116c43cb9fbecee94495); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal13113c9f32f6116c43cb9fbecee94495)): ?>
<?php $component = $__componentOriginal13113c9f32f6116c43cb9fbecee94495; ?>
<?php unset($__componentOriginal13113c9f32f6116c43cb9fbecee94495); ?>
<?php endif; ?>
    </form>
    <form action="<?php echo e(config('app.env') == 'production' ? secure_url('admin/update_quotation_layout') : url('admin/update_quotation_layout')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="flex gap-4 mb-4">
            <select id="quotationSelector" onChange="changeQuotation()" class="rounded-md w-[250px] focus:outline-none shadow-none">
                <?php $__empty_1 = true; $__currentLoopData = $layoutData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <option value="<?php echo e($key); ?>">Layout: <?php echo e($item['NAME']); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <option disabled></option>
                <?php endif; ?>
            </select>
            <?php if (isset($component)) { $__componentOriginal13113c9f32f6116c43cb9fbecee94495 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal13113c9f32f6116c43cb9fbecee94495 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.submit-button','data' => ['id' => 'submitButton','class' => 'h-12 w-[150px]']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('submit-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'submitButton','class' => 'h-12 w-[150px]']); ?>Update <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal13113c9f32f6116c43cb9fbecee94495)): ?>
<?php $attributes = $__attributesOriginal13113c9f32f6116c43cb9fbecee94495; ?>
<?php unset($__attributesOriginal13113c9f32f6116c43cb9fbecee94495); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal13113c9f32f6116c43cb9fbecee94495)): ?>
<?php $component = $__componentOriginal13113c9f32f6116c43cb9fbecee94495; ?>
<?php unset($__componentOriginal13113c9f32f6116c43cb9fbecee94495); ?>
<?php endif; ?>

            
        </div>

        <div class="min-w-[210mm] min-h-[297mm] mr-6">
            <?php if(isset($message)): ?>
            <div class="w-full text-center p-4">
                <?php echo e($message); ?>

            </div>
            <?php else: ?>
            <?php echo $__env->make('CONTENT_MANAGEMENT_SYSTEM/layout/quotation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        </div>
    </form>
</div>

<script>
    let documentData = <?php echo json_encode($layoutData, 15, 512) ?>;

    document.addEventListener('DOMContentLoaded', function() {
        let selector = document.getElementById('quotationSelector');
        let submitButton = document.getElementById('submitButton');
        let table = document.getElementById('quotaionTable');

        function updateButtonDisplay() {
            let selectorValue = selector.value;
            submitButton.style.display = selectorValue ? 'block' : 'none';
            table.style.display = selectorValue ? 'block' : 'none';
        }
        updateButtonDisplay();

        selector.addEventListener('change', updateButtonDisplay);
    });

    window.onload = function() {
        changeQuotation();
    }


    function changeQuotation() {
        console.log('changeQuotation function called');
        let selector = document.getElementById('quotationSelector');
        let selectorValue = selector.value;
        let submitButton = document.getElementById('submitButton');
        let quotationLayout = document.getElementById('inputLayoutKey');

        quotationLayout.setAttribute("value", documentData[selectorValue]['KEY']);

        for (let i = 1; i <= 10; i++) {
            let headerKey = 'HEADER' + i;
            let headerValue = documentData[selectorValue][headerKey];
            document.getElementById('header' + i).setAttribute("value", headerValue);
        }

        let textValue = documentData[selectorValue]['TEXTAREA1'];
        let textarea = document.getElementById('textarea1')
        textarea.value = textValue;

        for (let i = 1; i <= 22; i++) {
            let key = 'CONTENT' + i;
            let contentValue = documentData[selectorValue][key];
            document.getElementById('content' + i).setAttribute("value", contentValue);
        }

        for (let i = 1; i <= 6; i++) {
            let key = 'FOOTER' + i;
            let footerValue = documentData[selectorValue][key];
            document.getElementById('footer' + i).setAttribute("value", footerValue);
        }
    }

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('CONTENT_MANAGEMENT_SYSTEM/layout/defaultLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\my-project\miscibles-platform\src\resources\views/CONTENT_MANAGEMENT_SYSTEM/page/quotation_view.blade.php ENDPATH**/ ?>