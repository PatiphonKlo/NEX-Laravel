@props(['disabled' => false])
@php
$class = $errors->has($attributes->get('name')) ?
'text-sm p-4 pr-8 h-8 rounded-md border-1 border-red-600 w-full':
'text-sm p-4 h-8 rounded-md border-none border-gray-300 shadow-sm w-full';
@endphp

@if($errors->has($attributes->get('name')))
<div class="w-full flex justify-end items-center relative">
    <input {{ $disabled ? 'disabled':'' }} {{ $attributes->merge(['class' => $class])}}>
    <svg class="w-4 h-4 text-red-700 absolute mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z" />
    </svg>
</div>
@error($attributes->get('name'))
    <div id="error-message" class="text-red-600">{{ $message }}</div>
@enderror
@else
    <input {{ $disabled ? 'disabled':'' }} {{ $attributes->merge(['class' => $class])}}>
@endif
