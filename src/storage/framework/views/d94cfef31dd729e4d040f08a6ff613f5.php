<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet"/>
    <?php echo $__env->yieldContent('link'); ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css','resources/js/app.js']); ?>
  </head>
<body>    

      <?php if(request()->is('admin/product')): ?>
      hello
        <?php echo $__env->make('CONTENT_MANAGEMENT_SYSTEM/page/products', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php elseif(request()->is('admin/assembly_part')): ?>
        <?php echo $__env->make('CONTENT_MANAGEMENT_SYSTEM/page/assembly_parts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php elseif(request()->is('admin/technical_data')): ?>  
        <?php echo $__env->make('CONTENT_MANAGEMENT_SYSTEM/page/technical_data', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php endif; ?>


  </body>
</html><?php /**PATH C:\my-project\miscibles-platform\src\resources\views/CONTENT_MANAGEMENT_SYSTEM/page/admin.blade.php ENDPATH**/ ?>