<?php

namespace WPDevICU\WPPG\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GenerateCommand extends Command
{
    public function configure()
    {
        $this->setName('generate')
            ->setDescription('Generate feature for WordPress plugin.')
            ->setHelp('This command allows you to generate a new feature for WordPress plugin.')
            ->addArgument('name', InputArgument::REQUIRED, 'The name of the feature.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $name = $input->getArgument('name');
            $output->writeln('Generating <info>' . $name . '</info>');
//            $generator = new \WPDevICU\WPPG\Generator\Generator($name);
//            $generator->generate();
            $output->writeln('<info>'. $name .' generated successfully!</info>');
            return self::SUCCESS;
        } catch (\Exception $e) {
            $output->writeln('<error>' . $e->getMessage() . '</error>');
            return $e->getCode();
        }

    }
}