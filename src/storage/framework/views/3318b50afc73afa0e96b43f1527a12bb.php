

<?php $__env->startSection('content'); ?>
<div class="flex flex-col lg:grid grid-cols-2 pt-[2vh] gap-5">
    <div class="col-span-1 flex flex-col">
        <div class="shadow shadow-gray-400 border-2 border-primary lg:h-[580px] rounded-md px-8 overflow-y-auto">
            <?php echo $__env->make('pages/user/components/quotation-preview', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
    <div class="col-span-1 flex flex-col">
        <div class="shadow shadow-gray-400 border-2 border-primary lg:h-[580px] rounded-md flex items-center">
            <img class="contrast-125 object-scale-down h-[95%] mx-auto p-4" src="<?php echo e($imageURL); ?>">
        </div>
        <div class="grid grid-cols-3 gap-2 mt-[2vh]">
            <a href="<?php echo e(url('client-form/'.$group.'/'.$model)); ?>" class="col-start-3 col-span-1">
                <h2 class="p-2 uppercase border-2 border-green-500 bg-green-400 transition hover:bg-green-500 rounded-md text-center font-semibold">
                    request quotation
                </h2>
            </a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/secondary',[ 'title' => 'Quotation Request', 'subtitle' => $model], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\NEX\miscibles-platform\src\resources\views/pages/user/quotation-request.blade.php ENDPATH**/ ?>