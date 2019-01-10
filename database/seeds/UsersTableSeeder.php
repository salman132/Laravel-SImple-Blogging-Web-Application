<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user = App\User::create([
            'name'=> 'Salman Rahman',
            'email'=> 'salman@auvi.com',
            'password'=> bcrypt('auvi0377'),
            'admin'=> 1
        ]);

        App\Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatar/1533838397laravel-56-is-released-5a8c604e2b02a.png',
            'about' => 'Hi this is the profile of very important person',
            'facebook' => 'www.facebook.com/salman.auvi',
            'youtube'=> 'www.youtube.com'
        ]);
    }
}
