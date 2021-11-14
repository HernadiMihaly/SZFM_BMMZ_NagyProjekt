<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKerdesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kerdes', function (Blueprint $table) {
            $table->id();
			$table->integer('order_number');
			$table->text('question');
			$table->string('type');
			$table->boolean('is_predictive');
			$table->string('correct_answer')->default('');
                        $table->string('answers')->default('');
			$table->unsignedBigInteger('kerdoiv_id')->nullable();
			$table->foreign('kerdoiv_id')->references('id')->on('kerdoivek')->onDelete('cascade');
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
        Schema::dropIfExists('kerdes');
    }
}
