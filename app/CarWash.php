<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarWash extends Model
{
    protected $guarded = [''];

    public function Priority()
    {
        return $this->belongsTo(Priority::class, 'priority_name_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
