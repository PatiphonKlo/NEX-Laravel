
<?php $__env->startSection('headBar'); ?>
<div class="hidden w-full lg:block lg:w-auto col-span-9" id="navbar-default">
    <ul class="lg:font-normal lg:grid grid-cols-9 gap-3 lg:gap-5 font-semibold mt-1 rounded-md lg:flex-row lg:mt-0 bg-gray-300 lg:bg-white">
        <li class="col-span-3 lg:col-span-2">
            <div class="text-white text-center font-inter font-semibold flex item-center justify-center rounded-t-md lg:rounded-md bg-green-600 lg:border-2 border-green-600 p-2">
                TECHNICAL DATA
            </div>
        </li>
        <li class="hidden lg:block col-span-3 lg:col-span-2">
            <div class="text-white text-center font-inter font-semibold flex item-center justify-center rounded-b-md lg:rounded-md bg-green-600 lg:border-2 border-green-600 p-2">
                <?php echo e($productDocument['MODEL']); ?>

            </div>
        </li>
        <li class="lg:block col-span-3">
            <a href="<?php echo e(url('specification_data/'.$group.'/'.$model)); ?>">
                <div class="text-center font-inter font-semibold flex item-center justify-center transition hover:bg-green-600 hover:text-white lg:rounded-md bg-gray-300 lg:border-2 border-green-600 p-2">
                    SPECIFICATION DATA
                </div>
            </a>
        </li>
        <li class="col-span-1">
            <?php echo $__env->make('STANDARD_PRODUCTS/component/backButton', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </li>
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
<div class="grid sm:grid-cols-2 my-5 gap-5">
    <div class="border-2 border-green-600 rounded-md shadow shadow-gray-400 lg:pt-1/4 flex flex-col space-y-3 lg:space-y-10 items-center">
        <div class="flex flex-col lg:grid grid-cols-2 gap-2 lg:gap-10 p-4">
            <img src="<?php echo e($CADimageURL[0]); ?>" class="w-72 h-72">
            <img src="<?php echo e($CADimageURL[1]); ?>" class="w-72 h-72">
        </div>
        <img src="<?php echo e($CADimageURL[2]); ?>" class="w-80 h-1/4">
    </div>
    <div>
        <?php $__currentLoopData = $productTechnical; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="grid grid-cols-3 gap-2">
            <div class="max-h-20 shadow shadow-gray-400 col-span-1 border-2 border-green-600 rounded-md mb-4">
                <h2 class="p-2 text-center uppercase"><?php echo e($item['TECHNICAL_PARTS']); ?></h2>
            </div>
            <div class="max-h-20 shadow shadow-gray-400 col-span-2 border-2 border-green-600 rounded-md mb-4">
                <h2 class="p-2 px-4"><?php echo e($item['TECHNICAL_SPECIFICATION']); ?></h2>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('STANDARD_PRODUCTS/layout/defaultLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\my-project\miscibles-platform-development\src\resources\views/STANDARD_PRODUCTS/page/technical_data.blade.php ENDPATH**/ ?>