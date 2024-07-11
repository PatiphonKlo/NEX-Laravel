<button {{ $attributes->merge(['type'=>'submit', 'class'=>'text-base w-40 py-2 text-white bg-yellow-500 rounded-md hover:bg-yellow-400' ]) }}>
    {{$slot}}
</button>