<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function getAllCompanies(){
        $companies=Company::all();
        return response()->json($companies);
    }
}