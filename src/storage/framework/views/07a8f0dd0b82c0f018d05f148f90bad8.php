<button type="button" id="update-quotation-button-<?php echo e($key); ?>"
    onclick="updateQuotationButton<?php echo e($key); ?>()"
    class="w-full inline-flex items-center px-3 py-2 text-xs font-medium text-center text-white bg-primary rounded-md hover:bg-green-900">
    <svg class="w-4 h-4 mr-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-width="2"
            d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
        <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.link','data' => ['href' => ''.e(url('admin/quotation-pdf/' . $quotation['quotation_id'])).'','class' => 'w-24 text-center text-base p-2.5 px-4 text-white bg-primary rounded-md hover:bg-green-500 inline-flex']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(url('admin/quotation-pdf/' . $quotation['quotation_id'])).'','class' => 'w-24 text-center text-base p-2.5 px-4 text-white bg-primary rounded-md hover:bg-green-500 inline-flex']); ?>
                            <svg class="w-5 h-4 mr-2 mt-1 text-white" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" 
                                        viewBox="0 0 200 256" xml:space="preserve">
                                        <defs>
                                        </defs>
                                        <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;"
                                            transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
                                            <path
                                                d="M 11.58 54.882 v 31.965 c 0 1.741 1.412 3.153 3.153 3.153 h 60.534 c 1.741 0 3.153 -1.412 3.153 -3.153 V 54.882 C 56.073 47.881 33.792 47.838 11.58 54.882 z"
                                                style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(184,53,53); fill-rule: nonzero; opacity: 1;"
                                                transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                            <path
                                                d="M 78.42 54.882 V 18.345 C 69.386 13.658 63.133 7.61 60.075 0 H 14.733 c -1.741 0 -3.153 1.412 -3.153 3.153 v 51.729 H 78.42 z"
                                                style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(233,233,224); fill-rule: nonzero; opacity: 1;"
                                                transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                            <path
                                                d="M 78.42 18.345 H 62.948 c -1.587 0 -2.873 -1.286 -2.873 -2.873 V 0 L 78.42 18.345 z"
                                                style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(217,215,202); fill-rule: nonzero; opacity: 1;"
                                                transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                            <path
                                                d="M 32.116 62.679 h -5.944 c -0.829 0 -1.5 0.672 -1.5 1.5 v 9.854 v 6.748 c 0 0.828 0.671 1.5 1.5 1.5 s 1.5 -0.672 1.5 -1.5 v -5.248 h 4.444 c 2.392 0 4.338 -1.946 4.338 -4.338 v -4.177 C 36.454 64.625 34.508 62.679 32.116 62.679 z M 33.454 71.194 c 0 0.737 -0.6 1.338 -1.338 1.338 h -4.444 v -6.854 h 4.444 c 0.738 0 1.338 0.601 1.338 1.339 V 71.194 z"
                                                style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(249,249,249); fill-rule: nonzero; opacity: 1;"
                                                transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                            <path
                                                d="M 46.109 82.28 h -5.652 c -0.829 0 -1.5 -0.672 -1.5 -1.5 V 64.179 c 0 -0.828 0.671 -1.5 1.5 -1.5 h 5.652 c 2.553 0 4.63 2.077 4.63 4.63 V 77.65 C 50.739 80.203 48.662 82.28 46.109 82.28 z M 41.957 79.28 h 4.152 c 0.898 0 1.63 -0.731 1.63 -1.63 V 67.309 c 0 -0.898 -0.731 -1.63 -1.63 -1.63 h -4.152 V 79.28 z"
                                                style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(249,249,249); fill-rule: nonzero; opacity: 1;"
                                                transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                            <path
                                                d="M 63.828 62.679 h -8.782 c -0.828 0 -1.5 0.672 -1.5 1.5 V 80.78 c 0 0.828 0.672 1.5 1.5 1.5 s 1.5 -0.672 1.5 -1.5 v -6.801 h 4.251 c 0.828 0 1.5 -0.672 1.5 -1.5 s -0.672 -1.5 -1.5 -1.5 h -4.251 v -5.301 h 7.282 c 0.828 0 1.5 -0.672 1.5 -1.5 S 64.656 62.679 63.828 62.679 z"
                                                style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(249,249,249); fill-rule: nonzero; opacity: 1;"
                                                transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                        </g>
                                    </svg>
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
<?php /**PATH C:\miscibles-platform\src\resources\views/pages/admin/quotation/modal-view.blade.php ENDPATH**/ ?>