<div class="px-6 py-20 max-w-2xl mx-auto">
    <div class="flex justify-between mb-6">
        <div class="font-bold">
            <div>{{ $productData['product_name'] }} ({{ $productData['product_group'] }})</div>
            <div class="font-bold"> {{ $productData['product_model'] }}</div>
        </div>
        <div class="font-bold">
            @if (request()->is('quotation-form/*/*') || request()->is('quotation-view/*/*/*/*'))
            <input type="number" class="text-center w-40 py-0.5 rounded-md" name="product_amount"
                value="{{ old('product_amount') ?? $quotationData['product_amount'] ?? 1 }}"
                placeholder="1"> UNIT
            @error('product_amount')
            <p class="mt-2 text-sm text-red-600 whitespace-normal font-normal text-wrap">
                {{ $message }}
            </p>
            @enderror
            <br>
            <input type="number" class="text-center w-40 py-0.5 rounded-md" name="product_price"
                value="{{ old('product_price') ?? $quotationData['product_price'] ?? $productData['product_price'] }}"
                placeholder="{{ number_format($productData['product_price']) }}"> THB/UNIT
            @error('product_price')
            <p class="mt-2 text-sm text-red-600 whitespace-normal font-normal text-wrap">
                {{ $message }}
            </p>
            @enderror
            @else
            <div>{{ number_format($quotationData['product_price'] ?? $productData['product_price']) }} THB</div>
            @endif
        </div>
    </div>
    <table class="w-full mb-8">
        <thead>
            <tr>
                <th class="text-left font-bold">Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($technicalData as $item)
            <tr>
                <td class="text-left">{{ $item['technical_component'] }} : {{ $item['specification'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @if (request()->is('quotation-form/*/*') || request()->is('quotation-view/*/*/*/*'))
    Price Validity : <input type="number" name="product_price_validity" class="text-center w-24 py-0.5 rounded-md m-1"
        value="{{ old('product_price_validity') ?? $quotationData['product_price_validity'] ?? $productData['product_price_validity'] }}"
        placeholder="{{ number_format($productData['product_price_validity']) }}"> days
    @error('product_price_validity')
    <p class="mt-2 text-sm text-red-600 whitespace-normal font-normal text-wrap">
        {{ $message }}
    </p>
    @enderror
    <br>
    Delivery Term : <input type="number" name="product_delivery_term" class="text-center w-24 py-0.5 rounded-md m-1"
        value="{{ old('product_delivery_term') ?? $quotationData['product_delivery_term'] ?? $productData['product_delivery_term'] }}"
        placeholder="{{ number_format($productData['product_delivery_term']) }}"> days
    @error('product_delivery_term')
    <p class="mt-2 text-sm text-red-600 whitespace-normal font-normal text-wrap">
        {{ $message }}
    </p>
    @enderror
    <br>
    <div class="font-bold">Payment Term</div>
    <div>
        Down payment: <input class="text-center w-24 py-0.5 rounded-md m-1" type="number" name="product_down_payment"
            value="{{ old('product_down_payment') ?? $quotationData['product_down_payment'] ?? $productData['product_down_payment'] }}"
            placeholder=" {{ number_format($productData['product_down_payment'], 1, '.', '') }}"> %
        @error('product_down_payment')
        <p class="mt-2 text-sm text-red-600 whitespace-normal font-normal text-wrap">
            {{ $message }}
        </p>
        @enderror
        <br>
        Final Check: <input class="text-center w-24 py-0.5 rounded-md m-1" type="number" name="product_final_check"
            value="{{ old('product_final_check') ?? $quotationData['product_final_check'] ?? $productData['product_final_check'] }}"
            placeholder="{{ number_format($productData['product_final_check'], 1, '.', '') }}"> %
        @error('product_final_check')
        <p class="mt-2 text-sm text-red-600 whitespace-normal font-normal text-wrap">
            {{ $message }}
        </p>
        @enderror
        <br>
        After Install: <input class="text-center w-24 py-0.5 rounded-md m-1" type="number"
            value="{{ old('product_after_install') ?? $quotationData['product_after_install'] ?? $productData['product_after_install'] }}"
            name="product_after_install"
            placeholder="{{ number_format($productData['product_after_install'], 1, '.', '') }}"> %
        @error('product_after_install')
        <p class="mt-2 text-sm text-red-600 whitespace-normal font-normal text-wrap">
            {{ $message }}
        </p>
        @enderror
    </div>
    @else
    <div>Price Validity : {{ $quotationData['product_price_validity'] ?? $productData['product_price_validity'] }} days
    </div>
    <div>Delivery Term : {{ $quotationData['product_delivery_term'] ?? $productData['product_delivery_term'] }} days
    </div>
    <br>
    <div class="font-bold">Payment Term</div>
    <div>Down payment: {{ number_format($quotationData['product_down_payment'] ?? $productData['product_down_payment'],
        1, '.', '') }}%
        <br>Final Check: {{ number_format($quotationData['product_final_check'] ?? $productData['product_final_check'],
        1, '.', '') }}%
        <br>After Install: {{ number_format($quotationData['product_after_install'] ??
        $productData['product_after_install'], 1, '.', '') }}%
    </div>
    @endif
</div>