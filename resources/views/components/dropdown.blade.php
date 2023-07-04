<div x-data="{ show : false }">
    {{-- Slot --}}
    <button @click ="show = !show" @click.away="show=false" class="w-full py-2 rounded-md pl-8 pr-8 inline-flex text-sm font-semibold focus:bg-gray-100">
        {{ $trigger }}
    </button>

    {{-- Trigger --}}
    <div x-show="show" class="max-h-52 py-2 rounded-md overflow-y-scroll bg-gray-200">
        {{ $slot }}
    </div>
</div>