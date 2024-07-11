<button type="button" id="add-quotation-button" onclick="addQuotationButton()"
    class="text-white bg-primary hover:bg-green-900 font-medium rounded-md text-sm px-4 py-2.5 max-h-11">
    NEW QUOTATION
</button>

<div id="popup-modal-add-quotation" class="hidden relative z-30">
    <div class="fixed inset-0 bg-gray-900 bg-opacity-50 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen">
        <div id="overlay" class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">
            <div
                class="p-5 relative transform rounded-lg bg-white text-left shadow-xl transition-all w-full sm:max-w-xl md:max-w-2xl lg:max-w-6xl">

                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                    <h3 class="text-lg font-semibold text-gray-900">
                        ADD NEW QUOTATION
                    </h3>
                    <button type="button" id="close-modal-button"
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
                <form class="p-3 pr-8 overflow-y-auto h-[50vh]"
                    action="<?php echo e(config('app.env') == 'production' ? secure_url('admin/add-quotation') : url('admin/add-quotation')); ?>"
                    method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="grid grid-rows-2 gap-4">
                        <div>
                            <label for="product_id" class="block mb-2 text-sm font-medium text-gray-900">Product
                                Select</label>
                            <?php if(!empty($productList)): ?>
                                <select id="product_id" name="product_id"
                                    class="cursor-pointer bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5">
                                    <?php if(null !== old('product_id')): ?>
                                        <option value="<?php echo e(old('product_id')); ?>"><?php echo e(old('product_id')); ?></option>
                                    <?php else: ?>
                                        <option value="" disabled selected>Select a product</option>
                                    <?php endif; ?>
                                    <?php $__currentLoopData = $productList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item['product_id']); ?>"
                                            data-price-validity="<?php echo e($item['product_price_validity']); ?>"
                                            data-delivery-term="<?php echo e($item['product_delivery_term']); ?>"
                                            data-credit-day="<?php echo e($item['product_credit_day']); ?>"
                                            data-discount="<?php echo e($item['product_discount']); ?>"
                                            data-price="<?php echo e($item['product_price']); ?>"
                                            data-warranty="<?php echo e($item['product_warranty']); ?>"
                                            data-down-payment="<?php echo e($item['product_down_payment']); ?>"
                                            data-after-install="<?php echo e($item['product_after_install']); ?>"
                                            data-final-check="<?php echo e($item['product_final_check']); ?>">
                                            <?php echo e($item['product_model']); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            <?php else: ?>
                                <div
                                    class="bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5">
                                    <a href="<?php echo e(url('/admin/product')); ?>"
                                        class="flex justify-center text-primary underline font-medium">Create new
                                        product</a>
                                </div>
                            <?php endif; ?>
                            <?php $__errorArgs = ['product_id'];
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
                            <label for="client_id" class="block mb-2 text-sm font-medium text-gray-900">Client
                                Select</label>
                            <?php if(!empty($clientList)): ?>
                                <select id="client_id" name="client_id"
                                    class="cursor-pointer bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5">
                                    <?php if(null !== old('client_id')): ?>
                                        <option value="<?php echo e(old('client_id')); ?>"><?php echo e(old('client_id')); ?></option>
                                    <?php else: ?>
                                        <option value="" disabled selected>Select a client</option>
                                    <?php endif; ?>
                                    <?php $__currentLoopData = $clientList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item['client_id']); ?>">
                                            Contact Name : <?php echo e($item['client_contact_name']); ?> ,
                                            Company : <?php echo e($item['client_company']); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            <?php else: ?>
                                <div
                                    class="bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5">
                                    <a href="<?php echo e(url('/admin/client')); ?>"
                                        class="flex justify-center text-primary underline font-medium">Add new
                                        client</a>
                                </div>
                            <?php endif; ?>
                            <?php $__errorArgs = ['client_id'];
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


                    <div class="grid gap-4 my-4 sm:grid-cols-4">
                        <div>
                            <label for="product_price_validity"
                                class="block mb-2 text-sm font-medium text-gray-900">Price
                                Validity</label>
                            <input type="number" name="product_price_validity"
                                value="<?php echo e(old('product_price_validity')); ?>"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                                placeholder="ex . 10 (Days)">
                            <?php $__errorArgs = ['product_price_validity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="mt-2 text-sm text-danger-normal whitespace-normal"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div>
                            <label for="product_delivery_term"
                                class="block mb-2 text-sm font-medium text-gray-900">Delivery
                                Term</label>
                            <input type="number" name="product_delivery_term"
                                value="<?php echo e(old('product_delivery_term')); ?>"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                                placeholder="ex . 45 (Days)">
                            <?php $__errorArgs = ['product_delivery_term'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="mt-2 text-sm text-danger-normal whitespace-normal"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div>
                            <label for="product_credit_day" class="block mb-2 text-sm font-medium text-gray-900">Credit
                                Days</label>
                            <input type="number" name="product_credit_day" value="<?php echo e(old('product_credit_day')); ?>"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                                placeholder="ex . 30 (Days)">
                            <?php $__errorArgs = ['product_credit_day'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="mt-2 text-sm text-danger-normal whitespace-normal"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div>
                            <label for="product_discount" class="block mb-2 text-sm font-medium text-gray-900">Discount
                                (%)</label>
                            <input type="number" name="product_discount" value="<?php echo e(old('product_discount')); ?>"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                                placeholder="ex . 0">
                            <?php $__errorArgs = ['product_discount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="mt-2 text-sm text-danger-normal whitespace-normal"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="grid gap-4 mb-4 sm:grid-cols-3 lg:grid-cols-6">
                        <div class="col-span-2">
                            <label for="product_price" class="block mb-2 text-sm font-medium text-gray-900">Price
                                (THB)</label>
                            <input type="number" name="product_price" value="<?php echo e(old('product_price')); ?>"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                                placeholder="ex . 300000">
                            <?php $__errorArgs = ['product_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="mt-2 text-sm text-danger-normal whitespace-normal"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-span-1">
                            <label for="product_warranty"
                                class="block mb-2 text-sm font-medium text-gray-900">Warranty
                                Year</label>
                            <input type="number" name="product_warranty" value="<?php echo e(old('product_warranty')); ?>"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                                placeholder="ex . 1">
                            <?php $__errorArgs = ['product_warranty'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="mt-2 text-sm text-danger-normal whitespace-normal"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-span-1">
                            <label for="product_down_payment"
                                class="block mb-2 text-sm font-medium text-gray-900">Down
                                Payment
                                (%)</label>
                            <input type="number" name="product_down_payment"
                                value="<?php echo e(old('product_down_payment')); ?>"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                                placeholder="ex . 25">
                            <?php $__errorArgs = ['product_down_payment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="mt-2 text-sm text-danger-normal whitespace-normal"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-span-1">
                            <label for="product_after_install"
                                class="block mb-2 text-sm font-medium text-gray-900">After
                                Install (%)</label>
                            <input type="number" name="product_after_install"
                                value="<?php echo e(old('product_after_install')); ?>"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                                placeholder="ex . 40">
                            <?php $__errorArgs = ['product_after_install'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="mt-2 text-sm text-danger-normal whitespace-normal"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-span-1">
                            <label for="product_final_check"
                                class="block mb-2 text-sm font-medium text-gray-900">Final
                                Check
                                (%)</label>
                            <input type="number" name="product_final_check"
                                value="<?php echo e(old('product_final_check')); ?>"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                                placeholder="ex . 35">
                            <?php $__errorArgs = ['product_final_check'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="mt-2 text-sm text-danger-normal whitespace-normal"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="flex justify-end mt-4">
                        <button type="submit"
                            class="text-white inline-flex items-center bg-primary hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="uppercase">ADD</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('product_id').addEventListener('change', function() {
        // ดึง option ที่ถูกเลือกใน select element
        var selectedOption = this.options[this.selectedIndex];

        // ดึงค่าจาก attribute 'data-*' ของ option ที่ถูกเลือก
        var priceValidity = selectedOption.getAttribute('data-price-validity');
        var deliveryTerm = selectedOption.getAttribute('data-delivery-term');
        var creditDay = selectedOption.getAttribute('data-credit-day');
        var discount = selectedOption.getAttribute('data-discount');
        var price = selectedOption.getAttribute('data-price');
        var warranty = selectedOption.getAttribute('data-warranty');
        var downPayment = selectedOption.getAttribute('data-down-payment');
        var afterInstall = selectedOption.getAttribute('data-after-install');
        var finalCheck = selectedOption.getAttribute('data-final-check');

        // อัปเดตค่าใน input fields 
        document.getElementsByName('product_price_validity')[0].value = priceValidity || '';
        document.getElementsByName('product_delivery_term')[0].value = deliveryTerm || '';
        document.getElementsByName('product_credit_day')[0].value = creditDay || '';
        document.getElementsByName('product_discount')[0].value = discount || '';
        document.getElementsByName('product_price')[0].value = price || '';
        document.getElementsByName('product_warranty')[0].value = warranty || '';
        document.getElementsByName('product_down_payment')[0].value = downPayment || '';
        document.getElementsByName('product_after_install')[0].value = afterInstall || '';
        document.getElementsByName('product_final_check')[0].value = finalCheck || '';
    })
</script>

<?php if(!($errors->has('client_id') || $errors->has('product_id'))): ?>
    <script>
        function addQuotationButton() {
            let add_quotation_button = document.getElementById('add-quotation-button');
            let add_quotation_modal = document.getElementById('popup-modal-add-quotation');
            let add_quotation_close_button = document.getElementById('close-modal-button');
            let overlay = document.getElementById('overlay');

            add_quotation_modal.classList.remove('hidden')

            add_quotation_close_button.onclick = function() {
                add_quotation_modal.classList.add('hidden')
            }
            window.onclick = function(event) {
                if (event.target == overlay) {
                    add_quotation_modal.classList.add('hidden')
                }
            }
        }
    </script>
<?php endif; ?>

<?php if($errors->has('client_id') || $errors->has('product_id')): ?>
    <script>
        let add_quotation_modal = document.getElementById('popup-modal-add-quotation')
        let add_quotation_button = document.getElementById('add-quotation-button')
        let add_quotation_close_button = document.getElementById('close-modal-button')
        let overlay = document.getElementById('overlay')

        add_quotation_modal.classList.remove('hidden')
        add_quotation_close_button.onclick = function() {
            add_quotation_modal.classList.add('hidden')
        }
        window.onclick = function(event) {
            if (event.target == overlay) {
                add_quotation_modal.classList.add('hidden')
            }
        }

        function addQuotationButton() {
            add_quotation_modal.classList.remove('hidden')
            add_quotation_close_button.onclick = function() {
                add_quotation_modal.classList.add('hidden')
            }
            window.onclick = function(event) {
                if (event.target == overlay) {
                    add_quotation_modal.classList.add('hidden')
                }
            }
        }
    </script>
<?php endif; ?>
<?php /**PATH C:\Users\patip\NEX\miscibles-platform-2.4\src\resources\views/pages/admin/quotation/modal-add.blade.php ENDPATH**/ ?>