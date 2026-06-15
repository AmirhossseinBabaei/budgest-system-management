<?php

namespace Database\Seeders;

use App\Models\AlertNotification;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlertNotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Generating 10000 notifications...');

        $notifications = AlertNotification::factory()
            ->count(100)
            ->make();

        $chunks = $notifications->chunk(10);

        foreach ($chunks as $chunk) {
            DB::table('alert_notifications')->insert($chunk->toArray());
        }

        $this->command->info('10000 notifications generated successfully.');
    }
}
