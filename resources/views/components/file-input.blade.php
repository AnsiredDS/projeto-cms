@props(['disabled' => false])

<input type="file" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'text-sm text-grey-500 file:mr-5 file:py-2 file:px-6 file:border-2 file:text-sm file:font-medium file:bg-gray-200 file:text-black hover:file:cursor-pointer hover:file:border-color hover:file:bg-sky-50 hover:file:text-sky-700']) !!}>
