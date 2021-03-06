<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficeLayoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('office_layouts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('layout_name',255)->nullable(true);
            $table->integer('building_id')->nullable(true);
            $table->string('structure',150)->nullable(true);
            $table->double('acreage_total')->nullable(true);
            $table->double('acreage_rent')->nullable(true);
            $table->double('length_floor')->nullable(true);
            $table->double('width_floor')->nullable(true);
            $table->double('door_number')->nullable(true);
            $table->string('image_src')->nullable(true);
            $table->integer('direction_id')->nullable(true);
            $table->integer('is_delete')->default(0);
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
        Schema::dropIfExists('office_layouts');
    }
}
