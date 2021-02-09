<?php

use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        $Posts=App\Post::all();
        $users=App\User::all();
       if($Posts->count()==0){
           $this->command->info("please insert many posts");
       }
       
        $nbr_comments=(int)$this->command->ask("how many comments  do you  want",50);
        $Comments=factory(App\Comment::class, $nbr_comments)->make()->each(function($comment) use($Posts,$users)
        {
         $comment->post_id=$Posts->random()->id; 
         $comment->user_id=$users->random()->id; 
        $comment->save();
        });  
    }
}
