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
        'notes',
        'expected_return_date'
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
        return $this->belongsToMany('Keys\Models\Key', 'employee_key')->withPivot('date_out')->withTimestamps();
    }

    public function getPaginated(array $params)
    {
        if($params['sortBy'])
        {
            return Employee::orderBy($params['sortBy'], $params['direction'])
                ->paginate(15);
        }

        return Employee::paginate(15);
    }

    public function setExpectedReturnDateAttribute($value)
    {

        $this->attributes['expected_return_date'] = strlen($value)? \Carbon::createFromFormat('Y-m-d', $value) : null;
    }

}
