@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 focus:border-[#FF6F3C] focus:ring-[#FF6F3C] rounded-md shadow-sm']) }}>