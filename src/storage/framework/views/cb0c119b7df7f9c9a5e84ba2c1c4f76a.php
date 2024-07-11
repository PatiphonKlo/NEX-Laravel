



<div>
    <form <?php echo e('method=' . $method); ?> <?php echo e($attributes); ?>>
        <?php echo csrf_field(); ?>
        
        <?php echo e($slot); ?>

    </form>
</div>

<?php /**PATH C:\miscibles-platform\src\resources\views/components/form.blade.php ENDPATH**/ ?>