<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
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

  /**
   * @return void
   */
  private function sitesetting(): void
    {
        Setting::create(array('site_title' => 'Dil Se',  'meta_description'  => 'A laravel starter kit for web artisans.', 'address' => '335 Roncesvalles Ave Toronto, ON M6R – 2M8','site_currency' => '$', 'site_email' => 'orderdilse335@gmail.com', 'phone' => '416-532-4141','facebook_url' => 'https://www.facebook.com/dilse.ca/','twitter_url' => 'https://www.twitter.com/dilse.ca/','blogto_url' => 'https://www.blogto.com/restaurants/dil-se-indian-toronto/','instagram_url' => 'https://www.instagram.com/dilse.ca/','opening_hour' => 'Mon – Sun: 11:30 AM – 10:30 PM','copyright_text' => '© Copyrights 2023. All rights reserved',  'minimum_order_for_delivery' => 70.00, 'delivery_charge_within_5km' => 5.00,'delivery_charge_outside_5km' => 10.00,'tax' => 13.00, 'created_at' => now(), 'updated_at' => now()));
         $this->command->info('Site Setting Successfully Updated');
  }

  /**
   * @return void
   */
  private function mail_seeder(): void
  {
    Mail::create(['mail_uuid' => Str::random(10),'mail_transport' => 'smtp',  'mail_host'  => 'smtp.gmail.com', 'mail_port' => '465', 'mail_username' => 'testexoticamaildev96574@gmail.com', 'mail_password' => 'msknibkdxscggacm',  'mail_encryption' => 'tls',  'mail_from' => 'testexoticamaildev96574@gmail.com',  'created_at' => now(), 'updated_at' => now()]);
    $this->command->info(' Mail Site Setting Successfully Updated');
}

}
