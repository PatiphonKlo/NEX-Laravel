<button type="button" id="update-product-button-{{ $key }}" onclick="updateProductButton{{ $key }}()"
    class="w-full inline-flex items-center px-3 py-2 text-xs font-medium text-center text-white bg-yellow-500 rounded-md hover:bg-yellow-900">
    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 22" xmlns="http://www.w3.org/2000/svg">
        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
        <path fill-rule="evenodd"
            d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
            clip-rule="evenodd"></path>
    </svg>
    VIEW & UPDATE
</button>
<div id="popup-modal-update-product-{{ $key }}" class="hidden relative z-30">
    <div class="fixed inset-0 bg-gray-900 bg-opacity-50 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen">
        <div id="overlay-update-product-{{ $key }}"
            class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">
            <div
                class="p-5 relative transform rounded-lg bg-white text-left shadow-xl transition-all sm:max-w-3xl lg:max-w-6xl">

                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                    <h3 class="text-lg font-semibold text-gray-900">
                        EDIT MODEL {{ $product['product_model'] }}
                    </h3>
                    <button type="button" id="update-product-close-button-{{ $key }}"
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
                    action="{{ config('app.env') == 'production' ? secure_url('admin/update-product/' . $product['product_id']) : url('admin/update-product/' . $product['product_id']) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid gap-4 md:grid-cols-4 mb-4">
                        <div class="col-span-2">
                            <label for="product_group" class="block mb-2 text-sm font-medium text-gray-900">Spec.
                                Sheet</label>
                            <input accept=".pdf"
                                class="block w-full text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                name="spec_sheet_update{{ $key }}" type="file">
                            @error('spec_sheet_update' . $key)
                            <p class="mt-2 text-sm text-danger-normal whitespace-normal">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-span-2">
                            <label for="product_name_update{{ $key }}"
                                class="block mb-2 text-sm font-medium text-gray-900">
                                Product Name</label>
                            <input type="text"
                                value="{{ old('product_name_update' . $key) ?? $product['product_name'] }}"
                                name="product_name_update{{ $key }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2"
                                placeholder="Type product name">
                            @error('product_name_update' . $key)
                            <p class="mt-2 text-sm text-red-600 whitespace-normal">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="grid gap-4 mb-4 md:grid-cols-2 lg:grid-cols-4">
                        <div>
                            <label for="product_group_update{{ $key }}"
                                class="block mb-2 text-sm font-medium text-gray-900">Group
                                Select</label>
                            <select name="product_group_update{{ $key }}"
                                class="cursor-pointer bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5">
                                <option value="{{ $product['product_group'] ?? old('product_group_update' . $key) }}"
                                    selected>{{ $product['product_group'] ?? old('product_group_update' . $key) }}
                                </option>
                                @if (isset($productGroups))
                                @foreach ($productGroups as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                                @else
                                <option value="" disabled selected>No Group Found</option>
                                @endif
                            </select>
                            @error('product_group_update' . $key)
                            <p class="mt-2 text-sm text-red-600 whitespace-normal">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="product_model_update{{ $key }}"
                                class="block mb-2 text-sm font-medium text-gray-900">Model</label>
                            <input type="hidden" value="{{ $product['product_model'] }}"
                                name="product_model_update{{ $key }}">
                            <div
                                class="cursor-not-allowed bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5">
                                {{ $product['product_model'] }}
                            </div>
                            @error('product_model_update' . $key)
                            <p class="mt-2 text-sm text-red-600 whitespace-normal">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-span-1">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Assembly
                                Part Select</label>
                            <button data-dropdown-toggle="dropdown{{ $product['product_model'] }}update"
                                class="inline-flex items-center bg-gray-800 border border-gray-300 text-white text-sm rounded-lg focus:ring-primary focus:border-primary w-full p-2.5 hover:bg-gray-400"
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
                            @error('assembly_part_update' . $key)
                            <p class="mt-2 text-sm text-red-600 whitespace-normal">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Dropdown menu -->
                        <div id="dropdown{{ $product['product_model'] }}update"
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
                                    <input type="text" id="assemblySearch-{{ $key }}"
                                        onkeyup="assemblySearch{{ $key }}()"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full pl-10 p-2.5"
                                        placeholder="Search">
                                </div>
                            </div>
                            <ul id="assemblyUL-{{ $key }}"
                                class="h-48 px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownSearchButton">
                                @if (!empty($assemblyParts))
                                @foreach ($assemblyParts as $item)
                                <li>
                                    <div class="flex items-center p-2 rounded hover:bg-gray-100">
                                        @if (isset($product['assembly_part']) && in_array($item['part_id'],
                                        $product['assembly_part']))
                                        <input id="checkbox-item-{{ $item['part_id'] }}" type="checkbox"
                                            name="assembly_part_update{{ $key }}[]" value="{{ $item['part_id'] }}"
                                            class="w-4 h-4 text-primary bg-gray-100 border-gray-300 rounded focus:ring-primary"
                                            checked>
                                        <label for="checkbox-item-{{ $item['part_id'] }}"
                                            class="w-full ml-2 text-sm font-medium text-gray-900 rounded">{{
                                            $item['part_name'] }}
                                            ({{ $item['part_id'] }})
                                        </label>
                                        @else
                                        <input id="checkbox-item-{{ $item['part_id'] }}" type="checkbox"
                                            name="assembly_part_update{{ $key }}[]" value="{{ $item['part_id'] }}"
                                            class="w-4 h-4 text-primary bg-gray-100 border-gray-300 rounded focus:ring-primary"
                                            {{ old('assembly_part_update' . $key) ? (in_array($item['part_id'],
                                            old('assembly_part_update' . $key)) ? 'checked' : '' ) : '' }}>
                                        <label for="checkbox-item-{{ $item['part_id'] }}"
                                            class="w-full ml-2 text-sm font-medium text-gray-900 rounded">
                                            {{ $item['part_name'] }}
                                            ({{ $item['part_id'] }})</label>
                                        @endif
                                    </div>
                                </li>
                                @endforeach
                                @else
                                <li class="text-center"> No data avliable</li>
                                <li><a href="{{ url('/admin/assembly-part') }}"
                                        class="flex justify-center text-primary underline font-medium">Create new
                                        part</a></li>
                                @endif
                            </ul>
                        </div>

                        <div class="col-span-1">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Technical
                                Data Select</label>
                            <button data-dropdown-toggle="dropdown{{ $product['product_model'] }}-update2"
                                class="inline-flex items-center bg-gray-800 border border-gray-300 text-white text-sm rounded-lg focus:ring-primary focus:border-primary w-full p-2.5 hover:bg-gray-400"
                                type="button">
                                <span class="font-medium flex-1 ml-3 text-left whitespace-nowrap">Technical Data
                                    Select</span>
                                <svg class="w-2.5 h-2.5 mr-2 text-gray-500" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            @error('technical_data_update' . $key)
                            <p class="mt-2 text-sm text-red-600 whitespace-normal">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Dropdown menu -->
                        <div id="dropdown{{ $product['product_model'] }}-update2"
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
                                    <input type="text" id="technicalSearch-{{ $key }}"
                                        onkeyup="technicalSearch{{ $key }}()"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full pl-10 p-2.5"
                                        placeholder="Search">
                                </div>
                            </div>
                            <ul id="technicalUL-{{ $key }}"
                                class="h-48 px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownSearchButton">
                                @if (!empty($technicalData))
                                @foreach ($technicalData as $item)
                                <li>
                                    <div class="flex items-center p-2 rounded hover:bg-gray-100">
                                        @if (isset($product['technical_data']) && in_array($item[1],
                                        $product['technical_data']))
                                        <input id="checkbox-item-{{ $item[1] }}2" type="checkbox"
                                            name="technical_data_update{{ $key }}[]" value="{{ $item[1] }}"
                                            class="w-4 h-4 text-primary bg-gray-100 border-gray-300 rounded focus:ring-primary"
                                            checked>
                                        <label for="checkbox-item-{{ $item[1] }}2"
                                            class="w-full ml-2 text-sm font-medium text-gray-900 rounded">{{
                                            $item[0]['technical_component'] }}:
                                            {{ $item[0]['specification'] }}</label>
                                        @else
                                        <input id="checkbox-item-{{ $item[1] }}2" type="checkbox"
                                            name="technical_data_update{{ $key }}[]" value="{{ $item[1] }}"
                                            class="w-4 h-4 text-primary bg-gray-100 border-gray-300 rounded focus:ring-primary"
                                            {{ old('technical_data_update' . $key) ? (in_array($item[1],
                                            old('technical_data_update' . $key)) ? 'checked' : '' ) : '' }}>
                                        <label for="checkbox-item-{{ $item[1] }}2"
                                            class="w-full ml-2 text-sm font-medium text-gray-900 rounded">{{
                                            $item[0]['technical_component'] }}:
                                            {{ $item[0]['specification'] }}</label>
                                        @endif
                                    </div>
                                </li>
                                @endforeach
                                @else
                                <li class="text-center"> No data avliable</li>
                                <li><a href="{{ url('/admin/technical-data') }}"
                                        class="flex justify-center text-primary underline font-medium">Create new
                                        data</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>

                    <div class="grid gap-4 mb-4 sm:grid-cols-4 lg:grid-cols-8">

                        <div>
                            <label for="product_price_validity_update"
                                class="block mb-2 text-sm font-medium text-gray-900">Price Validity</label>
                            <input type="number"
                                value="{{ old('product_price_validity_update' . $key) ?? $product['product_price_validity'] }}"
                                name="product_price_validity_update{{ $key }}" id="product_price_validity_update"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                                placeholder="e.g. 10 (Days)">
                            @error('product_price_validity_update' . $key)
                            <p class="mt-2 text-sm text-red-600 whitespace-normal">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="product_delivery_term_update"
                                class="block mb-2 text-sm font-medium text-gray-900">Delivery Term</label>
                            <input type="number"
                                value="{{ old('product_delivery_term_update' . $key) ?? $product['product_delivery_term'] }}"
                                name="product_delivery_term_update{{ $key }}" id="product_delivery_term_update"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                                placeholder="e.g. 45 (Days)">
                            @error('product_delivery_term_update' . $key)
                            <p class="mt-2 text-sm text-red-600 whitespace-normal">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="product_credit_day_update"
                                class="block mb-2 text-sm font-medium text-gray-900">Credit
                                Days</label>
                            <input type="number"
                                value="{{ old('product_credit_day_update' . $key) ?? $product['product_credit_day'] }}"
                                name="product_credit_day_update{{ $key }}" id="product_credit_day_update"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                                placeholder="e.g. 30 (Days)">
                            @error('product_credit_day_update' . $key)
                            <p class="mt-2 text-sm text-red-600 whitespace-normal">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="product_discount_update"
                                class="block mb-2 text-sm font-medium text-gray-900">Discount
                                (%)</label>
                            <input type="number"
                                value="{{ old('product_discount_update' . $key) ?? $product['product_discount'] }}"
                                name="product_discount_update{{ $key }}" id="product_discount_update"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                                placeholder="e.g. 0">
                            @error('product_discount_update' . $key)
                            <p class="mt-2 text-sm text-red-600 whitespace-normal">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-span-3">
                            <label for="product_price_update" class="block mb-2 text-sm font-medium text-gray-900">Price
                                (THB)</label>
                            <input type="number"
                                value="{{ old('product_price_update' . $key) ?? $product['product_price'] }}"
                                name="product_price_update{{ $key }}" id="product_price_update"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                                placeholder="e.g. 300000">
                            @error('product_price_update' . $key)
                            <p class="mt-2 text-sm text-red-600 whitespace-normal">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-span-1">
                            <label for="product_assurance_update{{ $key }}"
                                class="block mb-2 text-sm font-medium text-gray-900">Assurance
                                (Year)</label>
                            <input type="number"
                                value="{{ old('product_assurance_update' . $key) ?? $product['product_assurance'] }}"
                                name="product_assurance_update{{ $key }}" id="product_assurance_update"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                                placeholder="e.g. 1">
                            @error('product_assurance_update' . $key)
                            <p class="mt-2 text-sm text-red-600 whitespace-normal">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid gap-4 mb-4 sm:grid-cols-3 lg:grid-cols-6">
                        <div class="col-span-1">
                            <label for="product_down_payment_update{{ $key }}"
                                class="block mb-2 text-sm font-medium text-gray-900">Down
                                Payment (%)</label>
                            <input type="number"
                                value="{{ old('product_down_payment_update' . $key) ?? $product['product_down_payment'] }}"
                                name="product_down_payment_update{{ $key }}" id="product_down_payment_update"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                                placeholder="e.g. 25">
                            @error('product_down_payment_update' . $key)
                            <p class="mt-2 text-sm text-red-600 whitespace-normal">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-span-1">
                            <label for="product_after_install_update{{ $key }}"
                                class="block mb-2 text-sm font-medium text-gray-900">After
                                Install (%)</label>
                            <input type="number"
                                value="{{ old('product_after_install_update' . $key) ?? $product['product_after_install'] }}"
                                name="product_after_install_update{{ $key }}" id="product_after_install_update"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                                placeholder="e.g. 40">
                            @error('product_after_install_update' . $key)
                            <p class="mt-2 text-sm text-red-600 whitespace-normal">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-span-1">
                            <label for="product_final_check_update{{ $key }}"
                                class="block mb-2 text-sm font-medium text-gray-900">Final
                                Check (%)</label>
                            <input type="number"
                                value="{{ old('product_final_check_update' . $key) ?? $product['product_final_check'] }}"
                                name="product_final_check_update{{ $key }}" id="product_final_check_update"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                                placeholder="e.g. 35">
                            @error('product_final_check_update' . $key)
                            <p class="mt-2 text-sm text-red-600 whitespace-normal">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-span-1">
                            <label for="product_logistic_cost_update{{ $key }}"
                                class="block mb-2 text-sm font-medium text-gray-900">
                                Logistic & Training (THB)
                            </label>
                            <input type="number"
                                value="{{ old('product_logistic_cost_update' . $key) ?? $product['product_logistic_cost'] }}"
                                name="product_logistic_cost_update{{ $key }}" id="product_logistic_cost_update"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                                placeholder="e.g. 3500">
                            @error('product_logistic_cost_update' . $key)
                            <p class="mt-2 text-sm text-red-600 whitespace-normal">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid gap-4 mb-4 md:grid-cols-2 lg:grid-cols-4">
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900"
                                for="product_picture_update">Image</label>
                            <input accept=".jpg"
                                class="block w-full text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                name="product_picture_update{{ $key }}" type="file" value="">
                            @error('product_picture_update' . $key)
                            <p class="mt-2 text-sm text-red-600 whitespace-normal">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900"
                                for="product_front_view_update">Front
                                Image</label>
                            <input accept=".jpg"
                                class="block w-full text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                name="product_front_view_update{{ $key }}" type="file">
                            @error('product_front_view_update' . $key)
                            <p class="mt-2 text-sm text-red-600 whitespace-normal">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900"
                                for="product_side_view_update">Side
                                Image</label>
                            <input accept=".jpg"
                                class="block w-full text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                name="product_side_view_update{{ $key }}" type="file">
                            @error('product_side_view_update' . $key)
                            <p class="mt-2 text-sm text-red-600 whitespace-normal">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900"
                                for="product_top_view_update">Top
                                Image</label>
                            <input accept=".jpg"
                                class="block w-full text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                name="product_top_view_update{{ $key }}" type="file">
                            @error('product_top_view_update' . $key)
                            <p class="mt-2 text-sm text-red-600 whitespace-normal">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <input name="update_id" type="hidden" value="{{ $key }}">

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
    function updateProductButton{{ $key }}() {
        let update_product_button = document.getElementById('update-product-button-{{ $key }}')
        let update_product_modal = document.getElementById('popup-modal-update-product-{{ $key }}')
        let update_product_close_button = document.getElementById('update-product-close-button-{{ $key }}')
        let overlay = document.getElementById('overlay-update-product-{{ $key }}');

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

    function assemblySearch{{ $key }}() {
        // Declare variables
        var input, filter, ul, li, label, i, txtValue
        input = document.getElementById("assemblySearch-{{ $key }}")
        filter = input.value.toUpperCase()
        ul = document.getElementById("assemblyUL-{{ $key }}")
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

    function technicalSearch{{ $key }}() {
        // Declare variables
        var input, filter, ul, li, label, i, txtValue;
        input = document.getElementById("technicalSearch-{{ $key }}");
        filter = input.value.toUpperCase();
        ul = document.getElementById("technicalUL-{{ $key }}");
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


@if (
$errors->has('product_name_update' . $key) ||
$errors->has('product_group_update' . $key) ||
$errors->has('product_model_update' . $key) ||
$errors->has('product_price_update' . $key) ||
$errors->has('product_assurance_update' . $key) ||
$errors->has('product_down_payment_update' . $key) ||
$errors->has('product_after_install_update' . $key) ||
$errors->has('product_final_check_update' . $key) ||
$errors->has('product_price_validity_update' . $key) ||
$errors->has('assembly_part_update' . $key) ||
$errors->has('technical_data_update' . $key) ||
$errors->has('product_delivery_term_update' . $key) ||
$errors->has('product_credit_update' . $key) ||
$errors->has('product_discount_update' . $key) ||
$errors->has('product_picture_update' . $key) ||
$errors->has('product_front_view_update' . $key) ||
$errors->has('product_side_view_update' . $key) ||
$errors->has('product_top_view_update' . $key) ||
$errors->has('product_logistic_cost_update' . $key) ||
$errors->has('spec_sheet_update' . $key))
<script>
    window.onload = function() {
            updateProductButton{{ $key }}();
        };
</script>
@endif