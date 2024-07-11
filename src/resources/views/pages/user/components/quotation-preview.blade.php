<div class="px-6 py-20 max-w-2xl mx-auto">
    <div class="flex justify-between mb-6">
        <div class="font-bold">
            <div>{{$productData['product_name']}} ({{$productData['product_group']}})</div>
            <div class="font-bold"> {{$productData['product_model']}}</div>
        </div>
        <div class=" font-bold">
            <div>{{number_format($productData['product_price'])}} THB</div>
        </div>
    </div>
    <table class="w-full mb-8">
        <thead>
            <tr>
                <th class="text-left font-bold">Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach($technicalData as $item)
            <tr>
                <td class="text-left">{{$item['technical_component']}} : {{$item['specification']}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="">Price Validity : {{$productData['product_price_validity']}} days</div>
    <div class="">Delivery Term : {{$productData['product_delivery_term']}} days</div>
    <div class="font-bold">Payment Term</div>
    <div class="">Down payment: {{number_format($productData['product_down_payment'], 1, '.', '')}}% / Final Check: {{number_format($productData['product_final_check'], 1, '.', '')}}% 
        <br>/ After Install: {{number_format($productData['product_after_install'], 1, '.', '')}}%</div>
</div>
