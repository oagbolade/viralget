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
        // factory(App\Subscription::class, 100)->create();

        factory(App\UserDetails::class, 100)->create();

        // $this->call(UsersTableSeeder::class);
    }
}
