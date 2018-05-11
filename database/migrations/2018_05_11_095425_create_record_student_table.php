<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('record_student', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            
            $table->integer('record_id')->unsigned();
            $table->integer('student_id')->unsigned();            

            $table->foreign('record_id')->references('id')->on('records')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('record_student');
    }
}
