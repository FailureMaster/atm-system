<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use \App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'lorran',
            'pin' => Hash::make('1111'), // PIN for lorran
            'balance' => 1500, // Initial balance
        ]);

        User::create([
            'name' => 'mona',
            'pin' => Hash::make('2222'), // PIN for mona
            'balance' => 2000, // Initial balance
        ]);

        User::create([
            'name' => 'abegail',
            'pin' => Hash::make('3333'), // PIN for abegail
            'balance' => 2500, // Initial balance
        ]);
    }
}
