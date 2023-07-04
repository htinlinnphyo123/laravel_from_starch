@props(['name'])

<label for="{{ $name }}" class="block py-3">
    {{ ucwords($name) }}
</label>