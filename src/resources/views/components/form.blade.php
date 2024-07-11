{{-- @props(['method'=>'GET']) --}}

{{-- @php
$method = str($method)->upper();
if ($method ='PUT' || $method = 'PATCH' || $method = 'DELETE') {
$method = 'POST';
}
@endphp --}}

<div>
    <form {{ 'method=' . $method }} {{ $attributes }}>
        @csrf
        {{-- @if($method)
            @method($method)
        @endif --}}
        {{ $slot }}
    </form>
</div>

