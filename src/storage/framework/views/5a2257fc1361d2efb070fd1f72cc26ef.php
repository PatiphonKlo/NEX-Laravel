<button type="button" id="add-client-button" onclick="addClientButton()" class="text-white bg-primary hover:bg-green-900 font-medium rounded-md text-sm px-4 py-2.5 max-h-11">
    NEW CLIENT
</button>

<div id="popup-modal-add-client" class="hidden relative z-30">
    <div class="fixed inset-0 bg-gray-900 bg-opacity-50 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen">
        <div id="overlay" class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">
            <div class="p-5 relative transform rounded-lg bg-white text-left shadow-xl transition-all w-full sm:max-w-xl md:max-w-2xl lg:max-w-4xl">

                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                    <h3 class="text-lg font-semibold text-gray-900">
                        ADD NEW CLIENT
                    </h3>
                    <button type="button" id="close-modal-button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-3 pr-8 overflow-y-auto h-[50vh]" action="<?php echo e(config('app.env') == 'production' ? secure_url('admin/add-client') : url('admin/add-client')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="grid sm:grid-cols-2 gap-4 mb-4">
                        <div class="col-span-2">
                            <label for="client_contact_name" class="block mb-2 font-medium text-gray-900">Name</label>
                            <input type="text" name="client_contact_name" value="<?php echo e(old('client_contact_name')); ?>" class=" border border-gray-300 bg-gray-50 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5" placeholder="Type First Name">
                            <?php $__errorArgs = ['client_contact_name'];
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
                    <div class="grid sm:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="client_phone_number" class="block mb-2 font-medium text-gray-900">Phone</label>
                            <input type="text" name="client_phone_number" value="<?php echo e(old('client_phone_number')); ?>" class=" border border-gray-300 bg-gray-50 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5" placeholder="012-345-6789">
                            <?php $__errorArgs = ['client_phone_number'];
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
                            <label for="client_company" class="block mb-2 font-medium text-gray-900">Company</label>
                            <input type="text" name="client_company" value="<?php echo e(old('client_company')); ?>" class=" border border-gray-300 bg-gray-50 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5" placeholder="Type Company">
                            <?php $__errorArgs = ['client_company'];
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
                    <div class="grid sm:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="client_email" class="block mb-2 font-medium text-gray-900">Email</label>
                            <input type="text" name="client_email" value="<?php echo e(old('client_email')); ?>" class=" border border-gray-300 bg-gray-50 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5" placeholder="Type Email">
                            <?php $__errorArgs = ['client_email'];
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
                    <div class="flex justify-end">
                        <button type="submit" class="text-white inline-flex items-center bg-primary hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="uppercase">ADD</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php if(!($errors->has('client_contact_name')
|| $errors->has('client_phone_number')
|| $errors->has('client_email')
|| $errors->has('client_company'))): ?>
<script>
    function addClientButton() {
        let add_client_button = document.getElementById('add-client-button');
        let add_client_modal = document.getElementById('popup-modal-add-client');
        let add_client_close_button = document.getElementById('close-modal-button');
        let overlay = document.getElementById('overlay');

        add_client_modal.classList.remove('hidden')

        add_client_close_button.onclick = function() {
            add_client_modal.classList.add('hidden')
        }
        window.onclick = function(event) {
            if (event.target == overlay) {
                add_client_modal.classList.add('hidden')
            }
        }
    }

</script>
<?php endif; ?>

<?php if(($errors->has('client_contact_name')
|| $errors->has('client_phone_number')
|| $errors->has('client_email')
|| $errors->has('client_company'))): ?>
<script>
    let add_client_modal = document.getElementById('popup-modal-add-client')
    let add_client_button = document.getElementById('add-client-button')
    let add_client_close_button = document.getElementById('close-modal-button')
    let overlay = document.getElementById('overlay')

    add_client_modal.classList.remove('hidden')
    add_client_close_button.onclick = function() {
        add_client_modal.classList.add('hidden')
    }
    window.onclick = function(event) {
        if (event.target == overlay) {
            add_client_modal.classList.add('hidden')
        }
    }

    function addClientButton() {
        add_client_modal.classList.remove('hidden')
        add_client_close_button.onclick = function() {
            add_client_modal.classList.add('hidden')
        }
        window.onclick = function(event) {
            if (event.target == overlay) {
                add_client_modal.classList.add('hidden')
            }
        }
    }

</script>
<?php endif; ?>
<?php /**PATH C:\Users\patip\NEX\miscibles-platform\src\resources\views/pages/admin/client/modal-add.blade.php ENDPATH**/ ?>