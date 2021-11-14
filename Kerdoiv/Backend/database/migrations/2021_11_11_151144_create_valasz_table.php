<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValaszTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valasz', function (Blueprint $table) {
            $table->id();
            $table->string('value');
            $table->string('question_filler');
            $table->unsignedBigInteger('kerdes_id')->nullable();
            $table->foreign('kerdes_id')->references('id')->on('kerdes')->onDelete('cascade');
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
        Schema::dropIfExists('valasz');
    }
}
