@if (session()->has('success'))
    <p x-data="{show : true}"
        x-init="setTimeout(()=>show=false,4000)"
        x-show="show"
        class="bg-blue-500 text-md text-white px-3 py-2 fixed bottom-3 right-3 rounded-md">{{ session('success') }}</p>
@endif