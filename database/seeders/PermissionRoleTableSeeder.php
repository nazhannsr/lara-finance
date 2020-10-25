<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company = Role::create(['name' => 'company']);
        $customer = Role::create(['name' => 'customer']);

        $companyManagementPermissions = ['company'];
        $customerManagementPermissions = ['customer'];

        $permissions = [
            $companyManagementPermissions,
            $customerManagementPermissions
        ];

        foreach ($permissions as $permissionGroup) {
            foreach($permissionGroup as $permission) {
                Permission::create(['name' => $permission]);
            }
        }

        $company->givePermissionTo(array_merge(
            $companyManagementPermissions,
        ));

        $customer->givePermissionTo(array_merge(
            $customerManagementPermissions,
        ));

    }
}
