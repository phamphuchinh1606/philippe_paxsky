<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduleAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->nullable(true);
            $table->integer('building_id')->nullable(true);
            $table->integer('office_id')->nullable(true);
            $table->string('email',100)->nullable(true);
            $table->string('full_name',255)->nullable(true);
            $table->string('mobile_phone',50)->nullable(true);
            $table->dateTime('date_schedule')->nullable(true);
            $table->longText('note')->nullable(true);
            $table->integer('status')->nullable(true);
            $table->integer('is_read')->default(0)->nullable(true);
            $table->integer('flg_skip')->default(0)->nullable(true);
            $table->integer('rate')->nullable(true)->default(0);
            $table->longText('rate_comment')->nullable(true);
            $table->integer('sale_person_id')->nullable(true);
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
        Schema::dropIfExists('schedule_appointments');
    }
}
