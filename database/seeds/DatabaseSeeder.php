<?php

use App\User;
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
        User::query()->create(['name' => 'Сергей', 'email' => 'houston.inc@yandex.ru', 'password' => \Illuminate\Support\Facades\Hash::make('199056')]);
        User::query()->create(['name' => 'Александр', 'email' => 'sasha@mail.ru', 'password' => \Illuminate\Support\Facades\Hash::make('nikapr321A')]);
        // $this->call(UsersTableSeeder::cl
    }
}
