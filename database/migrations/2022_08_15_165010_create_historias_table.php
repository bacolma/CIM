<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('drid');
            $table->unsignedBigInteger('pacid');
            $table->date('fecha');
            $table->unsignedInteger('tipcon');
            $table->longText('motcon')->nullable(); $table->longText('evolucion')->nullable();
            $table->longText('texenf')->nullable(); $table->longText('vitpes')->nullable();
            $table->longText('vittal')->nullable(); $table->longText('vitten')->nullable();
            $table->longText('vitpul')->nullable(); $table->longText('vitres')->nullable();
            $table->longText('otrobs')->nullable(); $table->longText('plater')->nullable();
            $table->longText('exalab')->nullable(); $table->longText('exaesp')->nullable();
            $table->longText('exarad')->nullable(); $table->longText('exapre')->nullable();
            $table->longText('resexalab')->nullable(); $table->longText('resexarad')->nullable();
            $table->longText('resexaesp')->nullable(); $table->longText('resexapre')->nullable();
            $table->longText('tratamiento')->nullable(); $table->longText('indicaciones')->nullable();
            $table->longText('condinf')->nullable(); $table->longText('fungenobs')->nullable();
            $table->longText('funhabtab')->nullable(); $table->longText('funhabcaf1')->nullable();
            $table->longText('funhabcaf2')->nullable(); $table->longText('funhabmed')->nullable();
            $table->longText('funhabdro')->nullable(); $table->longText('funhabing')->nullable();
            $table->longText('funhabsue')->nullable(); $table->longText('funhabotr')->nullable();
            $table->longText('funhabalc1')->nullable(); $table->longText('funhabalc2')->nullable();
            $table->timestamps();

            $table->foreign('drid')->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('pacid')->references('id')
                ->on('pacientes')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historias');
    }
}
