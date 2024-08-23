<x-layout>
<x-breadcrumbs :links="['Login' => '#']" class="mb-4 m-16" />
    <h1 class="my-16 text-center text-4xl font-medium text-slate-700">Sign in to your account</h1>
    <x-card class="p-8 m-16">

    <form action="{{route('auth.store')}}" method="POST">
    @csrf
    <div class="mb-8">
        <x-label :required="true" for="email">E-mail</x-label>
        <x-text-input  name="email" placeholder="Enter your email"/>
    </div>
    <div class="mb-8">
        <x-label for="password" :required="true">Password</x-label>
        <x-text-input name="password" type="password" placeholder="Enter your password"/>
    </div>
    <div class="flex justify-between mb-8 text-sm font-medium">
<div>
    <div class="flex items-center space-x-2">
    <input class="rounded-sm border-slate-500" type="checkbox" name="remember">
<label for="remember">Remeber me</label>
    </div>
  
</div>
<div><a class="text-indigo-700 hover:underline" href="">Forgot password?</a></div>

    </div>
    <button class="w-full bg-green-500 rounded-md text-white"> Login </button>
    </form>
    </x-card>
</x-layout>