<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Modules\Admins\Models\Admin;
use Illuminate\Support\Str;


class Adminseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->createAdmins();
    }

  /**
   * @return void
   */
  private function createAdmins(): void
    {
        Admin::create([
        'admins_uuid'=>Str::random(10),
        'name'  => 'Superadmin',
        'email' =>'admin@dlse.com',
        'password' =>bcrypt('cryPOtiver'),
        'email_verified_at' => now(),
        'created_at' => now(),
        'updated_at' => now(),
        'avatar'  => 'img/config/nopic.png',
        'active'  => true
        ]);
        $this->command->info('Super Admin Created Successfully');
    }
}
