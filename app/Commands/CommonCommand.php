<?php namespace App\Commands;

use Illuminate\Support\Facades\File;
use Sculptor\Services\Logs;
use Sculptor\Stages\Version;

trait CommonCommand
{
    private $start;

    private function preamble(): void
    {
        $this->info("You can see detailed log in " . Logs::filename());

        $this->warn("Every step can take several minutes");

        $this->timer();
    }

    private function timer(): void
    {
        $this->start = now();
    }

    private function elapsed(): string
    {
        return now()->diff($this->start)->format('%H:%I:%S');
    }

    private function dump(): void
    {
        if ($this->option('dump')) {
            $logs = File::get(Logs::filename());

            $this->info($logs);
        }
    }
}
