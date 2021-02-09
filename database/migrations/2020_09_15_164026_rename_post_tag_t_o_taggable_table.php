<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenamePostTagTOTaggableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('post_tag', function (Blueprint $table) {
            $table->dropForeign(['post_id']);
            $table->dropColumn('post_id');
        });
        Schema::rename('post_tag','taggables');
        Schema::table('taggables', function (Blueprint $table) {
            $table->morphs('taggable');
        });
   
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('taggables', function (Blueprint $table) {
            $table->dropmorphs('taggable');
        });
        Schema::rename('taggables','post_tag');
      Schema::disableForeignKeyConstraints();// désactive les contraintes  de foreign key
        Schema::table('post_tag', function (Blueprint $table) {
            $table->foreignId('post_id')->constrained()->cascadeOnDelete;
            
        });
        Schema::enableForeignKeyConstraints();// active les contraintes  de foreign key
    }
}
