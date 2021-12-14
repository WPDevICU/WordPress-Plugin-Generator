<?php

namespace WPDevICU\WPPG\Tests;

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use WPDevICU\WPPG\Commands\GenerateCommand;
use PHPUnit\Framework\TestCase;

class GenerateCommandTest extends TestCase
{
    /**
     * @test
     */
    public function itCanBeInstantiated()
    {
        $newCommand = new GenerateCommand();
        $this->assertInstanceOf(GenerateCommand::class, $newCommand);
    }

    /**
     * @test
     */
    public function canRunCommand()
    {
        $application = new Application();
        $application->add(new GenerateCommand());
        $command = $application->find('generate');
        $commandTester = new CommandTester($command);
        $commandTester->execute(
            [
                'command' => $command->getName(),
                'name' => 'tests',
            ]
        );
        $commandTester->assertCommandIsSuccessful();

        // the output of the command in the console
        $output = $commandTester->getDisplay();
        $this->assertStringContainsString('Generating tests', $output);
        $this->assertStringContainsString('tests generated successfully!', $output);
    }
}
