<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FuelDelivery extends Model
{
    protected $guarded = [' '];


    // Fuel Type
    public function Fuel()
    {
        return $this->belongsTo(FuelType::class, 'fuel_name_id','id');
    }
    // Refuelling For
    public function RefuellingName()
    {
        return $this->belongsTo(RefuelingFor::class, 'refueling_for_id', 'id');
    }
    // User Name
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // Priority Set
    public function Priority()
    {
        return $this->belongsTo(Priority::class, 'priority_name_id', 'id');
    }
}
