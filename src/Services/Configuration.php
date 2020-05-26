<?php namespace Sculptor\Services;

use Illuminate\Support\Facades\File;
use Symfony\Component\Yaml\Yaml;

/**
 * (c) Alessandro Cappellozza <alessandro.cappellozza@gmail.com>
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

class Configuration
{
    /**
     * @var Templates
     */
    private $templates;

    /**
     * @var array<int|string, array<int, string>>
     */
    private $configuration;

    /**
     * Configuration constructor.
     * @param Templates $templates
     */
    public function __construct(Templates $templates)
    {
        $this->templates = $templates;

        $this->load();
    }

    /**
     *
     */
    private function load(): void
    {
        $custom = getcwd() . '/' . APP_CONFIG_FILENAME;
        $configuration = $this->template();

        if (File::exists($custom)) {
            $configuration = File::get($custom);
        }

        $this->configuration = Yaml::parse($configuration);
    }

    /**
     * @return array<string>
     */
    public function stages(): array
    {
        return $this->configuration['stages'];
    }

    /**
     * @return string
     */
    public function user(): string
    {
        return APP_PANEL_USER;
    }

    public function template(): string
    {
        return $this->templates->read(APP_CONFIG_FILENAME);
    }
}
