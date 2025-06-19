<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $exists = User::where('username', 'admin')->exists();

        if (!$exists) {
            User::create([
                'username' => 'admin',
                'email' => 'admin@example.com',
            ]);
        }
    }
}
