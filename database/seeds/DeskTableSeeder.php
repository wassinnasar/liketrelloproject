<?php

use Illuminate\Database\Seeder;

class DeskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Desk::class, 20)->create();
    }
}
