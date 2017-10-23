<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid');
            $table->string('name');
            $table->string('orgnbr')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('web')->nullable();
            $table->string('email')->nullable();
            $table->string('bankgiro')->nullable();
            $table->string('postgiro')->nullable();
            $table->text('info')->nullable();
            $table->integer('active')->nullable()->default(1);
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
        Schema::dropIfExists('clients');
    }
}
