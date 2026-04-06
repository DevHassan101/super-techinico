@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'block mt-1 w-full form-input border-[#000000] focus:border-indigo-600']) !!}>
