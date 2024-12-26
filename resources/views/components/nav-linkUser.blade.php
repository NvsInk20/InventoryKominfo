@props(['active' => false])

<a {{ $attributes->merge([
    'class' => $active
        ? 'bg-[#3489D2] text-white rounded-md px-3 py-2 text-sm font-medium'
        : 'text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium',
]) }}
    aria-current="{{ $active ? 'page' : false }}">
    {{ $slot }}
</a>
