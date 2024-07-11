@props(['disabled' => false])
@php
$class = $errors->has($attributes->get('name')) ?
'bg-gray-50 border border-red-600 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5':
'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5';
@endphp

@if($errors->has($attributes->get('name')))
<div class="w-full flex justify-end items-center relative">
    <input {{ $disabled ? 'disabled':'' }} {{ $attributes->merge(['class' => $class, 'placeholder' => $placeholder])}}>
    <svg class="w-4 h-4 text-red-700 absolute mr-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z" />
    </svg>
</div>
@error($attributes->get('name'))
    <div id="error-message" class="text-red-600">{{ $message }}</div>
@enderror
@else
    <input {{ $disabled ? 'disabled':'' }} {{ $attributes->merge(['class' => $class])}}>
@endif
