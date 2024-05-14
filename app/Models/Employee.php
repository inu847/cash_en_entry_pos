<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $guarded =[];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function bussiness()
    {
        return $this->belongsTo(Bussiness::class, 'bussiness_id', 'id');
    }

    public function employee_position()
    {
        return $this->belongsTo(EmployeePosition::class, 'employee_position_id', 'id');
    }

    public function employee_status()
    {
        return $this->belongsTo(EmployeeStatus::class, 'employee_status_id', 'id');
    }

}

