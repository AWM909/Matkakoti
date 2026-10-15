<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 20; $i++) {
            $private = $i <= 5; // rooms 1-5 have their own toilet

            Room::create([
                'number' => $i,
                'name' => 'Room ' . $i,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore.',
                'beds' => ($i % 3) + 1,
                'private_toilet' => $private,
                'price_per_night' => $private ? 85 : 65,
                'image' => null,
            ]);
        }
    }
}
