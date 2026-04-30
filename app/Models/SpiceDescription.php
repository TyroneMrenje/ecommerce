<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpiceDescription extends Model
{
    //
    protected $fillable = ['image','spice_format_id','spices_id'];
    protected $table= 'spice_description';

    public function spice(){
       return $this->belongsTo(Spice::class, 'spices_id');
    }
}
