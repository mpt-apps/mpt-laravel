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
        $this->call(UsersTableSeeder::class);
        $this->call(InfluencersTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(PoliticalPositionsTableSeeder::class);
        $this->call(WorkAreasTableSeeder::class);
        $this->call(JobPositionsTableSeeder::class);
        $this->call(PoliticalPartiesTableSeeder::class);
    }
}
