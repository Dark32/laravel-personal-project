<?php

use App\Permission;
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
        $manageUser = new Permission();
        $manageUser->name = 'Админка';
        $manageUser->slug = 'admin.panel';
        $manageUser->description = 'Доступ в админку';
        $manageUser->save();

        $manageUser = new Permission();
        $manageUser->name = 'Список пользователей';
        $manageUser->slug = 'admin.user.list';
        $manageUser->description = '';
        $manageUser->save();

        $manageUser = new Permission();
        $manageUser->name = 'Править польозвателей';
        $manageUser->slug = 'admin.user.edit';
        $manageUser->description = '';
        $manageUser->save();

        $manageUser = new Permission();
        $manageUser->name = 'Список ролей';
        $manageUser->slug = 'admin.role.list';
        $manageUser->description = '';
        $manageUser->save();

        $manageUser = new Permission();
        $manageUser->name = 'Править роли';
        $manageUser->slug = 'admin.role.edit';
        $manageUser->description = '';
        $manageUser->save();

        $manageUser = new Permission();
        $manageUser->name = 'Список прав';
        $manageUser->slug = 'admin.permission.list';
        $manageUser->description = '';
        $manageUser->save();

        $manageUser = new Permission();
        $manageUser->name = 'Править права';
        $manageUser->slug = 'admin.permission.edit';
        $manageUser->description = '';
        $manageUser->save();

        Permission::insert([
                ['slug' => 'admin.role.create', 'name' => 'Создать роль'],
                ['slug' => 'admin.role.delete', 'name' => 'Удалить роль'],
                ['slug' => 'admin.activity.list', 'name' => 'Список активности'],
                ['slug' => 'admin.social-badge.list', 'name' => 'Список социальных сетей'],
                ['slug' => 'admin.social-badge.edit', 'name' => 'Править список социальных сетей'],
            ]
        );
    }
}
