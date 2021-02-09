<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {    
if($this->command->confirm("do you want  refresh your database")){
    $this->command->call("migrate:fresh");
}   
     $this->call([UserTableSeeder::class,
     PostTableSeeder::class,
    CommentTableSeeder::class,
    TagTableSeeder::class,
    PostTagTableSeeder::class
   ]);
    }
}
