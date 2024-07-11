

<?php $__env->startSection('headBar'); ?>
<div class="hidden w-full lg:block lg:w-auto col-span-9" id="navbar-default">
  <ul class="lg:font-normal lg:grid grid-cols-9 gap-3 lg:gap-5 font-semibold mt-1 rounded-md lg:flex-row lg:mt-0 bg-gray-300 lg:bg-white">
    <li class="col-span-3">
        <div class="text-white text-center font-inter font-semibold flex justify-center rounded-t-md lg:rounded-md bg-green-600 lg:border-2 border-green-600 p-2">
          ASSEMBLY PARTS
        </div>
    </li>
    <li class="hidden lg:block col-span-2">
        <div class="text-white text-center font-inter font-semibold flex justify-center lg:rounded-md bg-green-600 lg:border-2 border-green-600 p-2">
          <?php echo e($productModel); ?>

        </div>
    </li>
    <li class="col-span-2">
      <a href="<?php echo e(url('spare_parts/'.$group.'/'.$model)); ?>">
        <div class="text-center font-inter font-semibold flex justify-center transition hover:bg-green-600 hover:text-white lg:rounded-md bg-gray-300 lg:border-2 border-green-600 p-2">
          SPARE PARTS
        </div>
      </a>
    </li>
    <li class="col-span-1">
      <?php echo $__env->make('STANDARD_PRODUCTS/component/backButton', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      
    </li>
    <li class="col-span-1">
      <a href="<?php echo e(url('/')); ?>">
        <div class="text-center font-inter font-semibold flex justify-center transition hover:bg-green-600 hover:text-white rounded-b-md lg:rounded-md bg-gray-300 lg:border-2 border-green-600 p-2">
          HOME
        </div>
      </a>
    </li>
  </ul>
</div>
<div class="mt-2 lg:hidden w-full bg-green-600 rounded-md">
  <h1 class="font-semibold text-center text-white p-2.5"><?php echo e($productModel); ?></h1>
</div>
<?php $__env->stopSection(); ?>
  
<?php $__env->startSection('content'); ?>
<div class="mt-3 lg:mt-5 grid ss:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
  <?php $__currentLoopData = $assemblyData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="flex flex-col">
      <div class="shadow shadow-gray-400 rounded-md border-2 border-green-600">
        <img class="p-4 contrast-125 object-scale-down h-52 mx-auto" src="<?php echo e($item['imageURL']); ?>" alt="">
      </div>
      <div class="shadow shadow-gray-400 mt-2 rounded-md border-2 border-green-600">
        <p class="p-2 text-center uppercase"><?php echo e($item['part_name']); ?></p>
      </div>
    </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('STANDARD_PRODUCTS/layout/defaultLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\my-project\miscibles-platform-development\src\resources\views/STANDARD_PRODUCTS/page/assembly_parts.blade.php ENDPATH**/ ?>