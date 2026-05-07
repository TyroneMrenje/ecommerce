<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Spice extends Model
{
    //
    protected $fillable = ['name','description'];
    protected $table='spices';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($spice) {
            $spice->slug = $spice->slug ?? Str::slug($spice->name);
        });
    }

    public function spice_categories(){
        return $this->belongsToMany(SpiceCategory::class ,'spice_group');
    }

    public function spice_format(){
        return $this->hasMany(SpiceFormat::class,'spice_format_id');
    }

    public function spice_description(){
        return $this->hasMany(SpiceDescription::class, 'spices_id');
    }
}
