<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCautionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cautions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lot_id')->constrained();
            $table->string('Type_Caution');
            $table->string('Garant');
            $table->integer('Montant');
            $table->date('Date_Soumission');
            $table->integer('Duree_Validite');
            $table->string('Status')->nullable();
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
        Schema::dropIfExists('cautions');
    }
}
