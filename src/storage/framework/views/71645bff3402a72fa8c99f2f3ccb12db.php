<!DOCTYPE html>
<html lang="en" data-topbar-view="<?php echo e($headbar ?? 'default'); ?>">

<head>
    <?php echo $__env->make('layouts.shared/title-meta', ['title' => $title], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('css'); ?>
    <?php echo $__env->make('layouts/shared/head-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>

    <div id="">

        <?php echo $__env->make('layouts/shared/topbar', [
        'title' => $title,
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('layouts/shared/status-alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <main class="flex-grow p-6">
            <?php echo $__env->yieldContent('header'); ?>
            <?php echo $__env->yieldContent('content'); ?>
            <?php echo $__env->yieldContent('footer'); ?>
        </main>

        <?php echo $__env->make('layouts/shared/back-to-top-button', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo app('Illuminate\Foundation\Vite')(['resources/js/app.js']); ?>

    </div>

</body>
</html>
<?php /**PATH C:\my-project\miscibles-platform\src\resources\views/a-new-view/layouts/default.blade.php ENDPATH**/ ?>