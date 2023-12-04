<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();

            $table->string('Nombres', 50);
            $table->string('Apellidos', 50);
            $table->string('Telefono', 25);
            $table->string('Correo Electronico', 50);
            $table->integer('Edad');
            $table->timestamps();// Esto crea automáticamente las columnas 'Fecha de creacion' y 
                                //'Fecha de Modificacion'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
