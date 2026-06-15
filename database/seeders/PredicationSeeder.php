<?php

namespace Database\Seeders;

use App\Models\Predication;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PredicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Generating 10000 predictions...');

        $predictions = Predication::factory()
            ->count(100)
            ->make();

        $chunks = $predictions->chunk(10);

        foreach ($chunks as $chunk) {
            DB::table('predictions')->insert($chunk->toArray());
        }

        $this->command->info('10000 predictions generated successfully.');
    }
}
