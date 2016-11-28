<?php

namespace Keys;

use Illuminate\Database\Eloquent\Model;
use Schedule\Models\Schedule;

class Employee extends Model
{

    public function keys()
    {
        return $this->belongsToMany(Key::class())->withPivot('date_out', 'expected_return_date')->withTimestamps();
    }
}
