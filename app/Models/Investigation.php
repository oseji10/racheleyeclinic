<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; // Import the Model class

class Investigation extends Model
{
    protected $table = 'investigations';

    protected $fillable = ['encounter_id', 'investigation_type']; // Use protected instead of public
}
