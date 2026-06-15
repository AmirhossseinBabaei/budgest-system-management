<?php

namespace Database\Seeders;

use App\Models\Target;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TargetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Generating 10000 targets...');

        $targets = Target::factory()
            ->count(100)
            ->make();

        $chunks = $targets->chunk(10);

        foreach ($chunks as $chunk) {
            DB::table('targets')->insert($chunk->toArray());
        }

        $this->command->info('10000 targets generated successfully.');
    }
}
