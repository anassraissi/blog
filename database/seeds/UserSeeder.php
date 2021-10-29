<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
           'name' => 'anass raissi',
           'email' => 'anas.raissi00@gmail.com',
           'password' => bcrypt('password')
             
        ]);
    }
}
