

<?php $__env->startSection('content'); ?>
<div class="mt-4 grid grid-cols-3 lg:grid-cols-8 gap-2 sm:gap-3 lg:gap-5">
    <div class="col-span-1 lg:col-span-2">
        <div class="shadow shadow-gray-400 rounded-md bg-secondary border-2 border-primary p-5 lg:p-8 font-semibold h-96 md:h-144  xl:h-[80vh] overflow-y-auto">
            <?php echo $__env->make('pages/user/components/product-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

    <div class="shadow shadow-gray-400 col-span-2 lg:col-span-4 rounded-md border-2 border-primary h-96 md:h-144 xl:h-[80vh]">
        <h3 id="header-element" class="font-semibold md:text-md text-center text-white py-1.5"></h3>
        <img id="model-image" class="miscible-logo contrast-125 object-scale-down h-[95%] mx-auto p-6 md:p-8 lg:p-12" src="/svg/miscible-logo.svg" alt="image not avaliable">
    </div>

    <div id="nav-list" class="grid grid-cols-3 gap-2 sm:gap-3 col-span-3 lg:flex lg:flex-col lg:col-span-2 xl:h-[80vh]">
        <a id="linkElement1" data-url="<?php echo e(url('assembly-part')); ?>" href="javascript:void(0)" class="shadow shadow-gray-400 text-xs md:text-sm lg:text-base items-center text-center font-inter font-medium flex item-center justify-center transition hover:bg-primary hover:text-white rounded-md bg-secondary border-2 border-primary lg:h-20 p-2">
            <span>
                ASSEMBLY PARTS
            </span>
        </a>
        <a id="linkElement2" data-url="<?php echo e(url('technical-data')); ?>" href="javascript:void(0)" class=" shadow shadow-gray-400 text-xs md:text-sm lg:text-base items-center text-center font-inter font-medium flex item-center justify-center transition hover:bg-primary hover:text-white rounded-md bg-secondary border-2 border-primary lg:h-20 p-2">
            <span>
                TECHNICAL DATA
            </span>
        </a>
        <a href="<?php echo e(url('cost-estimation')); ?>" class="shadow shadow-gray-400 text-xs md:text-sm lg:text-base text-center font-inter font-medium flex items-center justify-center transition hover:bg-primary hover:text-white rounded-md bg-green-100 border-2 border-primary lg:h-20 p-2">
            <span>
                COST ESTIMATION
            </span>
        </a>
        <a id="linkElement3" data-url="<?php echo e(url('quotation')); ?>" href="javascript:void(0)" class="p-2 lg:h-full shadow shadow-gray-400 text-xs md:text-sm lg:text-lg text-center items-center font-inter font-medium lg:font-bold flex item-center justify-center transition hover:bg-primary hover:text-white rounded-md bg-green-100 border-2 border-primary">
            <span>
                QUOTATION
            </span>
        </a>
        <a href="<?php echo e(url('admin/product')); ?>" class="shadow shadow-gray-400 text-xs md:text-sm lg:text-base text-center font-inter font-medium flex items-center justify-center transition hover:bg-primary hover:text-white rounded-md bg-orange-200 border-2 border-primary p-2 lg:h-20">
            <span>
                UPDATE COST
            </span>
        </a>
        <a href="https://www.appsheet.com/start/aef75d1b-a90a-4961-81fb-ba43f29d27b2?platform=desktop#viewStack[0][identifier][Type]=Control&viewStack[0][identifier][Name]=Inventory(%E0%B8%A3%E0%B8%B1%E0%B8%9A%E0%B9%80%E0%B8%82%E0%B9%89%E0%B8%B2)&appName=StockStoreV1-11909385" class="shadow shadow-gray-400 text-xs md:text-sm lg:text-base text-center font-inter font-medium flex items-center justify-center transition hover:bg-primary hover:text-white rounded-md bg-orange-200 border-2 border-primary lg:h-20 p-2">
            <span>
                UPDATE STOCK
            </span>
        </a>
    </div>
</div>


<script>
    let showImageCalled = false;
    const links = document.querySelectorAll('#nav-list a[href="javascript:void(0)"]');
    const modal = document.getElementById('status-alert-client-side');
    const alertText = modal.querySelector('p');

    links.forEach(element => {
        element.addEventListener('click', function(event) {
            const clickedElement = event.target;
            if (showImageCalled) {
            } else {
                event.preventDefault();
                modal.classList.remove('hidden'); 
                alertText.innerText = 'User must selected the product before this action.';
            }
        });
    });

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/primary',['title' => 'Standard Products'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\NEX\miscibles-platform\src\resources\views/pages/user/standard-product.blade.php ENDPATH**/ ?>