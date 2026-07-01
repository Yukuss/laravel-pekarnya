<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Тест',
            'last_name' => 'Пользователь',
            'phone' => '+375290000000',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}
