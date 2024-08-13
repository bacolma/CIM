<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgenda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->id();
            $table->string('datopac');
            $table->unsignedBigInteger('userid');
            $table->unsignedBigInteger('fechaid');
            $table->unsignedBigInteger('hcitaid');
            $table->timestamps();

            $table->foreign('userid')->references('id')->on('users');
            $table->foreign('fechaid')->references('id')->on('fechas');
            $table->foreign('hcitaid')->references('id')->on('hcitas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agenda');
    }
}
