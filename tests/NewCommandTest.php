<?php

namespace WPDevICU\WPPG\Tests;

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use WPDevICU\WPPG\Commands\NewCommand;
use PHPUnit\Framework\TestCase;

class NewCommandTest extends TestCase
{
    /**
     * @test
     */
    public function itCanBeInstantiated()
    {
        $newCommand = new NewCommand();
        $this->assertInstanceOf(NewCommand::class, $newCommand);
    }

    /**
     * @test
     */
    public function canRunCommand()
    {
        $application = new Application();
        $application->add(new NewCommand());
        $command = $application->find('new');
        $commandTester = new CommandTester($command);
        $commandTester->execute(
            [
                'command' => $command->getName(),
                'directory' => 'test',
            ]
        );
        $commandTester->assertCommandIsSuccessful();

        // the output of the command in the console
        $output = $commandTester->getDisplay();
        $this->assertStringContainsString('Creating new plugin in: test', $output);
    }
}
