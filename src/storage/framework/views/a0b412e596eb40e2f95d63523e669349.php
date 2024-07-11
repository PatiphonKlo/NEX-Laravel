

<?php $__env->startSection('content'); ?>
    <div class="mt-4 text-sm lg:text-base">
      <div class="flex flex-row flex-wrap items-center ss:flex-nowrap bg-gray-100 rounded-lg shadow-sm overflow-hidden mb-2 font-bold">
        <div class="w-full my-2 ss:my-0 ss:w-40 text-center">GROUP</div>
        <div class="rounded-md w-full bg-gray-200 px-10 lg:px-20 py-1">
          <div class="h-6 items-center flex justify-between"> 
            <p class="ss:ml-4">MIN.</p>
            <p class="ml-4">AVE.</p>
            <p class="mr-4">MAX.</p>
          </div>
        </div>
      </div>
      <?php $__empty_1 = true; $__currentLoopData = $costEstimation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      <div class="flex flex-row flex-wrap items-center ss:flex-nowrap bg-gray-100 rounded-lg shadow-sm overflow-hidden mb-2">
        <div class="w-full my-2 ss:my-0 ss:w-40 text-center font-semibold"><?php echo e($item['product_group']); ?></div>
        <div class="rounded-md w-full bg-green-100 px-10 lg:px-20 py-1">
          <div class="h-6 items-center flex justify-between font-medium"> 
            <p class="ss:ml-4"><?php echo e(number_format($item['product_min_cost'])); ?> ฿</p>
            <p class="ml-4"><?php echo e(number_format(($item['product_min_cost']+$item['product_max_cost'])/2)); ?> ฿</p>
            <p class="mr-4"><?php echo e(number_format($item['product_max_cost'])); ?> ฿ </p>
          </div>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <span class="flex justify-center">Group not avaliable</span>
      <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/secondary',[ 'title' => 'Cost Estimation', 'subtitle' => 'All Group'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\miscibles-platform\src\resources\views/pages/user/cost-estimation.blade.php ENDPATH**/ ?>