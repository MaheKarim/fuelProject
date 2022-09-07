<?php

use Illuminate\Database\Seeder;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Priority::create([
            'id' => '1',
            'priority_name' => 'Normal'
        ]);
        App\Priority::create([
            'id' => '2',
            'priority_name' => 'Medium',
        ]);
        App\Priority::create([
            'id' => '3',
            'priority_name' => 'Emergency'
        ]);

    }
}
