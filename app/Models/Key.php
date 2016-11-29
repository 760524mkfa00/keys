<?php

namespace Keys\Models;

use Illuminate\Database\Eloquent\Model;

class Key extends Model
{

    protected $table = 'keys';

    protected $fillable = [
        'code',
        'type',
        'description',
        'active',
    ];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'active' => 'boolean',
    ];


    public function employees()
    {
        return $this->belongsToMany(Employee::class());
    }
}
