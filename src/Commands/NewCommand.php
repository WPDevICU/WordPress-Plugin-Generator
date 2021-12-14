<?php

namespace WPDevICU\WPPG\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class NewCommand extends Command
{
    protected function configure()
    {
        $this->setName('new')
            ->setDescription('Create a new WordPress plugin.')
            ->setHelp('This command allows you to create a new WordPress plugin.')
            ->addArgument('directory', InputArgument::REQUIRED, 'The directory of the plugin.');
    }
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $directory = $input->getArgument('directory');
            $output->writeln("Creating new plugin in: <info>{$directory}</info>");

            return self::SUCCESS;
        } catch (\Exception $e) {
            $output->writeln("<error>{$e->getMessage()}</error>");

            return self::FAILURE;
        }
    }
}