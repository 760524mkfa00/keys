<?php

namespace Keys\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    protected $table ='employees';

    protected $fillable = [
        'company_name',
        'first_name',
        'last_name',
        'active',
        'address',
        'city',
        'province',
        'postal_code',
        'email',
        'phone',
        'notes'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'active' => 'boolean',
    ];

    public function keys()
    {
        return $this->belongsToMany('Keys\Models\Key', 'employee_key', 'employee_id')->withPivot('date_out', 'expected_return_date')->withTimestamps();
    }
}
