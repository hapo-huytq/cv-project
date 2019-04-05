<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cvs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 200);
            $table->string('name', 100);
            $table->date('birthday');
            $table->string('position', 100);
            $table->string('phone', 100);
            $table->string('email', 100);
            $table->string('facebook', 200)->nullable();
            $table->string('skype', 200)->nullable();
            $table->string('chatwork', 200)->nullable();
            $table->text('address')->nullable();
            $table->longText('summary')->nullable();
            $table->string('big_image', 250)->nullable();
            $table->string('small_image', 250)->nullable();
            $table->longText('professional_skill_desc')->nullable();
            $table->longText('presonal_skill_desc')->nullable();
            $table->longText('work_exp_desc')->nullable();
            $table->longText('education_desc')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('cvs');
    }
}
