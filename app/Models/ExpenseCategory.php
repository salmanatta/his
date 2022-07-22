<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseCategory extends Model
{
    use HasFactory;
     protected $guarded = [];


    //   public function expense()
    // {
    //     return $this->belongsTo(Expense::class,'category_id','id');
    // }
}
