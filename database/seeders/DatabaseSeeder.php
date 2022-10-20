<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        $this->call(DesaSeeder::class);
        $this->call(DusunSeeder::class);
        $this->call(PendudukSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(LakesSeeder::class);
        $this->call(PuskesmasSeeder::class);
        $this->call(StuntingSeeder::class);
        $this->call(KawasanSeeder::class);
        $this->call(IdmSeeder::class);
    }
}
