@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-[16px] sm:text-[18px] font-medium text-[#000000] mb-1']) }}>
    {{ $value ?? $slot }}
</label>
