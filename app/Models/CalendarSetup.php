<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendarSetup extends Model
{
    use HasFactory;
    protected $table = 'calendar_setup';
    protected $fillable = ['name','min_days','max_days'];




}
