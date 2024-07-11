

<?php $__env->startSection('content'); ?>
    <div class="p-2">
        <div class="block justify-between lg:flex">
            <h1 class="mb-3 lg:mb-0 text-xl font-semibold text-gray-900 sm:text-2xl">CUSTOMERS</h1>
            <div class="flex gap-x-4">
                <div class="flex items-center mb-0">
                    <form class="sm:pr-3" action="#" method="GET">
                        <label for="customers-search" class="sr-only">Search</label>
                        <div class="relative w-48 sm:w-64 xl:w-96">
                            <input disabled type="text" name="email" id="customers-search"
                                class="cursor-not-allowed bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-green-500 focus:border-green-500 w-full p-2.5"
                                placeholder="Search for customers">
                        </div>
                    </form>
                    
                </div>
                
            </div>
        </div>
    </div>

    <table class="min-w-full divide-y divide-gray-200 border-b-2">
        <thead class="bg-gray-100 sticky top-0">
            <tr>
                
                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">
                    Contact Name
                </th>
                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">
                    Company
                </th>
                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">
                    Phone
                </th>
                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">
                    Email
                </th>
                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            <?php $__currentLoopData = $customerDocument; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $information): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="hover:bg-gray-100 ">
                    

                    <?php if(isset($information['contact name'])): ?>
                        <td class="p-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                            <?php echo e($information['contact name']); ?></td>
                    <?php else: ?>
                        <td class="p-4 text-xs font-normal text-red-600 whitespace-nowrap">Data Not Found</td>
                    <?php endif; ?>

                    <?php if(isset($information['company'])): ?>
                        <td class="p-4 text-sm font-medium text-gray-900 whitespace-nowrap"><?php echo e($information['company']); ?>

                        </td>
                    <?php else: ?>
                        <td class="p-4 text-xs font-normal text-red-600 whitespace-nowrap">Data Not Found</td>
                    <?php endif; ?>

                    <?php if(isset($information['phone'])): ?>
                        <td class="p-4 text-sm font-medium text-gray-900 whitespace-nowrap"><?php echo e($information['phone']); ?></td>
                    <?php else: ?>
                        <td class="p-4 text-xs font-normal text-red-600 whitespace-nowrap">Data Not Found</td>
                    <?php endif; ?>

                    <?php if(isset($information['email'])): ?>
                        <td class="p-4 text-sm font-medium text-gray-900 whitespace-nowrap"><?php echo e($information['email']); ?></td>
                    <?php else: ?>
                        <td class="p-4 text-sm font-normal text-gray-600 whitespace-nowrap">No need</td>
                    <?php endif; ?>

                    <td class="p-4 flex space-x-2">
                        <div class="w-24">
                            <?php echo $__env->make('CONTENT_MANAGEMENT_SYSTEM/component/customerUpdateModal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="w-24">
                            <?php echo $__env->make('CONTENT_MANAGEMENT_SYSTEM/component/customerDeleteModal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <div class="sm:flex-1 sm:flex xs:items-center sm:justify-between p-4 space-y-2">
        <p class="md:ml-0 text-sm font-normal text-gray-500 ">Showing of <?php echo e(count($customerDocument)); ?> Customers</p>
        <div class="flex items-center mb-4 mr-4 sm:mb-0">
            
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('CONTENT_MANAGEMENT_SYSTEM/layout/defaultLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\my-project\miscibles-platform-development\src\resources\views/CONTENT_MANAGEMENT_SYSTEM/page/customers.blade.php ENDPATH**/ ?>