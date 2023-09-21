<?php

namespace Database\Seeders;
use App\Models\Admin\Attributes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodItemsAttribute extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $attribute = [
            ['attributes_name'  => 'Mild','attributes_type' => 'other','status' =>1,'created_at' => now(), 'updated_at' => now()],
            ['attributes_name'  => 'Medium','attributes_type' => 'other','status' =>1,'created_at' => now(), 'updated_at' => now()],
            ['attributes_name'  => 'Spicy','attributes_type' => 'other','status' =>1,'created_at' => now(), 'updated_at' => now()],
        ];
        Attributes::insert($attribute);
        $this->command->info('Food Items Attribute  Added  Successfully Updated');
    }
}
