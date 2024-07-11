<button type="button" id="share-enquiry-button-<?php echo e($key); ?>" onclick="shareEnquiryButton<?php echo e($key); ?>()" class="uppercase w-full inline-flex items-center px-3 py-2 text-xs font-medium text-center text-white bg-primary rounded-md hover:bg-green-800">
    <img src="/svg/share.svg" alt="NA" class="w-4 h-4 mr-2">
    Share
</button>

<div id="popup-modal-share-<?php echo e($key); ?>" class="hidden relative z-30">
    <div class="fixed inset-0 bg-gray-900 bg-opacity-50 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen">
        <div id="overlay-share-<?php echo e($key); ?>" class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">
            <div class="p-5 relative transform rounded-lg bg-white text-left shadow-xl transition-all sm:max-w-3xl lg:max-w-6xl w-200">

                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                    <h3 class="text-lg font-semibold text-gray-900">
                        Share pdf link
                    </h3>
                    <button type="button" id="share-close-button-<?php echo e($key); ?>" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-3 pr-8 overflow-y-auto h-[50vh]" action="<?php echo e(config('app.env') == 'production' ? secure_url('admin/share-password/'. $enquiry['enquiry_id']) : url('admin/share-pasword/' . $enquiry['enquiry_id'])); ?>" method="POST" enctype="multipart/form-data">
                    <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>pdf link <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $attributes = $__attributesOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__attributesOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $component = $__componentOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__componentOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
                    <div class="relative flex justify-end items-center mb-4">
                        <a data-copy-target='copiedLink<?php echo e($key); ?>' href="<?php echo e(url('pdf-access/enquiry/'.$enquiry['enquiry_id'])); ?>" target="_blank" rel="noreferrer noopener" class="text-blue-600 w-full bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-primary focus:border-primary p-2.5 pr-14 truncate">
                            <?php echo e(url('pdf-access/enquiry/'.$enquiry['enquiry_id'])); ?>

                        </a>
                        <button type="button" class="absolute right-2" onclick="copyLink<?php echo e($key); ?>()">
                            <img src="/svg/clipboard.svg" alt="Copy">
                          </button>
                    </div>
                   
                    <script>
                        function copyLink<?php echo e($key); ?>(){
                            const copyText = document.querySelector("[data-copy-target='copiedLink<?php echo e($key); ?>']");
                            const link = copyText.href;
                            navigator.clipboard.writeText(link);
                            alert("Copied the text: " + link);
                        }
                    </script>

                    <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Password <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $attributes = $__attributesOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__attributesOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $component = $__componentOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__componentOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
                    <div class="relative flex justify-end items-center">
                        <input disabled value="<?php echo e($enquiry['enquiry_password'] ?? ''); ?>" type="text" data-copy-target="copyPassword<?php echo e($key); ?>" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary p-2.5 pr-10 truncate">
                        <button type="button" class="absolute right-2" onclick="copyPassword<?php echo e($key); ?>()">
                            <img src="/svg/clipboard.svg" alt="Copy">
                          </button>
                    </div>
                    <script>
                        function copyPassword<?php echo e($key); ?>(){
                            const copyText = document.querySelector("[data-copy-target='copyPassword<?php echo e($key); ?>']");
                            copyText.select();
                            copyText.setSelectionRange(0, 99999);
                            navigator.clipboard.writeText(copyText.value);
                            alert("Copied the text: " + copyText.value);
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function shareEnquiryButton<?php echo e($key); ?>() {
        let share_button = document.getElementById('share-button-<?php echo e($key); ?>')
        let share_modal = document.getElementById('popup-modal-share-<?php echo e($key); ?>')
        let share_close_button = document.getElementById('share-close-button-<?php echo e($key); ?>')
        let overlay = document.getElementById('overlay-share-<?php echo e($key); ?>');

        share_modal.classList.remove('hidden')

        share_close_button.addEventListener('click', function() {
            share_modal.classList.add('hidden')
        });

        window.addEventListener('click', function(event) {
            if (event.target == overlay) {
                share_modal.classList.add('hidden')
            }
        });
    }

</script>
<?php /**PATH C:\my-project\miscibles-platform\src\resources\views/pages/admin/enquiry/modal-share.blade.php ENDPATH**/ ?>