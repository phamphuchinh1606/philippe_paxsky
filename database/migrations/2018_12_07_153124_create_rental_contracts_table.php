<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentalContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rental_contracts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->nullable(true);
            $table->string('contract_code',50)->nullable(true);
            $table->dateTime('contract_date')->nullable(true);
            $table->string('company_name',255)->nullable(true);
            $table->string('tax_code',50)->nullable(true);
            $table->string('fax')->nullable(true);
            $table->string('bank_account_number',150)->nullable(true);
            $table->string('bank_account_name',255)->nullable(true);

            $table->decimal('amount')->nullable(true);
            $table->decimal('tax_amount')->nullable(true);
            $table->decimal('discount_amount')->nullable(true);
            $table->decimal('total_amount')->nullable(true);

            $table->decimal('rental_period')->nullable(true);
            $table->dateTime('start_date')->nullable(true);
            $table->dateTime('end_date')->nullable(true);
            $table->integer('building_id')->nullable(true);
            $table->decimal('total_rent_acreage')->nullable(true);


            $table->integer('status')->nullable(true);
            $table->integer('charge_user_id')->nullable(true);
            $table->longText('note')->nullable(true);
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
        Schema::dropIfExists('rental_contracts');
    }
}
