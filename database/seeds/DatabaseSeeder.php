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
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'name' => 'Admin Admin',
            'username' => 'admin',
            'email' => 'admin@dispostable.com',
            'password' => bcrypt('admin'),
        ]);
        factory(App\User::class, 20)->create();
    }
}
