<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Festivale extends Model
{
     // Table Name
     protected $table = 'Festivales';
     // Primary Key
     public $primaryKey = 'idFes';
     // Timestamps
     public $timestamps = true;

     public function sponseurs()
     {
         return $this->belongsToMany('App\models\Sponseur');
     }
     public function partmedias()
     {
         return $this->belongsToMany('App\models\PartMedia');
     }
     public function musics()
     {
         return $this->belongsToMany('App\models\Music');
     }
     public function poinventes()
     {
         return $this->belongsToMany('App\models\PointVente');
     }
     public function actualites()
     {
         return $this->hasMany('App\models\Actualite');
     }
     public function soires()
     {
         return $this->hasMany('App\models\Soire');
     }

}
