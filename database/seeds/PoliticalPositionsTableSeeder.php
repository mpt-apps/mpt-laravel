<?php

use Illuminate\Database\Seeder;

class PoliticalPositionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('political_positions')->delete();
        
        \DB::table('political_positions')->insert(array (
            0 => 
            array (
                'id' => 'LA',
                'horizontal' => 'Left',
                'vertical' => 'Authoritarian',
                'active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 'LC',
                'horizontal' => 'Left',
                'vertical' => 'Centre',
                'active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 'LL',
                'horizontal' => 'Left',
                'vertical' => 'Libertarian',
                'active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 'RA',
                'horizontal' => 'Right',
                'vertical' => 'Authoritarian',
                'active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 'RC',
                'horizontal' => 'Right',
                'vertical' => 'Centre',
                'active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 'RL',
                'horizontal' => 'Right',
                'vertical' => 'Libertarian',
                'active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 'CA',
                'horizontal' => 'Centre',
                'vertical' => 'Authoritarian',
                'active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 'CC',
                'horizontal' => 'Centre',
                'vertical' => 'Centre',
                'active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 'CL',
                'horizontal' => 'Centre',
                'vertical' => 'Libertarian',
                'active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}