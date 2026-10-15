<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Laravel\Jetstream\Jetstream;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $user = new User();
        $user->forceFill([
            'name' => 'Admin',
            'email' => 'admin@matkakoti.test',
            'password' => Hash::make('password123'),
            'email_verified_at' => now(),
        ])->save();

        if (Jetstream::hasTeamFeatures()) {
            $team = \App\Models\Team::forceCreate([
                'user_id' => $user->id,
                'name' => 'Matkakoti',
                'personal_team' => true,
            ]);
            $user->forceFill(['current_team_id' => $team->id])->save();
        }

        for ($i = 1; $i <= 20; $i++) {
            $private = $i <= 5;

            Room::create([
                'number' => 100 + $i,
                'name' => $private ? 'Huone omalla vessalla' : 'Huone yhteisellä vessalla',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'beds' => $i % 3 === 0 ? 2 : 1,
                'private_toilet' => $private,
                'price_per_night' => $private ? 85 : 65,
            ]);
        }
    }
}
