<?php

use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('states')->delete();
        
        \DB::table('states')->insert(array (
            0 => 
            array (
                'table_id' => 2,
                'id' => 5,
                'country_id' => 'COL',
                'name' => 'Antioquia',
                'latitude' => '0.00000000',
                'longitude' => '0.00000000',
                'active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'table_id' => 3,
                'id' => 8,
                'country_id' => 'COL',
                'name' => 'Atlántico',
                'latitude' => '0.00000000',
                'longitude' => '0.00000000',
                'active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'table_id' => 4,
                'id' => 11,
                'country_id' => 'COL',
                'name' => 'Bogotá D.C.',
                'latitude' => '0.00000000',
                'longitude' => '0.00000000',
                'active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'table_id' => 5,
                'id' => 13,
                'country_id' => 'COL',
                'name' => 'Bolívar',
                'latitude' => '0.00000000',
                'longitude' => '0.00000000',
                'active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'table_id' => 6,
                'id' => 15,
                'country_id' => 'COL',
                'name' => 'Boyacá',
                'latitude' => '0.00000000',
                'longitude' => '0.00000000',
                'active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'table_id' => 7,
                'id' => 17,
                'country_id' => 'COL',
                'name' => 'Caldas',
                'latitude' => '0.00000000',
                'longitude' => '0.00000000',
                'active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'table_id' => 8,
                'id' => 18,
                'country_id' => 'COL',
                'name' => 'Caquetá',
                'latitude' => '0.00000000',
                'longitude' => '0.00000000',
                'active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'table_id' => 9,
                'id' => 19,
                'country_id' => 'COL',
                'name' => 'Cauca',
                'latitude' => '0.00000000',
                'longitude' => '0.00000000',
                'active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'table_id' => 10,
                'id' => 20,
                'country_id' => 'COL',
                'name' => 'Cesar',
                'latitude' => '0.00000000',
                'longitude' => '0.00000000',
                'active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'table_id' => 11,
                'id' => 23,
                'country_id' => 'COL',
                'name' => 'Córdoba',
                'latitude' => '0.00000000',
                'longitude' => '0.00000000',
                'active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'table_id' => 12,
                'id' => 25,
                'country_id' => 'COL',
                'name' => 'Cundinamarca',
                'latitude' => '0.00000000',
                'longitude' => '0.00000000',
                'active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'table_id' => 13,
                'id' => 27,
                'country_id' => 'COL',
                'name' => 'Chocó',
                'latitude' => '0.00000000',
                'longitude' => '0.00000000',
                'active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'table_id' => 14,
                'id' => 41,
                'country_id' => 'COL',
                'name' => 'Huila',
                'latitude' => '0.00000000',
                'longitude' => '0.00000000',
                'active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'table_id' => 15,
                'id' => 44,
                'country_id' => 'COL',
                'name' => 'La Guajira',
                'latitude' => '0.00000000',
                'longitude' => '0.00000000',
                'active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'table_id' => 16,
                'id' => 47,
                'country_id' => 'COL',
                'name' => 'Magdalena',
                'latitude' => '0.00000000',
                'longitude' => '0.00000000',
                'active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'table_id' => 17,
                'id' => 50,
                'country_id' => 'COL',
                'name' => 'Meta',
                'latitude' => '0.00000000',
                'longitude' => '0.00000000',
                'active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'table_id' => 18,
                'id' => 52,
                'country_id' => 'COL',
                'name' => 'Nariño',
                'latitude' => '0.00000000',
                'longitude' => '0.00000000',
                'active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'table_id' => 19,
                'id' => 54,
                'country_id' => 'COL',
                'name' => 'Norte de Santander',
                'latitude' => '0.00000000',
                'longitude' => '0.00000000',
                'active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'table_id' => 20,
                'id' => 63,
                'country_id' => 'COL',
                'name' => 'Quindío',
                'latitude' => '0.00000000',
                'longitude' => '0.00000000',
                'active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'table_id' => 21,
                'id' => 66,
                'country_id' => 'COL',
                'name' => 'Risaralda',
                'latitude' => '0.00000000',
                'longitude' => '0.00000000',
                'active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'table_id' => 22,
                'id' => 68,
                'country_id' => 'COL',
                'name' => 'Santander',
                'latitude' => '0.00000000',
                'longitude' => '0.00000000',
                'active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'table_id' => 23,
                'id' => 70,
                'country_id' => 'COL',
                'name' => 'Sucre',
                'latitude' => '0.00000000',
                'longitude' => '0.00000000',
                'active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'table_id' => 24,
                'id' => 73,
                'country_id' => 'COL',
                'name' => 'Tolima',
                'latitude' => '0.00000000',
                'longitude' => '0.00000000',
                'active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'table_id' => 25,
                'id' => 76,
                'country_id' => 'COL',
                'name' => 'Valle del Cauca',
                'latitude' => '0.00000000',
                'longitude' => '0.00000000',
                'active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'table_id' => 26,
                'id' => 81,
                'country_id' => 'COL',
                'name' => 'Arauca',
                'latitude' => '0.00000000',
                'longitude' => '0.00000000',
                'active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'table_id' => 27,
                'id' => 85,
                'country_id' => 'COL',
                'name' => 'Casanare',
                'latitude' => '0.00000000',
                'longitude' => '0.00000000',
                'active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'table_id' => 28,
                'id' => 86,
                'country_id' => 'COL',
                'name' => 'Putumayo',
                'latitude' => '0.00000000',
                'longitude' => '0.00000000',
                'active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'table_id' => 29,
                'id' => 88,
                'country_id' => 'COL',
                'name' => 'Archipiélago de San Andrés, Providencia y Santa Catalina',
                'latitude' => '0.00000000',
                'longitude' => '0.00000000',
                'active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'table_id' => 30,
                'id' => 91,
                'country_id' => 'COL',
                'name' => 'Amazonas',
                'latitude' => '0.00000000',
                'longitude' => '0.00000000',
                'active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'table_id' => 31,
                'id' => 94,
                'country_id' => 'COL',
                'name' => 'Guainía',
                'latitude' => '0.00000000',
                'longitude' => '0.00000000',
                'active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'table_id' => 32,
                'id' => 95,
                'country_id' => 'COL',
                'name' => 'Guaviare',
                'latitude' => '0.00000000',
                'longitude' => '0.00000000',
                'active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'table_id' => 33,
                'id' => 97,
                'country_id' => 'COL',
                'name' => 'Vaupés',
                'latitude' => '0.00000000',
                'longitude' => '0.00000000',
                'active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'table_id' => 34,
                'id' => 99,
                'country_id' => 'COL',
                'name' => 'Vichada',
                'latitude' => '0.00000000',
                'longitude' => '0.00000000',
                'active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}