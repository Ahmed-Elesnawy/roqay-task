<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        foreach ( getNamesFromDir('Models') as $modelName )
        {
            Permission::create(['name' => 'create-'.$modelName , 'guard_name' => 'admin' ]);
            Permission::create(['name' => 'update-'.$modelName , 'guard_name' => 'admin' ]);
            Permission::create(['name' => 'delete-'.$modelName , 'guard_name' => 'admin' ]);
            Permission::create(['name' => 'read-'  .$modelName , 'guard_name' => 'admin' ]);

        }

        $role = Role::create(['name' => 'super-admin' , 'guard_name' => 'admin'])
               ->givePermissionTo(Permission::all());
    }
}
