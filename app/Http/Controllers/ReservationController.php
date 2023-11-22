<?php

namespace App\Http\Controllers;

use App\Models\reservation;
use Illuminate\Http\Request;
use App\Jobs\SendReservationConfirmationEmail;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index', ['reservations' => reservation::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $reservation = new reservation();
        $reservation->name = $request->name;
        $reservation->email = $request->email;
        $reservation->phone_number = $request->phone_number;
        $reservation->date = $request->date;
        $reservation->time = $request->time;
        $reservation->guests = $request->guests;
        $reservation->message = $request->message;
        $reservation->save();
        SendReservationConfirmationEmail::dispatch($reservation);
        return redirect()->route('form.index')->with('success', 'Reservation has been made successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(reservation $form)
    {
        $reservation = $form;
        return view('form', ['reservation' => $form]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, reservation $form)
    {
        $reservation = $form;
        $reservation->name = $request->name;
        $reservation->email = $request->email;
        $reservation->phone_number = $request->phone_number;
        $reservation->date = $request->date;
        $reservation->time = $request->time;
        $reservation->guests = $request->guests;
        $reservation->message = $request->message;
        $reservation->save();
        return redirect()->route('form.index')->with('success', 'Reservation has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(reservation $form)
    {
        $reservation = $form;
        $reservation->delete();
        return redirect()->route('form.index')->with('success','Itemdata has been deleted successfully!');
    }
    // public function destroy(laboratory  $form)
    // {
    //     //
    //     $laboratory = $form;
    //     $laboratory->delete();
    //     return redirect()->route('form.index')->with('success','Itemdata has been deleted successfully!');
    // }
}
