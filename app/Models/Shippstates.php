<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shippstates extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function division(){
        return $this->belongsTo(Shippingdivision::class,'division_id','id');
    }

    public function district(){
        return $this->belongsTo(Shippingdistrict::class,'district_id','id');
    }
}
