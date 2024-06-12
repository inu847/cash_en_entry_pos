<?php

namespace App\Models\Employee;

use App\Models\payroll;
use App\Models\Bussiness;
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
    
    public function pay()
    {
        return $this->belongsTo(payroll::class, 'payroll_id', 'id');
    }

    public function bussiness()
    {
        return $this->belongsTo(Bussiness::class, 'bussiness_id', 'id');
    }

}
