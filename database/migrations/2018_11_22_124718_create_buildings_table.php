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
            //Basic info
            $table->string('name',255);
            $table->integer('type_id')->nullable(true);
            $table->string('sub_name',255)->nullable(true);
            $table->integer('investor_id')->nullable(true);
            $table->integer('classify_id')->nullable(true);
            $table->integer('management_agency_id')->nullable(true);
            $table->string('structure',255)->nullable(true);
            $table->integer('basement_number')->nullable(true);
            $table->integer('mezzanine_number')->nullable(true);
            $table->integer('ground_floor_number')->nullable(true);
            $table->integer('floor_number')->nullable(true);
            $table->integer('rooftop_floor_number')->nullable(true);
            $table->decimal('acreage_total')->nullable(true);
            $table->decimal('acreage_rent_total')->nullable(true);
            $table->decimal('floor_area')->nullable(true);
            $table->string('length_width_floor',255)->nullable(true);
            //Location
            $table->integer('direction_id')->nullable(true);
            $table->integer('country_id')->nullable(true);
            $table->integer('province_id')->nullable(true);
            $table->integer('district_id')->nullable(true);
            $table->string('address',255)->nullable(true);
            $table->string('long',50)->nullable(true);
            $table->string('lat',50)->nullable(true);

            //Rental cost
            $table->decimal('rental_cost')->nullable(true);
            $table->decimal('manager_cost')->nullable(true);
            $table->decimal('electricity_cost')->nullable(true);
            $table->decimal('tax_cost')->nullable(true);
            $table->decimal('over_time_cost')->nullable(true);
            $table->decimal('parking_fee_bike')->nullable(true);
            $table->decimal('parking_fee_car')->nullable(true);
            $table->decimal('contract_duration')->nullable(true);
            $table->decimal('mode_of_deposit')->nullable(true);
            $table->decimal('mode_of_payment')->nullable(true);
            $table->decimal('number_of_vehicles')->nullable(true);

            $table->text('description')->nullable(true);
            $table->longText('content')->nullable(true);
            $table->longText('notes')->nullable(true);
            $table->string('main_image')->nullable(true);
            $table->string('main_image_thumbnail')->nullable(true);
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
