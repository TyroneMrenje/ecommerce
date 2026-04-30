<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpiceCategory extends Model
{
    //
    protected $fillable= ['category'];
    protected $table= 'spice_category';
    
    public function spices(){
        return $this->belongsToMany(Spice::class, 'spice_group');
    }
}
