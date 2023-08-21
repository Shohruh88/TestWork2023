<?php
namespace Database\Seeders\Auth;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

/**
 * Class PermissionRoleTableSeeder.
 */
class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        // Create Roles
        $super_admin = Role::create(['name' => 'super admin']);
        $employee = Role::create(['name' => 'employee']);
        $manager = Role::create(['name' => 'manager']);
        $direktor = Role::create(['name' => 'direktor']);

        // Create Permissions
        Permission::firstOrCreate(['name' => 'view_backend']);
        Permission::firstOrCreate(['name' => 'edit_settings']);
        Permission::firstOrCreate(['name' => 'view_logs']);

        $permissions = Permission::defaultPermissions();

        foreach ($permissions as $perms) {
            Permission::firstOrCreate(['name' => $perms]);
        }

        \Artisan::call('auth:permission', [
            'name' => 'employee',
        ]);
        echo "\n _Hodimlar_ Permissions Created.";

        \Artisan::call('auth:permission', [
            'name' => 'manager',
        ]);
        echo "\n _Managers_ Permissions Created.";

        echo "\n\n";

        // Assign Permissions to Roles
        $super_admin->givePermissionTo(Permission::all());
        $manager->givePermissionTo([
            'view_backend',
            'view_employees',
            'add_employees',
            'edit_employees',
            'delete_employees',
            'restore_employees',
        ]);
        $direktor->givePermissionTo(['view_backend', 'view_employees']);

        Schema::enableForeignKeyConstraints();
    }
}
