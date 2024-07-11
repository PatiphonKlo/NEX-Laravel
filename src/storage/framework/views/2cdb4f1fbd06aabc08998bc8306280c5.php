

<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['options', 'name', 'otherInputName','data']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['options', 'name', 'otherInputName','data']); ?>
<?php foreach (array_filter((['options', 'name', 'otherInputName','data']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<div class="pl-6 bg-white rounded-t-md py-2 mb-2 flex">
    <label for="<?php echo e($name); ?>"><?php echo e($slot); ?></label>
    <?php $__errorArgs = [$name];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    <span id="error-message" class="text-red-600 pl-2"><?php echo e($message); ?></span>
    <svg class="w-4 h-4 text-red-700 mt-0.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z" />
    </svg>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>
<div class="my-2">
    <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
        $isCheckedOther = !in_array($data, array_column($options, 'value'));
    ?>
    <?php if($option['value'] !='others'): ?>
    <div>
        <label class="inline-flex items-center ml-6">
            <input type="radio" id="<?php echo e($option['id']); ?>" name="<?php echo e($name); ?>" value="<?php echo e($option['value']); ?>" class="text-primary focus:ring-white" onclick="toggleOptionalInput('<?php echo e($name); ?>', '<?php echo e($otherInputName); ?>')" <?php echo e($data == $option['value'] ? 'checked': ''); ?>>
            <span class="ml-2"><?php echo e($option['label']); ?></span>
        </label>
    </div>
    <?php else: ?>
    <div>
        <label class="inline-flex items-center ml-6">
            <input type="radio" id="<?php echo e($option['id']); ?>" name="<?php echo e($name); ?>" value="<?php echo e($option['value']); ?>" class="text-primary focus:ring-white" onclick="toggleOptionalInput('<?php echo e($name); ?>', '<?php echo e($otherInputName); ?>')" <?php echo e($isCheckedOther ? 'checked' : ''); ?>>
            <span class="ml-2"><?php echo e($option['label']); ?></span>
        </label>
    </div>
    <?php endif; ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <input type="text" id="<?php echo e($otherInputName); ?>" name="<?php echo e($otherInputName); ?>" value="<?php echo e((old($otherInputName)) ?? ($isCheckedOther ? $data : '')); ?>" class="text-sm <?php echo e($isCheckedOther ? '' : 'hidden'); ?> w-[90%] shadow-sm border-none ml-6 py-2 px-4 mt-2 mb-4 bg-white rounded-md placeholder:text-sm placeholder:text-gray-300" placeholder="Type Others . . .">
</div>

<script>
    window.onload = function() {
        var errorMessages = document.getElementById("error-message");
        if (errorMessages) {
            var position = errorMessages.getBoundingClientRect().top + window.pageYOffset - 100; // 100px offset
            window.scrollTo({
                top: position
                , behavior: 'smooth'
            });
        }
    };

</script>
<script>
    function toggleOptionalInput(radioGroupName, optionalInputId) {
        var selectedValue = document.querySelector(`input[name="${radioGroupName}"]:checked`).value;
        var optionalInput = document.getElementById(optionalInputId);
        if (selectedValue === 'others') {
            optionalInput.classList.remove('hidden');
        } else {
            optionalInput.classList.add('hidden');
        }
    }
   
    document.addEventListener('DOMContentLoaded', function() {
        toggleOptionalInput('<?php echo e($name); ?>', '<?php echo e($otherInputName); ?>');
    });

</script>
<?php /**PATH C:\my-project\miscibles-platform\src\resources\views/components/radio-input-edit.blade.php ENDPATH**/ ?>