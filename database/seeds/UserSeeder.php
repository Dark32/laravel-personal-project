<?php

use App\Permission;
use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::whereSlug('admin')->first();
        $moderator = Role::whereSlug( 'moderator')->first();
        $adminPanel = Permission::whereSlug('admin.panel')->first();
        $adminUserList = Permission::whereSlug('admin.user.list')->first();
        $adminUserEdit = Permission::whereSlug('admin.user.edit')->first();
        $adminRoleList = Permission::whereSlug('admin.role.list')->first();
        $adminRoleEdit = Permission::whereSlug('admin.role.edit')->first();
        $adminRoleCreate = Permission::whereSlug('admin.role.create')->first();
        $adminRoleDelete = Permission::whereSlug('admin.role.delete')->first();
        $adminPermList = Permission::whereSlug('admin.permission.list')->first();
        $adminPermEdit = Permission::whereSlug('admin.permission.edit')->first();
        $adminActivityList = Permission::whereSlug('admin.activity.listt')->first();
        if (!$admin){
            return;
        }
        $admin->permissions()->attach($adminPanel);
        $admin->permissions()->attach($adminUserList);
        $admin->permissions()->attach($adminUserEdit);
        $admin->permissions()->attach($adminRoleList);
        $admin->permissions()->attach($adminRoleEdit);
        $admin->permissions()->attach($adminPermList);
        $admin->permissions()->attach($adminPermEdit);
        $admin->permissions()->attach($adminRoleCreate);
        $admin->permissions()->attach($adminRoleDelete);
        $admin->permissions()->attach($adminActivityList);
        $admin->save();
        if (!$moderator){
            return;
        }
        $moderator->permissions()->attach($adminPanel);
        $moderator->permissions()->attach($adminUserList);
        $moderator->permissions()->attach($adminRoleList);
        $moderator->permissions()->attach($adminPermList);
        $moderator->permissions()->attach($adminActivityList);
        $moderator->save();
        $userAdmin = User::whereName('dark33')->first();
        if (!$userAdmin){
            return;
        }
        $userAdmin->roles()->attach($admin);
        $userAdmin->save();
    }
}
