<button type="button" id="add-technical-button" onclick="addtechnicalButton()" class="text-white bg-primary hover:bg-green-900 font-medium rounded-md text-sm px-4 py-2.5 max-h-11">
    NEW DATA
</button>

<div id="popup-modal-add-technical" class="hidden relative z-30" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-gray-900 bg-opacity-50 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen">
        <div id="overlay" class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">
            <div class="p-5 relative transform rounded-lg bg-white text-left shadow-xl transition-all w-full sm:max-w-xl md:max-w-2xl lg:max-w-4xl">

                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                    <h3 class="text-lg font-semibold text-gray-900">
                        ADD NEW TECHNICAL DATA
                    </h3>
                    <button type="button" id="close-modal-button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                
                <!-- Modal body -->
                <form class="p-3 sm:p-8 overflow-y-auto h-[40vh]" action="<?php echo e(config('app.env') == 'production' ? secure_url('admin/add-technical') : url('admin/add-technical')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div>
                            <label for="technical_component" class="block mb-2 text-sm font-medium text-gray-900">Technical Component</label>
                            <input type="text" name="technical_component" value="<?php echo e(old('technical_component')); ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5" placeholder="Type technical component">
                            <?php $__errorArgs = ['technical_component'];
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
                            <label for="energy_consumption" class="block mb-2 text-sm font-medium text-gray-900">Energy Consumption (0 if no energy used) </label>
                            <input type="number" name="energy_consumption" value="<?php echo e(old('energy_consumption')); ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5" placeholder="Hr/Day">
                            <?php $__errorArgs = ['energy_consumption'];
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
                    <div class="w-full">
                        <label for="specification" class="block mb-2 text-sm font-medium text-gray-900">Specification</label>
                        <input type="text" name="specification" value="<?php echo e(old('specification')); ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5" placeholder="Type specification">
                        <?php $__errorArgs = ['specification'];
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

                    <div class="flex justify-end mt-10">
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

<?php if(!($errors->has('technical_component') || $errors->has('energy_consumption') || $errors->has('specification'))): ?>
<script>
    function addtechnicalButton() {
        let add_technical_button = document.getElementById('add-technical-button');
        let add_technical_modal = document.getElementById('popup-modal-add-technical');
        let add_technical_close_button = document.getElementById('close-modal-button');
        let overlay = document.getElementById('overlay');

        add_technical_modal.classList.remove('hidden')

        add_technical_close_button.onclick = function() {
            add_technical_modal.classList.add('hidden')
        }
        window.onclick = function(event) {
            if (event.target == overlay) {
                add_technical_modal.classList.add('hidden')
            }
        }
    }


</script>
<?php endif; ?>

<?php if(($errors->has('technical_component') || $errors->has('energy_consumption') || $errors->has('specification'))): ?>
<script>
    let add_technical_modal = document.getElementById('popup-modal-add-technical')
    let add_technical_button = document.getElementById('add-technical-button')
    let add_technical_close_button = document.getElementById('close-modal-button')
    let overlay = document.getElementById('overlay')

    add_technical_modal.classList.remove('hidden')
    add_technical_close_button.onclick = function() {
        add_technical_modal.classList.add('hidden')
    }
    window.onclick = function(event) {
        if (event.target == overlay) {
            add_technical_modal.classList.add('hidden')
        }
    }

    function addtechnicalButton() {
        add_technical_modal.classList.remove('hidden')
        add_technical_close_button.onclick = function() {
            add_technical_modal.classList.add('hidden')
        }
        window.onclick = function(event) {
            if (event.target == overlay) {
                add_technical_modal.classList.add('hidden')
            }
        }
    }

</script>
<?php endif; ?>
<?php /**PATH C:\NEX\miscibles-platform\src\resources\views/pages/admin/technical-data/modal-add.blade.php ENDPATH**/ ?>