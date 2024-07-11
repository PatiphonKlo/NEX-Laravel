<style>
    .accordion li>a {
        display: none;
    }

    .accordion .flipY {
        transform: rotate3d(1, 0, 0, 180deg);
    }

    .accordion svg {
        transition: all 1s cubic-bezier(0, .5, 0, 1);
    }

</style>

<!-- Accordion start -->
<ul class="accordion w-full">
    <?php $__empty_1 = true; $__currentLoopData = $groupedModel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

    <li class="cursor-pointer flex flex-col w-full text-xs sm:text-sm transition duration-300 group hover:bg-gray-200 rounded-sm">
        <div class="flex">
            <span class="flex-1 ml-1 text-left p-1"><?php echo e($key); ?></span>
            <svg class="w-2.5 h-2.5 sm:h-3 sm:w-3 m-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
            </svg>
        </div>

        <button class="flex w-full text-gray-600 transition duration-300 pl-3 group hover:bg-gray-100 text-left p-1 text-xs">
            <?php echo e($item['product_model']); ?>

        </button>
    </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <div class="flex">
        <span>No data avaliable.</span>
    </div>
    <?php endif; ?>
</ul>
<!-- Accordion end -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
<script>
    $(document).on('click', '.accordion li', function(e) {
        $(this).find('a').slideToggle();
        $(this).find('svg').toggleClass('flipY');
    });

</script>
<?php /**PATH C:\my-project\miscibles-platform\src\resources\views/STANDARD_PRODUCTS/component/productSideBar.blade.php ENDPATH**/ ?>