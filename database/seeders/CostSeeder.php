<?php

namespace Database\Seeders;

use App\Models\Cost;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Generating 10000 costs...');

        $costs = Cost::factory()
            ->count(100)
            ->make();

        $chunks = $costs->chunk(10);

        foreach ($chunks as $chunk) {
            DB::table('costs')->insert($chunk->toArray());
        }

        $this->command->info('10000 costs generated successfully.');
    }
}
