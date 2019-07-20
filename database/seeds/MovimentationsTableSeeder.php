<?php

use Illuminate\Database\Seeder;

class MovimentationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(\App\Entities\Movimentation::class, 30)->create();
    }
}
