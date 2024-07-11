<div class="px-6 py-8 max-w-2xl mx-auto">
    <div class="flex justify-between mb-6">
        <div class="font-bold">
            <div class="font-bold"><?php echo e($productDocument['GROUP']); ?> <?php echo e($productDocument['MODEL']); ?></div>
            <div><?php echo e($productDocument['PRODUCT_NAME']); ?></div>
        </div>
        <div class=" font-bold">
            <div><?php echo e(number_format($productDocument['PRICE'])); ?> THB</div>
        </div>
    </div>
    <table class="w-full mb-8">
        <thead>
            <tr>
                <th class="text-left font-bold">Description</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $productTechnical; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td class="text-left"><?php echo e($item['TECHNICAL_PARTS']); ?> : <?php echo e($item['TECHNICAL_SPECIFICATION']); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <div class="">Price Validity : <?php echo e($productDocument['PRICE_VALIDITY']); ?> days</div>
    <div class="">Delivery Term : <?php echo e($productDocument['DELIVERY_TERM']); ?> days</div>
    <div class="font-bold">Payment Term</div>
    <div class="">Down payment: <?php echo e(number_format($productDocument['DOWN_PAYMENT'], 1, '.', '')); ?>% / Final Check: <?php echo e(number_format($productDocument['FINAL_CHECK'], 1, '.', '')); ?>% 
        <br>/ After Install: <?php echo e(number_format($productDocument['AFTER_INSTALL'], 1, '.', '')); ?>%</div>
</div>
<?php /**PATH C:\my-project\miscibles-platform-development\src\resources\views/STANDARD_PRODUCTS/component/preQuotation.blade.php ENDPATH**/ ?>