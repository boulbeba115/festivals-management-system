<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class PartMedia extends Model
{
    // Table Name
    protected $table = 'Partmedias';
    // Primary Key
    public $primaryKey = 'idPm';
    // Timestamps
    public $timestamps = true;
    
    public function festivales()
    {
        return $this->belongsToMany('App\models\Festivale');
    }
}
