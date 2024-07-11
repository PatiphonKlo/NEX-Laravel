

<?php $__env->startSection('headBar'); ?>
<div class="hidden w-full lg:block lg:w-auto col-span-9" id="navbar-default">
    <ul class="lg:font-normal lg:grid grid-cols-9 gap-3 lg:gap-5 font-semibold mt-1 rounded-md lg:flex-row lg:mt-0 bg-gray-300 lg:bg-white">
      <li class="col-span-3">
          <div class="text-white text-center font-inter font-semibold flex item-center justify-center rounded-t-md lg:rounded-md bg-green-600 lg:border-2 border-green-600 p-2">
            QUOTATION
          </div>
      </li>
      <li class="hidden lg:block col-span-3">
          <div class="text-white text-center font-inter font-semibold flex item-center justify-center rounded-b-md lg:rounded-md bg-green-600 lg:border-2 border-green-600 p-2">
            <?php echo e($productDocument['MODEL']); ?>

          </div>
      </li>
      <li class="col-span-1">
        <?php echo $__env->make('STANDARD_PRODUCTS/component/backButton', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
      </li>
      <div></div>
      <li class="col-span-1">
        <a href="<?php echo e(url('/')); ?>">
          <div class="text-center font-inter font-semibold flex item-center justify-center transition hover:bg-green-600 hover:text-white lg:rounded-md rounded-b-md bg-gray-300 lg:border-2 border-green-600 p-2">
            HOME
          </div>
        </a>
      </li>
    </ul>
  </div>
  <div class="mt-2 lg:hidden w-full bg-green-600 rounded-md">
    <h1 class="font-semibold text-center text-white p-2.5"><?php echo e($productDocument['MODEL']); ?></h1>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="flex flex-col lg:grid grid-cols-2 pt-[2vh] gap-5">
        <div class="col-span-1 flex flex-col">
            <div class="shadow shadow-gray-400 border-2 border-green-600  h-[60vh] lg:h-[80vh] rounded-md px-8 overflow-y-auto">

                <?php echo $__env->make('STANDARD_PRODUCTS/component/preQuotation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            </div>
        </div>
        <div class="col-span-1 flex flex-col">
            <div class="shadow shadow-gray-400 border-2 border-green-600 h-[80vh] rounded-md">
                <img class="contrast-125 object-scale-down h-full mx-auto p-6" src="<?php echo e($CADimageURL); ?>" >
            </div>
            <div class="grid grid-cols-3 gap-2 mt-[2vh]">
                <a href="<?php echo e(url('customer_form/'.$group.'/'.$model)); ?>" class="col-start-3 col-span-1">
                    <h2 class="p-2 uppercase border-2 border-green-500 bg-green-400 transition hover:bg-green-500 rounded-md text-center">
                        request quotation
                    </h2>
                </a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('STANDARD_PRODUCTS/layout/defaultLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\my-project\miscibles-platform-development\src\resources\views/STANDARD_PRODUCTS/page/pre_quotation.blade.php ENDPATH**/ ?>