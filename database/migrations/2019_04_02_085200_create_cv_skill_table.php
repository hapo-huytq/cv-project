<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCvSkillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cv_skill', function (Blueprint $table) {
            $table->unsignedBigInteger('cv_id');
            $table->unsignedBigInteger('skill_id');
            $table->integer('percent');
            $table->foreign('cv_id')->references('id')->on('cvs')->onDelete('cascade');
            $table->foreign('skill_id')->references('id')->on('skills');
            $table->primary(array('cv_id','skill_id'));
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
        Schema::dropIfExists('cv_skill');
    }
}
