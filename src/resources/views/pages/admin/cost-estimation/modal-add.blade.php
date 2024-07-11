<button type="button" id="add-cost-button" onclick="addCostButton()" class="text-white bg-primary hover:bg-green-900 focus:ring-2 focus:ring-gray-200 font-medium rounded-md text-sm px-4 py-2.5 max-h-11 focus:outline-none">
    NEW GROUP
</button>

<div id="popup-modal-add-cost" class="hidden relative z-30">
    <div class="fixed inset-0 bg-gray-900 bg-opacity-50 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen">
        <div id="overlay" class="flex min-h-full justify-center text-center items-center sm:p-0">
            <div class="p-5 relative transform rounded-lg bg-white text-left shadow-xl transition-all sm:max-w-3xl lg:max-w-6xl">

                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                    <h3 class="text-lg font-semibold text-gray-900">
                        ADD NEW GROUP
                    </h3>
                    <button type="button" id="close-modal-button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-3 sm:p-8 overflow-y-auto h-[60vh]" action="{{ config('app.env') == 'production' ? secure_url('admin/add-cost-estimation') : url('admin/add-cost-estimation')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 sm:w-80">
                        <x-label for="product_group_name" value="Group Full Name"></x-label>
                        <x-input2 type="text" name="product_group_name" value="{{ old('product_group_name') }}" placeholder="e.g. AIR MIXX Brand" />
                    </div>
                    <div class="mb-3 sm:w-80">
                        <x-label for="product_group" value="Group ID"></x-label>
                        <x-input2 type="text" name="product_group" value="{{ old('product_group') }}" placeholder="e.g. AM" />
                    </div>
                    <div class="mb-3 sm:w-80">
                        <x-label for="product_min_cost" value="Minimum Cost (Baht)"></x-label>
                        <x-input2 type="number" name="product_min_cost" value="{{ old('product_min_cost') }}" placeholder="e.g. 500000" />
                    </div>
                    <div class="mb-8 sm:w-80">
                        <x-label for="product_max_cost" value="Maximum Cost (Baht)"></x-label>
                        <x-input2 type="number" name="product_max_cost" value="{{ old('product_max_cost') }}" placeholder="e.g. 800000" />
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="text-white inline-flex items-center bg-primary hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
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

@if(!($errors->has('product_group_name') || 
$errors->has('product_group') || 
$errors->has('product_min_cost') ||
$errors->has('product_max_cost')))
<script>
    function addCostButton() {
        let add_cost_button = document.getElementById('add-cost-button');
        let add_cost_modal = document.getElementById('popup-modal-add-cost');
        let add_cost_close_button = document.getElementById('close-modal-button');
        let overlay = document.getElementById('overlay');

        add_cost_modal.classList.remove('hidden')

        add_cost_close_button.onclick = function() {
            add_cost_modal.classList.add('hidden')
        }
        window.onclick = function(event) {
            if (event.target == overlay) {
                add_cost_modal.classList.add('hidden')
            }
        }
    }

</script>
@endif

@if(($errors->has('product_group_name') || 
$errors->has('product_group') || 
$errors->has('product_min_cost') ||
$errors->has('product_max_cost')))
<script>
    let add_cost_modal = document.getElementById('popup-modal-add-cost')
    let add_cost_button = document.getElementById('add-cost-button')
    let add_cost_close_button = document.getElementById('close-modal-button')
    let overlay = document.getElementById('overlay')

    add_cost_modal.classList.remove('hidden')
    add_cost_close_button.onclick = function() {
        add_cost_modal.classList.add('hidden')
    }
    window.onclick = function(event) {
        if (event.target == overlay) {
            add_cost_modal.classList.add('hidden')
        }
    }

    function addCostButton() {
        add_cost_modal.classList.remove('hidden')
        add_cost_close_button.onclick = function() {
            add_cost_modal.classList.add('hidden')
        }
        window.onclick = function(event) {
            if (event.target == overlay) {
                add_cost_modal.classList.add('hidden')
            }
        }
    }

</script>
@endif
