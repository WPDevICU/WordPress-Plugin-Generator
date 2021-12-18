<?php

namespace WPDevICU\WPPG;

use Symfony\Component\Console\Application;
use WPDevICU\WPPG\Commands\GenerateCommand;
use WPDevICU\WPPG\Commands\NewCommand;

class Commander
{
    public const VERSION = '0.0.1';

    public Application $application;

    public function __construct()
    {
        $this->application = new Application('WordPress Boilerplate Generator', self::VERSION);
        $this->application->add(new NewCommand());
        $this->application->add(new GenerateCommand());
    }

    public function lead(): void
    {
        $this->application->run();
    }
}
