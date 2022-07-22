<?php

namespace App\Http\Controllers\Pharmacy;

use App\Http\Controllers\Controller;
use App\Models\Log;

class LogController extends Controller
{
    public function render()
    {
        

        return view("pages/logs/index");
    }
    public function getAllLogs()
    {
        $user_id=request()->get("user_id") ?? '';
        $newly_created_logs =Log::when($user_id, function($query) use($user_id) {
                $query->where("user_id",$user_id);
            })->get();
        return view("pages/logs/_ajax_comp", compact("newly_created_logs"));
    }
    public static function store($data)
    {
        Log::create($data);
    }

}