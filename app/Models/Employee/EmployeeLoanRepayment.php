<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeLoanRepayment extends Model
{
    use HasFactory;
    protected $table = 'employee_loan_repayments';
    protected $guarded =[];


    public function loan()
    {
        return $this->belongsTo(EmployeeLoan::class, 'employee_loan_id', 'id');
    }
    
    public function payroll()
    {
        return $this->belongsTo(Payroll::class, 'payroll_id', 'id');
    }

    public function bussiness()
    {
        return $this->belongsTo(Bussiness::class, 'bussiness_id', 'id');
    }

}
