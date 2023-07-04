<nav class="md:flex md:justify-between md:items-center mb-8 px-4">
    <div class="flex justify-center">
        <a href="/">
            <img src="/images/logo.svg" class="" alt="Laracasts Logo" width="165" height="16">
        </a>
    </div>

    <div class="mt-8 md:mt-0 flex items-center justify-around">
        @auth
            <x-dropdown>
                <x-slot name="trigger">
                    {{ ucwords(auth()->user()->userName) }}
                </x-slot>
                @admin
                    <x-dropdown-item href="/admin/posts" :active="request()->is('admin/posts')">Dashboard</x-dropdown-item>
                    <x-dropdown-item href="/admin/posts/create" :active="request()->is('admin/posts/create')">Create Post</x-dropdown-item>
                @endadmin
                    <x-dropdown-item href="#" x-data="{}" @click.prevent="document.querySelector('#logout-form').submit()">Logout</x-dropdown-item>
                <form id="logout-form" action="/logout" method="POST" class="hidden">
                    @csrf
                </form>
            </x-dropdown>
        @else   
            <a href="{{ route('registerPage') }}" class="text-xs font-semibold uppercase {{request()->is('register') ? 'text-blue-400' : '' }}">Register Here</a> |
            <a href="{{ route('loginPage') }}" class="text-xs font-semibold uppercase {{ request()->is('login') ? 'text-blue-400' : '' }}">Login Here</a> 
        @endauth

        <a href="#subscribe" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
            Subscribe for Updates
        </a>
    </div>
</nav>