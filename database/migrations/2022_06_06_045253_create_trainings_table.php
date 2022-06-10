<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->double('userID');
            $table->integer('trainingID');
            $table->string('trainingName');
            $table->text('trainingVenue')->nullable();
            $table->integer('trainingCapacity')->nullable();
            $table->integer('trainingPrice');
            $table->integer('shuttlePrice');
            $table->date('trainingDate')->useCurrent();
            $table->time('trainingTime');
            $table->time('trainingEndTime');
            $table->integer('shuttleUsed')->nullable();


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
        Schema::dropIfExists('trainings');
    }
};