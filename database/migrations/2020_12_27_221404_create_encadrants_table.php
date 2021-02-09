<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncadrantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encadrants', function (Blueprint $table) {
            $table->id();
            $table->string('name',40);
            $table->string('email',40);
            $table->string('matricule',40);
            $table->string('date_naissance',40);
            $table->string('sexe',40);
            $table->string('password');
            $table->string('adresse',40);
            $table->string('role',40);
            $table->string('telnnephonne',40);
            $table->foreignId('etablissement_id')->constrained();
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
        Schema::dropIfExists('encadrants');
    }
}
