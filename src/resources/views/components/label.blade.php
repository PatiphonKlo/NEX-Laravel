@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-normal text-md mb-2']) }}>
    {{ $value ?? $slot}}
</label>