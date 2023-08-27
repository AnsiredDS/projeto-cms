<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center p-4 bg-gray-500 border-2 border-transparent font-semibold text-xs text-white tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
