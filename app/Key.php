<?php

namespace Keys;

use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    public function employees()
    {
        return $this->belongsToMany(Employee::class());
    }
}
