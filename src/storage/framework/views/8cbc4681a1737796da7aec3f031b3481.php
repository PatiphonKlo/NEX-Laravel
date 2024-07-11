<?php $__env->startSection('content'); ?>
    <div class="mt-3 lg:mt-5 grid ss:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
        <?php $__empty_1 = true; $__currentLoopData = $assemblyData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="flex flex-col text-xxs md:text-xs">
                <div
                    class="h-[250px] shadow shadow-gray-400 rounded-md border-2 border-primary flex justify-center items-center">
                    <img class="p-4 contrast-125 object-scale-down max-h-52" src="<?php echo e($item['part_image']); ?>" alt="NA">
                </div>
                <div class="grid grid-cols-3">
                    <div
                        class="shadow shadow-gray-400 col-span-2 mt-2 rounded-l-md border-y-2 border-l-2 border-primary bg-secondary">
                        <h2 class="p-1 text-center uppercase font-semibold"><?php echo e($item['part_name']); ?> <br> (
                            <?php echo e($item['part_id']); ?> )</h2>
                    </div>
                    <div
                        class="shadow shadow-gray-400 col-span-1 mt-2 rounded-r-md border-y-2 border-r-2 border-primary flex items-center justify-center">
                        <h2 class="p-1 text-center uppercase font-semibold"><?php echo e($item['spare_part']); ?> UNIT</h2>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <span class="flex justify-center p-4">Assembly part not avaliable</span>
        <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/secondary', ['title' => 'Assembly Parts', 'subtitle' => $model], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\NEX\miscibles-platform-2.1\src\resources\views/pages/user/assembly-part.blade.php ENDPATH**/ ?>