<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoutenancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soutenances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('etudiant_id')->constrained('etudiants');
            $table->foreignId('company_encadrants_id')->constrained('company_encadrants');
            $table->foreignId('jury1')->constrained('pedagogiqueencadrants');
            $table->foreignId('jury2')->constrained('pedagogiqueencadrants');
            $table->foreignId('pedagogiqueencadrant_id')->constrained('pedagogiqueencadrants');
            $table->string('classe');
            $table->string('date');

            $table->integer('noteRapportjury1')->default(0);
            $table->integer('noteRapportjury2')->default(0);
            $table->integer('noteRapportencadrant')->default(0);

            $table->integer('noteRapport')->storedAs('0.3*noteRapportjury1+0.3*noteRapportjury2+0.3*noteRapportencadrant')
            ->nullable();
            $table->integer('notejury1')->default(0);
            $table->integer('notejury2')->default(0);
            $table->integer('notejury')->storedAs('0.5*noteRapportjury1+0.5*noteRapportjury2');

            $table->integer('noteencadrant')->default(0);
            $table->integer('notepedagogique')->default(0);
            $table->integer('livrable')->default(0);

            $table->integer('notglobale')->storedAs('0.25*notepedagogique+0.25*noteencadrant+0.25*livrable+0.10*noteRapport+0.15*notejury')
            ->nullable();
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
        Schema::dropIfExists('soutenances');
    }
}
