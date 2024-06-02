<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bussiness;

class EmployeeStatus extends Model
{
    use HasFactory;
    protected $table = 'employee_statuses';
    protected $guarded =[];


    public function bussiness()
    {
        return $this->belongsTo(Bussiness::class, 'bussiness_id', 'id');
    }

}
