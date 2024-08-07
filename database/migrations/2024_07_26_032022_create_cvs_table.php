<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCvsTable extends Migration
{
    public function up()
{
    Schema::create('cvs', function (Blueprint $table) {
        $table->id();
        $table->string('profile_image');
        $table->string('name');
        $table->string('title');
        $table->text('profile')->nullable();
        $table->text('projects')->nullable();
        $table->text('education')->nullable();
        $table->string('phone');
        $table->text('skills')->nullable();
        $table->text('co_curricular')->nullable();
        $table->string('email');
        $table->string('linkedin');
        $table->timestamps();
    });
}
    public function down()
    {
        Schema::dropIfExists('cvs');
    }
}
