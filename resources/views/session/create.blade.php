<x-layout>
    @include('components._header')
    <div class="flex min-h-full flex-col justify-center px-6 py-6 lg:px-8">

      <x-panel>
        <section>
        <h2 class="mt-5 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Login to your account</h2>
    
        <div class="mt-5 sm:mx-auto sm:w-full sm:max-w-sm">
          <form class="space-y-6" action="/session" method="POST">
            @csrf
            <x-form.input name="email"/>
            <x-form.input name="password" />
      
            <x-form.button>Log In</x-form.button>
            <span class="block text-center text-md text-bold">Don't have an account? <a href="/register" class="underline text-blue-400">Register Here.</a> </span>
          </form>
      
        </div>
        </section>
      </x-panel>

    </div>
    
  
  </x-layout>