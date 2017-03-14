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
        return $this->belongsToMany('Keys\Models\Employee', 'employee_key')->withPivot('date_out')->withTimestamps();
    }

    public function listKeys()
    {

        $data = Key::orderBy('code', 'asc')->get();
        return array_prepend(array_pluck($data, 'code', 'id'), 'Please Select Key', 0);

    }
}
