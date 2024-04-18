<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; // Import the Model class

class EncounterImage extends Model
{
    protected $table = 'encounter_image';

    protected $fillable = ['encounter_id', 'image_url']; // Use protected instead of public
}
