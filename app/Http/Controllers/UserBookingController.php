<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Services\BookingService;
use App\Http\Requests\BookingRequest;
use App\Http\Requests\BookingUpdateRequest;

class UserBookingController extends Controller
{
    private $bookingService;

    public function __construct( BookingService $bookingService ){
        $this->bookingService = $bookingService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->bookingService->getAllFreeTerms();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\BookingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingUpdateRequest $request)
    {
        return Booking::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        return $booking;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\BookingRequest  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(BookingUpdateRequest  $request, Booking $booking)
    {
        return $booking->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        return $booking->delete();
    }
}
