<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet" />
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css','resources/js/app.js']); ?>
</head>
<body>
    <div class="bg-gray-100">

        <?php if(session('status')): ?>
        <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
            <p class="font-bold"><?php echo e(session('status')); ?></p>
        </div>
        <?php endif; ?>

        <div class="h-screen flex justify-center items-center">
            <div class="bg-white mx-4 p-8 rounded shadow-md w-full sm:w-1/2 lg:w-1/3">
                <img class="mx-auto" width="200px" src="/images/MISCIBLEs LOGO 1.jpg" alt="NEX logo" />
                <h1 class="text-xl font-bold mb-8 text-center uppercase">Login to Admin Panel</h1>
                <?php if (isset($component)) { $__componentOriginalf9a5f060e1fbbcbc7beb643b113b10ab = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf9a5f060e1fbbcbc7beb643b113b10ab = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form','data' => ['action' => ''.e(config('app.env') == 'production' ? secure_url('authentication/login') : url('authentication/login')).'','method' => 'POST']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => ''.e(config('app.env') == 'production' ? secure_url('authentication/login') : url('authentication/login')).'','method' => 'POST']); ?>
                    <div class="mb-4">
                        <label class="block font-semibold text-gray-900 mb-2" for="email">
                            Email Address
                        </label>
                        <input name="email" class="bg-gray-50 border border-gray-500 focus:ring-green-600 focus:border-green-600 rounded-lg w-full py-3 px-3 text-gray-900" id="email" type="email" placeholder="Enter your email address" required />
                    </div>
                    <div class="mb-4">
                        <label class="block font-semibold text-gray-900 mb-2" for="password">
                            Password
                        </label>
                        <input name="password" class="bg-gray-50 border border-gray-500 focus:ring-green-600 focus:border-green-600 rounded-lg w-full py-3 px-3 text-gray-900 mb-3" id="password" type="password" placeholder="Enter your password" required />
                        
                    </div>
                    <div class="mb-5">
                        <button type="submit" class="uppercase w-full bg-green-600 hover:bg-green-900 text-white font-bold py-2 px-4 rounded-lg">
                            Login
                        </button>
                    </div>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf9a5f060e1fbbcbc7beb643b113b10ab)): ?>
<?php $attributes = $__attributesOriginalf9a5f060e1fbbcbc7beb643b113b10ab; ?>
<?php unset($__attributesOriginalf9a5f060e1fbbcbc7beb643b113b10ab); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf9a5f060e1fbbcbc7beb643b113b10ab)): ?>
<?php $component = $__componentOriginalf9a5f060e1fbbcbc7beb643b113b10ab; ?>
<?php unset($__componentOriginalf9a5f060e1fbbcbc7beb643b113b10ab); ?>
<?php endif; ?>
                <a href="<?php echo e(url('standard_products')); ?>">
                    <button class="uppercase text-center w-full bg-green-600 hover:bg-green-900 text-white font-bold py-2 px-4 rounded-lg">
                        BACK
                    </button>
                </a>
            </div>
        </div>
    </div>
</body>
</html>

<?php /**PATH C:\my-project\miscibles-platform\src\resources\views/CONTENT_MANAGEMENT_SYSTEM/page/authentication.blade.php ENDPATH**/ ?>