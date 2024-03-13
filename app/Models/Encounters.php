<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encounters extends Model
{
    use HasFactory; 
    protected $table = 'encounters';
    public $fillable = ['id', 'patient_id', 'doctor_id', 'visual_acuity_far_presenting_left', 'visual_acuity_far_presenting_right', 'visual_acuity_far_pinhole_left', 'visual_acuity_far_pinhole_right', 'visual_acuity_far_best_corrected_left', 'visual_acuity_far_best_corrected_right', 'visual_acuity_near_left', 'visual_acuity_near_right', 'intraoccular_pressure', 'chief_complaint', 'detailed_history', 'findings', 'eyelid', 'conjunctiva', 'cornea', 'AC', 'iris', 'pupil', 'lens', 'vitreous', 'retina', 'free_handwriting_left', 'free_handwriting_right'];
}
