<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'Kieran Fahy', 'email' => 'kieran.fahy@sd23.bc.ca', 'password' => bcrypt('secret')],
        ]);
    }
}
