<?php

namespace Database\Seeders;

use App\Models\Bill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Generating 10000 bills...');

        $bills = Bill::factory()
            ->count(100)
            ->make();

        $chunks = $bills->chunk(10);

        foreach ($chunks as $chunk) {
            DB::table('bills')->insert($chunk->toArray());
        }

        $this->command->info('10000 bills generated successfully.');
    }
}
