<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; // Import the Model class

class TemporaryEncounters extends Model
{
    protected $table = 'temporary_encounters';

    protected $fillable = ['temporary_id', 'patient_id', 'doctor_id']; // Use protected instead of public
}
