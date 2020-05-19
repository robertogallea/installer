<?php namespace Eppak\Contracts;

use Eppak\Services\Daemons;

/**
 * (c) Alessandro Cappellozza <alessandro.cappellozza@gmail.com>
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

interface Stage
{
    public function __construct(Runner $runner, Daemons $daemons);
    public function run(array $env = null): bool;
    public function name(): string;
    public function error(): ?string;
    public function env(): ?array;
}
