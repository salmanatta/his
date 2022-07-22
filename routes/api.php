<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\RoleController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::GET('/get-all-companies', [CompanyController::class, "getAllCompanies"]);
Route::GET('/get-all-permissions', [PermissionController::class, "getAllPermissions"]);
Route::GET('/get-all-role-related-permissions', [PermissionController::class, "getAllRoleRelatedPermissions"]);
Route::GET('/get-all-roles', [RoleController::class, "getAllRoles"]);
Route::POST('/attach-detach-role', [PermissionController::class, "attachDetachPermission"]);
Route::POST('/attach-permission-to-user', [PermissionController::class, "attachPermissionToUser"]);
Route::POST('/attach-role-to-user', [RoleController::class, "attachRoleToUser"]);