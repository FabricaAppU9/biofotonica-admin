<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTratasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tratas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cid', 20);
            $table->string('nm_fonte', 40);
            $table->string('nm_equip', 30);
            $table->string('tempo');
            $table->string('sessoes');
            $table->string('freq');
            $table->boolean('enabled')->default(1);
            $table->foreign('cid')->
                    references('cid')->
                    on('doencas')->
                    onDelete('cascade');
            
            $table->foreign('nm_fonte')->
                    references('nm_fonte')->
                    on('fontes')->
                    onDelete('cascade');
            
            $table->foreign('nm_equip')->
                    references('nm_equip')->
                    on('equips')->
                    onDelete('cascade');
            
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
        Schema::dropIfExists('tratas');
    }
}
