<?php $__env->startSection('content'); ?>
<section class="bg-white">
    <div class="lg:grid lg:min-h-screen lg:grid-cols-12">
        <section class="relative flex h-32 items-end bg-gray-800 lg:col-span-5 lg:h-full xl:col-span-6">
            <img alt="NA" src="/images/server-bg.png" class="absolute inset-0 h-full w-full object-cover opacity-20" />
            <div class="hidden lg:relative lg:block lg:p-12 justify-center items-center">
                <a class="block" href="<?php echo e(url('/')); ?>">
                    <span class="sr-only">Home</span>
                    <img src="/svg/NEX-logo.svg" alt="NA" class="h-32 bg-white p-8 rounded-md">
                </a>

                <h2 class="mt-6 text-2xl font-bold text-white sm:text-3xl md:text-4xl">
                    Pdf access
                </h2>
            </div>
        </section>

        <main class="flex items-center justify-center px-8 py-8 sm:px-12 lg:col-span-7 lg:px-16 lg:py-12 xl:col-span-6">
            <div class="max-w-xl lg:max-w-3xl flex flex-col items-center justify-center">
                <div class="relative -mt-20 lg:hidden flex flex-col items-center justify-center">
                    <a class="rounded-md mb-20" href="<?php echo e(url('/')); ?>">
                        <span class="sr-only">Home</span>
                        <img src="/svg/NEX-logo.svg" alt="NA" class="h-24 bg-white p-4 px-8 rounded-md">
                    </a>

                    <h1 class="mt-2 text-2xl font-bold text-gray-900 sm:text-3xl md:text-4xl">
                        Pdf access
                    </h1>
                </div>

                <form enctype="application/x-www-form-urlencoded" action="<?php echo e(config('app.env') == 'production' ? secure_url('pdf-access/'.$type .'/'.$key) : url('pdf-access/'.$type .'/'.$key)); ?>" method="post" class="flex flex-col gap-4 items-center justify-center">
                    <?php echo csrf_field(); ?>
                    <label for="password">Enter Password to Access PDF:</label>
                    <input type="password" name="password" class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm">
                    <?php if (isset($component)) { $__componentOriginal13113c9f32f6116c43cb9fbecee94495 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal13113c9f32f6116c43cb9fbecee94495 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.submit-button','data' => ['type' => 'submit']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('submit-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit']); ?>Access <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal13113c9f32f6116c43cb9fbecee94495)): ?>
<?php $attributes = $__attributesOriginal13113c9f32f6116c43cb9fbecee94495; ?>
<?php unset($__attributesOriginal13113c9f32f6116c43cb9fbecee94495); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal13113c9f32f6116c43cb9fbecee94495)): ?>
<?php $component = $__componentOriginal13113c9f32f6116c43cb9fbecee94495; ?>
<?php unset($__componentOriginal13113c9f32f6116c43cb9fbecee94495); ?>
<?php endif; ?>
                    <?php if($errors->any()): ?>
                    <div class="text-danger-normal">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                </form>
            </div>
        </main>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/blank', ['title' => 'PDF Access'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\NEX\miscibles-platform-2.2\src\resources\views/pages/authentication/pdf-access.blade.php ENDPATH**/ ?>