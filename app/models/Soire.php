<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Soire extends Model
{
    // Table Name
    protected $table = 'soires';
    // Primary Key
    public $primaryKey = 'idSoi';
    // Timestamps
    public $timestamps = true;
    public function festivale()
    {
        return $this->belongsTo('App\models\Festivale');
    }
    public function scene()
    {
        return $this->belongsTo('App\models\Scene');
    }
    public function spectacles()
    {
        return $this->hasMany('App\models\Spectacle');
    }
    public function tickets()
    {
        return $this->belongsToMany('App\models\Ticket')
        ->withPivot('prixTic', 'nbTicDes')
    	->withTimestamps();
        ;
    }
    public function reservations()
    {
        return $this->hasMany('App\models\Reservation');
    }
}
