<button type="button" id="update-part-button-<?php echo e($key); ?>" onclick="updatePartButton<?php echo e($key); ?>()"
    class="w-full inline-flex items-center px-3 py-2 text-xs font-medium text-center text-white bg-yellow-500 rounded-md hover:bg-yellow-900">
    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 22" xmlns="http://www.w3.org/2000/svg">
        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
        <path fill-rule="evenodd"
            d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
            clip-rule="evenodd"></path>
    </svg>
    VIEW & UPDATE
</button>

<div id="popup-modal-update-part-<?php echo e($key); ?>" class="hidden relative z-40" aria-labelledby="modal-title" role="dialog"
    aria-modal="true">
    <div class="fixed inset-0 bg-gray-900 bg-opacity-50 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen">
        <div id="overlay-update-part-<?php echo e($key); ?>"
            class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">
            <div
                class="p-5 relative transform rounded-lg bg-white text-left shadow-xl transition-all w-full sm:max-w-xl md:max-w-2xl lg:max-w-4xl">

                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                    <h3 class="text-lg font-semibold text-gray-900">
                        EDIT PART
                    </h3>
                    <button type="button" id="update-part-close-button-<?php echo e($key); ?>"
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
                <form class="p-3 pr-8 overflow-y-auto h-[40vh]" action="<?php echo e(url('admin/update_part/' . $key)); ?>"
                    method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="grid gap-4 mb-4 sm:grid-cols-4">
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Assembly Part
                                Name</label>
                            <input disabled type="text" value="<?php echo e($part['PART_NAME'] ?? ''); ?>" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
                                placeholder="No assembly part name">
                        </div>
                        <div>
                            <label for="PART_ID" class="block mb-2 text-sm font-medium text-gray-900">ID</label>
                            <div
                                class="bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5">
                                <?php echo e($part['PART_ID']); ?>

                                <input type="text" value="<?php echo e($part['PART_ID'] ?? ''); ?>" name="PART_ID" id="PART_ID"
                                    class="hidden bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 w-full p-2.5"
                                    placeholder="No part ID">
                            </div>
                        </div>
                        <div>
                            <label for="SPARE_PARTS" class="block mb-2 text-sm font-medium text-gray-900">Spare
                                part</label>
                            <input disabled type="number" value="<?php echo e($part['SPARE_PARTS'] ?? ''); ?>" id="SPARE_PARTS"
                                class="bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
                                placeholder="ex. 5">
                        </div>
                    </div>
                    <div class="grid gap-4 mb-4 md:grid-cols-2 lg:grid-cols-4">
                        <div class="col-span-4">
                            <label for="price_update" class="block mb-2 text-sm font-medium text-gray-900">Cost
                                (Baht)</label>
                            <input type="number" value="<?php echo e($part['PRICE_PER_UNIT']); ?>" name="price_update<?php echo e($key); ?>"
                                id="price_update"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
                                placeholder="Price / Cost">
                            <?php $__errorArgs = ['price_update' . $key];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-2 text-sm text-red-600 whitespace-normal"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

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
    function updatePartButton<?php echo e($key); ?>() {
    let update_part_button = document.getElementById('update-part-button-<?php echo e($key); ?>')
    let update_part_modal = document.getElementById('popup-modal-update-part-<?php echo e($key); ?>')
    let update_part_close_button = document.getElementById('update-part-close-button-<?php echo e($key); ?>')
    let overlay = document.getElementById('overlay-update-part-<?php echo e($key); ?>');

    update_part_modal.classList.remove('hidden')

    update_part_close_button.addEventListener('click', function() {
        update_part_modal.classList.add('hidden')
    });

    window.addEventListener('click', function(event) {
        if (event.target == overlay) {
            update_part_modal.classList.add('hidden')
        }
    });
    }
</script>

<?php if($errors->has('price_update' . $key)): ?>
<script>
    window.onload = function() {
        updatePartButton<?php echo e($key); ?>();
    };
</script>
<?php endif; ?><?php /**PATH C:\my-project\miscibles-platform\src\resources\views/CONTENT_MANAGEMENT_SYSTEM/component/partUpdateModal.blade.php ENDPATH**/ ?>