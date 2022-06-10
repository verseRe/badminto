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
        Schema::create('register_matches', function (Blueprint $table) {
            $table->id();
            $table->integer('tournamentID');
            $table->integer('userID');
            $table->integer('paymentID');
            $table->boolean('paymentStatus');
            $table->boolean('isFriendly');
            $table->string('acceptStatus');
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
        Schema::dropIfExists('register_matches');
    }
};