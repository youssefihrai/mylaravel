<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Users=App\User::all();
        if($Users->count()==0){
            $this->command->info("please insert many users");
        }
        $nbr_posts=(int)$this->command->ask("how many posts  do you  want",50);
        $Posts=factory(App\Post::class, $nbr_posts)->make()->each(function($post) use($Users)
        {
         $post->user_id=$Users->random()->id;           
        $post->save();
        }  );
    }
}
