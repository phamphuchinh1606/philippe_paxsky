<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buildings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',255);
            $table->integer('type_id');
            $table->string('sub_name',255)->nullable(true);
            $table->integer('investor_id')->nullable(true);
            $table->integer('classify_id')->nullable(true);
            $table->integer('management_agency_id')->nullable(true);
            $table->integer('direction_id')->nullable(true);
            $table->string('structure',255)->nullable(true);
            $table->integer('basement_number')->nullable(true);
            $table->integer('ground_floor_number')->nullable(true);
            $table->integer('floor_number')->nullable(true);
            $table->integer('rooftop_floor')->nullable(true);
            $table->decimal('acreage_rent')->nullable(true);
            $table->decimal('management_fee')->nullable(true);
            $table->decimal('electricity_fee')->nullable(true);
            $table->integer('country_id')->nullable(true);
            $table->integer('province_id')->nullable(true);
            $table->integer('district_id')->nullable(true);
            $table->string('address',255)->nullable(true);
            $table->string('long',50)->nullable(true);
            $table->string('lat',50)->nullable(true);
            $table->double('acreage_total')->nullable(true);
            $table->decimal('rental_cost')->nullable(true);
            $table->decimal('manager_cost')->nullable(true);
            $table->decimal('tax_cost')->nullable(true);
            $table->decimal('over_time_fee')->nullable(true);
            $table->text('description')->nullable(true);
            $table->longText('content')->nullable(true);
            $table->string('main_image')->nullable(true);
            $table->integer('status')->nullable(true);
            $table->integer('is_public')->default(1);
            $table->integer('is_delete')->default(0);
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
        Schema::dropIfExists('buildings');
    }
}
