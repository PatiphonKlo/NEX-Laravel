<button type="button" id="update-group-button-{{ $key }}" onclick="updateGroupButton{{ $key }}()" class="w-full inline-flex items-center px-3 py-2 text-xs font-medium text-center text-white bg-yellow-500 rounded-md hover:bg-yellow-900">
    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 22" xmlns="http://www.w3.org/2000/svg">
        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
    </svg>
    VIEW & UPDATE 
</button>
<div id="popup-modal-update-group-{{ $key }}" class="hidden relative z-30" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-gray-900 bg-opacity-50 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen">
        <div id="overlay-update-group-{{ $key }}" class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">
            <div class="p-5 relative transform rounded-lg bg-white text-left shadow-xl transition-all sm:max-w-3xl lg:max-w-6xl">

                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                    <h3 class="text-lg font-semibold text-gray-900">
                        EDIT {{ $product_group['product_group'] }} GROUP
                    </h3>
                    <button type="button" id="update-group-close-button-{{ $key }}" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-3 sm:p-8 overflow-y-auto h-[60vh]" action="{{ config('app.env') == 'production' ? secure_url('admin/update-cost-estimation/' . $product_group['product_group_id']) : url('admin/update-cost-estimation/' . $product_group['product_group_id']) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3 sm:w-80">
                        <!-- TODO modify x-input to micro component -->
                        <x-label for="product_group_name_update{{ $key }}" value="Group Full Name"></x-label>
                        <x-input2 type="text" name="product_group_name_update{{ $key }}" value="{{ old('product_group_name_update'.$key) ?? $product_group['product_group_name'] }}"/>
                    </div>
                    <div class="mb-3 sm:w-80">
                        <x-label for="product_group_update{{ $key }}" value="Group ID"></x-label>
                        <x-input2 type="text" name="product_group_update{{ $key }}" value="{{ old('product_group_update'.$key) ?? $product_group['product_group'] }}"/>
                    </div>
                    <div class="mb-3 sm:w-80">
                        <x-label for="product_min_cost_update{{ $key }}" value="Minimum Cost (Baht)"></x-label>
                        <x-input2 type="number" name="product_min_cost_update{{ $key }}" value="{{ old('product_min_cost_update'.$key) ?? $product_group['product_min_cost'] }}"/>
                    </div>
                    <div class="mb-8 sm:w-80">
                        <x-label for="product_max_cost_update{{ $key }}" value="Maximum Cost (Baht)"></x-label>
                        <x-input2 type="number" name="product_max_cost_update{{ $key }}" value="{{ old('product_max_cost_update'.$key) ?? $product_group['product_max_cost'] }}"/>
                    </div>

                    <input name="update_key" type="hidden" value="{{ $key }}">

                    <div class="flex justify-end mt-10">
                        <button type="submit"
                            class="text-white inline-flex items-center bg-primary hover:bg-green-900 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
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
    function updateGroupButton{{$key}}() {
        let update_group_button = document.getElementById('update-group-button-{{ $key }}')
        let update_group_modal = document.getElementById('popup-modal-update-group-{{ $key }}')
        let update_group_close_button = document.getElementById('update-group-close-button-{{ $key }}')
        let overlay = document.getElementById('overlay-update-group-{{ $key }}');

        update_group_modal.classList.remove('hidden')

        update_group_close_button.addEventListener('click', function() {
            update_group_modal.classList.add('hidden')
        });

        window.addEventListener('click', function(event) {
            if (event.target == overlay) {
                update_group_modal.classList.add('hidden')
            }
        });
    }

</script>

@if (
$errors->has('product_group_update' . $key) ||
$errors->has('product_min_cost_update' . $key) ||
$errors->has('product_min_cost_update' . $key) 
)
<script>
    window.onload = function() {
        updateGroupButton{{$key}}();
    };

</script>
@endif

