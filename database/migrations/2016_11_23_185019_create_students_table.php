<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('stdID');
            $table->string('field');
            /** @noinspection PhpUndefinedMethodInspection */
            $table->integer('ticket_id')->unsigned()->nullable();
            /** @noinspection PhpUndefinedMethodInspection */
            $table->integer('prof_ticket_id')->unsigned()->nullable();
            $table->timestamps();

            /** @noinspection PhpUndefinedMethodInspection */
            $table->foreign('ticket_id')->references('id')->on('tickets');
            /** @noinspection PhpUndefinedMethodInspection */
            $table->foreign('prof_ticket_id')->references('id')->on('prof_tickets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('students');
    }
}
