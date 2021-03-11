<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            'name'=>'Marta',                
            'email' => 'marta@g.com',                
            'password' =>  bcrypt('12345678'),
            'rol'=> 0
        ]);
        // \DB::table('users')->insert([
        //     'name' =>  'Rosalía',                
        //     'email' => 'rosalia@g.com',           
        //     'password' => bcrypt('12345678'),  
        //     'rol'=> 1
        // ]);
    }
}
