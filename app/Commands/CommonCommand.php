<?php namespace App\Commands;

use Carbon\Carbon;
use Eppak\Services\Logs;
use Eppak\Stages\Version;

trait CommonCommand
{
    private $start;

    private function preamble()
    {
        $this->info("Running on OS Version " . Version::get());

        $this->info("You can see detailed log in " . Logs::filename());

        $this->warn("Every step can take several minutes");

        $this->timer();
    }

    private function timer()
    {
        $this->start = now();
    }

    private function elapsed()
    {
        return now()->diff($this->start)->format('%H:%I:%S');
    }
}