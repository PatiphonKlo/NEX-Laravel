<div id="status-alert-client-side" class="hidden relative z-40">
    <div class="fixed inset-0 bg-gray-900 bg-opacity-50 transition-opacity"></div>
    <div class="text-center fixed inset-0 top-5 z-10 w-screen">
        <div class="flex min-h-full justify-center p-4  items-start sm:p-0">
            <div class="p-5 relative transform rounded-lg shadow-xl transition-all w-full sm:max-w-xl md:max-w-2xl lg:max-w-4xl border-t-4 flex items-center justify-center text-red-800  border-red-800 bg-red-50">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <p class="ms-3 text-sm font-medium">
                </p>
                <button type="button" onclick="dismissAlert()" class="ms-auto -mx-1.5 -my-1.5 rounded-lg focus:ring-2  p-1.5 inline-flex items-center justify-center h-8 w-8 bg-red-50 text-red-900 focus:ring-red-400 hover:bg-red-200">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    function dismissAlert() {
        const modal = document.getElementById('status-alert-client-side');
        modal.classList.add('hidden');
    }

</script>
<?php /**PATH C:\Users\patip\NEX\miscibles-platform-2.4\src\resources\views/layouts/shared/status-alert-client-side.blade.php ENDPATH**/ ?>