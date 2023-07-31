<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    public function run(): void
    {
        $this->command->info('Initializing...');
    	$this->command->info('Deleting tables...');
        $this->call([
            Adminseeder::class,
            SettingSeeder::class,
            CountriesTableSeeder::class,
            StatesTableSeeder::class,
            CitiesTableChunkOneSeeder::class,
            CitiesTableChunkTwoSeeder::class,
            CitiesTableChunkThreeSeeder::class,
            CitiesTableChunkFourSeeder::class,
            CitiesTableChunkFiveSeeder::class,
        ]);
        $this->command->info('Finished!');

    }
}
