<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags=collect(['news','sport','games','technology']);
       //manipuler les tags et sauvgarder  dans la base
        $tags->each(function($tag){
                $mytag=new Tag();
                $mytag->name=$tag;
                $mytag->save();
            }
        
    );
    }
}
