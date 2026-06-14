<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class ServeProject extends Command
{
    protected $signature = 'serve:ServeProject';
    protected $description = 'Run artisan serve and vite together';

    public function handle()
    {
        $this->info('Starting...');

        $processes = [
            new Process(['php', 'artisan', 'serve']),
            new Process(['npm', 'run', 'dev']),
        ];

        foreach ($processes as $process) {
            $process->start();
        }

        foreach ($processes as $process) {
            $process->wait();
        }
    }
}