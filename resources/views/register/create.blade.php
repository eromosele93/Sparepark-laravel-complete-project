<x-layout>
<x-breadcrumbs :links="['Register' => '#']" class="mb-4 m-16" />
    <h1 class="my-16 text-center text-4xl font-medium text-slate-700">Register</h1>
    <x-card class="p-8 m-16">

    <form action="{{route('register.store')}}" method="POST">
    @csrf
    <div class="mb-8">
        <x-label :required="true" for="email">E-mail</x-label>
        <x-text-input  name="email" placeholder="Enter your email"/>
    </div>
    <div class="mb-8">
        <x-label :required="true" for="name">Full Name</x-label>
        <x-text-input  name="name" placeholder="Enter your full name"/>
    </div>
    <div class="mb-8">
        <x-label for="password" :required="true">Password</x-label>
        <x-text-input name="password" type="password" placeholder="Enter your password"/>
    </div>
    <div class="mb-8">
        <x-label for="confirm_password" :required="true">Confirm Password</x-label>
        <x-text-input name="confirm_password" type="password" placeholder="Enter your password"/>
    </div>
   
    <button class="w-full bg-green-500 rounded-md text-white"> Register </button>
    </form>
    </x-card>
</x-layout>