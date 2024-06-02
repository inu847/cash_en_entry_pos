<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bussiness;
use App\Models\Employee\Employee;

class EmployeeWorkingHour extends Model
{
    use HasFactory;
    protected $table = 'employee_working_hours';
    protected $guarded =[];


    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

    public function bussiness()
    {
        return $this->belongsTo(Bussiness::class, 'bussiness_id', 'id');
    }

}
