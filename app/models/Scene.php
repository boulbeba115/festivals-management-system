<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Scene extends Model
{
        // Table Name
        protected $table = 'Scenes';
        // Primary Key
        public $primaryKey = 'idScene';
        // Timestamps
        public $timestamps = true;
        public function soires()
        {
            return $this->hasMany('App\models\Soire');
        }
        

}
