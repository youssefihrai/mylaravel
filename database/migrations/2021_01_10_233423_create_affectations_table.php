<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffectationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affectations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('etudiant_id')->constrained('etudiants');
            $table->foreignId('pedagogiqueencadrant_id')->constrained('pedagogiqueencadrants');
            $table->string('classe');
            $table->string('horaire');
            $table->string('seance1')->default('desactive');
            $table->string('seance2')->default('desactive');
            $table->string('seance3')->default('desactive');
            $table->string('seance4')->default('desactive');
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
        Schema::dropIfExists('affectations');
    }
}
