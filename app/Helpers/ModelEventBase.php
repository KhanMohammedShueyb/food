<?php

namespace App\Helpers;
use App\Events\ModelChanged;
use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;
class ModelEventBase extends Model
{
    protected $appends = ['model_name'];
   
    public function getModelNameAttribute()
    {
        $modelName = get_class($this);
        $modelName = preg_replace("/(App\\\\)/i", '', $modelName);
        $modelName = preg_replace("/(Models\\\\)/i", '', $modelName);
        return $modelName;

    }

    public static function boot()
    {
        parent::boot();

        static::created(function ($item) {
            event(new ModelChanged($item, 'created'));
        });

        static::updated(function ($item) {
            event(new ModelChanged($item, 'updated'));
        });
        
        self::deleting(function ($item) {
           event(new ModelChanged($item, 'deleted'));
        });
         
    }
}
