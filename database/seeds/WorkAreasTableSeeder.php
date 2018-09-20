<?php

use Illuminate\Database\Seeder;

class WorkAreasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('work_areas')->delete();
        
        \DB::table('work_areas')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Política',
                'description' => 'Política colombiana.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Periodismo',
                'description' => 'Periodismo',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}