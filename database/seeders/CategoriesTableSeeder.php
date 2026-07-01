<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Фирменный хлеб',
            'description' => 'Свежий хлеб собственного производства',
        ]);
        Category::create([
            'name' => 'Выпечка',
            'description' => 'Пироги, булочки и другая выпечка',
        ]);
        Category::create([
            'name' => 'Десерты',
            'description' => 'Сладкие десерты и торты',
        ]);
        Category::create([
            'name' => 'Напитки',
            'description' => 'Горячие и холодные напитки',
        ]);
    }
}
