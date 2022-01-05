<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Customer extends Model
{
    use HasFactory;


    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'password',
        'hubspot_id'
    ];
   public function properties()
   {    
      return $this->belongsToMany(Property::class,'customer_properties','customer_id','property_id')->withPivot('value');
   }
}
