<?php

namespace Database\Seeders;

use App\Models\Alert;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Generating 10000 alerts...');

        $alerts = Alert::factory()
            ->count(100)
            ->make();

        $chunks = $alerts->chunk(10);

        foreach ($chunks as $chunk) {
            DB::table('alerts')->insert($chunk->toArray());
        }

        $this->command->info('10000 alerts generated successfully.');
    }
}
