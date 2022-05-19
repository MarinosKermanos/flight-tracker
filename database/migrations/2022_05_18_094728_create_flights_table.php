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
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('airplane_id');
            $table->unsignedBigInteger('From');
            $table->unsignedBigInteger('To');
            $table->dateTime('departure');
            $table->dateTime('arrival');
            $table->integer('expected_duration');
            $table->integer('actual_duration');
            $table->timestamps();

            $table->foreign('airplane_id')
                ->references('id')
                ->on('airplanes')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('From')
                ->references('id')
                ->on('airports')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('To')
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
        Schema::dropIfExists('flights');
    }
};
