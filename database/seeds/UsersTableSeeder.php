<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Abel',
                'email' => 'abel@admin.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$j.s9zaO0ewlIoa6JxzE/b.BoZJzZgb8pdlQQyHn8LMEd7CW/UgEM2',
                'remember_token' => 'SrQoQi0yCxvkQl4DgIJ9ag0rTOhtqjWok9vKrOPpyFvaMAZJWkWMWIERXJRx',
                'created_at' => '2018-09-10 13:53:16',
                'updated_at' => '2018-09-10 13:53:16',
            ),
        ));
        
        
    }
}