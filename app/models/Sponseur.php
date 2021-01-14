<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Sponseur extends Model
{
    //
    protected $table = 'Sponseurs';
    // Primary Key
    public $primaryKey = 'idSpon';
    // Timestamps
    public $timestamps = true;

    public function festivales()
    {
        return $this->belongsToMany('App\models\Festivale');
    }
}
