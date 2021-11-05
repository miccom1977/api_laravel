<?php

namespace App\Services;

use App\Models\Booking;
use App\Http\Requests\ReleaseRequest;
use App\Http\Requests\BookingUpdateRequest;

class BookingService {

    public function getAllFreeTerms()
    {
        return Booking::where('car_plate', NULL)->where('booking_date', '>', NOW() )->get();
    }

    public function signInFirstTerm( BookingUpdateRequest $request )
    {
        $booking = Booking::where('booking_date', '>', NOW())->whereNull('car_plate')->first();
        if( !$booking )
        {
            $response = [
                'message' => 'We no have free terms ;/'
            ];
            return response($response, 201);
        }

        $booking->car_plate = $request->car_plate;
        $booking->save();
        $response = [
            'booking' => $booking,
            'message' => 'Your term is reserved'
        ];
        return response($response, 201);

    }

    public function getAllReservedBookings()
    {
        return Booking::whereNotNull('car_plate')->get();
    }

    public function releaseTerm(ReleaseRequest $request )
    {
        $booking = Booking::where('car_plate', $request->car_plate)->first();
        if( !$booking )
        {
            $response = [
                'message' => 'We no have Yours car_plate in system ;/'
            ];
            return response($response, 201);
        }

        $booking->car_plate = NULL;
        $booking->save();
        $response = [
            'message' => 'Your term is released'
        ];
        return response($response, 201);
    }
}
