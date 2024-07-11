<button type="button" id="delete-quotation-button-<?php echo e($quotation['KEY']); ?>" onclick="deleteQuotationButton<?php echo e($quotation['KEY']); ?>()"
    class="w-full inline-flex items-center px-3 py-2 text-xs font-medium text-center text-white bg-red-700 rounded-md hover:bg-red-900">
    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 22" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
            clip-rule="evenodd"></path>
    </svg>
    DELETE
</button>

<div id="popup-modal-delete-quotation-<?php echo e($quotation['KEY']); ?>" class="hidden relative z-50" aria-labelledby="modal-title"
    role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-gray-900 bg-opacity-50 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div id="overlay-delete-quotation-<?php echo e($quotation['KEY']); ?>"
            class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">
            <div
                class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:w-full sm:max-w-lg">
                <button type="button" id="delete-quotation-close-button-1-<?php echo e($quotation['KEY']); ?>"
                    class="fixed top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-6 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500">Are you sure you want to delete
                        ID: <?php echo e($quotation['KEY']); ?></h3>
                    <a href=" <?php echo e(url('admin/delete_quotation/'.$quotation['KEY'])); ?>">
                        <button type="button"
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                            YES, DELETE
                        </button>
                    </a>
                    <button type="button" id="delete-quotation-close-button-2-<?php echo e($quotation['KEY']); ?>"
                        class="text-gray-500 bg-white hover:bg-gray-100 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900">
                        CANCEL
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function deleteQuotationButton<?php echo e($quotation['KEY']); ?>(){
        let delete_quotation_button = document.getElementById('delete-quotation-button-<?php echo e($quotation['KEY']); ?>')
        let delete_quotation_modal = document.getElementById('popup-modal-delete-quotation-<?php echo e($quotation['KEY']); ?>')
        let delete_quotation_close_button1 = document.getElementById('delete-quotation-close-button-1-<?php echo e($quotation['KEY']); ?>')
        let delete_quotation_close_button2 = document.getElementById('delete-quotation-close-button-2-<?php echo e($quotation['KEY']); ?>')
        let overlay = document.getElementById('overlay-delete-quotation-<?php echo e($quotation['KEY']); ?>');

        delete_quotation_modal.classList.remove('hidden')
        
        delete_quotation_close_button1.onclick = function() {
            delete_quotation_modal.classList.add('hidden')
        }
        delete_quotation_close_button2.onclick = function() {
            delete_quotation_modal.classList.add('hidden')
        }
        window.onclick = function(event) {
            console.log(event);
            if(event.target == overlay) {
              delete_quotation_modal.classList.add('hidden')
            }
        }}
</script><?php /**PATH C:\my-project\miscibles-platform-development\src\resources\views/CONTENT_MANAGEMENT_SYSTEM/component/quotationDeleteModal.blade.php ENDPATH**/ ?>