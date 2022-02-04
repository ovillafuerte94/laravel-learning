<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Reset cached roles and permissions
         */
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        /**
         * Seed the default permissions
         */
        $permissions = Permission::defaultPermissions();

        foreach ($permissions as $perms) {
            Permission::firstOrCreate(['name' => $perms]);
        }

        $this->command->info('Default Permissions added.');

        /**
         * Create admin role, gets all permissions via Gate::before rule; see AuthServiceProvider
         */
        Role::firstOrCreate(['name' => 'admin']);

        $this->command->info('Role admin added successfully');

        /**
         * Create member role
         */
        Role::firstOrCreate(['name' => 'member']);

        $this->command->info('Role member added successfully');

        $this->command->warn('All done :)');
    }
}
