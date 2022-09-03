<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('couses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('teacher_id');
            $table->string('title');
            $table->date('deadline');
            $table->integer('numpeople');
            $table->bigInteger('amount');
            $table->text('body');
            $table->string('adress');
            $table->date('date');
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
        Schema::dropIfExists('couses');
    }
}
