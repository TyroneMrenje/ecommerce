<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpiceFormat extends Model
{
    //
    protected $fillable = ['format'];
     protected $table= 'spice_format';

     public function spices(){
        return $this->hasMany(Spice::class, 'spice_description');
     }

    public function spice_price(){
        return $this->hasMany(SpicePrice::class,'spice_format_id');
    }
}
