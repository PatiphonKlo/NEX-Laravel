<button type="button" id="add-product-button" onclick="addProductButton()" class="text-white bg-green-600 hover:bg-green-900 focus:ring-2 focus:ring-gray-200 font-medium rounded-md text-sm px-4 py-2.5 max-h-11 focus:outline-none">
    NEW PRODUCT
</button>

<div id="popup-modal-add-product" class="hidden relative z-50" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-gray-900 bg-opacity-50 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen">
        <div id="overlay" class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">
            <div class="p-5 relative transform rounded-lg bg-white text-left shadow-xl transition-all sm:max-w-3xl lg:max-w-6xl">

                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                    <h3 class="text-lg font-semibold text-gray-900">
                        ADD NEW PRODUCT
                    </h3>
                    <button type="button" id="close-modal-button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-3 pr-8 overflow-y-auto h-[70vh]" action="<?php echo e(url('admin/add_product')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="grid gap-4 mb-4 sm:grid-cols-4">
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Product Name</label>
                            <input type="text" name="name" id="name" value="<?php echo e(old('name')); ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5" placeholder="Type product name">
                            <?php $__errorArgs = ['name'];
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
                            <label for="group" class="block mb-2 text-sm font-medium text-gray-900">Group Select</label>
                            <select id="group" name="group" class="cursor-pointer bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5">
                                <?php if(null !== old('group')): ?>
                                <option value="<?php echo e(old('group')); ?>"><?php echo e(old('group')); ?></option>
                                <?php else: ?>
                                <option value="" disabled selected>Select a group</option>
                                <?php endif; ?>
                                <?php if(isset($productGroups)): ?>
                                <?php $__currentLoopData = $productGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item); ?>"><?php echo e($item); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                <option value="" disabled selected>No Group Found</option>
                                <?php endif; ?>
                            </select>
                            <?php $__errorArgs = ['group'];
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
                            <label for="model" class="block mb-2 text-sm font-medium text-gray-900">Model</label>
                            <input type="text" name="model" id="model" value="<?php echo e(old('model')); ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5" placeholder="ex . HSD-2200">
                            <?php $__errorArgs = ['model'];
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
                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Price (THB)</label>
                            <input type="number" name="price" id="price" value="<?php echo e(old('price')); ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5" placeholder="ex . 300000">
                            <?php $__errorArgs = ['price'];
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
                            <label for="assurance" class="block mb-2 text-sm font-medium text-gray-900">Assurance
                                Year</label>
                            <input type="number" name="assurance" id="assurance" value="<?php echo e(old('assurance')); ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5" placeholder="ex . 1">
                            <?php $__errorArgs = ['assurance'];
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
                            <label for="down_payment" class="block mb-2 text-sm font-medium text-gray-900">Down Payment
                                (%)</label>
                            <input type="number" name="down_payment" id="down_payment" value="<?php echo e(old('down_payment')); ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5" placeholder="ex . 25">
                            <?php $__errorArgs = ['down_payment'];
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
                            <label for="after_install" class="block mb-2 text-sm font-medium text-gray-900">After
                                Install (%)</label>
                            <input type="number" name="after_install" id="after_install" value="<?php echo e(old('after_install')); ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5" placeholder="ex . 40">
                            <?php $__errorArgs = ['after_install'];
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
                            <label for="final_check" class="block mb-2 text-sm font-medium text-gray-900">Final Check
                                (%)</label>
                            <input type="number" name="final_check" id="final_check" value="<?php echo e(old('final_check')); ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5" placeholder="ex . 35">
                            <?php $__errorArgs = ['final_check'];
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
                            <label class="block mb-2 text-sm font-medium text-gray-900">Assembly Part Select</label>
                            <button data-dropdown-toggle="dropdownSearch1" class="inline-flex items-center bg-gray-800 border border-gray-300 text-white text-sm rounded-lg focus:ring-green-600 focus:border-green-600 w-full p-2.5 hover:bg-gray-400" type="button">
                                <span class="font-medium flex-1 ml-3 text-left whitespace-nowrap">Assembly Part
                                    Select</span>
                                <svg class="w-2.5 h-2.5 mr-2 text-gray-500 transition group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <?php $__errorArgs = ['assembly'];
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
                        <div id="dropdownSearch1" class="z-10 hidden bg-gray-200 rounded-lg shadow w-80">
                            <div class="p-3">
                                <label class="sr-only">Search</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                        </svg>
                                    </div>
                                    <input type="text" id="input-assembly-search" onkeyup="assemblySearch()" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full pl-10 p-2.5" placeholder="Search">
                                </div>
                            </div>
                            <ul id="assemblyUL" class="h-48 px-3 pb-3 overflow-y-auto text-sm text-gray-700" aria-labelledby="dropdownSearchButton">
                                <?php if(isset($assemblyParts)): ?>
                                <?php $__currentLoopData = $assemblyParts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <div class="flex items-center p-2 rounded hover:bg-gray-100">
                                        <input id="checkbox-item-<?php echo e($item['PART_ID']); ?>" type="checkbox" name="assembly[]" value="<?php echo e($item['PART_ID']); ?>" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-600">
                                        <label for="checkbox-item-<?php echo e($item['PART_ID']); ?>" class="w-full ml-2 text-sm font-medium text-gray-900 rounded"><?php echo e($item['PART_NAME']); ?>

                                            (<?php echo e($item['PART_ID']); ?>)</label>
                                    </div>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                <li class="text-center"> No data avliable</li>
                                <li><a href="<?php echo e(url('/admin/assembly_part')); ?>" class="flex justify-center text-green-600 underline font-medium">Create new
                                        part</a></li>
                                <?php endif; ?>
                            </ul>
                        </div>

                        <div class="col-span-2">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Technical Data Select</label>
                            <button data-dropdown-toggle="dropdownSearch2" class="inline-flex items-center bg-gray-800 border border-gray-300 text-white text-sm rounded-lg focus:ring-green-600 focus:border-green-600 w-full p-2.5 hover:bg-gray-400" type="button">
                                <span class="font-medium flex-1 ml-3 text-left whitespace-nowrap">Technical Data
                                    Select</span>
                                <svg class="w-2.5 h-2.5 mr-2 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <?php $__errorArgs = ['technical'];
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
                        <div id="dropdownSearch2" class="z-10 hidden bg-gray-200 rounded-lg shadow w-80">
                            <div class="p-3">
                                <label for="input-technical-search" class="sr-only">Search</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                        </svg>
                                    </div>
                                    <input type="text" id="input-technical-search" onkeyup="technicalSearch()" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full pl-10 p-2.5" placeholder="Search">
                                </div>
                            </div>
                            <ul id="technicalUL" class="h-48 px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownSearchButton">
                                <?php if(isset($technicalData)): ?>
                                <?php $__currentLoopData = $technicalData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <div class="flex items-center p-2 rounded hover:bg-gray-100">
                                        <input id="checkbox-item-<?php echo e($item[1]); ?>" type="checkbox" name="technical[]" value="<?php echo e($item[1]); ?>" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-600">
                                        <label for="checkbox-item-<?php echo e($item[1]); ?>" class="w-full ml-2 text-sm font-medium text-gray-900 rounded"><?php echo e($item[0]['TECHNICAL_COMPONENT']); ?>:
                                            <?php echo e($item[0]['TECHNICAL_SPECIFICATION']); ?></label>
                                    </div>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                <li class="text-center"> No data avliable</li>
                                <li><a href="<?php echo e(url('/admin/technical_data')); ?>" class="flex justify-center text-green-600 underline font-medium">Create new
                                        data</a></li>
                                <?php endif; ?>
                            </ul>
                        </div>

                        <div>
                            <label for="price_validity" class="block mb-2 text-sm font-medium text-gray-900">Price
                                Validity</label>
                            <input type="number" name="price_validity" id="price_validity" value="<?php echo e(old('price_validity')); ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5" placeholder="ex . 10 (Days)">
                            <?php $__errorArgs = ['price_validity'];
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
                            <label for="delivery_term" class="block mb-2 text-sm font-medium text-gray-900">Delivery
                                Term</label>
                            <input type="number" name="delivery_term" id="delivery_term" value="<?php echo e(old('delivery_term')); ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5" placeholder="ex . 45 (Days)">
                            <?php $__errorArgs = ['delivery_term'];
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
                            <label for="credit" class="block mb-2 text-sm font-medium text-gray-900">Credit Days</label>
                            <input type="number" name="credit" id="credit" value="<?php echo e(old('credit')); ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5" placeholder="ex . 30 (Days)">
                            <?php $__errorArgs = ['credit'];
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
                            <label for="discount" class="block mb-2 text-sm font-medium text-gray-900">Discount
                                (%)</label>
                            <input type="number" name="discount" id="discount" value="<?php echo e(old('discount')); ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5" placeholder="ex . 0">
                            <?php $__errorArgs = ['discount'];
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
                            <label class="block mb-2 text-sm font-medium text-gray-900" for="picture">Image</label>
                            <input class="block w-full text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" id="picture" name="picture" type="file" value="<?php echo e(old('picture_file')); ?>">
                            <?php $__errorArgs = ['picture'];
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
                            <label class="block mb-2 text-sm font-medium text-gray-900" for="front">Front Image</label>
                            <input class="block w-full text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" id="front" name="front" type="file">
                            <?php $__errorArgs = ['front'];
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
                            <label class="block mb-2 text-sm font-medium text-gray-900" for="side">Side Image</label>
                            <input class="block w-full text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" id="side" name="side" type="file">
                            <?php $__errorArgs = ['side'];
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
                            <label class="block mb-2 text-sm font-medium text-gray-900" for="top">Top Image</label>
                            <input class="block w-full text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" id="top" name="top" type="file">
                            <?php $__errorArgs = ['top'];
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

                    <div class="flex justify-end mt-10">
                        <button type="submit" class="text-white inline-flex items-center bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
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

<?php if(!($errors->has('name') || $errors->has('group') || $errors->has('model') || $errors->has('price') ||
$errors->has('assurance') || $errors->has('down_payment') || $errors->has('after_install') ||
$errors->has('final_check') ||
$errors->has('price_validity') || $errors->has('assembly') || $errors->has('technical') || $errors->has('delivery_term')
||
$errors->has('credit') || $errors->has('discount') || $errors->has('picture') || $errors->has('front') ||
$errors->has('side') || $errors->has('top') || $errors->has('description'))): ?>
<script>
    function addProductButton() {
        let add_product_button = document.getElementById('add-product-button');
        let add_product_modal = document.getElementById('popup-modal-add-product');
        let add_product_close_button = document.getElementById('close-modal-button');
        let overlay = document.getElementById('overlay');

        add_product_modal.classList.remove('hidden')

        add_product_close_button.onclick = function() {
            add_product_modal.classList.add('hidden')
        }
        window.onclick = function(event) {
            if (event.target == overlay) {
                add_product_modal.classList.add('hidden')
            }
        }
    }

    function assemblySearch() {
        // Declare variables
        var input, filter, ul, li, label, i, txtValue
        input = document.getElementById('input-assembly-search')
        filter = input.value.toUpperCase()
        ul = document.getElementById("assemblyUL")
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

    function technicalSearch() {
        // Declare variables
        var input, filter, ul, li, label, i, txtValue
        input = document.getElementById('input-technical-search')
        filter = input.value.toUpperCase()
        ul = document.getElementById("technicalUL")
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

</script>
<?php endif; ?>

<?php if($errors->has('name') || $errors->has('group') || $errors->has('model') || $errors->has('price') ||
$errors->has('assurance') || $errors->has('down_payment') || $errors->has('after_install') ||
$errors->has('final_check') ||
$errors->has('price_validity') || $errors->has('assembly') || $errors->has('technical') || $errors->has('delivery_term')
||
$errors->has('credit') || $errors->has('discount') || $errors->has('picture') || $errors->has('front') ||
$errors->has('side') || $errors->has('top') || $errors->has('description')): ?>
<script>
    let add_product_modal = document.getElementById('popup-modal-add-product')
    let add_product_button = document.getElementById('add-product-button')
    let add_product_close_button = document.getElementById('close-modal-button')
    let overlay = document.getElementById('overlay')

    add_product_modal.classList.remove('hidden')
    add_product_close_button.onclick = function() {
        add_product_modal.classList.add('hidden')
    }
    window.onclick = function(event) {
        if (event.target == overlay) {
            add_product_modal.classList.add('hidden')
        }
    }

    function addProductButton() {
        add_product_modal.classList.remove('hidden')
        add_product_close_button.onclick = function() {
            add_product_modal.classList.add('hidden')
        }
        window.onclick = function(event) {
            if (event.target == overlay) {
                add_product_modal.classList.add('hidden')
            }
        }
    }

    function assemblySearch() {
        // Declare variables
        var input, filter, ul, li, label, i, txtValue
        input = document.getElementById('input-assembly-search')
        filter = input.value.toUpperCase()
        ul = document.getElementById("assemblyUL")
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

    function technicalSearch() {
        // Declare variables
        var input, filter, ul, li, label, i, txtValue
        input = document.getElementById('input-technical-search')
        filter = input.value.toUpperCase()
        ul = document.getElementById("technicalUL")
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

</script>
<?php endif; ?>
<?php /**PATH C:\my-project\miscibles-platform-development\src\resources\views/CONTENT_MANAGEMENT_SYSTEM/component/productAddModal.blade.php ENDPATH**/ ?>