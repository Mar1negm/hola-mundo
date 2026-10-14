@props([
    'variant' => 'primary',
    'type' => 'button',
])

@php
    $variantClasses = match ($variant) {
        'secondary' => 'bg-white text-slate-700 ring-1 ring-slate-200 hover:bg-slate-50',
        'danger' => 'bg-rose-50 text-rose-700 hover:bg-rose-100',
        default => 'bg-blue-700 text-white shadow-sm hover:bg-blue-800',
    };
@endphp

<button
    type="{{ $type }}"
    {{ $attributes->merge([
        'class' => 'inline-flex min-h-11 items-center justify-center gap-2 rounded-xl px-4 py-2.5 text-sm font-bold transition focus:outline-none focus:ring-4 focus:ring-blue-200 disabled:pointer-events-none disabled:opacity-50 '.$variantClasses,
    ]) }}
>
    {{ $slot }}
</button>
