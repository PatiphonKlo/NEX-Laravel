

<?php $__env->startSection('content'); ?>

<div class="p-2">
  <div class="block justify-between lg:flex">
      <h1 class="mb-3 lg:mb-0 text-xl font-semibold text-gray-900 sm:text-2xl">ENQUIRIES</h1>
      <div class="flex gap-x-4">
          <div class="flex items-center mb-0">
              <form class="sm:pr-3" action="#" method="GET">
                  <label for="enquiries-search" class="sr-only">Search</label>
                  <div class="relative w-48 sm:w-64 xl:w-96">
                      <input disabled type="text" name="email" id="enquiries-search"
                          class="cursor-not-allowed bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-green-500 focus:border-green-500 w-full p-2.5"
                          placeholder="Search for enquiries">
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
                              Tel
                          </th>
                          <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">
                              Time Created
                          </th>
                          <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">
                              Enquiry Sheet
                          </th>
                          <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">
                              Actions
                          </th>
                      </tr>
                  </thead>
                  <tbody class="bg-white divide-y divide-gray-200">
              <?php $__currentLoopData = $Data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$information): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr class="hover:bg-gray-100 ">
                          

                          <?php if(isset($information['Customer_data']['contact name'])): ?>
                          <td class="p-4 text-sm font-medium text-gray-900 whitespace-nowrap"><?php echo e($information['Customer_data']['contact name']); ?></td>
                          <?php else: ?>
                          <td class="p-4 text-xs font-normal whitespace-nowrap">Data Not Found</td>
                          <?php endif; ?>

                          <?php if(isset($information['Customer_data']['company'])): ?>
                          <td class="p-4 text-sm font-medium text-gray-900 whitespace-nowrap"><?php echo e($information['Customer_data']['company']); ?></td>
                          <?php else: ?>
                          <td class="p-4 text-xs font-normal whitespace-nowrap">Data Not Found</td>
                          <?php endif; ?>

                          <?php if(isset($information['Customer_data']['phone'])): ?>
                          <td class="p-4 text-sm font-medium text-gray-900 whitespace-nowrap"><?php echo e($information['Customer_data']['phone']); ?></td>
                          <?php else: ?>
                          <td class="p-4 text-xs font-normal whitespace-nowrap">Data Not Found</td>
                          <?php endif; ?>

                          <?php if(isset($information['Time_stamp'])): ?>
                          <td class="p-4 text-sm font-medium text-gray-900 whitespace-nowrap"><?php echo e($information['Time_stamp']); ?> UTC+7:00TH</td>
                          <?php else: ?>
                          <td class="p-4 text-xs font-normal whitespace-nowrap">Data Not Found</td>
                          <?php endif; ?>

                          <td class="p-4 space-x-2 whitespace-nowrap">
                              <?php if(isset($information['Enquiry_key']) && isset($information['Customer_data']) && isset($information['Time_stamp'])): ?>
                              <a href="<?php echo e(url('admin/enquiry_sheet/'.$information['Enquiry_key'])); ?>"> 
                              <button type="button" id="quotation"  class="inline-flex items-center px-3 py-2 text-xs font-medium text-center text-white bg-green-600 rounded-lg hover:bg-green-900 focus:ring-2 focus:ring-green-300">
                                  <svg class="w-4 h-4 mr-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1v3m5-3v3m5-3v3M1 7h7m1.506 3.429 2.065 2.065M19 7h-2M2 3h16a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1Zm6 13H6v-2l5.227-5.292a1.46 1.46 0 0 1 2.065 2.065L8 16Z"/>
                                  </svg>
                                  Enquiry Sheet
                              </button>
                              </a>
                              <?php else: ?>
                              <button type="button" id="quotation" disabled class="inline-flex items-center px-3 py-2 text-xs font-medium text-center text-white bg-green-200 rounded-lg cursor-not-allowed">
                                  <svg class="w-4 h-4 mr-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1v3m5-3v3m5-3v3M1 7h7m1.506 3.429 2.065 2.065M19 7h-2M2 3h16a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1Zm6 13H6v-2l5.227-5.292a1.46 1.46 0 0 1 2.065 2.065L8 16Z"/>
                                  </svg>
                                  Enquiry Sheet
                              </button>
                              <?php endif; ?>
                          </td>

                          <td class="p-4 space-x-2 whitespace-nowrap">
                              <?php if(isset($information['Enquiry_key']) && isset($information['Customer_data']) && isset($information['Time_stamp'])): ?>
                              
                              <button id="enquiry" data-modal-target="popup-modal-mail<?php echo e($information['Enquiry_key']); ?>" data-modal-toggle="popup-modal-mail<?php echo e($information['Enquiry_key']); ?>" type="button" class="inline-flex items-center px-3 py-2 text-xs font-medium text-center text-white bg-green-600 rounded-lg hover:bg-green-900 focus:ring-2 focus:ring-green-300">
                                  <svg class="w-4 h-3.5 mr-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16">
                                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12V1m0 0L4 5m4-4 4 4m3 5v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3"/>
                                  </svg>
                                  Send to Email
                              </button>

                              <div id="popup-modal-mail<?php echo e($information['Enquiry_key']); ?>" tabindex="-1" aria-hidden="true" class="whitespace-nowrap hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                                  <div class="relative p-4 w-full max-w-6xl h-full md:h-auto">
                                      <!-- Modal content -->
                                      <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
                                          <!-- Modal header -->
                                          <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                                              <h3 class="text-lg font-semibold text-gray-900">
                                                  Send enquiry sheet to your email
                                              </h3>
                                              <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="popup-modal-mail<?php echo e($information['Enquiry_key']); ?>">
                                                  <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                  <span class="sr-only">Close modal</span>
                                              </button>
                                          </div>
                                          <!-- Modal body -->
                                          <form action="<?php echo e(url('admin/enquiry_email_sent/'.$information['Enquiry_key'])); ?>" method="POST" enctype="multipart/form-data">
                                              <?php echo csrf_field(); ?>
                                                  <div class="w-full mb-5">
                                                      <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your email address</label>
                                                      <input type="text" name="email" id="email" value="<?php echo e(old('email')); ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5" placeholder="Type your email address">
                                                      <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                          <span class="text-red-600"><?php echo e($message); ?></span>
                                                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                  </div>
                                                  <div class="w-full mb-5">
                                                      <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Your name</label>
                                                      <input type="text" name="name" id="name" value="<?php echo e(old('name')); ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5" placeholder="Type your name">
                                                      <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                          <span class="text-red-600"><?php echo e($message); ?></span>
                                                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                  </div>
                                                  <div class="w-full mb-5">
                                                      <label for="subject" class="block mb-2 text-sm font-medium text-gray-900">Subject</label>
                                                      <input type="text" name="subject" id="subject" value="<?php echo e(old('subject')); ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5" placeholder="Subject of this email">
                                                      <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                          <span class="text-red-600"><?php echo e($message); ?></span>
                                                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                  </div>
                                              <button type="submit" class="text-white inline-flex items-center bg-green-500 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                  <svg class="w-4 h-4 mr-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16">
                                                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12V1m0 0L4 5m4-4 4 4m3 5v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3"/>
                                                  </svg>                                                   
                                                  Send enquiry sheet
                                              </button>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                              
                              <?php else: ?>
                              <button type="button" id="enquiry" disabled class="inline-flex items-center px-3 py-2 text-xs font-medium text-center text-white bg-green-200 rounded-lg cursor-not-allowed">
                                  <svg class="w-4 h-4 mr-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16">
                                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12V1m0 0L4 5m4-4 4 4m3 5v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3"/>
                                  </svg>
                                  Send to Email
                              </button>
                              <?php endif; ?>
                          
                              <button type="button" id="deleteProductButton" data-modal-target="popup-modal-delete<?php echo e($information['Enquiry_key']); ?>" data-modal-toggle="popup-modal-delete<?php echo e($information['Enquiry_key']); ?>" data-drawer-target="drawer-delete-product-default" data-drawer-show="drawer-delete-product-default" aria-controls="drawer-delete-product-default" data-drawer-placement="right" class="inline-flex items-center px-3 py-2 text-xs font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-900 focus:ring-2 focus:ring-red-300">
                                  <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                  Delete
                              </button>
                              <div id="popup-modal-delete<?php echo e($information['Enquiry_key']); ?>" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                  <div class="relative w-full max-w-md max-h-full">
                                      <div class="relative bg-white rounded-lg shadow">
                                          <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center" data-modal-hide="popup-modal-delete<?php echo e($information['Enquiry_key']); ?>">
                                              <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                              </svg>
                                              <span class="sr-only">Close modal</span>
                                          </button>
                                          <div class="p-6 text-center">
                                              <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                              </svg>
                                              <h3 class="mb-5 text-lg font-normal text-gray-500">Are you sure you want to delete this order?</h3>
                                              <a href="<?php echo e(url('admin/delete_enquiry_sheet/'.$information['Enquiry_key'])); ?>"> 
                                                  <button data-modal-hide="popup-modal-delete<?php echo e($information['Enquiry_key']); ?>" type="button" class="text-white bg-red-600 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                      Yes, I'm sure
                                                  </button>
                                              </a>
                                              <button data-modal-hide="popup-modal-delete<?php echo e($information['Enquiry_key']); ?>" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">
                                                  No, cancel
                                              </button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </td>
                      </tr>                   
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                  </tbody>
              </table>

<div class="sm:flex-1 sm:flex xs:items-center sm:justify-between p-4 space-y-2">
  <p class="md:ml-0 text-sm font-normal text-gray-500 ">Showing of <?php echo e(count($Data)); ?> Enquiry Lists</p>
  <div class="flex items-center mb-4 mr-4 sm:mb-0">
      
  </div>
</div>
      
<?php $__env->stopSection(); ?>

<?php echo $__env->make('CONTENT_MANAGEMENT_SYSTEM/layout/defaultLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\my-project\miscibles-platform\src\resources\views/CONTENT_MANAGEMENT_SYSTEM/page/made_to_order.blade.php ENDPATH**/ ?>