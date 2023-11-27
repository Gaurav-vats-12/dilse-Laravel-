<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin\Menu;

use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->menuseeder();
    }

  /**
   * @return void
   */
  private function menuseeder(): void
    {
        $menu = [
            ['menu_name'  => 'APPETIZERS','menu_slug' => 'appetizers','status' =>'active','created_at' => now(), 'updated_at' => now()],
            ['menu_name'  => 'TANDOORI','menu_slug' => 'tandoori','status' =>'active','created_at' => now(), 'updated_at' => now()],
            ['menu_name'  => 'VEGETERIAN','menu_slug' => 'vegeterian','status' =>'active','created_at' => now(), 'updated_at' => now()],
            ['menu_name'  => 'NON VEG','menu_slug' => 'non-veg','status' =>'active','created_at' => now(), 'updated_at' => now()],
            ['menu_name'  => 'BASMATI RICE','menu_slug' => 'basmati-rice','status' =>'active','created_at' => now(), 'updated_at' => now()],
            ['menu_name'  => 'BREADS','menu_slug' => 'breads','status' =>'active','created_at' => now(), 'updated_at' => now()],
            ['menu_name'  => 'SIDE ORDERS/ SALAD','menu_slug' => 'side-orders-salad','status' =>'active','created_at' => now(), 'updated_at' => now()],
            ['menu_name'  => 'DESSERTS','menu_slug' => 'desserts','status' =>'active','created_at' => now(), 'updated_at' => now()],
            ['menu_name'  => 'DRINKS','menu_slug' => 'drinks','status' =>'active','created_at' => now(), 'updated_at' => now()],
            ['menu_name'  => 'LUNCH SPECIAL COMBO','menu_slug' => 'lunch-special-combo','status' =>'active','created_at' => now(), 'updated_at' => now()],
        ];
        Menu::insert($menu);
        $this->command->info('Menu Added  Successfully Updated');
  }
}
