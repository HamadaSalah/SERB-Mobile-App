<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        factory(App\User::class, 20)->create();
    }
}
