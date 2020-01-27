<?php

use Illuminate\Database\Seeder;
Use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        User::insert(['name'=> 'admin', 'email'=> 'admin@transisi.id', 'password'=>bcrypt('transisi')]);

    }
}
