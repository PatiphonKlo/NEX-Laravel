

<?php $__env->startSection('headBar'); ?>
<div class="hidden w-full lg:block lg:w-auto col-span-9" id="navbar-default">
  <ul class="lg:font-normal lg:grid grid-cols-9 gap-3 lg:gap-5 font-semibold mt-1 rounded-md lg:flex-row lg:mt-0 bg-gray-300 lg:bg-white">
    <li class="col-span-3">
        <div class="text-white text-center font-inter font-semibold flex item-center justify-center rounded-t-md lg:rounded-md bg-green-600 lg:border-2 border-green-600 p-2">
          QUOTATION
        </div>
    </li>
    <li class="hidden lg:block col-span-3">
        <div class="text-white text-center font-inter font-semibold flex item-center justify-center lg:rounded-md bg-green-600 lg:border-2 border-green-600 p-2">
          <?php echo e($productDocument['MODEL']); ?>

        </div>
    </li>
    <li class="col-span-1">
      <?php echo $__env->make('STANDARD_PRODUCTS/component/backButton', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      
    </li>
    <div></div>
    <li class="col-span-1">
      <a href="<?php echo e(url('/')); ?>">
        <div class="text-center font-inter font-semibold flex item-center justify-center transition hover:bg-green-600 hover:text-white lg:rounded-md rounded-b-md bg-gray-300 lg:border-2 border-green-600 p-2">
          HOME
        </div>
      </a>
    </li>
  </ul>
</div>
<div class="mt-2 lg:hidden w-full bg-green-600 rounded-md">
  <h1 class="font-semibold text-center text-white p-2.5"><?php echo e($productDocument['MODEL']); ?></h1>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="flex flex-col lg:grid grid-cols-2 pt-[2vh] gap-5">
        <div class="col-span-1 flex flex-col">
            <div class="shadow shadow-gray-400 border-2 border-green-600 h-[60vh] lg:h-[80vh] rounded-md px-8 overflow-y-auto">

              <?php echo $__env->make('STANDARD_PRODUCTS/component/preQuotation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            </div>
        </div>
        <div class="col-span-1 flex flex-col">
            <?php if (isset($component)) { $__componentOriginalf9a5f060e1fbbcbc7beb643b113b10ab = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf9a5f060e1fbbcbc7beb643b113b10ab = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form','data' => ['action' => ''.e(config('app.env') == 'production' ? secure_url('customer_form/'.$group.'/'.$model) : url('customer_form/'.$group.'/'.$model)).'','method' => 'POST']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => ''.e(config('app.env') == 'production' ? secure_url('customer_form/'.$group.'/'.$model) : url('customer_form/'.$group.'/'.$model)).'','method' => 'POST']); ?> 
            <?php echo csrf_field(); ?>
            <div class="shadow shadow-gray-400 border-2 border-green-600 h-[60vh] lg:h-[80vh] rounded-md p-16 overflow-y-auto">
                    <div class="grid grid-cols-1 md:gap-6">
                      <div class="relative z-0 w-full mb-6 group">
                        <input type="text" name="email" value="<?php echo e(old('email')); ?>" id="email" class="block my-3 px-0 w-full text-sm bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer" placeholder=" "/>
                        <label for="email" class="font-semibold peer-focus:font-bold absolute text-sm text-gray-600 duration-100 transform -translate-y-3 scale-75 top-1 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-green-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3">Email address</label>
                        <?php $__errorArgs = ['email'];
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
                    <div class="grid md:grid-cols-2 md:gap-6">
                      <div class="col-span-2 relative z-0 w-full mb-6 group">
                          <input type="text" name="name" value="<?php echo e(old('name')); ?>" id="name" class="block my-3 px-0 w-full text-sm bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer" placeholder=" " />
                          <label for="name" class="font-semibold peer-focus:font-bold absolute text-sm text-gray-600 duration-100 transform -translate-y-3 scale-75 top-1 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-green-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3">Name</label>
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
                    </div>
                    <div class="grid md:grid-cols-2 md:gap-6">
                      <div class="relative z-0 w-full mb-6 group">
                          <input type="tel" name="phone" value="<?php echo e(old('phone')); ?>" id="phone" class="block my-3 px-0 w-full text-sm bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer" placeholder=" " />
                          <label for="phone" class="font-semibold peer-focus:font-bold absolute text-sm text-gray-600 duration-100 transform -translate-y-3 scale-75 top-1 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-green-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3">Tel (ex.123-456-7890)</label>
                          <?php $__errorArgs = ['phone'];
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
                      <div class="relative z-0 w-full mb-6 group">
                          <input type="text" name="company" value="<?php echo e(old('company')); ?>" id="company" class="block my-3 px-0 w-full text-sm bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer" placeholder=" " />
                          <label for="company" class="font-semibold peer-focus:font-bold absolute text-sm text-gray-600 duration-100 transform -translate-y-3 scale-75 top-1 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-green-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3">Company</label>
                          <?php $__errorArgs = ['company'];
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
            </div>
            <div class="grid grid-cols-3 gap-2 mt-[2vh]">
                <button type="submit" class="col-start-3 col-span-1" data-modal-target="popup-modal" data-modal-toggle="popup-modal">
                  <div class="p-2 uppercase border-2 border-green-500 bg-green-400 transition hover:bg-green-500 rounded-md text-center">
                      confirm
                  </div>
              </button>
            </div>
          </div>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf9a5f060e1fbbcbc7beb643b113b10ab)): ?>
<?php $attributes = $__attributesOriginalf9a5f060e1fbbcbc7beb643b113b10ab; ?>
<?php unset($__attributesOriginalf9a5f060e1fbbcbc7beb643b113b10ab); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf9a5f060e1fbbcbc7beb643b113b10ab)): ?>
<?php $component = $__componentOriginalf9a5f060e1fbbcbc7beb643b113b10ab; ?>
<?php unset($__componentOriginalf9a5f060e1fbbcbc7beb643b113b10ab); ?>
<?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('STANDARD_PRODUCTS/layout/defaultLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\my-project\miscibles-platform-development\src\resources\views/STANDARD_PRODUCTS/page/customer_form.blade.php ENDPATH**/ ?>