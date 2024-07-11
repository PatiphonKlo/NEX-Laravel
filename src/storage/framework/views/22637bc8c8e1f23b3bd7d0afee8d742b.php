<div class="px-6 py-20 max-w-2xl mx-auto">
    <div class="flex justify-between mb-6">
        <div class="font-bold">
            <div class="font-bold"><?php echo e($productData['product_group']); ?> <?php echo e($productData['product_model']); ?></div>
            <div><?php echo e($productData['product_name']); ?></div>
        </div>
        <div class=" font-bold">
            <div><?php echo e(number_format($productData['product_price'])); ?> THB</div>
        </div>
    </div>
    <table class="w-full mb-8">
        <thead>
            <tr>
                <th class="text-left font-bold">Description</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $technicalData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td class="text-left"><?php echo e($item['technical_component']); ?> : <?php echo e($item['specification']); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <div class="">Price Validity : <?php echo e($productData['product_price_validity']); ?> days</div>
    <div class="">Delivery Term : <?php echo e($productData['product_delivery_term']); ?> days</div>
    <div class="font-bold">Payment Term</div>
    <div class="">Down payment: <?php echo e(number_format($productData['product_down_payment'], 1, '.', '')); ?>% / Final Check: <?php echo e(number_format($productData['product_final_check'], 1, '.', '')); ?>% 
        <br>/ After Install: <?php echo e(number_format($productData['product_after_install'], 1, '.', '')); ?>%</div>
</div>
<?php /**PATH C:\my-project\miscibles-platform\src\resources\views/pages/user/components/quotation-preview.blade.php ENDPATH**/ ?>