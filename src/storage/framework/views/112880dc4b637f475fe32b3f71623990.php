<button type="button" id="update-product-button-<?php echo e($key); ?>"
    onclick="updateProductButton<?php echo e($key); ?>()"
    class="w-full inline-flex items-center px-3 py-2 text-xs font-medium text-center text-white bg-yellow-500 rounded-md hover:bg-yellow-900">
    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 22" xmlns="http://www.w3.org/2000/svg">
        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
        <path fill-rule="evenodd"
            d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
            clip-rule="evenodd"></path>
    </svg>
    VIEW & UPDATE
</button>
<div id="popup-modal-update-product-<?php echo e($key); ?>" class="hidden relative z-40" aria-labelledby="modal-title"
    role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-gray-900 bg-opacity-50 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen">
        <div id="overlay-update-product-<?php echo e($key); ?>"
            class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">
            <div
                class="p-5 relative transform rounded-lg bg-white text-left shadow-xl transition-all sm:max-w-3xl lg:max-w-6xl">

                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                    <h3 class="text-lg font-semibold text-gray-900">
                        EDIT MODEL <?php echo e($product['MODEL']); ?>

                    </h3>
                    <button type="button" id="update-product-close-button-<?php echo e($key); ?>"
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
                <form class="p-3 pr-8 overflow-y-auto h-[70vh]"
                    action="<?php echo e(url('admin/update_product/' . $product['KEY'])); ?>" method="POST"
                    enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="grid gap-4 mb-4 sm:grid-cols-4">
                        <div class="col-span-2">
                            <label for="name_update" class="block mb-2 text-sm font-medium text-gray-900">
                                Product Name</label>
                            <input type="text" value="<?php echo e($product['PRODUCT_NAME']); ?>" name="name_update<?php echo e($key); ?>"
                                id="name_update"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
                                placeholder="Type product name">
                            <?php $__errorArgs = ['name_update' . $key];
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
                            <label for="group_update" class="block mb-2 text-sm font-medium text-gray-900">Group
                                Select</label>
                            <select id="group_update" name="group_update<?php echo e($key); ?>"
                                class="cursor-pointer bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5">
                                <option value="<?php echo e($product['GROUP'] ?? old('group_update' . $key)); ?>" disabled selected><?php echo e($product['GROUP'] ?? old('group_update' . $key)); ?></option>
                                <?php if(isset($productGroups)): ?>
                                <?php $__currentLoopData = $productGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item); ?>"><?php echo e($item); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                <option value="" disabled selected>No Group Found</option>
                                <?php endif; ?>
                            </select>
                            <?php $__errorArgs = ['group_update' . $key];
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
                            <label for="model_update" class="block mb-2 text-sm font-medium text-gray-900">Model</label>
                            <input type="hidden" value="<?php echo e($product['MODEL']); ?>" name="model_update<?php echo e($key); ?>"
                                id="model_update">
                            <div
                                class="cursor-not-allowed bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5">
                                <?php echo e($product['MODEL']); ?>

                            </div>
                            <?php $__errorArgs = ['model_update' . $key];
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
                            <label for="price_update" class="block mb-2 text-sm font-medium text-gray-900">Price
                                (THB)</label>
                            <input type="number" value="<?php echo e($product['PRICE']); ?>" name="price_update<?php echo e($key); ?>"
                                id="price_update"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
                                placeholder="ex . 300000">
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
                        <div class="col-span-1">
                            <label for="assurance_update" class="block mb-2 text-sm font-medium text-gray-900">Assurance
                                Year</label>
                            <input type="number" value="<?php echo e($product['ASSURANCE']); ?>" name="assurance_update<?php echo e($key); ?>"
                                id="assurance_update"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
                                placeholder="ex . 1">
                            <?php $__errorArgs = ['assurance_update' . $key];
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
                            <label for="down_payment_update" class="block mb-2 text-sm font-medium text-gray-900">Down
                                Payment (%)</label>
                            <input type="number" value="<?php echo e($product['DOWN_PAYMENT']); ?>"
                                name="down_payment_update<?php echo e($key); ?>" id="down_payment_update"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
                                placeholder="ex . 25">
                            <?php $__errorArgs = ['down_payment_update' . $key];
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
                            <label for="after_install_update" class="block mb-2 text-sm font-medium text-gray-900">After
                                Install (%)</label>
                            <input type="number" value="<?php echo e($product['AFTER_INSTALL']); ?>"
                                name="after_install_update<?php echo e($key); ?>" id="after_install_update"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
                                placeholder="ex . 40">
                            <?php $__errorArgs = ['after_install_update' . $key];
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
                            <label for="final_check_update" class="block mb-2 text-sm font-medium text-gray-900">Final
                                Check (%)</label>
                            <input type="number" value="<?php echo e($product['FINAL_CHECK']); ?>"
                                name="final_check_update<?php echo e($key); ?>" id="final_check_update"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
                                placeholder="ex . 35">
                            <?php $__errorArgs = ['final_check_update' . $key];
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
                    <div class="grid gap-4 mb-4 sm:grid-cols-4 lg:grid-cols-8">
                        <div class="col-span-2">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Assembly
                                Part Select</label>
                            <button data-dropdown-toggle="dropdown<?php echo e($product['MODEL']); ?>update"
                                class="inline-flex items-center bg-gray-800 border border-gray-300 text-white text-sm rounded-lg focus:ring-green-600 focus:border-green-600 w-full p-2.5 hover:bg-gray-400"
                                type="button">
                                <span class="font-medium flex-1 ml-3 text-left whitespace-nowrap">Assembly Part
                                    Select</span>
                                <svg class="w-2.5 h-2.5 mr-2 text-gray-500 transition group-hover:text-gray-900"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <?php $__errorArgs = ['assembly_update' . $key];
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
                        <!-- Dropdown menu -->
                        <div id="dropdown<?php echo e($product['MODEL']); ?>update"
                            class="z-10 hidden bg-gray-200 rounded-lg shadow w-80">
                            <div class="p-3">
                                <label class="sr-only">Search</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                        </svg>
                                    </div>
                                    <input type="text" id="assemblySearch-<?php echo e($key); ?>"
                                        onkeyup="assemblySearch<?php echo e($key); ?>()"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full pl-10 p-2.5"
                                        placeholder="Search">
                                </div>
                            </div>
                            <ul id="assemblyUL-<?php echo e($key); ?>"
                                class="h-48 px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownSearchButton">
                                <?php if(isset($assemblyParts)): ?>
                                <?php $__currentLoopData = $assemblyParts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <div class="flex items-center p-2 rounded hover:bg-gray-100">
                                        <?php if(isset($product['ASSEMBLY_PARTS']) && in_array($item['PART_ID'],
                                        $product['ASSEMBLY_PARTS'])): ?>
                                        <input id="checkbox-item-<?php echo e($item['PART_ID']); ?>" type="checkbox"
                                            name="assembly_update<?php echo e($key); ?>[]" value="<?php echo e($item['PART_ID']); ?>"
                                            class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-600"
                                            checked>
                                        <label for="checkbox-item-<?php echo e($item['PART_ID']); ?>"
                                            class="w-full ml-2 text-sm font-medium text-gray-900 rounded"><?php echo e($item['PART_NAME']); ?>

                                            (<?php echo e($item['PART_ID']); ?>)
                                        </label>
                                        <?php else: ?>
                                        <input id="checkbox-item-<?php echo e($item['PART_ID']); ?>" type="checkbox"
                                            name="assembly_update<?php echo e($key); ?>[]" value="<?php echo e($item['PART_ID']); ?>"
                                            class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-600">
                                        <label for="checkbox-item-<?php echo e($item['PART_ID']); ?>"
                                            class="w-full ml-2 text-sm font-medium text-gray-900 rounded"><?php echo e($item['PART_NAME']); ?>

                                            (<?php echo e($item['PART_ID']); ?>)</label>
                                        <?php endif; ?>
                                    </div>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                <li class="text-center"> No data avliable</li>
                                <li><a href="<?php echo e(url('/admin/assembly_part')); ?>"
                                        class="flex justify-center text-green-600 underline font-medium">Create new
                                        part</a></li>
                                <?php endif; ?>
                            </ul>
                        </div>

                        <div class="col-span-2">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Technical
                                Data Select</label>
                            <button data-dropdown-toggle="dropdown<?php echo e($product['MODEL']); ?>-update2"
                                class="inline-flex items-center bg-gray-800 border border-gray-300 text-white text-sm rounded-lg focus:ring-green-600 focus:border-green-600 w-full p-2.5 hover:bg-gray-400"
                                type="button">
                                <span class="font-medium flex-1 ml-3 text-left whitespace-nowrap">Technical Data
                                    Select</span>
                                <svg class="w-2.5 h-2.5 mr-2 text-gray-500" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <?php $__errorArgs = ['technical_update' . $key];
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
                        <!-- Dropdown menu -->
                        <div id="dropdown<?php echo e($product['MODEL']); ?>-update2"
                            class="z-10 hidden bg-gray-200 rounded-lg shadow w-80">
                            <div class="p-3">
                                <label class="sr-only">Search</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                        </svg>
                                    </div>
                                    <input type="text" id="technicalSearch-<?php echo e($key); ?>"
                                        onkeyup="technicalSearch<?php echo e($key); ?>()"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full pl-10 p-2.5"
                                        placeholder="Search">
                                </div>
                            </div>
                            <ul id="technicalUL-<?php echo e($key); ?>"
                                class="h-48 px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownSearchButton">
                                <?php if(isset($technicalData)): ?>
                                <?php $__currentLoopData = $technicalData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <div class="flex items-center p-2 rounded hover:bg-gray-100">
                                        <?php if(isset($product['TECHNICAL_DATA']) && in_array($item[1],
                                        $product['TECHNICAL_DATA'])): ?>
                                        <input id="checkbox-item-<?php echo e($item[1]); ?>2" type="checkbox"
                                            name="technical_update<?php echo e($key); ?>[]" value="<?php echo e($item[1]); ?>"
                                            class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-600"
                                            checked>
                                        <label for="checkbox-item-<?php echo e($item[1]); ?>2"
                                            class="w-full ml-2 text-sm font-medium text-gray-900 rounded"><?php echo e($item[0]['TECHNICAL_COMPONENT']); ?>:
                                            <?php echo e($item[0]['TECHNICAL_SPECIFICATION']); ?></label>
                                        <?php else: ?>
                                        <input id="checkbox-item-<?php echo e($item[1]); ?>2" type="checkbox"
                                            name="technical_update<?php echo e($key); ?>[]" value="<?php echo e($item[1]); ?>"
                                            class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-600">
                                        <label for="checkbox-item-<?php echo e($item[1]); ?>2"
                                            class="w-full ml-2 text-sm font-medium text-gray-900 rounded"><?php echo e($item[0]['TECHNICAL_COMPONENT']); ?>:
                                            <?php echo e($item[0]['TECHNICAL_SPECIFICATION']); ?></label>
                                        <?php endif; ?>
                                    </div>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                <li class="text-center"> No data avliable</li>
                                <li><a href="<?php echo e(url('/admin/technical_data')); ?>"
                                        class="flex justify-center text-green-600 underline font-medium">Create new
                                        data</a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <div>
                            <label for="price_validity_update"
                                class="block mb-2 text-sm font-medium text-gray-900">Price Validity</label>
                            <input type="number" value="<?php echo e($product['PRICE_VALIDITY']); ?>"
                                name="price_validity_update<?php echo e($key); ?>" id="price_validity_update"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
                                placeholder="ex . 10 (Days)">
                            <?php $__errorArgs = ['price_validity_update' . $key];
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
                            <label for="delivery_term_update"
                                class="block mb-2 text-sm font-medium text-gray-900">Delivery Term</label>
                            <input type="number" value="<?php echo e($product['DELIVERY_TERM']); ?>"
                                name="delivery_term_update<?php echo e($key); ?>" id="delivery_term_update"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
                                placeholder="ex . 45 (Days)">
                            <?php $__errorArgs = ['delivery_term_update' . $key];
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
                            <label for="credit_update" class="block mb-2 text-sm font-medium text-gray-900">Credit
                                Days</label>
                            <input type="number" value="<?php echo e($product['CREDIT_DAYS']); ?>" name="credit_update<?php echo e($key); ?>"
                                id="credit_update"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
                                placeholder="ex . 30 (Days)">
                            <?php $__errorArgs = ['credit_update' . $key];
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
                            <label for="discount_update" class="block mb-2 text-sm font-medium text-gray-900">Discount
                                (%)</label>
                            <input type="number" value="<?php echo e($product['DISCOUNT']); ?>" name="discount_update<?php echo e($key); ?>"
                                id="discount_update"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
                                placeholder="ex . 0" required>
                            <?php $__errorArgs = ['discount_update' . $key];
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
                    <div class="grid gap-4 mb-4 md:grid-cols-2 lg:grid-cols-4">
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900"
                                for="picture_update">Image</label>
                            <input
                                class="block w-full text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                name="picture_update<?php echo e($key); ?>" id="picture_update" type="file" value="">
                            <?php $__errorArgs = ['picture_update' . $key];
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
                            <label class="block mb-2 text-sm font-medium text-gray-900" for="front_update">Front
                                Image</label>
                            <input
                                class="block w-full text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                name="front_update<?php echo e($key); ?>" id="front_update" type="file">
                            <?php $__errorArgs = ['front_update' . $key];
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
                            <label class="block mb-2 text-sm font-medium text-gray-900" for="side_update">Side
                                Image</label>
                            <input
                                class="block w-full text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                name="side_update<?php echo e($key); ?>" id="side_update" type="file">
                            <?php $__errorArgs = ['side_update' . $key];
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
                            <label class="block mb-2 text-sm font-medium text-gray-900" for="top_update">Top
                                Image</label>
                            <input
                                class="block w-full text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                name="top_update<?php echo e($key); ?>" id="top_update" type="file">
                            <?php $__errorArgs = ['top_update' . $key];
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
    function updateProductButton<?php echo e($key); ?>() {
    let update_product_button = document.getElementById('update-product-button-<?php echo e($key); ?>')
    let update_product_modal = document.getElementById('popup-modal-update-product-<?php echo e($key); ?>')
    let update_product_close_button = document.getElementById('update-product-close-button-<?php echo e($key); ?>')
    let overlay = document.getElementById('overlay-update-product-<?php echo e($key); ?>');

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
$errors->has('name_update' . $key) ||
$errors->has('group_update' . $key) ||
$errors->has('model_update' . $key) ||
$errors->has('price_update' . $key) ||
$errors->has('assurance_update' . $key) ||
$errors->has('down_payment_update' . $key) ||
$errors->has('after_install_update' . $key) ||
$errors->has('final_check_update' . $key) ||
$errors->has('price_validity_update' . $key) ||
$errors->has('assembly_update' . $key) ||
$errors->has('technical_update' . $key) ||
$errors->has('delivery_term_update' . $key) ||
$errors->has('credit_update' . $key) ||
$errors->has('discount_update' . $key) ||
$errors->has('picture_update' . $key) ||
$errors->has('front_update' . $key) ||
$errors->has('side_update' . $key) ||
$errors->has('top_update' . $key) ||
$errors->has('description_update' . $key)): ?>
<script>
    window.onload = function() {
        updateProductButton<?php echo e($key); ?>();
    };
</script>
<?php endif; ?><?php /**PATH C:\my-project\miscibles-platform\src\resources\views/CONTENT_MANAGEMENT_SYSTEM/component/productUpdateModal.blade.php ENDPATH**/ ?>