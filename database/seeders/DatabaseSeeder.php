<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    private $faker;

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Configuration::factory(10)->create();
        \App\Models\Product::factory(10)->create();
        \App\Models\Cell::factory(10)->create();
        \App\Models\Module::factory(10)->create();
        \App\Models\Location::factory(10)->create();

        DB::table('users')->insert(
            [
                'name_1' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => '$2y$10$2SwKVGSMKYoRrSLZHI2Bc.FWjyJcA2y4HJz8c0eynFXpEh6Pnc80m' // 123456
            ]

        );
    }
}
