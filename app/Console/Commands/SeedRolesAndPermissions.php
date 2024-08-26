<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SeedRolesAndPermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permission:seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed roles and permissions';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $admin = Role::findOrCreate('admin');

        $roleView   = Permission::findOrCreate('view_role');
        $roleCreate = Permission::findOrCreate('create_role');
        $roleUpdate = Permission::findOrCreate('update_role');
        $roleDelete = Permission::findOrCreate('delete_role');

        $aircraftView   = Permission::findOrCreate('view_aircraft');
        $aircraftCreate = Permission::findOrCreate('create_aircraft');
        $aircraftUpdate = Permission::findOrCreate('update_aircraft');
        $aircraftDelete = Permission::findOrCreate('delete_aircraft');

        $airlineView   = Permission::findOrCreate('view_airline');
        $airlineCreate = Permission::findOrCreate('create_airline');
        $airlineUpdate = Permission::findOrCreate('update_airline');
        $airlineDelete = Permission::findOrCreate('delete_airline');

        $flightView   = Permission::findOrCreate('view_flight');
        $flightCreate = Permission::findOrCreate('create_flight');
        $flightUpdate = Permission::findOrCreate('update_flight');
        $flightDelete = Permission::findOrCreate('delete_flight');

        $userView   = Permission::findOrCreate('view_user');
        $userCreate = Permission::findOrCreate('create_user');
        $userUpdate = Permission::findOrCreate('update_user');
        $userDelete = Permission::findOrCreate('delete_user');

        $admin->syncPermissions([
            $roleView,
            $roleCreate,
            $roleUpdate,
            $roleDelete,

            $aircraftView,
            $aircraftCreate,
            $aircraftUpdate,
            $aircraftDelete,

            $airlineView,
            $airlineCreate,
            $airlineUpdate,
            $airlineDelete,

            $flightView,
            $flightCreate,
            $flightUpdate,
            $flightDelete,

            $userView,
            $userCreate,
            $userUpdate,
            $userDelete,
        ]);
    }
}
