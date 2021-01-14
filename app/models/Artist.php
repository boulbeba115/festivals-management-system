<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    // Table Name
    protected $table = 'Artists';
    // Primary Key
    public $primaryKey = 'idArt';
    // Timestamps
    public $timestamps = true;
    public function spectacles()
    {
        return $this->hasMany('App\models\Spectacle');
    }
}
