<button type="button" id="update-quotation-button-<?php echo e($key); ?>"
    onclick="updateQuotationButton<?php echo e($key); ?>()"
    class="w-full inline-flex items-center px-3 py-2 text-xs font-medium text-center text-white bg-yellow-500 rounded-md hover:bg-yellow-900">
    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 22" xmlns="http://www.w3.org/2000/svg">
        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
        <path fill-rule="evenodd"
            d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
            clip-rule="evenodd"></path>
    </svg>
    UPDATE
</button>
<div id="popup-modal-update-quotation-<?php echo e($key); ?>" class="hidden relative z-30">
    <div class="fixed inset-0 bg-gray-900 bg-opacity-50 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen">
        <div id="overlay-update-quotation-<?php echo e($key); ?>"
            class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">
            <div
                class="p-5 relative transform rounded-lg bg-white text-left shadow-xl transition-all sm:max-w-3xl lg:max-w-6xl">

                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                    <h3 class="text-lg font-semibold text-gray-900">
                        EDIT <?php echo e($quotation['quotation_code']); ?>

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
                <form class="p-3 pr-8 overflow-y-auto h-[40vh]"
                    action="<?php echo e(config('app.env') == 'production' ? secure_url('admin/update-quotation/' . $quotation['quotation_id']) : url('admin/update-quotation/' . $quotation['quotation_id'])); ?>"
                    method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="grid gap-4 mb-4 sm:grid-cols-4">
                        <div>
                            <label for="product_price_validity_update"
                                class="block mb-2 text-sm font-medium text-gray-900">Price Validity</label>
                            <input type="number"
                                value="<?php echo e(old('product_price_validity_update' . $key) ?? $quotation['product_price_validity']); ?>"
                                name="product_price_validity_update<?php echo e($key); ?>"
                                id="product_price_validity_update"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                                placeholder="ex . 10 (Days)">
                            <?php $__errorArgs = ['product_price_validity_update' . $key];
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
                        <div>
                            <label for="product_delivery_term_update"
                                class="block mb-2 text-sm font-medium text-gray-900">Delivery Term</label>
                            <input type="number"
                                value="<?php echo e(old('product_delivery_term_update' . $key) ?? $quotation['product_delivery_term']); ?>"
                                name="product_delivery_term_update<?php echo e($key); ?>"
                                id="product_delivery_term_update"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                                placeholder="ex . 45 (Days)">
                            <?php $__errorArgs = ['product_delivery_term_update' . $key];
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
                        <div>
                            <label for="product_credit_day_update"
                                class="block mb-2 text-sm font-medium text-gray-900">Credit
                                Days</label>
                            <input type="number"
                                value="<?php echo e(old('product_credit_day_update' . $key) ?? $quotation['product_credit_day']); ?>"
                                name="product_credit_day_update<?php echo e($key); ?>" id="product_credit_day_update"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                                placeholder="ex . 30 (Days)">
                            <?php $__errorArgs = ['product_credit_day_update' . $key];
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
                        <div>
                            <label for="product_discount_update"
                                class="block mb-2 text-sm font-medium text-gray-900">Discount
                                (%)</label>
                            <input type="number"
                                value="<?php echo e(old('product_discount_update' . $key) ?? $quotation['product_discount']); ?>"
                                name="product_discount_update<?php echo e($key); ?>" id="product_discount_update"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                                placeholder="ex . 0">
                            <?php $__errorArgs = ['product_discount_update' . $key];
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

                    <div class="grid gap-4 mb-4 sm:grid-cols-3 lg:grid-cols-6">
                        <div class="col-span-2">
                            <label for="product_price_update" class="block mb-2 text-sm font-medium text-gray-900">Price
                                (THB)</label>
                            <input type="number"
                                value="<?php echo e(old('product_price_update' . $key) ?? $quotation['product_price']); ?>"
                                name="product_price_update<?php echo e($key); ?>" id="product_price_update"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                                placeholder="ex . 300000">
                            <?php $__errorArgs = ['product_price_update' . $key];
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
                        <div class="col-span-1">
                            <label for="product_assurance_update<?php echo e($key); ?>"
                                class="block mb-2 text-sm font-medium text-gray-900">Assurance
                                Year</label>
                            <input type="number"
                                value="<?php echo e(old('product_assurance_update' . $key) ?? $quotation['product_assurance']); ?>"
                                name="product_assurance_update<?php echo e($key); ?>" id="product_assurance_update"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                                placeholder="ex . 1">
                            <?php $__errorArgs = ['product_assurance_update' . $key];
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
                        <div class="col-span-1">
                            <label for="product_down_payment_update<?php echo e($key); ?>"
                                class="block mb-2 text-sm font-medium text-gray-900">Down
                                Payment (%)</label>
                            <input type="number"
                                value="<?php echo e(old('product_down_payment_update' . $key) ?? $quotation['product_down_payment']); ?>"
                                name="product_down_payment_update<?php echo e($key); ?>" id="product_down_payment_update"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                                placeholder="ex . 25">
                            <?php $__errorArgs = ['product_down_payment_update' . $key];
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
                        <div class="col-span-1">
                            <label for="product_after_install_update<?php echo e($key); ?>"
                                class="block mb-2 text-sm font-medium text-gray-900">After
                                Install (%)</label>
                            <input type="number"
                                value="<?php echo e(old('product_after_install_update' . $key) ?? $quotation['product_after_install']); ?>"
                                name="product_after_install_update<?php echo e($key); ?>"
                                id="product_after_install_update"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                                placeholder="ex . 40">
                            <?php $__errorArgs = ['product_after_install_update' . $key];
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
                        <div class="col-span-1">
                            <label for="product_final_check_update<?php echo e($key); ?>"
                                class="block mb-2 text-sm font-medium text-gray-900">Final
                                Check (%)</label>
                            <input type="number"
                                value="<?php echo e(old('product_final_check_update' . $key) ?? $quotation['product_final_check']); ?>"
                                name="product_final_check_update<?php echo e($key); ?>" id="product_final_check_update"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                                placeholder="ex . 35">
                            <?php $__errorArgs = ['product_final_check_update' . $key];
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

                    <input name="update_id" type="hidden" value="<?php echo e($key); ?>">

                    <div class="flex justify-end mt-10">
                        <button type="submit"
                            class="text-white inline-flex items-center bg-primary hover:bg-green-900 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
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
        let update_product_button = document.getElementById('update-quotation-button-<?php echo e($key); ?>')
        let update_product_modal = document.getElementById('popup-modal-update-quotation-<?php echo e($key); ?>')
        let update_product_close_button = document.getElementById('update-quotation-close-button-<?php echo e($key); ?>')
        let overlay = document.getElementById('overlay-update-quotation-<?php echo e($key); ?>');

        update_product_modal.classList.remove('hidden')

        update_product_close_button.addEventListener('click', function() {
            update_product_modal.classList.add('hidden')
        });

        window.addEventListener('click', function(event) {
            if (event.target == overlay) {
                update_product_modal.classList.add('hidden')
            }
        });
    }

    function assemblySearch<?php echo e($key); ?>() {
        // Declare variables
        var input, filter, ul, li, label, i, txtValue
        input = document.getElementById("assemblySearch-<?php echo e($key); ?>")
        filter = input.value.toUpperCase()
        ul = document.getElementById("assemblyUL-<?php echo e($key); ?>")
        li = ul.getElementsByTagName('li')

        // Loop through all list items, and hide those who don't match the search query
        for (i = 0; i < li.length; i++) {
            label = li[i].getElementsByTagName("label")[0]
            txtValue = label.textContent || label.innerText
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = ""
            } else {
                li[i].style.display = "none"
            }
        }
    }

    function technicalSearch<?php echo e($key); ?>() {
        // Declare variables
        var input, filter, ul, li, label, i, txtValue;
        input = document.getElementById("technicalSearch-<?php echo e($key); ?>");
        filter = input.value.toUpperCase();
        ul = document.getElementById("technicalUL-<?php echo e($key); ?>");
        li = ul.getElementsByTagName('li');

        // Loop through all list items, and hide those who don't match the search query
        for (i = 0; i < li.length; i++) {
            label = li[i].getElementsByTagName("label")[0];
            txtValue = label.textContent || label.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
            } else {
                li[i].style.display = "none";
            }
        }
    }
</script>


<?php if(
    $errors->has('product_name_update' . $key) ||
        $errors->has('product_group_update' . $key) ||
        $errors->has('product_model_update' . $key) ||
        $errors->has('product_price_update' . $key) ||
        $errors->has('product_assurance_update' . $key) ||
        $errors->has('product_down_payment_update' . $key) ||
        $errors->has('product_after_install_update' . $key) ||
        $errors->has('product_final_check_update' . $key) ||
        $errors->has('product_price_validity_update' . $key) ||
        $errors->has('assembly_part_update' . $key) ||
        $errors->has('technical_data_update' . $key) ||
        $errors->has('product_delivery_term_update' . $key) ||
        $errors->has('product_credit_update' . $key) ||
        $errors->has('product_discount_update' . $key) ||
        $errors->has('product_picture_update' . $key) ||
        $errors->has('product_front_view_update' . $key) ||
        $errors->has('product_side_view_update' . $key) ||
        $errors->has('product_top_view_update' . $key) ||
        $errors->has('spec_sheet_update' . $key)): ?>
    <script>
        window.onload = function() {
            updateQuotationButton<?php echo e($key); ?>();
        };
    </script>
<?php endif; ?>
<?php /**PATH C:\NEX\miscibles-platform-2.1\src\resources\views/pages/admin/quotation/modal-update.blade.php ENDPATH**/ ?>