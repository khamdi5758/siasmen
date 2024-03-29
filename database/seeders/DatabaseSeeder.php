<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::factory(5)->create();
        // $this->call([
        //     UserSeeder::class,
        //     DosensSeeder::class,
        // ]);
        // \App\Models\User::factory(10)->create();
    }
}
