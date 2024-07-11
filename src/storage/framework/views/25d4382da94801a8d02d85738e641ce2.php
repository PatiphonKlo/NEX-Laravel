<?php $__env->startSection('content'); ?>
    <div class="bg-gray-100">
        <div class="h-screen flex justify-center items-center">
            <div class="bg-white mx-4 p-8 rounded shadow-md w-full sm:w-1/2 lg:w-1/3">
                <img class="mx-auto" width="200px" src="/svg/NEX-logo.svg" alt="NEX logo" />
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
                        <label class="block font-semibold text-black mb-2" for="email">
                            Email Address
                        </label>
                        <input name="email"
                            class="bg-gray-50 border border-gray-500 focus:ring-bg-primary focus:border-bg-primary rounded-lg w-full py-3 px-3 text-black"
                            id="email" type="email" placeholder="Enter your email address" required />
                    </div>
                    <div class="mb-4">
                        <label class="block font-semibold text-black mb-2" for="password">
                            Password
                        </label>
                        <input name="password"
                            class="bg-gray-50 border border-gray-500 focus:ring-bg-primary focus:border-bg-primary rounded-lg w-full py-3 px-3 text-black mb-3"
                            id="password" type="password" placeholder="Enter your password" required />
                    </div>
                    <div class="mb-5">
                        <button type="submit"
                            class="uppercase w-full bg-primary hover:bg-green-900 text-white font-bold py-2 px-4 rounded-lg">
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
                <a href="<?php echo e(url('standard-product')); ?>">
                    <button
                        class="uppercase text-center w-full bg-primary hover:bg-green-900 text-white font-bold py-2 px-4 rounded-lg">
                        BACK TO STANDARD PRODUCT
                    </button>
                </a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/blank', ['title' => 'Authentication'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\NEX\miscibles-platform-2.2\src\resources\views/pages/authentication/login.blade.php ENDPATH**/ ?>