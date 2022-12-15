<?php

namespace App\Models;

use App\Models\employee\Employee;
use App\Models\purchases\Supplier;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeSupplier extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function suppliers()
    {
        $this->belongsTo(Supplier::class,'supplier_id','id');
    }

    public function employees()
    {
        $this->belongsTo(Employee::class,'employee_id','id');
    }
}
