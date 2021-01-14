<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class FestivalePointVente extends Model
{
    // Table Name
    protected $table = 'festivale_point_vente';
    // Primary Key
    public $primaryKey = 'idFpv';
    // Timestamps
    public $timestamps = true;
}
