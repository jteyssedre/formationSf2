<?php

namespace Formation\CommandBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('formation:test')
            ->setDescription('Test de création d\'une commande');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $question = new Question('Entrer une valeur : ', null);        
        $helper = $this->getHelper('question');
        $response = $helper->ask($input, $output, $question);
        
        if ($response) {
            $text = 'Valeur entrée : '. $response;
        } else {
            $text = 'Aucune valeur entrée';
        }

        $output->writeln($text);
    }
}
