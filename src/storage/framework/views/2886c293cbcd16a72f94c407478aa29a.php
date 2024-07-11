<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['disabled' => false]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['disabled' => false]); ?>
<?php foreach (array_filter((['disabled' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php
$class = $errors->has($attributes->get('name')) ?
'text-sm p-4 pr-8 h-8 rounded-md border-1 border-red-600 w-full':
'text-sm p-4 h-8 rounded-md border-none border-gray-300 shadow-sm w-full';
?>


<?php if($errors->has($attributes->get('name'))): ?>
<div class="w-full flex justify-end items-center relative">
    <input <?php echo e($disabled ? 'disabled':''); ?> <?php echo e($attributes->merge(['class' => $class])); ?>>
    <svg class="w-4 h-4 text-red-700 absolute mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z" />
    </svg>
</div>
<?php $__errorArgs = [$attributes->get('name')];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    <div id="error-message" class="text-red-600"><?php echo e($message); ?></div>
<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
<?php else: ?>
    <input <?php echo e($disabled ? 'disabled':''); ?> <?php echo e($attributes->merge(['class' => $class])); ?>>
<?php endif; ?>
<?php /**PATH C:\NEX\miscibles-platform-2.1\src\resources\views/components/input.blade.php ENDPATH**/ ?>