<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisualAcuity extends Model
{
    use HasFactory;
    protected $table = 'visual_acuity';
    public $fillable = ['id', 'acuity_value', ''];
}
