<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('admin')->default(0);
            $table->integer('department_id');
            $table->string('name')->unique();
            $table->string('carrier');
            $table->string('rank');
            $table->string('phone', 15)->unique();
            $table->boolean('rip_runs')->default(0);
            $table->boolean('notifications')->default(0);
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('members');
    }
}
