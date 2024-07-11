@if (isset($productData) && isset($quotationData))
<a href="{{ url('quotation-send/'.$group.'/'.$model.'/'.$clientId.'/'.$quotationId) }}" class="col-start-3 col-span-1">
    <div
        class="p-2 uppercase border-1 border-green-500 bg-green-400 transition hover:bg-green-500 hover:text-white rounded-md text-center">
        Send G-Mail
    </div>
</a>
@else
<button type="button" id="enquiry" disabled class="col-start-2 col-span-1" disabled>
    <div class="text-gray-300 p-2 uppercase border-1 border-green-500 bg-green-100 rounded-md text-center">
        mail
    </div>
</button>
@endif