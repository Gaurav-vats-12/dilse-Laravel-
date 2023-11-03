<?php

namespace Database\Seeders;

use App\Models\Admin\Setting\Referral;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReferralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Referral::create([
            'referral_status'=>1,
            'referral_points' => 10.00,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $this->command->info('Referral Setting Successfully Updated');

    }
}
