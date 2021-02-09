<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedagogiqueencadrantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedagogiqueencadrants', function (Blueprint $table) {
            $table->id();
            $table->string('name',40);
            $table->string('email',40);
            $table->string('matricule',40);
            $table->string('date_naissance',40);
            $table->string('sexe',40);
            $table->string('password');
            $table->text('adresse',200);
            $table->string('matiere',40);
            $table->string('grade',40);
            $table->string('telephonne',40);
            $table->string('departement',40);
            $table->integer('type')->default(1);
            $table->foreignId('etablissement_id')->constrained();
            $table->rememberToken();
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
        Schema::dropIfExists('pedagogiqueencadrants');
    }
}
