<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;
    public $fillable = [
        
        'score',
        'time',
        'start_time',
        'end_time',
        'actual_time',
        'estimated_time',
        'created_at',
        'updated_at',
        'user_id',
        'live_time',
        'patient_id',
        'initial_assesment_score',
        'initial_assesment_time'
    ];
}
