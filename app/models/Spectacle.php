<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Spectacle extends Model
{
        // Table Name
        protected $table = 'spectacles';
        // Primary Key
        public $primaryKey = 'idSpec';
        // Timestamps
        public $timestamps = true;
        public function artist()
        {
            return $this->belongsTo('App\models\Artist');
        }
        public function soire()
        {
            return $this->belongsTo('App\models\Soire');
        }
}
