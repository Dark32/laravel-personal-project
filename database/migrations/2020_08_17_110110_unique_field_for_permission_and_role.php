<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UniqueFieldForPermissionAndRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->unique('slug', 'roles_slug_unique');
        });
        Schema::table('permissions', function (Blueprint $table) {
            $table->unique('slug', 'permissions_slug_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->dropUnique('roles_slug_unique');
        });
        Schema::table('permissions', function (Blueprint $table) {
            $table->dropUnique('permissions_slug_unique');
        });
    }
}
