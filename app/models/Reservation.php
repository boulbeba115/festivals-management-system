<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
             // Table Name
             protected $table = 'reservations';
             // Primary Key
             public $primaryKey = 'idRes';
             // Timestamps
             public $timestamps = true;
             public function user()
             {
                 return $this->belongsTo('App\User');
             }
             public function soire()
             {
                 return $this->belongsTo('App\models\Soire');
             }
}
