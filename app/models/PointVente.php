<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class PointVente extends Model
{
// Table Name
protected $table = 'PointVentes';
// Primary Key
public $primaryKey = 'idPv';
// Timestamps
public $timestamps = true;

public function festivales()
{
    return $this->belongsToMany('App\models\Festivale');
}
}
