<?php

namespace FilmApi\Bundle\FilmBundle\Command;


use FilmApi\Component\Film\Application\DTOs\FilmDTO;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class UpdateFilmCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
            ->setName("film:update")
            ->setDescription("Create a film")
            ->addArgument(
                "id",
                InputArgument::REQUIRED,
                "The film identifier")
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

        $id = $input->getArgument("id");
        $name = $input->getArgument("name");
        $year = $input->getArgument("year");
        $date = $input->getArgument("year");
        $url = $input->getArgument("url");

        $filmDto = new FilmDTO($id, $name, $year, $date, $url);

        $deleteFilmUseCase = $container->get("updateFilmUseCase");
        $deleteFilmUseCase->execute($filmDto);

        $output->writeln("Film updated");
    }
}