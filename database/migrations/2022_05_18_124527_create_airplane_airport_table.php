<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airplane_airport', function (Blueprint $table) {
            $table->unsignedBigInteger('airplane_id');
            $table->unsignedBigInteger('airport_id');

            $table->foreign('airplane_id')
                ->references('id')
                ->on('airplanes')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign("airport_id")
                ->references('id')
                ->on('airports')
                ->onUpdate('cascade')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('airplane_airport');
    }
};
