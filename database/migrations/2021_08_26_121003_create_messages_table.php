<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('Dossier_Cible');
            $table->integer('Appel_Cible');
            $table->integer('Objet_Cible');
            $table->integer('Lot_Cible');
            $table->integer('Caution_Cible');
            $table->integer('Jours_Restant');
            $table->string('Message1');
            $table->string('Message2');
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
        Schema::dropIfExists('messages');
    }
}
