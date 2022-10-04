<?php

namespace App\Models;

use App\Models\CalendarSetup;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CalendarImplement extends Model
{
    use HasFactory;
    protected $table = 'calendar_implement';
    protected $fillable =['calendar_id','branch_id','form_name'];

    public function CalendarSetup()
    {
        return $this->belongsTo(CalendarSetup::class,'calendar_id','id');
    }
}
