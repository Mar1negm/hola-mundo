@props([
    'name',
    'label',
    'type' => 'text',
    'value' => null,
    'placeholder' => '',
    'hint' => null,
    'required' => false,
])

@php
    $inputId = $attributes->get('id', str_replace('.', '-', $name));
    $hasError = $errors->has($name);
@endphp

<div class="flex flex-col gap-1.5">
    <label for="{{ $inputId }}" class="flex items-center justify-between gap-2 text-sm font-semibold text-slate-700">
        <span>{{ $label }}@if ($required)<span class="text-rose-600"> *</span>@endif</span>
        @if ($hint)
            <span class="text-xs font-medium text-slate-400">{{ $hint }}</span>
        @endif
    </label>
    <input
        id="{{ $inputId }}"
        name="{{ $name }}"
        type="{{ $type }}"
        value="{{ $type === 'password' ? '' : old($name, $value) }}"
        placeholder="{{ $placeholder }}"
        @required($required)
        @class([
            'h-12 w-full rounded-xl border bg-white px-3.5 text-sm text-slate-900 shadow-sm outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:ring-4 focus:ring-blue-100',
            'border-rose-400' => $hasError,
            'border-slate-200' => ! $hasError,
        ])
        {{ $attributes->except(['id', 'class']) }}
    >
    @error($name)
        <p class="text-xs font-medium text-rose-600">{{ $message }}</p>
    @enderror
</div>
