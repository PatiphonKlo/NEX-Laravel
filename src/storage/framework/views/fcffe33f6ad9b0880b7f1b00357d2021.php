
<div class="p-2">
    <div class="w-full mb-1">
        <div class="mb-4">
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl uppercase">Assembly Parts</h1>
        </div>
        <div class="items-center justify-between block md:flex md:divide-x md:divide-gray-100">
            <div class="flex items-center mb-2 md:mb-0">
                <form class="sm:pr-3" action="#" method="GET">
                    <label for="products-search" class="sr-only">Search</label>
                    <div class="relative w-48 mt-1 sm:w-64 xl:w-96">
                        <input disabled type="text" name="email" id="products-search" class="cursor-not-allowed bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" placeholder="Search for Assembly Parts">
                    </div>
                </form>
            </div>
            
              
        </div>
    </div>
</div>
<div class="flex flex-col">
    <div class="overflow-x-auto">
        <div class="inline-block min-w-full align-middle">
            <div class="overflow-hidden shadow">
                <table class="min-w-full divide-y divide-gray-200 table-fixed">
                    <thead class="bg-gray-100">
                        <tr>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">
                                Name
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">
                                ID
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">
                                Spare
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">
                                Cost per Unit (฿)
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">
                                Total Cost (฿)
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                <?php $__currentLoopData = $assembly_parts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$part): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="hover:bg-gray-100 ">
                           
                            <?php if(isset($part['PART_NAME'])): ?>
                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap"><?php echo e($part['PART_NAME']); ?></td>
                            <?php else: ?>
                            <td class="p-4 text-xs font-normal text-red-600 whitespace-nowrap">Data Not Found</td>
                            <?php endif; ?>

                            <?php if(isset($part['PART_ID'])): ?>
                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap"><?php echo e($part['PART_ID']); ?></td>
                            <?php else: ?>
                            <td class="p-4 text-xs font-normal text-red-600 whitespace-nowrap">Data Not Found</td>
                            <?php endif; ?>

                            <?php if(isset($part['SPARE_PARTS'])): ?>
                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap"><?php echo e($part['SPARE_PARTS']); ?></td>
                            <?php else: ?>
                            <td class="p-4 text-xs font-normal text-red-600 whitespace-nowrap">Data Not Found</td>
                            <?php endif; ?>

                            <?php if(isset($part['PRICE_PER_UNIT'])): ?>
                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap"><?php echo e($part['PRICE_PER_UNIT']); ?></td>
                            <?php else: ?>
                            <td class="p-4 text-xs font-normal text-red-600 whitespace-nowrap">Data Not Found</td>
                            <?php endif; ?>
                            
                            <?php if(isset($part['PRICE_PER_UNIT']) && isset($part['SPARE_PARTS'])): ?>
                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap"><?php echo e($part['PRICE_PER_UNIT']*$part['SPARE_PARTS']); ?></td>
                            <?php else: ?>
                            <td class="p-4 text-xs font-normal text-red-600 whitespace-nowrap">Data Not Found</td>
                            <?php endif; ?>
                            
                            <td class="p-4 space-x-2 whitespace-nowrap">
                                <button type="button" id="updateProductButton" data-modal-target="update-popup-modal<?php echo e($part['PART_ID']); ?>" data-modal-toggle="update-popup-modal<?php echo e($part['PART_ID']); ?>" data-drawer-target="drawer-update-product-default" data-drawer-show="drawer-update-product-default" aria-controls="drawer-update-product-default" data-drawer-placement="right" class="inline-flex items-center px-3 py-2 text-xs font-medium text-center text-white bg-yellow-500 rounded-lg hover:bg-yellow-900 focus:ring-2 focus:ring-yellow-400 ">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                                    Update Cost
                                </button>
                            <div class="w-24">
                                <div id="update-popup-modal<?php echo e($part['PART_ID']); ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                                    <div class="relative p-4 max-w-8xl h-full md:h-auto">
                                        <!-- Modal content -->
                                        <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
                                            <!-- Modal header -->
                                            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                                                <h3 class="text-lg font-semibold text-gray-900">
                                                    Edit Part
                                                </h3>
                                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="update-popup-modal<?php echo e($part['PART_ID']); ?>">
                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <form action="<?php echo e(url('admin/update_part/'.$part['PART_ID'])); ?>" method="POST" enctype="multipart/form-data">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('PUT'); ?>
                                                <div class="grid gap-4 mb-4 sm:grid-cols-4">
                                                    <div class="col-span-2">
                                                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Assembly Part Name</label>
                                                        <?php if(isset($part['PART_NAME'])): ?>
                                                        <input disabled type="text" value="<?php echo e($part['PART_NAME']); ?>" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5" placeholder="Type assembly part name" required>
                                                        <?php else: ?>
                                                        <input disabled type="text" value="" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5" placeholder="Type assembly part name" required>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div>
                                                        <label for="id" class="block mb-2 text-sm font-medium text-gray-900">ID</label>
                                                    <div class="bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5">
                                                        <?php echo e($part['PART_ID']); ?>

                                                        <?php if(isset($part['PART_ID'])): ?>
                                                            <input type="text" value="<?php echo e($part['PART_ID']); ?>" name="id" id="id" class="hidden bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 w-full p-2.5" placeholder="Type part ID" required>
                                                        <?php else: ?>
                                                        <input type="text" value="" name="id" id="id" class="bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5" placeholder="Type part ID" required>
                                                        <?php endif; ?>
                                                    </div>
                                                    </div>
                                                    <div>
                                                        <label for="SPARE_PARTS" class="block mb-2 text-sm font-medium text-gray-900">Spare Amount</label>
                                                        <?php if(isset($part['SPARE_PARTS'])): ?>
                                                        <input disabled type="number" value="<?php echo e($part['SPARE_PARTS']); ?>" name="SPARE_PARTS" id="SPARE_PARTS" class="bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5" placeholder="ex. 5">
                                                        <?php else: ?>
                                                        <input disabled type="number" value="" name="SPARE_PARTS" id="SPARE_PARTS" class="bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5" placeholder="ex. 5">
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="grid gap-4 mb-4 md:grid-cols-2 lg:grid-cols-4">
                                                    <div class="col-span-4">
                                                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Cost</label>
                                                        <?php if(isset($part['PRICE_PER_UNIT'])): ?>
                                                        <input type="text" value="<?php echo e($part['PRICE_PER_UNIT']); ?>" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5" placeholder="Price / Cost">
                                                        <?php else: ?>
                                                        <input type="text" value="" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5" placeholder="Price / Cost">
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                
                                                <button type="submit" class="text-white inline-flex items-center bg-green-500 hover:bg-green-900 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                                                    Update
                                                </button>   
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                
                                
                            </td>
                        </tr> 
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="sticky bottom-0 right-0 items-center w-full p-4 bg-white border-t border-gray-200 sm:flex sm:justify-between">
    <div class="flex items-center mb-4 sm:mb-0">
        <span class="text-sm font-normal text-gray-500">Showing of <span class="font-semibold text-gray-900"><?php echo e(count($assembly_parts)); ?></span> Parts</span>
    </div>
</div>

<?php /**PATH C:\my-project\miscibles-platform-development\src\resources\views/CONTENT_MANAGEMENT_SYSTEM/component/assembly_part_lists.blade.php ENDPATH**/ ?>