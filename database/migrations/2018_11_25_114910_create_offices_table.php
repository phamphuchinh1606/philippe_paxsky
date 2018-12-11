<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('office_name');
            $table->integer('building_id');
            $table->integer('office_layout_id')->nullable(true);
            $table->integer('floor')->nullable(true);
            $table->double('acreage_total')->nullable(true);
            $table->double('acreage_rent')->nullable(true);
            $table->string('structure',150)->nullable(true);
            $table->double('length_floor')->nullable(true);
            $table->double('width_floor')->nullable(true);
            $table->double('door_number')->nullable(true);
            $table->string('image_src')->nullable(true);
            $table->string('image_thumbnail_src')->nullable(true);
            $table->integer('direction_id')->nullable(true);
            $table->string('description')->nullable(true);
            $table->text('office_content')->nullable(true);
            $table->double('leasing_rate')->nullable(true);
            $table->integer('status_id')->nullable(true);
            $table->integer('is_public')->default(1);
            $table->integer('is_delete')->default(0);
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
        Schema::dropIfExists('offices');
    }
}
