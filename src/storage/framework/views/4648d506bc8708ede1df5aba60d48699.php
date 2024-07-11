<script>
    function goBack() {
      window.history.back();
    }
</script>

<button onclick="goBack()" class="<?php echo e($class ?? ''); ?> <?php echo e($attributes); ?>>
    <?php echo e($slot); ?>

</button>
<?php /**PATH C:\Users\patip\NEX\miscibles-platform-2.4\src\resources\views/components/go-back-button.blade.php ENDPATH**/ ?>