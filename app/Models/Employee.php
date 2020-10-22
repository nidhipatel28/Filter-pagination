<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employee';

    protected $fillable = [
        'name', 'designation_id'
    ];

    public function Salary()
    {
        return $this->hasOne('App\Models\Salary','employee_id');
    }

    public function Designation()
    {
        return $this->belongsTo('App\Models\Designation','designation_id');
    }
}
