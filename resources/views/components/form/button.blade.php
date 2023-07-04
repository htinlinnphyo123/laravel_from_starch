<x-form.field>
    <button {{ $attributes(['class'=>"w-full bg-blue-400 py-2 mt-4 hover:bg-blue-600 focus:bg-blue-600 rounded-md"]) }}>
        {{ $slot }}
    </button>
</x-form.field>