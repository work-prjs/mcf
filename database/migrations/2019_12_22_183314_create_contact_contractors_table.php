<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactContractorsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_contractors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('adr')->nullable();
            $table->string('contacts')->nullable();
            $table->string('name')->nullable();
            $table->integer('user_id')->nullable();
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
        Schema::drop('contact_contractors');
    }
}
