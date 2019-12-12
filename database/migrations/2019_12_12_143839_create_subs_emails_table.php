<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubsEmailsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subs_emails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('group_email_id')->nullable();;
            $table->string('email')->nullable();
            $table->boolean('active')->default(false);
            $table->longText('comment')->nullable();
            $table->boolean('subs')->default(false);
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
        Schema::drop('subs_emails');
    }
}
