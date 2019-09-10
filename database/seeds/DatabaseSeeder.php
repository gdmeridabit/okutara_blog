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
        DB::table('users')->insert([
            'name' => 'Admin Admin',
            'username' => 'admin',
            'email' => 'admin@dispostable.com',
            'password' => bcrypt('admin'),
        ]);
        DB::table('categories')->insert([
            'name' => 'Outdoor Activities',
            'icon' => 'fas fa-hiking',
            'color' => '#E27D60'
        ]);
        DB::table('categories')->insert([
            'name' => 'Sightseeing',
            'icon' => 'fas fa-leaf',
            'color' => '#87CDCA'
        ]);
        DB::table('categories')->insert([
            'name' => 'Foodtrip',
            'icon' => 'fas fa-utensils',
            'color' => '#E8A87C'
        ]);
        DB::table('categories')->insert([
            'name' => 'Accommodation',
            'icon' => 'fas fa-hotel',
            'color' => '#C38D9E'
        ]);
        DB::table('categories')->insert([
            'name' => 'Cultural Festivals and Events',
            'icon' => 'fas fa-torii-gate',
            'color' => '#41B3A3'
        ]);
        DB::table('categories')->insert([
            'name' => 'Experience',
            'icon' => 'fas fa-heart',
            'color' => '#E27D60'
        ]);
    }
}
