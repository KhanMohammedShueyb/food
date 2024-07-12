<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model{
    use HasFactory;

    protected $fillable = [
        'Image',
        'Name',
        'Description',
    ];
    
    public function Subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }
}




