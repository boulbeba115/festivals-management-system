<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class SoireTicket extends Model
{
        // Table Name
        protected $table = 'soire_ticket';
        // Primary Key
        public $primaryKey = 'idSt';
        // Timestamps
        public $timestamps = true;
}
