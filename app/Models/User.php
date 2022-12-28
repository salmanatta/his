<?php

namespace App\Models;

use App\Models\employee\Employee;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;
use App\Models\branch\Branch;
class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    //     'type',
    //     'dob',
    //     'avatar',
    // ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function purchases()
    {
        return $this->hasMany(Purchase::class,'user_id','id');
    }
    public function branch()
      {
          return $this->belongsTo(Branch::class,'branch_id','id');
      }

      public function employee()
      {
          return $this->belongsTo(Employee::class,'employee_id','id');
      }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
