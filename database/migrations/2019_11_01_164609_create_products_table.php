<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::drop('products');
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ident')->nullable();
            $table->string('name')->nullable();
            $table->longText('desc')->nullable();
            $table->string('image')->nullable();
            $table->string('xml_name')->nullable();
            $table->string('xml_cat')->nullable();
            $table->string('cat_id')->nullable();
            $table->decimal('price_amount')->nullable();
            $table->boolean('menu')->nullable()->default(false);
            $table->bigInteger('position')->nullable();
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
        Schema::drop('products');
    }
}
