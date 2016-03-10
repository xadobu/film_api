<?php

namespace FilmApi\Bundle\FilmBundle\Command;


use FilmApi\Component\Film\Application\DTOs\FilmDTO;
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

        $filmToArray = function (FilmDTO $film) {
          return [
              $film->getId(),
              $film->getName(),
              $film->getYear(),
              $film->getDate(),
              $film->getUrl()
          ];
        };

        $filmsAsArray = array_map($filmToArray, $films);

        $table = new Table($output);
        $table
            ->setHeaders(array('id', 'name', 'year', 'date', 'url'))
            ->setRows($filmsAsArray);

        $table->render();

    }
}