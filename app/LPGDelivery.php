<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LPGDelivery extends Model
{
    protected $guarded = [' '];

    // Relation
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function Cylinder()
    {
        return $this->belongsTo(LPGCylinder::class, 'cylinder_name_id', 'id');
    }

    public function Priority()
    {
        return $this->belongsTo(Priority::class, 'priority_name_id', 'id');
    }
}
