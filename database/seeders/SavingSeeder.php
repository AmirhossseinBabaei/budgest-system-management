<?php

namespace Database\Seeders;

use App\Models\Saving;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SavingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Generating 10000 savings...');

        $savings = Saving::factory()
            ->count(100)
            ->make();

        $chunks = $savings->chunk(10);

        foreach ($chunks as $chunk) {
            DB::table('savings')->insert($chunk->toArray());
        }

        $this->command->info('10000 savings generated successfully.');
    }
}
