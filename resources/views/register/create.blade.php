<x-layout>
  @include('components._header')
  <div class="flex min-h-full flex-col justify-center px-6 py-6 lg:px-8">
    <h2 class="mt-4 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Create your account</h2>  
    <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-sm">
      <x-panel>
        <form class="space-y-6" action="#" method="POST">
          @csrf
          <x-form.input name="fullName" />
          <x-form.input name="userName" />
          <x-form.input name="email" />
          <x-form.input name="password" />
          
          <x-form.button>Register your account</x-form.button>
          <p class="text-md text-bold text-center">Already Have an account ? <a href="/login" class="underline text-blue-400">Login Here.</a> </p>
        </form>
      </x-panel>
    </div>
  </div>
  

</x-layout>