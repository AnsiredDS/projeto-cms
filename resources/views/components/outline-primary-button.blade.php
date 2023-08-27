<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center p-4 bg-transparent border-2 border-gray-500 font-semibold text-xs text-gray-500 tracking-widest hover:bg-gray-500 hover:text-white focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
