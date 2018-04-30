<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equips', function (Blueprint $table) {
            $table->increments('id_equip');
            $table->string('nm_equip', 30)->unique();
            $table->string('nm_fabricante');
            $table->string('comprimento_onda');
            $table->string('modo_operacao');
            $table->string('area');
            $table->string('potencia_max');
            $table->string('polarizacao');
            $table->string('perfil');
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
        Schema::dropIfExists('equips');
    }
}
