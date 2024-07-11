<?php $__env->startSection('content'); ?>
<div class="grid sm:grid-cols-2 my-5 gap-5 text-xs lg:text-base">
    <div class="border-2 border-green-600 rounded-md shadow shadow-gray-400 lg:pt-1/4 flex flex-col items-center p-4 lg:p-10">
        <div class="flex flex-col lg:grid grid-cols-2 gap-2">
            <img src="<?php echo e($imageURL[0]); ?>" class="w-72 h-72">
            <img src="<?php echo e($imageURL[1]); ?>" class="w-72 h-72">
        </div>
        <img src="<?php echo e($imageURL[2]); ?>" class="w-72 h-72">
    </div>
    <div class="flex flex-col gap-2">
        <?php $__empty_1 = true; $__currentLoopData = $technicalData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="grid grid-cols-6 gap-4 border-2 border-primary rounded-md shadow shadow-gray-400">
            <div class="max-h-20 col-span-2 bg-secondary rounded-l-[4px]">
                <h2 class="p-2 text-center uppercase font-semibold"><?php echo e($item['technical_component'] ?? ''); ?></h2>
            </div>
            <div class="max-h-20 col-span-4 flex items-center justify-center">
                <h2 class="p-2 text-center uppercase font-semibold"><?php echo e($item['specification'] ?? ''); ?></h2>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="grid grid-cols-6 gap-4 border-2 border-primary rounded-md shadow shadow-gray-400">
            <div class="max-h-20 col-span-2 bg-secondary rounded-l-[4px]">
                <h2 class="p-2 text-center uppercase font-semibold">Data not avaliable</h2>
            </div>
            <div class="max-h-20 col-span-4 flex items-center justify-center">
                <h2 class="p-2 text-center uppercase font-semibold">Data not avaliable</h2>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts/secondary',[ 'title' => 'Technical Data', 'subtitle' => $model], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\NEX\miscibles-platform-2.1\src\resources\views/pages/user/technical-data.blade.php ENDPATH**/ ?>