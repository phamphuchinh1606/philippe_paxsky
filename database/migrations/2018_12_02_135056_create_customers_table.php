<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable(true);
            $table->integer('group_id')->nullable(true);
            $table->string('first_name',150)->nullable(true);
            $table->string('last_name',150)->nullable(true);
            $table->string('email',150)->nullable(true);
            $table->string('mobile_phone',50)->nullable(true);
            $table->string('address',255)->nullable(true);
            $table->integer('country_id')->nullable(true);
            $table->integer('province_id')->nullable(true);
            $table->integer('district_id')->nullable(true);
            $table->string('gender',150)->nullable(true);
            $table->dateTime('birthday')->nullable(true);
            $table->string('nationality')->nullable(true);
            $table->integer('is_delete')->default(0)->nullable(true);
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
