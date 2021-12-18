<?php

namespace WPDevICU\WPPG\Tests;

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\ApplicationTester;
use WPDevICU\WPPG\Commander;
use PHPUnit\Framework\TestCase;

class CommanderTest extends TestCase
{
    public function testConstruct()
    {
        $commander = new Commander();
        $commander->application->setAutoExit(false);
        $this->assertInstanceOf(Commander::class, $commander);
        $this->assertInstanceOf(Application::class, $commander->application);

        $applicationTester = new ApplicationTester($commander->application);
        $applicationTester->run(['command' => 'list']);
        $this->assertEquals(0, $applicationTester->getStatusCode());
    }
}
