<button type="button" id="update-quotation-button-<?php echo e($key); ?>"
    onclick="updateQuotationButton<?php echo e($key); ?>()"
    class="w-full inline-flex items-center px-3 py-2 text-xs font-medium text-center text-white bg-yellow-500 rounded-md hover:bg-yellow-900">
    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 22" xmlns="http://www.w3.org/2000/svg">
        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
        <path fill-rule="evenodd"
            d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
            clip-rule="evenodd"></path>
    </svg>
    VIEW
</button>
<div id="popup-modal-update-quotation-<?php echo e($key); ?>" class="hidden relative z-30">
    <div class="fixed inset-0 bg-gray-900 bg-opacity-50 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen">
        <div id="overlay-update-quotation-<?php echo e($key); ?>"
            class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">
            <div
                class="p-5 relative transform rounded-lg bg-white text-left shadow-xl transition-all max-w-full lg:max-w-6xl">

                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                    <h3 class="text-lg font-semibold text-gray-900 uppercase">
                        Quotation: <?php echo e($quotation['quotation_code']); ?>

                    </h3>
                    <button type="button" id="update-quotation-close-button-<?php echo e($key); ?>"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <!-- Modal body -->
                

                <div class="flex flex-col p-3 pr-4 h-[70vh] overflow-y-auto">
                    <div class="flex gap-x-2">

                        <?php if (isset($component)) { $__componentOriginal90eee3f94ef0e1b15e49c277c8700e9b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal90eee3f94ef0e1b15e49c277c8700e9b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.link','data' => ['href' => ''.e(url('admin/quotation-pdf/' . $quotation['quotation_id'])).'','class' => 'w-24 text-center text-base p-2.5 px-4 text-white bg-primary rounded-md hover:bg-green-500']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(url('admin/quotation-pdf/' . $quotation['quotation_id'])).'','class' => 'w-24 text-center text-base p-2.5 px-4 text-white bg-primary rounded-md hover:bg-green-500']); ?>
                            PDF
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

                    <div class="min-w-[210mm] min-h-[297mm] pr-4 pt-2 ">
                        <?php echo $__env->make('pages/admin/quotation/quotation-preview', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    
                </div>


            </div>
        </div>
    </div>
</div>

<script>
    function updateQuotationButton<?php echo e($key); ?>() {
        let update_quotation_button = document.getElementById('update-quotation-button-<?php echo e($key); ?>')
        let update_quotation_modal = document.getElementById('popup-modal-update-quotation-<?php echo e($key); ?>')
        let update_quotation_close_button = document.getElementById(
            'update-quotation-close-button-<?php echo e($key); ?>')
        let overlay = document.getElementById('overlay-update-quotation-<?php echo e($key); ?>');

        update_quotation_modal.classList.remove('hidden')

        update_quotation_close_button.addEventListener('click', function() {
            update_quotation_modal.classList.add('hidden')
        });

        window.addEventListener('click', function(event) {
            if (event.target == overlay) {
                update_quotation_modal.classList.add('hidden')
            }
        });
    }

    // let documentData = <?php echo json_encode($layoutData, 15, 512) ?>;

    // for (let i = 1; i <= 10; i++) {
    //     let headerKey = 'HEADER' + i;
    //     let headerValue = documentData[headerKey];
    //     document.getElementById('header' + i).setAttribute("value", headerValue);
    // }

    // let textValue = documentData['TEXTAREA1'];
    // let textarea = document.getElementById('textarea1')
    // textarea.value = textValue;

    // for (let i = 1; i <= 22; i++) {
    //     let key = 'CONTENT' + i;
    //     let contentValue = documentData[key];
    //     document.getElementById('content' + i).setAttribute("value", contentValue);
    // }

    // for (let i = 1; i <= 6; i++) {
    //     let key = 'FOOTER' + i;
    //     let footerValue = documentData[key];
    //     document.getElementById('footer' + i).setAttribute("value", footerValue);
    // }
</script>
<?php /**PATH C:\miscibles-platform\src\resources\views/pages/admin/quotation/modal-update.blade.php ENDPATH**/ ?>