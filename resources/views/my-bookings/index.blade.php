<x-layout>
<x-breadcrumbs :links="['My bookings' => '#']" class="mb-4 mx-auto mt-4 max-w-2xl" />
    @forelse ($bookings as $booking )
        <x-card class="mb-4 mx-auto mt-4 max-w-2xl">
        <div class="flex gap-2 text-sm font-medium text-slate-500 mb-2">
<div>Booked on {{$booking->created_at}} - </div>
<div>For {{$booking->duration}} {{Str::plural('Hour', $booking->duration)}} - </div>
<div>Space Owner phone {{$booking->space->spaceOwner->phone}}</div>
</div>
<div class="flex gap-2 text-sm font-medium text-slate-500 mb-4">
<div>Booking Date: {{$booking->date_time}}  </div>
@if ($booking->date_time > now() && !$booking->deleted_at)
<div>Not Completed</div>
@elseif ($booking->deleted_at)
<div>Cancelled</div>
  @else  
  <div>Completed</div>
@endif
<div>Space owner email: {{$booking->space->spaceOwner->user->email}}</div>
</div>

@if ($booking->date_time > now() && !$booking->deleted_at)

 <form action="{{route('my-booking.destroy', $booking)}} " method="POST">
        @csrf
        @method('DELETE')
        <button class="w-full rounded-md border border-slate-300 px-2 py-1 
 bg-green-500 text-center text-sm font-semibold text-white shadow-md
  hover:bg-slate-100 hover:text-black">Cancel</button>
        </form>

        @elseif ($booking->deleted_at)
        <div class="text-center font-medium text-red-500 ">Cancelled </div>
 @else  
 @if (!$booking->review)
 <button class="w-full rounded-md border border-slate-300 px-2 py-1 
 bg-green-500 text-center text-sm font-semibold text-white shadow-md
  hover:bg-slate-100 hover:text-slate-900">
 <a href="{{route('my-booking.show', $booking)}}" >Rate</a> 
 </button>
 @else
<div class="text-center font-medium text-green-500 ">Already rated</div>
 @endif
 
@endif

        </x-card>
    @empty
    <div class="text-center font-medium text-slate-500 mt-16 mb-80">You have not made any bookings yet

<div class="mt-4">
<a href="{{route('spaces.index')}}" class="rounded-md border border-slate-300 px-2 py-1 
bg-white text-center text-sm font-semibold text-black shadow-md
hover:bg-slate-100 ">Search for space</a>
</div>
</div>
    @endforelse
</x-layout>