<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentalContractCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rental_contract_customers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rental_contract_id')->nullable(true);
            $table->integer('customer_id')->nullable(true);
            $table->string('position')->nullable(true);
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
        Schema::dropIfExists('rental_contract_customers');
    }
}
