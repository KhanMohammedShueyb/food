<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\ModelEventBase;

class Questionare extends ModelEventBase
{
    use HasFactory;

    protected $table = "questionaires";
    public $fillable = [
        'question',
        'options',
        'is_show',
        'created_at',
        'updated_at',
        'category_id'
    ];
        
}
