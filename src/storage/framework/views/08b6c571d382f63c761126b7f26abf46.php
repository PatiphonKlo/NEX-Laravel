<button type="button" id="update-cost-button-<?php echo e($data['KEY']); ?>" onclick="updatecostButton<?php echo e($data['KEY']); ?>()" class="w-full inline-flex items-center px-3 py-2 text-xs font-medium text-center text-white bg-yellow-500 rounded-md hover:bg-yellow-900">
    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 22" xmlns="http://www.w3.org/2000/svg">
        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
    </svg>
    UPDATE
</button>
<div id="popup-modal-update-cost-<?php echo e($data['KEY']); ?>" class="hidden relative z-50" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-gray-900 bg-opacity-50 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen">
        <div id="overlay-update-cost-<?php echo e($data['KEY']); ?>" class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">
            <div class="p-5 relative transform rounded-lg bg-white text-left shadow-xl transition-all sm:max-w-3xl lg:max-w-6xl">

                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                    <h3 class="text-lg font-semibold text-gray-900">
                        EDIT <?php echo e($data['GROUP']); ?> COST
                    </h3>
                    <button type="button" id="update-cost-close-button-<?php echo e($data['KEY']); ?>" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-3 sm:p-8 overflow-y-auto" action="<?php echo e(url('admin/update_cost_estimation/' . $data['KEY'])); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="mb-3 sm:w-80">
                        <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => ['for' => 'min_cost_update'.e($key).'','value' => 'Minimum Cost (Baht)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'min_cost_update'.e($key).'','value' => 'Minimum Cost (Baht)']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $attributes = $__attributesOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__attributesOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $component = $__componentOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__componentOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal5740c4900e05307fed98439eed8834c4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5740c4900e05307fed98439eed8834c4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input2','data' => ['id' => 'min_cost_update'.e($key).'','type' => 'number','name' => 'min_cost_update'.e($key).'','value' => ''.e(old('min_cost_update'.$key) ?? $data['MIN_COST']).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input2'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'min_cost_update'.e($key).'','type' => 'number','name' => 'min_cost_update'.e($key).'','value' => ''.e(old('min_cost_update'.$key) ?? $data['MIN_COST']).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5740c4900e05307fed98439eed8834c4)): ?>
<?php $attributes = $__attributesOriginal5740c4900e05307fed98439eed8834c4; ?>
<?php unset($__attributesOriginal5740c4900e05307fed98439eed8834c4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5740c4900e05307fed98439eed8834c4)): ?>
<?php $component = $__componentOriginal5740c4900e05307fed98439eed8834c4; ?>
<?php unset($__componentOriginal5740c4900e05307fed98439eed8834c4); ?>
<?php endif; ?>
                    </div>
                    <div class="mb-8 sm:w-80">
                        <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => ['for' => 'max_cost_update'.e($key).'','value' => 'Maximum Cost (Baht)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'max_cost_update'.e($key).'','value' => 'Maximum Cost (Baht)']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $attributes = $__attributesOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__attributesOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $component = $__componentOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__componentOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal5740c4900e05307fed98439eed8834c4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5740c4900e05307fed98439eed8834c4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input2','data' => ['id' => 'max_cost_update'.e($key).'','type' => 'number','name' => 'max_cost_update'.e($key).'','value' => ''.e(old('max_cost_update'.$key) ?? $data['MAX_COST']).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input2'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'max_cost_update'.e($key).'','type' => 'number','name' => 'max_cost_update'.e($key).'','value' => ''.e(old('max_cost_update'.$key) ?? $data['MAX_COST']).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5740c4900e05307fed98439eed8834c4)): ?>
<?php $attributes = $__attributesOriginal5740c4900e05307fed98439eed8834c4; ?>
<?php unset($__attributesOriginal5740c4900e05307fed98439eed8834c4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5740c4900e05307fed98439eed8834c4)): ?>
<?php $component = $__componentOriginal5740c4900e05307fed98439eed8834c4; ?>
<?php unset($__componentOriginal5740c4900e05307fed98439eed8834c4); ?>
<?php endif; ?>
                    </div>

                    <input name="updateKey" id="key" type="hidden" value="<?php echo e($key); ?>">

                    <button type="submit" class="text-white inline-flex items-center bg-green-500 hover:bg-green-900 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                            </path>
                            <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                        </svg>
                        Update Cost
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php if(
!(
$errors->has('name_update' . $key) ||
$errors->has('group_update' . $key) ||
$errors->has('model_update' . $key) ||
$errors->has('price_update' . $key) ||
$errors->has('assurance_update' . $key) ||
$errors->has('down_payment_update' . $key) ||
$errors->has('after_install_update' . $key) ||
$errors->has('final_check_update' . $key) ||
$errors->has('price_validity_update' . $key) ||
$errors->has('assembly_update' . $key) ||
$errors->has('technical_update' . $key) ||
$errors->has('delivery_term_update' . $key) ||
$errors->has('credit_update' . $key) ||
$errors->has('discount_update' . $key) ||
$errors->has('picture_update' . $key) ||
$errors->has('front_update' . $key) ||
$errors->has('side_update' . $key) ||
$errors->has('top_update' . $key) ||
$errors->has('description_update' . $key)
)): ?>
<script>
    function updatecostButton<?php echo e($data['KEY']); ?>() {
        let update_cost_button = document.getElementById('update-cost-button-<?php echo e($data['KEY']); ?>')
        let update_cost_modal = document.getElementById('popup-modal-update-cost-<?php echo e($data['KEY']); ?>')
        let update_cost_close_button = document.getElementById('update-cost-close-button-<?php echo e($data['KEY']); ?>')
        let overlay = document.getElementById('overlay-update-cost-<?php echo e($data['KEY']); ?>');

        update_cost_modal.classList.remove('hidden')

        update_cost_close_button.onclick = function() {
            update_cost_modal.classList.add('hidden')
        }

        window.onclick = function(event) {
            if (event.target == overlay) {
                update_cost_modal.classList.add('hidden')
            }
        }
    }

</script>
<?php endif; ?>

<?php if(
$errors->has('name_update' . $key) ||
$errors->has('group_update' . $key) ||
$errors->has('model_update' . $key) ||
$errors->has('price_update' . $key) ||
$errors->has('assurance_update' . $key) ||
$errors->has('down_payment_update' . $key) ||
$errors->has('after_install_update' . $key) ||
$errors->has('final_check_update' . $key) ||
$errors->has('price_validity_update' . $key) ||
$errors->has('assembly_update' . $key) ||
$errors->has('technical_update' . $key) ||
$errors->has('delivery_term_update' . $key) ||
$errors->has('credit_update' . $key) ||
$errors->has('discount_update' . $key) ||
$errors->has('picture_update' . $key) ||
$errors->has('front_update' . $key) ||
$errors->has('side_update' . $key) ||
$errors->has('top_update' . $key) ||
$errors->has('description_update' . $key)): ?>
<script>
    function updatecostButton<?php echo e($data['KEY']); ?>() {
        let update_cost_button = document.getElementById('update-cost-button-<?php echo e($data['KEY']); ?>')
        let update_cost_modal = document.getElementById('popup-modal-update-cost-<?php echo e($data['KEY']); ?>')
        let update_cost_close_button = document.getElementById('update-cost-close-button-<?php echo e($data['KEY']); ?>')
        let overlay = document.getElementById('overlay-update-cost-<?php echo e($data['KEY']); ?>');
        update_cost_modal.classList.remove('hidden')
        update_cost_close_button.onclick = function() {
            update_cost_modal.classList.add('hidden')
        }
        window.onclick = function(event) {
            if (event.target == overlay) {
                update_cost_modal.classList.add('hidden')
            }
        }
    }
</script>
<?php endif; ?>
<?php /**PATH C:\my-project\miscibles-platform-development\src\resources\views/CONTENT_MANAGEMENT_SYSTEM/component/costUpdateModal.blade.php ENDPATH**/ ?>