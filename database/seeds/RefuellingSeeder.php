<?php

use Illuminate\Database\Seeder;

class RefuellingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\RefuelingFor::create([
            'id' => '1',
            'refueling_reason' => 'Generator',
        ]);

        App\RefuelingFor::create([
            'id' => '2',
            'refueling_reason' => 'Fleet Transport'
        ]);
        App\RefuelingFor::create([
            'id' => '3',
            'refueling_reason' => 'Vehicle - Truck'
        ]);
    }
}
