@props([
    'name',
    'size' => 'h-11 w-11',
])

<img
    src="https://i.pravatar.cc/100?u={{ urlencode($name) }}"
    alt="Avatar de {{ $name }}"
    {{ $attributes->class([$size, 'shrink-0 rounded-full border border-slate-100 bg-slate-100 object-cover']) }}
>
