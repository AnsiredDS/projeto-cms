@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 w-full max-w-lg focus:border-indigo-500 focus:ring-indigo-500 shadow-sm']) !!}> {{$value}} </textarea>
