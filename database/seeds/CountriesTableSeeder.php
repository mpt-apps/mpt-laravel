<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('countries')->delete();
        
        \DB::table('countries')->insert(array (
            0 => 
            array (
                'id' => 'COL',
                'name' => 'Colombia',
                'latitude' => '3.90074900',
                'longitude' => '-73.07321500',
                'active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}