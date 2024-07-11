

<div id="popup-modal-update-quotation-<?php echo e($key); ?>" class="hidden relative z-40" aria-labelledby="modal-title" role="dialog"
    aria-modal="true">
    <div class="fixed inset-0 bg-gray-900 bg-opacity-50 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen">
        <div id="overlay-update-quotation-<?php echo e($key); ?>"
            class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">
            <div
                class="p-5 relative transform rounded-lg bg-white text-left shadow-xl transition-all w-full sm:max-w-xl md:max-w-2xl lg:max-w-4xl">

                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                    <h3 class="text-lg font-semibold text-gray-900">
                        EDIT QUOTATION ID: <?php echo e($quotation['KEY']); ?>

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
                <form class="p-3 pr-8 overflow-y-auto h-[80vh]" action="<?php echo e(url('admin/update_quotation/'.$quotation['KEY'])); ?>"
                    method="POST" enctype="multiquotation/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                        <?php echo $__env->make('CONTENT_MANAGEMENT_SYSTEM/layout/pdfEditQuotation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <input name="updateKey" id="key" type="hidden" value="<?php echo e($key); ?>">
                    <div class="flex justify-end mt-10">
                        <button type="submit"
                            class="text-white inline-flex items-center bg-green-600 hover:bg-green-900 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                </path>
                                <path fill-rule="evenodd"
                                    d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="uppercase">Update</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function updateQuotationButton<?php echo e($key); ?>() {
    let update_quotation_button = document.getElementById('update-quotation-button-<?php echo e($key); ?>')
    let update_quotation_modal = document.getElementById('popup-modal-update-quotation-<?php echo e($key); ?>')
    let update_quotation_close_button = document.getElementById('update-quotation-close-button-<?php echo e($key); ?>')
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
</script>

<?php if($errors->has('price_update' . $key) ||
$errors->has('name' . $key) ||
$errors->has('spec' . $key) ||
$errors->has('energy_used' . $key) 
): ?>
<script>
    window.onload = function() {
        updateQuotationButton<?php echo e($key); ?>();
    };
</script>
<?php endif; ?><?php /**PATH C:\my-project\miscibles-platform-development\src\resources\views/CONTENT_MANAGEMENT_SYSTEM/component/quotationUpdateModal.blade.php ENDPATH**/ ?>