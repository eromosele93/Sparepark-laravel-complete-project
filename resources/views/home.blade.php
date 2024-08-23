<x-layout>
    
    <div class="mt-4 bg-slate-100 border rounded-md p-4" >
<h1 class="text-center font-bold text-4xl mb-2">Search, Book, Park...</h1> 
<p class="text-center font-semibold text-2xl">We are UK's biggest parking website.</p>

<form action="{{route('spaces.index')}}" method="GET">
    <div class="flex gap-1">
    <input required class="w-full p-2 border border-green-500 mt-8 rounded-md" type="search" name="search" placeholder="Search by postcode, city or address">
<button class="bg-green-500 mt-8 p-2 rounded-md text-white" type="submit">Search</button>
    </div>
    <div class="flex justify-center mt-4">
    <x-radio-group name="category" :options="\App\Models\Space::$category"/>
    </div>
    
    <div class=" mt-2">
        <div class="text-center font-medium text-gray-900">Electric Charging</div>
        <div class="flex justify-center">  <x-radio-group name="ev" :options="\App\Models\Space::$ev"/></div>
  
    </div>
    
</form>
    </div>
</x-layout>