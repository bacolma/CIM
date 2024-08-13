<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->id();
            $table->string('nombres', 50);
            $table->string('apellidos', 50);
            $table->date('fecnac');
            $table->unsignedBigInteger('nacionid');
            $table->unsignedBigInteger('sexoid');
            $table->unsignedBigInteger('edocivid');
            $table->string('lugarnac')->nullable();
            $table->string('profesion')->nullable(); $table->string('celular')->nullable();
            $table->string('correo')->nullable(); $table->string('dirhab')->nullable();
            $table->string('tlfhab')->nullable(); $table->string('dirofc')->nullable();
            $table->string('tlfofc')->nullable(); $table->string('cedrepres')->nullable();
            $table->string('representante')->nullable(); $table->string('referido')->nullable();
            $table->date('fecreg')->nullable(); $table->unsignedInteger('cedula')->nullable();
            $table->longText('antecedentes')->nullable();
            $table->longText('historia')->nullable();
            $table->timestamps();

            $table->foreign('nacionid')->references('id')
                ->on('nacionalidad')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('sexoid')->references('id')
                ->on('sexo')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('edocivid')->references('id')
                ->on('ecivil')
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
        Schema::dropIfExists('pacientes');
    }
}
