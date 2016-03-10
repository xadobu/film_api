<?php

namespace FilmApi\Bundle\FilmBundle\Command;


use FilmApi\Component\Film\Application\DTOs\FilmDTO;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateFilmCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
            ->setName("film:create")
            ->setDescription("Create a film")
            ->addArgument(
                "name",
                InputArgument::REQUIRED,
                "The film name")
            ->addArgument(
                "year",
                InputArgument::REQUIRED,
                "The film release year"
            )
            ->addArgument(
                "date",
                InputArgument::REQUIRED,
                "The film release date"
            )
            ->addArgument(
                "url",
                InputArgument::REQUIRED,
                "The film url"
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $container = $this->getContainer();
        $name = $input->getArgument("name");
        $year = $input->getArgument("year");
        $date = $input->getArgument("year");
        $url = $input->getArgument("url");

        $filmDto = new FilmDTO(null, $name, $year, $date, $url);

        $createFilmUseCase = $container->get("createFilmUseCase");
        $createFilmUseCase->execute($filmDto);

        $output->writeln("Film created");
    }

}