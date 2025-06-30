<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // bagian role (level)
        $roleAdmin = Role::updateOrCreate(['name' => 'admin'], ['name' => 'admin']);
        $roleWriter = Role::updateOrCreate(['name' => 'writer'], ['name' => 'writer']);
        $roleGuest = Role::updateOrCreate(['name' => 'guest'], ['name' => 'guest']);

        // bagian permission (fitur)
        $permission = Permission::updateOrCreate(['name' => 'view_dashboard'], ['name' => 'view_dashboard']);
        $permission2 = Permission::updateOrCreate(['name' => 'view_chart_on_dashboard'], ['name' => 'view_chart_on_dashboard']);

        // menambahkan role ke tiap permission
        $roleAdmin->givePermissionTo($permission);
        $roleAdmin->givePermissionTo($permission2);
        $roleWriter->givePermissionTo($permission2);

        $user = User::find(1);
        $user2 = User::find(2);

        $user->assignRole('admin');
        $user2->assignRole('writer');
    }
}
