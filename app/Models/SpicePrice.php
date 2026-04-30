<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpicePrice extends Model
{
    //
    protected $fillable = ['spice_format_id','price','weight','weight_unit'];
    protected $table = 'spice_price';

    public function spice_format(){
        return $this->belongsTo(SpiceFormat::class, 'spice_format_id');
    }

}
