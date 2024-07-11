<?php if(session('status') || session('error')): ?>

<div id="status-alert-server-side" class="relative z-40">
    <div class="fixed inset-0 bg-gray-900 bg-opacity-50 transition-opacity"></div>
    <div class="fixed inset-0 top-5 z-10 w-screen">
        <div class="flex min-h-full justify-center p-4 text-center items-start sm:p-0">
            <div class="p-5 relative transform rounded-lg shadow-xl transition-all w-full sm:max-w-xl md:max-w-2xl lg:max-w-4xl border-t-4 flex items-center <?php echo e(session('error') ? 'text-red-800  border-red-800 bg-red-50' : 'text-primary border-primary bg-green-50'); ?>">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <div class="ms-3 text-sm font-medium">
                    <?php echo e(session('error') ?? session('status')); ?>

                </div>
                <button type="button" onclick="dismissServerAlert()" class="ms-auto -mx-1.5 -my-1.5 rounded-lg focus:ring-2  p-1.5 inline-flex items-center justify-center h-8 w-8 <?php echo e(session('error') ? 'bg-red-50 text-red-900 focus:ring-red-400 hover:bg-red-200' : 'bg-green-50 text-green-900 focus:ring-green-400 hover:bg-green-200'); ?>">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    function dismissServerAlert() {
        var alert = document.getElementById('status-alert-server-side');
        alert.style.display = 'none';
    }
</script>

<?php endif; ?>
<?php /**PATH C:\NEX\miscibles-platform\src\resources\views/layouts/shared/status-alert-server-side.blade.php ENDPATH**/ ?>