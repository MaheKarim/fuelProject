<?php

use Illuminate\Database\Seeder;

class FuelTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

        public function run()
    {
        App\FuelType::create([
            'id' => '1',
            'fuel_name' => 'Diseal',
        ]);

        App\FuelType::create([
            'id' => '2',
            'fuel_name' => 'Petrol'
        ]);
    }

}
