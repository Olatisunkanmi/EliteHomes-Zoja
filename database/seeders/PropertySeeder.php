<?php

namespace Database\Seeders;

use App\Models\Property;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // public function run(): void
    // {
    //     Property::factory()->count(2)
    //         ->forUser([
    //             'username' => 'user',
    //         ])
    //         ->create();
    // }

    public function run(): void
    {
        $user = User::where('username',  'user')->first();

        if ($user) {
            Property::factory()->count(10)
                ->forUser([
                    'username' => 'user',
                ])
                ->create();
        };
    }
}
