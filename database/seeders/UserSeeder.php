<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Generating 10000 users...');

        $users = User::factory()
            ->count(100)
            ->make(); // Use make() to generate models without saving immediately

        // Split into chunks to avoid memory issues and use insert for speed
        $chunks = $users->chunk(10); // Adjust chunk size as needed

        foreach ($chunks as $chunk) {
            DB::table('users')->insert($chunk->toArray());
        }

        $this->command->info('10000 users generated successfully.');
    }
}
