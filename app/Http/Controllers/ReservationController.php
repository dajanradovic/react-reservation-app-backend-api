<?php

namespace App\Http\Controllers;

use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Notifications\ReservationAdded;
use App\Http\Requests\CheckReservationData;
use Illuminate\Support\Facades\Notification;
use App\Http\Resources\ReservationCollection;

class ReservationController extends Controller
{

    public function index (){



        return new ReservationCollection(Auth()->user()->reservations);
    }

    public function show (Reservation $reservation){
        

        return new ReservationCollection(Reservation::find($reservation));
    }

    public function destroy(Reservation $reservation){

                    $reservation->delete();

                    return response(['success' => "reservation deleted"]);
    }

    public function deleteAllReservations(){
            
        $reservations=Reservation::where('user_id', Auth()->user()->id)->delete();
      //  $reservations->delete();

        return response(['success' => "all reservations deleted"]);
    }


    public function store(CheckReservationData $request){
        
                $request->validate([

                    'startDate' => 'required',
                    'endDate' => 'required',
                    'apartment' => 'required',
                    'reservationType' => 'required',
                    'price' => 'required',
                    'numberOfNights' => 'required'



                ]);

               $reservation = Reservation::create($request->all());
               $reservation->user_id = Auth()->user()->id;
               
               $reservation->save();

              

            

               return response(['success' => "great"]);

        

                
    }
}
