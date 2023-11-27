<?php

namespace Database\Seeders;
use App\Models\Admin\Page;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $page = [
            ['pagesuuid'  => Str::random(10),'page_title' => 'Dilse Foundation and Donation','page_slug' => 'dilse-foundation-and-donation','page_content' => 'This Is Dilse Foundation and Donation page','status' =>'active' ,'created_at' => now(), 'updated_at' => now()],
            ['pagesuuid'  => Str::random(10),'page_title' => 'Privacy and Policy','page_slug' => 'privacy-policy','page_content' => 'Privacy and Policy page','status' =>'active' ,'created_at' => now(), 'updated_at' => now()],
            ['pagesuuid'  => Str::random(10),'page_title' => 'Term and Conditions','page_slug' => 'terms-and-conditions','page_content' => 'Term and Conditions page','status' =>'active' ,'created_at' => now(), 'updated_at' => now()],
        ];
        Page::insert($page);
        $this->command->info('Page Added  Successfully Updated');
    }
}
