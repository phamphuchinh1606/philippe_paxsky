<?php

use Illuminate\Support\Facades\Schema;
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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name',50)->nullable(true);
            $table->string('last_name',50)->nullable(true);
            $table->string('email',50);
            $table->string('password');
            $table->string('mobile_phone',45)->nullable(true);
            $table->integer('user_type_id');
            $table->text('note')->nullable(true);
            $table->string('profile_image')->nullable(true);
            $table->integer('is_active')->default(1);
            $table->integer('is_delete')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->dateTime('deleted_at')->nullable(true);
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
        Schema::dropIfExists('users');
    }
}
