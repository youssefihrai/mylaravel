<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nbr_user=(int)$this->command->ask("how many user  do you  want",50);
        $Users=factory(App\User::class,$nbr_user)->create();
    }
}
