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
        Schema::create('theater_show_times', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('show_time_id');
            $table->unsignedBigInteger('cinema_id');
            $table->unsignedBigInteger('theater_id');
            $table->time('time');
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
        Schema::dropIfExists('theater_show_times');
    }
};
