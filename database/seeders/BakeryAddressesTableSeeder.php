<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BakeryAddress;

class BakeryAddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BakeryAddress::create(['address' => 'Пекарня №1, ул. Ленина, д. 10']);
        BakeryAddress::create(['address' => 'Пекарня №2, пр. Мира, д. 25, ТЦ "Город"']);
        BakeryAddress::create(['address' => 'Пекарня №3, ул. Советская, д. 5, корп. 2']);
    }
}
