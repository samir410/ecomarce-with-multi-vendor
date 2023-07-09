<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shippingdistrict extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function division(){
        return $this->belongsTo(Shippingdivision::class,'division_id','id');
    }
}
