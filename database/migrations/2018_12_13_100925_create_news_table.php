<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',255)->nullable(true);
            $table->string('url',255)->nullable(true);
            $table->string('image',255)->nullable(true);
            $table->integer('status_id')->nullable(true)->default(0);
            $table->dateTime('public_date')->nullable(true);
            $table->longText('content')->nullable(true);
            $table->integer('user_created_id')->nullable(true);
            $table->integer('is_delete')->default(0)->nullable(true);
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
        Schema::dropIfExists('news');
    }
}
