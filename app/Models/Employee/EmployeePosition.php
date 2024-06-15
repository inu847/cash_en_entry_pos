<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeePosition extends Model
{
    use HasFactory;
    protected $table = 'employee_positions';
    protected $guarded =[];


    public function bussiness()
    {
        return $this->belongsTo(Bussiness::class, 'bussiness_id', 'id');
    }

}