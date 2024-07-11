

<?php $__env->startSection('headBar'); ?>
<div class="hidden w-full lg:block lg:w-auto col-span-9" id="navbar-default">
    <ul class="lg:font-normal lg:grid grid-cols-9 gap-3 lg:gap-5 font-semibold mt-1 rounded-md lg:flex-row lg:mt-0 bg-gray-300 lg:bg-white">
        <li class="col-span-3">
            <div class="text-center text-white font-inter font-semibold flex justify-center rounded-t-md lg:rounded-md bg-green-600 lg:border-2 border-green-600 p-2">
                STANDARD PRODUCTS
            </div>
        </li>
        <li class="col-span-1">
            <a href="<?php echo e(url('/')); ?>">
                <div class="text-center font-inter font-semibold flex justify-center transition hover:bg-green-600 hover:text-white lg:rounded-md bg-gray-300 lg:border-2 border-green-600 p-2">
                    HOME
                </div>
            </a>
        </li>
        <li class="col-span-2">
            <a href="<?php echo e(url('made_to_order')); ?>">
                <div class="text-center font-inter font-semibold flex justify-center transition hover:bg-green-600 hover:text-white lg:rounded-md bg-gray-300 lg:border-2 border-green-600 p-2">
                    MADE TO ORDER
                </div>
            </a>
        </li>
        <li class="col-span-3">
            <a href="#">
                <div class="text-center font-inter font-semibold flex justify-center transition hover:bg-green-600 hover:text-white lg:rounded-md rounded-b-md bg-gray-300 lg:border-2 border-green-600 p-2">
                    Ai RECOMMENDATION
                </div>
            </a>
        </li>
    </ul>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php if(request()->is('standard_products')): ?>
<div class="mt-4 grid grid-cols-3 lg:grid-cols-8 gap-2 sm:gap-3 lg:gap-5">
    <div class="col-span-1 lg:col-span-2">
        <div class="shadow shadow-gray-400 rounded-md bg-gray-300 border-2 border-green-600 p-5 lg:p-8 font-semibold h-96 md:h-144  xl:h-[80vh] overflow-y-auto">
            <?php echo $__env->make('STANDARD_PRODUCTS/component/productSideBar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

    <div class="shadow shadow-gray-400 col-span-2 lg:col-span-4 rounded-md h-96 md:h-144  xl:h-[80vh]">
        <img class="h-full object-fill w-full rounded-md border-2 border-green-600" src="/images/miscible-image.jpg">
    </div>
    <div class="grid grid-cols-3 gap-2 sm:gap-3 col-span-3 lg:flex lg:flex-col lg:col-span-2 xl:h-[80vh]">
        <a href="javascript:void(0)" data-toggle="modal" data-target="popup" class="shadow shadow-gray-400 text-xs md:text-sm lg:text-base items-center text-center font-inter font-medium flex item-center justify-center transition hover:bg-green-600 hover:text-white rounded-md bg-gray-300 border-2 border-green-600 lg:h-20 p-2">
            <span>
                ASSEMBLY PARTS
            </span>
        </a>
        <a href="javascript:void(0)" data-toggle="modal" data-target="popup"  class="shadow shadow-gray-400 text-xs md:text-sm lg:text-base items-center text-center font-inter font-medium flex item-center justify-center transition hover:bg-green-600 hover:text-white rounded-md bg-gray-300 border-2 border-green-600 lg:h-20 p-2">
                <span>
                    TECHNICAL DATA
                </span>
        </a>
        <a href="<?php echo e(url('cost_estimation')); ?>" class="shadow shadow-gray-400 text-xs md:text-sm lg:text-base text-center font-inter font-medium flex items-center justify-center transition hover:bg-green-600 hover:text-white rounded-md bg-green-100 border-2 border-green-600 lg:h-20 p-2">
            <span>
                COST ESTIMATION
            </span>
        </a>
        <a href="javascript:void(0)" data-toggle="modal" data-target="popup" class="p-2 lg:h-full shadow shadow-gray-400 text-xs md:text-sm lg:text-lg text-center items-center font-inter font-medium lg:font-bold flex item-center justify-center transition hover:bg-green-600 hover:text-white rounded-md bg-green-100 border-2 border-green-600">
            <span>
                QUOTATION
            </span>
        </a>
        <a href="<?php echo e(url('authentication/login')); ?>" class="shadow shadow-gray-400 text-xs md:text-sm lg:text-base text-center font-inter font-medium flex items-center justify-center transition hover:bg-green-600 hover:text-white rounded-md bg-orange-200 border-2 border-green-600 p-2 lg:h-20">
            <span>
                UPDATE COST
            </span>
        </a>
        <a href="https://www.appsheet.com/start/aef75d1b-a90a-4961-81fb-ba43f29d27b2?platform=desktop#viewStack[0][identifier][Type]=Control&viewStack[0][identifier][Name]=Inventory(%E0%B8%A3%E0%B8%B1%E0%B8%9A%E0%B9%80%E0%B8%82%E0%B9%89%E0%B8%B2)&appName=StockStoreV1-11909385" 
        class="shadow shadow-gray-400 text-xs md:text-sm lg:text-base text-center font-inter font-medium flex items-center justify-center transition hover:bg-green-600 hover:text-white rounded-md bg-orange-200 border-2 border-green-600 lg:h-20 p-2">
            <span>
                UPDATE STOCK
            </span>
        </a>
    </div>
</div>

<div class="z-10 fixed inset-0 w-full h-screen hidden modal overflow-auto" id="popup">
    <div class="fixed w-full inset-0 bg-black opacity-90 z-30" data-close></div>
    <div class="min-h-screen flex items-center justify-center relative pointer-events-none py-8 px-4 z-50">
        <div class="max-w-md bg-white w-full pointer-events-auto rounded-md">
            <div class="p-4 flex items-center justify-between space-x-2 border-b border-gray-lighter">
                <h5 class="text-red-600 font-semibold mb-0">
                    Action Needed !
                </h5>
                <a href="javascript:void(0);" class="block" data-close>
                    <svg class="stroke-current w-5 h-5 text-gray-light" viewBox="0 0 24 24" stroke-width="4" stroke="#6c7893" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M0 0h24v24H0z" stroke="none" />
                        <path d="M18 6 6 18M6 6l12 12" />
                    </svg>
                </a>
            </div>
            <div class="p-4">
               User must selected the product before this action.
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
<script>
    $("[data-toggle='modal']").click(function () {
        $("#popup").fadeIn("fast");
    });

    $("[data-close]").click(function () {
        $(this).parents(".modal").hide();
    });
</script>

<?php else: ?>
<div class="mt-4 grid grid-cols-3 lg:grid-cols-8 gap-2 sm:gap-3 lg:gap-5">
    <div class="col-span-1 lg:col-span-2">
        <div class="shadow shadow-gray-400 rounded-md bg-gray-300 border-2 border-green-600 p-5 lg:p-8 font-semibold h-96 md:h-144  xl:h-[80vh] overflow-y-auto">
            <?php echo $__env->make('STANDARD_PRODUCTS/component/productSideBar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

    <div class="shadow shadow-gray-400 col-span-2 lg:col-span-4 rounded-md border-2 border-green-600 h-96 md:h-144 xl:h-[80vh]">
        <h3 class="font-semibold bg-green-600 md:text-md text-center text-white py-1.5"><?php echo e($model); ?></h3>
        <img class="contrast-125 object-scale-down h-[95%] mx-auto p-6 md:p-8 lg:p-12" src="<?php echo e(url($imageURL)); ?>">
    </div>

    <div class="grid grid-cols-3 gap-2 sm:gap-3 col-span-3 lg:flex lg:flex-col lg:col-span-2 xl:h-[80vh]">
        <a href="<?php echo e(url('assembly_parts/'.$group.'/'.$model)); ?>" class="shadow shadow-gray-400 text-xs md:text-sm lg:text-base items-center text-center font-inter font-medium flex item-center justify-center transition hover:bg-green-600 hover:text-white rounded-md bg-gray-300 border-2 border-green-600 lg:h-20 p-2">
            <span>
                ASSEMBLY PARTS
            </span>
        </a>
        <a href="<?php echo e(url('technical_data/'.$group.'/'.$model)); ?>"  class="shadow shadow-gray-400 text-xs md:text-sm lg:text-base items-center text-center font-inter font-medium flex item-center justify-center transition hover:bg-green-600 hover:text-white rounded-md bg-gray-300 border-2 border-green-600 lg:h-20 p-2">
                <span>
                    TECHNICAL DATA
                </span>
        </a>
        <a href="<?php echo e(url('cost_estimation')); ?>" class="shadow shadow-gray-400 text-xs md:text-sm lg:text-base text-center font-inter font-medium flex items-center justify-center transition hover:bg-green-600 hover:text-white rounded-md bg-green-100 border-2 border-green-600 lg:h-20 p-2">
            <span>
                COST ESTIMATION
            </span>
        </a>
        <a href="<?php echo e(url('quotation/'.$group.'/'.$model)); ?>" class="p-2 lg:h-full shadow shadow-gray-400 text-xs md:text-sm lg:text-lg text-center items-center font-inter font-medium lg:font-bold flex item-center justify-center transition hover:bg-green-600 hover:text-white rounded-md bg-green-100 border-2 border-green-600">
            <span>
                QUOTATION
            </span>
        </a>
        <a href="<?php echo e(url('authentication/login')); ?>" class="shadow shadow-gray-400 text-xs md:text-sm lg:text-base text-center font-inter font-medium flex items-center justify-center transition hover:bg-green-600 hover:text-white rounded-md bg-orange-200 border-2 border-green-600 p-2 lg:h-20">
            <span>
                UPDATE COST
            </span>
        </a>
        <a href="https://www.appsheet.com/start/aef75d1b-a90a-4961-81fb-ba43f29d27b2?platform=desktop#viewStack[0][identifier][Type]=Control&viewStack[0][identifier][Name]=Inventory(%E0%B8%A3%E0%B8%B1%E0%B8%9A%E0%B9%80%E0%B8%82%E0%B9%89%E0%B8%B2)&appName=StockStoreV1-11909385" 
        class="shadow shadow-gray-400 text-xs md:text-sm lg:text-base text-center font-inter font-medium flex items-center justify-center transition hover:bg-green-600 hover:text-white rounded-md bg-orange-200 border-2 border-green-600 lg:h-20 p-2">
            <span>
                UPDATE STOCK
            </span>
        </a>
    </div>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('STANDARD_PRODUCTS/layout/defaultLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\my-project\miscibles-platform\src\resources\views/STANDARD_PRODUCTS/page/standard_products.blade.php ENDPATH**/ ?>