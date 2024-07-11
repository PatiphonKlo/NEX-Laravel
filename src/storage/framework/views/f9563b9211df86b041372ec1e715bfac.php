<!-- Top bar -->
<nav class="font-semibold uppercase">
    <div class="max-w-screen flex flex-wrap lg:grid grid-cols-12 lg:gap-5 items-center justify-between mx-auto">

        <!-- Hamberger button -->
        <button data-collapse-toggle="navbar-default" type="button"
            class="inline-flex items-center w-10 h-10 justify-center text-sm text-gray-900 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none"
            aria-controls="navbar-default" aria-expanded="false">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>

        <!-- Logo(small screen) -->
        <div class="lg:hidden flex-nowrap">
            <?php if (isset($component)) { $__componentOriginal90eee3f94ef0e1b15e49c277c8700e9b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal90eee3f94ef0e1b15e49c277c8700e9b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.link','data' => ['href' => 'http://www.miscible.co.th/']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => 'http://www.miscible.co.th/']); ?>
                <img src="/svg/NEX-logo.svg" alt="NEX logo" class="h-7 ss:h-8" />
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal90eee3f94ef0e1b15e49c277c8700e9b)): ?>
<?php $attributes = $__attributesOriginal90eee3f94ef0e1b15e49c277c8700e9b; ?>
<?php unset($__attributesOriginal90eee3f94ef0e1b15e49c277c8700e9b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal90eee3f94ef0e1b15e49c277c8700e9b)): ?>
<?php $component = $__componentOriginal90eee3f94ef0e1b15e49c277c8700e9b; ?>
<?php unset($__componentOriginal90eee3f94ef0e1b15e49c277c8700e9b); ?>
<?php endif; ?>
        </div>

        <!-- Top bar content -->
        <div id="navbar-default" class="hidden w-full lg:block lg:w-auto col-span-9">
            <ul
                class="lg:grid grid-cols-9 gap-3 lg:gap-5  mt-1 rounded-md lg:flex-row lg:mt-0 bg-secondary lg:bg-white">
                <li class="col-span-3">
                    <div
                        class="text-white flex justify-center rounded-t-md lg:rounded-md bg-primary lg:border-2 border-primary p-2">
                        <?php echo e($title); ?>

                    </div>
                </li>
                <li class="hidden lg:block col-span-3">
                    <div
                        class="flex justify-center bg-primary text-white lg:rounded-md lg:border-2 border-primary p-2">
                        <?php echo e($subtitle); ?>

                    </div>
                </li>
                <li>
                    <?php if (isset($component)) { $__componentOriginalb7692249406857f3fda7ec9bb490d00f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb7692249406857f3fda7ec9bb490d00f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.go-back-button','data' => ['class' => 'uppercase w-full text-center font-inter font-semibold flex justify-center transition hover:bg-primary hover:text-white lg:rounded-md bg-secondary lg:border-2 border-primary p-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('go-back-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'uppercase w-full text-center font-inter font-semibold flex justify-center transition hover:bg-primary hover:text-white lg:rounded-md bg-secondary lg:border-2 border-primary p-2']); ?>
                        back
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb7692249406857f3fda7ec9bb490d00f)): ?>
<?php $attributes = $__attributesOriginalb7692249406857f3fda7ec9bb490d00f; ?>
<?php unset($__attributesOriginalb7692249406857f3fda7ec9bb490d00f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb7692249406857f3fda7ec9bb490d00f)): ?>
<?php $component = $__componentOriginalb7692249406857f3fda7ec9bb490d00f; ?>
<?php unset($__componentOriginalb7692249406857f3fda7ec9bb490d00f); ?>
<?php endif; ?>
                </li>
                <li>
                    <?php if (isset($component)) { $__componentOriginal90eee3f94ef0e1b15e49c277c8700e9b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal90eee3f94ef0e1b15e49c277c8700e9b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.link','data' => ['href' => ''.e(url('/')).'','class' => 'flex justify-center transition hover:bg-primary hover:text-white lg:rounded-md rounded-b-md bg-secondary lg:border-2 border-primary p-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(url('/')).'','class' => 'flex justify-center transition hover:bg-primary hover:text-white lg:rounded-md rounded-b-md bg-secondary lg:border-2 border-primary p-2']); ?>
                        home
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal90eee3f94ef0e1b15e49c277c8700e9b)): ?>
<?php $attributes = $__attributesOriginal90eee3f94ef0e1b15e49c277c8700e9b; ?>
<?php unset($__attributesOriginal90eee3f94ef0e1b15e49c277c8700e9b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal90eee3f94ef0e1b15e49c277c8700e9b)): ?>
<?php $component = $__componentOriginal90eee3f94ef0e1b15e49c277c8700e9b; ?>
<?php unset($__componentOriginal90eee3f94ef0e1b15e49c277c8700e9b); ?>
<?php endif; ?>
                </li>
            </ul>
        </div>

        <!-- sub title(small screen) -->
        <div class="mt-2 lg:hidden w-full bg-primary rounded-md">
            <h1 class="font-semibold text-center text-white p-2.5"><?php echo e($subtitle); ?></h1>
        </div>

        <!-- Logo(normal screen) -->
        <?php if (isset($component)) { $__componentOriginal90eee3f94ef0e1b15e49c277c8700e9b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal90eee3f94ef0e1b15e49c277c8700e9b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.link','data' => ['href' => ''.e(url('/')).'','class' => 'hidden lg:flex col-start-11 col-span-2 justify-end items-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(url('/')).'','class' => 'hidden lg:flex col-start-11 col-span-2 justify-end items-center']); ?>
            <img src="/svg/NEX-logo.svg" alt="NEX logo" class="h-12 w-full" />
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal90eee3f94ef0e1b15e49c277c8700e9b)): ?>
<?php $attributes = $__attributesOriginal90eee3f94ef0e1b15e49c277c8700e9b; ?>
<?php unset($__attributesOriginal90eee3f94ef0e1b15e49c277c8700e9b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal90eee3f94ef0e1b15e49c277c8700e9b)): ?>
<?php $component = $__componentOriginal90eee3f94ef0e1b15e49c277c8700e9b; ?>
<?php unset($__componentOriginal90eee3f94ef0e1b15e49c277c8700e9b); ?>
<?php endif; ?>

    </div>
</nav>
<?php /**PATH C:\NEX\miscibles-platform-2.1\src\resources\views/layouts/shared/topbar-2.blade.php ENDPATH**/ ?>