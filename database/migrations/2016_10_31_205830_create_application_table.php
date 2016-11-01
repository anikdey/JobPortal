<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationTable extends Migration
{

    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('jobId', 30);
            $table->string('departmentId', 30);
            $table->string('fullName', 50);
            $table->string('mobileNumber', 20);
            $table->string('email', 150);
            $table->string('expectedSalary', 10);
            $table->string('address');
            $table->string('cv');
            $table->string('picture');
            $table->date('submissionDate');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::drop('applications');
    }
}
