<?php

namespace FilmApi\Bundle\FilmBundle\Command;


use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ListFilmsCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName("film:list")
            ->setDescription("List films");
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $container = $this->getContainer();

        $listFilmsUseCase = $container->get("listFilmsUseCase");
        $films = $listFilmsUseCase->execute();

        $table = new Table($output);
        $table
            ->setHeaders(array('id', 'name', 'year', 'date', 'url'))
            ->setRows($films);

        $table->render();

    }
}