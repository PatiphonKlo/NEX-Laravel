<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('layouts/shared/title-meta', ['title' => $title], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css']); ?>
    <?php echo $__env->yieldContent('css'); ?>
</head>

<body>

    <?php echo $__env->make('layouts/shared/status-alert-server-side', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('layouts/shared/status-alert-client-side', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <main class="flex-grow p-4 lg:p-8">
        <?php echo $__env->make('layouts/shared/topbar-1', [
        'title' => $title,
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('header'); ?>
        <?php echo $__env->yieldContent('content'); ?>
        <?php echo $__env->yieldContent('footer'); ?>
        <?php echo $__env->make('layouts/shared/back-to-top-button', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </main>

    <?php echo app('Illuminate\Foundation\Vite')(['resources/js/app.js']); ?>

</body>
</html>
<?php /**PATH C:\miscibles-platform - Copy\miscibles-platform\src\resources\views/layouts/primary.blade.php ENDPATH**/ ?>