<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientAdressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_adresses', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid');
            $table->integer('adresstype_id');
            $table->integer('client_id');
            $table->uuid('client_uuid');
            $table->string('line_1');
            $table->string('line_2')->nullable();
            $table->string('code')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
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
        Schema::dropIfExists('client_adresses');
    }
}
