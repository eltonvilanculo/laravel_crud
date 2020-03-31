<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(User::class,12)->create();
//
//        User::create([
//            'name'=>'EltonVilanculo',
//            'email'=>'elton@laravel.com',
//            'password'=>bcrypt('1234678')
//
//        ]);
        //
    }
}
