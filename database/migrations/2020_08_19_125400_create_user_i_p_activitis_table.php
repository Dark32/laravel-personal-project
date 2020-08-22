<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserIPActivitisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_ip_activities', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('event')->nullable();
            $table->string('extra')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->ipAddress('ip');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_ip_activities');
    }
}
