<?php

namespace Argidomin\AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use Symfony\Component\HttpFoundation\Request;


class ArgidominCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('argidomin:dump:sitemap')
            ->setDescription('Greet someone')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $sitemap = $this->getContainer()->get('plantilla')->sitemap(new Request());

        var_dump($sitemap); die();

        $file = $this->getContainer()->get('kernel')->getRootDir().'/../web/sitemap.xml';

        if (file_exists($file))
        {
            $rootNode = new \SimpleXMLElement($sitemap["content"]);
            $rootNode->saveXML($file);

            die('Archivo creado');

        }
        $output->writeln('no');

    }
}