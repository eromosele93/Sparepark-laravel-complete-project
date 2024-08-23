<?php

namespace App\Http\Controllers;

use App\Mail\Booking;
use App\Mail\Booking2;
use App\Models\Space;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Space $space)
    {
        return view('booking.create', ['space' => $space]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Space $space)
    {
        $validatedData = $request->validate([
            'duration' => 'required|max:50',
            'date_time' => 'required|after_or_equal:now',
           
       ]);
       $space->bookings()->create([
            'user_id' => $request->user()->id,
            'duration' => $validatedData['duration'],
            'date_time' => $validatedData['date_time'],
       ]);

    //Send booking confirmation to user Uncomment to recieve mail notification - go to env file and input your gmail address and app password.
    //    $toEmail = $request->user()->email;
    //    $name_user = $request->user()->name;
    //    $duration = $validatedData['duration'];
    //    $date_time = $validatedData['date_time'];
    //    $owner_email = $space->spaceOwner->user->email;
    //    $owner_phone = $space->spaceOwner->phone;
    //    $subject = "Booking confrimation";
    //    $address = $space->address;
    //    $postcode = $space->postcode;
    //    Mail::to($toEmail)->send(new Booking($duration, $date_time, $owner_email, $owner_phone, $address, $postcode, $subject, $name_user));


    //Send Booking confirmation to space owner
    //    $toEmailUser = $space->spaceOwner->user->email;
    //    $name_owner = $space->spaceOwner->user->name;
    //    $hours = $validatedData['duration'];
    //    $on = $validatedData['date_time'];
    //    $cus_email = $request->user()->email;
    //    $subject2 = "Booking Confirmation";
    //    $address2 = $space->address;
    //    $postcode2 = $space->postcode;

    //    Mail::to($toEmailUser)->send(new Booking2($name_owner, $hours, $on, $cus_email, $subject2, $address2, $postcode2));

       return redirect()->route('my-booking.index')->with('success', 'Booking completed successsfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
