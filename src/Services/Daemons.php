<?php namespace Eppak\Services;

use Eppak\Contracts\Runner;
use Eppak\Contracts\RunnerResult;
use Illuminate\Support\Facades\Log;

/**
 * (c) Alessandro Cappellozza <alessandro.cappellozza@gmail.com>
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */
class Daemons
{
    /**
     * @var Runner
     */
    private $runner;

    public function __construct(Runner $runner)
    {
        $this->runner = $runner;
    }

    public function active(string $name)
    {
        $result = $this->systemctl("is-active", $name);

        return $result->output() == 'active';
    }

    public function reload(string $name): bool
    {
        return $this->systemctl("reload", $name)->success();
    }

    public function restart(string $name): bool
    {
        return $this->systemctl("restart", $name)->success();
    }

    public function start(string $name): bool
    {
        return $this->systemctl("start", $name)->success();
    }

    public function stop(string $name): bool
    {
        return $this->systemctl("stop", $name)->success();
    }

    public function enable(string $name): bool
    {
        return $this->systemctl("enable", $name)->success();
    }

    private function systemctl(string $command, string $name): RunnerResult
    {
        $result = $this->runner->run(["systemctl", $command, $name]);

        if (!$result->success()) {
            Log::error("Code: {$result->code()}");
            Log::error("Output: {$result->output()}");
            Log::error("Error: {$result->error()}");
        }

        return $result;
    }
}