<?php

namespace App\models;
use Illuminate\Database\Eloquent\Model;

class FestivaleSponseur extends Model
{
        // Table Name
        protected $table = 'festivale_sponseur';
        // Primary Key
        public $primaryKey = 'idSa';
        // Timestamps
        public $timestamps = true;
}
