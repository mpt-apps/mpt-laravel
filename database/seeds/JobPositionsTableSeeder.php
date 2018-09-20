<?php

use Illuminate\Database\Seeder;

class JobPositionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('job_positions')->delete();
        
        
        
    }
}