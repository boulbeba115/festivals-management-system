<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';
    // Primary Key
    public $primaryKey = 'idTic';
    // Timestamps
    public $timestamps = true;

    public function soires()
    {
        return $this->belongsToMany('App\models\Soire');
    }
}
