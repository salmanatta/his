<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $guarded = [];

    //invers relation of one to many
    public function branch()
    {
        return $this->belongsTo(Branch::class,'branch_id');
    }


    public function storeTransfers()
    {
        return $this->hasMany(StoreTransfer::class,'store_transfer_id','id');
        // return $this->hasMany(Comment::class, 'foreign_key', 'local_key');
    }
}
