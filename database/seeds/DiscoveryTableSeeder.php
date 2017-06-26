<?php

use Illuminate\Database\Seeder;

class DiscoveryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
       DB::table('discoveries')->truncate();
       factory(App\Models\Discovery::class, 50)->create();
     }
}
