<?php

namespace App\Models;

use App\Models\CalendarSetup;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CalendarImplement extends Model
{
    use HasFactory;
    protected $table = 'calendar_implement';

    public function CalendarSetup()
    {
        return $this->belongsTo(CalendarSetup::class,'calendar_id','id');
    }
}
