<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Spice extends Model
{
    //

    protected $fillable = ['name'];
    protected $table='spices';

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
