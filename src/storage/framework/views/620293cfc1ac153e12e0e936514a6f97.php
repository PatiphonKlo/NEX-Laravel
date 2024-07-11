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
    <?php $__currentLoopData = $uniqueLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uniqueLists): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <!-- Duplicate this <li> as often as you want -->
    <li class="cursor-pointer flex flex-col w-full text-xs sm:text-sm transition duration-300 group hover:bg-gray-200 rounded-sm">
        <div class="flex">
            <span class="flex-1 ml-1 text-left p-1"><?php echo e($uniqueLists); ?></span>
            <svg class="w-2.5 h-2.5 sm:h-3 sm:w-3 m-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
            </svg>
        </div>
        
        <?php $__empty_1 = true; $__currentLoopData = $documentsDataFiltered; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <?php if($item['GROUP'] == $uniqueLists): ?>
            <a href="<?php echo e(url('standard_products/'.$item['GROUP'].'/'.$item['MODEL'])); ?>" class="flex w-full text-gray-600 transition duration-300 pl-3 group hover:bg-gray-100 text-left p-1 text-xs">
                <?php echo e($item['MODEL']); ?>

            </a>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <ol class="flex items-center w-full text-base text-left pl-5 text-red-700">Not Avalible</ol>
        <?php endif; ?>
    </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<!-- Accordion end -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
<script>
    $(document).on('click', '.accordion li', function(e) {
        $(this).find('a').slideToggle();
        $(this).find('svg').toggleClass('flipY');
    });

</script>
<?php /**PATH C:\my-project\miscibles-platform-development\src\resources\views/STANDARD_PRODUCTS/component/productSideBar.blade.php ENDPATH**/ ?>