<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    // Table Name
    protected $table = 'Musics';
    // Primary Key
    public $primaryKey = 'idMu';
    // Timestamps
    public $timestamps = true;
    
    public function festivales()
    {
        return $this->belongsToMany('App\models\Festivale');
    }
}
