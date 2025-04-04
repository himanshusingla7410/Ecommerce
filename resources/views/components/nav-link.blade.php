@props(['active' => false])

<div class="relative flex">
    <button {{ $attributes->merge([
        'class' => ($active 
            ? 'border-indigo-600 text-indigo-600' 
            : 'border-transparent text-gray-700 hover:text-gray-800') 
            . ' relative z-10 -mb-px flex items-center border-b-2 pt-px text-sm font-medium transition-colors duration-200 ease-out',
        'type' => 'button',
        'aria-expanded' => 'false',
    ]) }}>
        {{ $slot }}
    </button>
</div>