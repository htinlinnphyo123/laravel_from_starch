@props(['name'])

@error($name)
    <span class="text-red-400 text-xs">{{ $message }}</span>
@enderror