<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin\Setting\{Setting, Mail};

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->sitesetting();
        $this->mail_seeder();

    }
    private function sitesetting(){
        Setting::create(['settings_uuid' => \Str::random(10),'site_title' => 'LaraStarter',  'meta_description'  => 'A laravel starter kit for web artisans.', 'address' => 'Dake','site_currency' => '$', 'site_email' => 'superadmin@ecommerceaibot.com', 'phone' => '7018702974','copyright_text' => '© Copyrights 2023. All rights reserved',  'created_at' => now(), 'updated_at' => now()]);
         $this->command->info('Site Setting Successfully Updated');
  }
  private function mail_seeder(){
    Mail::create(['mail_uuid' => \Str::random(10),'mail_transport' => 'smtp',  'mail_host'  => 'smtp.gmail.com', 'mail_port' => '465', 'mail_username' => 'testexoticamaildev96574@gmail.com', 'mail_password' => 'msknibkdxscggacm',  'mail_encryption' => 'tls',  'mail_from' => 'testexoticamaildev96574@gmail.com',  'created_at' => now(), 'updated_at' => now()]);
    $this->command->info(' Mail Site Setting Successfully Updated');
}

}
