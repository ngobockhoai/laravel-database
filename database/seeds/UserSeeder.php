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
        factory(App\User::class, 3)->create();


        /**
         * @var Remove AdressSeeder.php
         * @var Remove this->call AddressSeeder in DBSeeder
         */
        // factory(App\User::class, 3)
        // ->create()
        // ->each(function ($user) {
        //      $user->address()->save(factory(App\Address::class)->make());
        //  }); // no need  to use faker unique()
    }
}
