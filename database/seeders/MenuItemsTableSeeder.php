<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MenuItem;

class MenuItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MenuItem::create([
            'category_id' => 1,
            'name' => 'Хлеб ржаной',
            'description' => 'Традиционный ржаной хлеб, свежий и ароматный.',
            'price' => 6.00,
            'image' => 'hleb_rzhanoi.jpg',
        ]);
        MenuItem::create([
            'category_id' => 1,
            'name' => 'Хлеб пшеничный',
            'description' => 'Пышный пшеничный хлеб с хрустящей корочкой.',
            'price' => 6.00,
            'image' => 'hleb_pshenichnyi.jpg',
        ]);
        MenuItem::create([
            'category_id' => 2,
            'name' => 'Булочка с корицей',
            'description' => 'Сладкая булочка с корицей и сахарной глазурью.',
            'price' => 7.00,
            'image' => 'bulochka_s_koricei.jpg',
        ]);
        MenuItem::create([
            'category_id' => 3,
            'name' => 'Пирог с яблоками',
            'description' => 'Домашний пирог с яблочной начинкой.',
            'price' => 11.00,
            'image' => 'pirog_s_yablokami.jpg',
        ]);
        MenuItem::create([
            'category_id' => 2,
            'name' => 'Круассан классический',
            'description' => 'Слоёный французский круассан из сливочного теста.',
            'price' => 9.00,
            'image' => 'croissant.jpg',
        ]);
        MenuItem::create([
            'category_id' => 2,
            'name' => 'Печенье овсяное',
            'description' => 'Мягкое овсяное печенье со злаками.',
            'price' => 6.00,
            'image' => 'oatmeal_cookie.jpg',
        ]);
        MenuItem::create([
            'category_id' => 3,
            'name' => 'Чизкейк',
            'description' => 'Нежный чизкейк с ягодным соусом.',
            'price' => 10.00,
            'image' => 'cheesecake.jpg',
        ]);
        MenuItem::create([
            'category_id' => 3,
            'name' => 'Эклер',
            'description' => 'Эклер с заварным кремом и шоколадной глазурью.',
            'price' => 7.00,
            'image' => 'ekler.jpg',
        ]);
        MenuItem::create([
            'category_id' => 4,
            'name' => 'Капучино',
            'description' => 'Свежесваренный кофе.',
            'price' => 8.00,
            'image' => 'coffee.jpg',
        ]);
        MenuItem::create([
            'category_id' => 4,
            'name' => 'Чай',
            'description' => 'Настоящий цейлонский чёрный чай.',
            'price' => 7.00,
            'image' => 'tea.jpg',
        ]);
    }
}
