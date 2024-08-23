<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio"></script>
        <script src="//unpkg.com/alpinejs" defer></script>
        <title>SparePark</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class=" max-w-full  text-slate-700 mt-4 p-4">
    @livewireScripts
<div class="w-full md:flex md:justify-between mb-8">
<div class="p-2 ">
<a  href="{{route('home')}}"><img class="rounded-lg mx-auto" width="150px" height="150px" src="{{asset('/images/logo.PNG')}}" alt="Logo"/></a>
</div>

<div>
@auth
<div class="flex p-2 gap-4 mt-2">

<a href="{{route('my-booking.index')}}" class="rounded-md border border-slate-300 px-2 py-1 
 bg-white text-center text-sm font-semibold text-black shadow-md
  hover:bg-slate-100 ">{{auth()->user()->name}}: My Bookings</a>
  <a href="{{route('my-space.index')}}" class="rounded-md border border-slate-300 px-2 py-1
 bg-white text-center text-sm font-semibold text-black shadow-md
  hover:bg-slate-100">My Spaces</a>
<div>
<form action="{{route('auth.destroy')}}" method="POST">
@csrf
@method('DELETE')
<button class="rounded-md border border-slate-300 px-2 py-1 h-8
 bg-white text-center text-sm font-semibold shadow-md
  hover:bg-slate-100 text-red-500">Logout</button>
    </form>
</div>
</div>

@else
<div class="flex p-2 gap-4 mt-2">
<a href="{{route('login')}}" class="rounded-md border border-slate-300 px-2 py-1 h-8
 bg-white text-center text-sm font-semibold text-black shadow-md
  hover:bg-slate-100">Login</a>
  <a href="{{route('register.create')}}" class="rounded-md border border-slate-300 px-2 py-1 h-8
 bg-white text-center text-sm font-semibold text-black shadow-md
  hover:bg-slate-100">Register</a>
</div>
@endauth
</div>
</div>

<div x-data = "{flash: true}">
@if(session('success'))
    <div x-show = "flash" 
    class="relative mb-10 rounded border border-green-400 bg-green-100 text-center text-lg text-green-400
    py-4" role="alert"><strong class="font-bold">Success!!! </strong>{{session('success')}}
    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke-width="1.5" @click="flash = false"
            stroke="currentColor" class="h-6 w-6 cursor-pointer">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </span>
</div>
    @endif
</div>

<div x-data = "{flash: true}">
@if(session('error'))
    <div x-show = "flash" 
    class="relative mb-10 rounded border border-red-400 bg-red-100 text-center text-lg text-red-400
    py-4" role="alert"><strong class="font-bold">Error!!! </strong>{{session('error')}}
    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke-width="1.5" @click="flash = false"
            stroke="currentColor" class="h-6 w-6 cursor-pointer">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </span>
</div>
    @endif
</div>

{{$slot}}
    <div class="mt-40 bg-slate-700 w-full h-40 flex justify-between border rounded-lg border-blue-700">
<div class="mt-4 ml-4"></div> 
<div class=" mt-16 text-sm font-medium text-green-700">Developed by Eromosele Okoudoh</div>
<div class="mt-16 mr-10">

<a href="http://linkedin.com/in/eromosele-okoudoh-54b694162" target="blank"><img class="rounded-lg" width="50px" height="40px" src="{{asset('/images/link.PNG')}}" alt="linkedin"/></a>
 
</div>
   
</div>
    </body>
</html>
