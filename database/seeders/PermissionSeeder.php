<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Permission;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissons = [
            [
                'name' => 'SaleInvoiceController@invoiceReturn',
                'display_name' => 'Sale Invoice Return',
                'description' => 'Sale Invoice Return'
            ],
            [
                'name' => 'SaleInvoiceController@testRole',
                'display_name' => 'Test Role',
                'description' => 'Test Role'
            ],
        ];

        foreach ($permissons as $key => $value) {

            $permission = Permission::create([
                            'name' => $value['name'],
                            'display_name' => $value['display_name'],
                            'description' => $value['description']
                        ]);

            User::first()->attachPermission($permission);
        }
    }
}
