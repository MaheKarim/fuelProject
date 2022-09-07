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
         $this->call(LaratrustSeeder::class);
         $this->call(FuelTypeSeeder::class);
         $this->call(RefuellingSeeder::class);
         $this->call(PrioritySeeder::class);
    }
}
