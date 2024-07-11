{{-- @props(['disabled' => false])

<input type="radio" {{ old($attributes->get('name')) ? 'checked' : '' }} {{ $disabled ? 'disabled' : '' }} {{ $attributes->merge(['class' => 'text-primary focus:ring-white'])}}> --}}

@props(['options', 'name', 'otherInputName'])

<div class="pl-6 bg-white rounded-t-md py-2 mb-2 flex">
    <label for="{{ $name }}">{{ $slot }}</label>
    @error($name)
        <span id="error-message" class="text-red-600 pl-2">{{ $message }}</span>
        <svg class="w-4 h-4 text-red-700 mt-0.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z" />
        </svg>
    @enderror
</div>
<div class="my-2">
    @foreach($options as $option)
    <div>
        <label class="inline-flex items-center ml-6">
            <input type="radio" id="{{ $option['id'] }}" name="{{ $name }}" value="{{ $option['value'] }}" class="text-primary focus:ring-white" onclick="toggleOptionalInput('{{ $name }}', '{{ $otherInputName }}')" {{ old($name) == $option['value'] ? 'checked' : '' }}>
            <span class="ml-2">{{ $option['label'] }}</span>
        </label>
    </div>
    @endforeach
    
    <input type="text" id="{{ $otherInputName }}" name="{{ $otherInputName }}" value="{{ old($otherInputName) }}" class="text-sm hidden w-[90%] shadow-sm border-none ml-6 py-2 px-4 mt-2 mb-4 bg-white rounded-md placeholder:text-sm placeholder:text-gray-300" placeholder="Type Others . . .">
</div>

