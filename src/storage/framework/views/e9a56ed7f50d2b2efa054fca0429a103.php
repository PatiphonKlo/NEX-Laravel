<button type="button" id="update-popup-modal" data-modal-target="update-popup-modal<?php echo e($key); ?>" data-modal-toggle="update-popup-modal<?php echo e($key); ?>" class="w-full inline-flex items-center px-3 py-2 text-xs font-medium text-center text-white bg-yellow-500 rounded-md hover:bg-yellow-900">
    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
    </svg>
    Update
</button>
<div id="update-popup-modal<?php echo e($key); ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-6xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                <h3 class="text-lg font-semibold text-gray-900">
                    Edit Information
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="update-popup-modal<?php echo e($key); ?>">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="<?php echo e(url('admin/update_customer/'.$key)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="grid sm:grid-cols-2 gap-4 mb-4">
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 font-medium text-gray-900">Name</label>
                        <input type="text" id="name" value="<?php echo e($information['contact name']); ?>" name="name" class=" border border-gray-300 bg-gray-50 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5" placeholder="Type First Name" required>
                    </div>
                </div>
                <div class="grid sm:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="phone" class="block mb-2 font-medium text-gray-900">Phone</label>
                        <input type="text" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" id="phone" value="<?php echo e($information['phone']); ?>" name="phone" class=" border border-gray-300 bg-gray-50 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5" placeholder="012-345-6789" required>
                    </div>
                    <div>
                        <label for="company" class="block mb-2 font-medium text-gray-900">Company</label>
                        <input type="text" id="company" value="<?php echo e($information['company']); ?>" name="company" class=" border border-gray-300 bg-gray-50 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5" placeholder="Type Company" required>
                    </div>
                </div>
                <div class="grid sm:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="email" class="block mb-2 font-medium text-gray-900">Email</label>
                        <input type="text" id="email" value="<?php echo e($information['email']); ?>" name="email" class=" border border-gray-300 bg-gray-50 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5" placeholder="Type Email" required>
                    </div>
                </div>
                <button type="submit" class="text-white inline-flex items-center bg-green-600 hover:bg-green-900 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                    </svg>
                    Update Information
                </button>
            </form>
        </div>
    </div>
</div>
<?php /**PATH C:\my-project\miscibles-platform-development\src\resources\views/CONTENT_MANAGEMENT_SYSTEM/component/customerUpdateModal.blade.php ENDPATH**/ ?>