<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SpiceCategory extends Model
{
    //
    protected $fillable= ['category'];
    protected $table= 'spice_category';

     protected static function boot()
    {
        parent::boot();

        static::creating(function ($spice_category) {
            $spice_category->slug = $spice_category->slug ?? Str::slug($spice_category->category);
        });
    }

    public function spices(){
        return $this->belongsToMany(Spice::class, 'spice_group');
    }
}
