<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductCommentsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Schema::drop('product_comments');
        Schema::create('product_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('text')->nullable();
            $table->boolean('allowed')->default(false);
            $table->string('product_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('session')->nullable();
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
        Schema::drop('product_comments');
    }
}
