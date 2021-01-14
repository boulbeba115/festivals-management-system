<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Actualite extends Model
{
         // Table Name
         protected $table = 'Actualites';
         // Primary Key
         public $primaryKey = 'idAct';
         // Timestamps
         public $timestamps = true;
         public function festivale()
         {
             return $this->belongsTo('App\models\Festivale');
         }
}
