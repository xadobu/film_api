<?php

namespace FilmApi\Bundle\FilmBundle\Command;


use FilmApi\Component\Film\Application\DTOs\FilmDTO;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DeleteFilmCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName("film:delete")
            ->setDescription("Create a film")
            ->addArgument(
                "id",
                InputArgument::REQUIRED,
                "The film identifier"
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $container = $this->getContainer();
        $id = $input->getArgument("id");

        $filmDto = new FilmDTO($id);

        $deleteFilmUseCase = $container->get("deleteFilmUseCase");
        $deleteFilmUseCase->execute($filmDto);

        $output->writeln("Film deleted");
    }
}