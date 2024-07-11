<button {{ $attributes->merge(['type'=>'submit', 'class'=>'text-base w-40 py-2 text-white bg-primary rounded-md hover:bg-green-500' ]) }}>
    {{ $slot }}
</button>