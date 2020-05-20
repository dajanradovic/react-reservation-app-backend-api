<?php

namespace App;

use App\Notifications\ReservationAdded;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Reservation extends Model{

        use Notifiable;

    protected $fillable = ['startDate', 'endDate', 'apartment', 'numberOfNights', 'price', 'reservationType', 'user_id'];

  


  
}
