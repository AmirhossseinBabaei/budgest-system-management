<?php

namespace Database\Seeders;

use App\Models\Incom;
use App\Models\Income;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IncomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Generating 10000 incomes...');

        $incomes = Income::factory()
            ->count(100)
            ->make();

        $chunks = $incomes->chunk(10);

        foreach ($chunks as $chunk) {
            DB::table('incomes')->insert($chunk->toArray());
        }

        $this->command->info('10000 incomes generated successfully.');
    }
}
