<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentalContractDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rental_contract_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rental_contract_id')->nullable(true);
            $table->integer('building_id')->nullable(true);
            $table->integer('office_id')->nullable(true);
            $table->decimal('rent_cost')->nullable(true);
            $table->longText('note')->nullable(true);
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
        Schema::dropIfExists('rental_contract_details');
    }
}
