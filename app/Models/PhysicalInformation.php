<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; // Import the Model class

class PhysicalInformation extends Model
{
    protected $table = 'physical_information';

    protected $fillable = ['encounter_id', 'hbp', 'diabetes', 'pregnancy', 'food', 'drug_allergy', 'current_medication']; // Use protected instead of public
}
