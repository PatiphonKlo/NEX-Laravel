@if ($enquiry['drawing_file'] == 'yes')
<div class="w-30">
    <a href="{{ url('admin/drawing-view/'.$enquiry['enquiry_id']) }}" target="_blank"
        class="w-full inline-flex items-center px-3 py-2 text-xs font-medium text-center text-white bg-tertiary rounded-md hover:bg-gray-normal">
        DRAWING FILE
    </a>
</div>
@endif
