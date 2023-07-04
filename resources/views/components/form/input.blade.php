@props(['name'])

<x-form.field>
    <x-form.label name="{{ $name }}" />
    <input name="{{ $name }}" id="{{ $name }}" 
        placeholder="Enter {{ $name }} ..." 
        class="bg-white w-full block mb-2 p-2 focus:outline-none active:outline-none"
        {{ $attributes(['value'=>old($name)]) }} />
    <x-form.error name="{{ $name }}" />
</x-form.field>