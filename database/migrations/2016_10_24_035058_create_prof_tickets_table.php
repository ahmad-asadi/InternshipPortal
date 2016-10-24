<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prof_tickets', function (Blueprint $table) {
            $table->increments('id');
            /** @noinspection PhpUndefinedMethodInspection */
            $table->integer('prof_id')->unsigned();
            $table->string('description');
            $table->integer('capacity');
            $table->timestamps();

            /** @noinspection PhpUndefinedMethodInspection */
            $table->foreign('prof_id')->references('id')->on('profs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('prof_tickets');
    }
}
