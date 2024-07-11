<script>
    function goBack() {
      window.history.back();
    }
</script>

<button onclick="goBack()" class="<?php echo e($class ?? ''); ?> <?php echo e($attributes); ?>>
    <?php echo e($slot); ?>

</button>
<?php /**PATH C:\my-project\miscibles-platform\src\resources\views/components/go-back-button.blade.php ENDPATH**/ ?>