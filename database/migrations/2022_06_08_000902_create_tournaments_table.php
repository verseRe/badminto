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
        Schema::create('tournaments', function (Blueprint $table) {
            $table->id();
            $table->string('match_type');
            $table->string('match_name');
            $table->string('match_venue');
            $table->string('match_start_date');
            $table->string('match_end_date');
            $table->string('match_start_time');
            $table->boolean('finished');
            $table->decimal('match_fee', 4, 2);
            $table->string('image_link');
            $table->string('chat_link');
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
        Schema::dropIfExists('tournaments');
    }
};
