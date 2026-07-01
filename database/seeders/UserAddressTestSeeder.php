<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Address;

class UserAddressTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'test@example.com')->first();
        if ($user) {
            Address::create([
                'user_id' => $user->id,
                'street' => 'ул. Тестовая',
                'house' => '1',
                'building' => null,
                'apartment' => '10',
                'entrance' => '1',
                'floor' => '2',
            ]);
        }
    }
}
