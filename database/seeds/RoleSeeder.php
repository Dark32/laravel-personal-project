<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manager = new Role();
        $manager->name = 'User';
        $manager->slug = 'user';
        $manager->description = 'Самый обычный юзер';
        $manager->undeletable = true;
        $manager->save();

        $manager = new Role();
        $manager->name = 'Admin';
        $manager->slug = 'admin';
        $manager->description = 'Администратор';
        $manager->undeletable = true;
        $manager->save();

        $manager = new Role();
        $manager->name = 'Moderator';
        $manager->slug = 'moderator';
        $manager->description = 'Модератор';
        $manager->undeletable = true;
        $manager->save();

        $manager = new Role();
        $manager->name = 'Banned';
        $manager->slug = 'banned';
        $manager->description = 'Забаненный';
        $manager->undeletable = true;
        $manager->save();
    }
}
