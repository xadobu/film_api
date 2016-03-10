<?php

namespace FilmApi\Component\Film\Application\Service\ListFilms;

use Doctrine\ORM\EntityManager;
use FilmApi\Component\Film\Application\DTOs\FilmDTO;
use FilmApi\Component\Film\Domain\Model\Film;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class ListFilmsUseCase implements ListFilms
{
    private $dispatcher;
    private $em;

    public function __construct(EventDispatcherInterface $dispatcher, EntityManager $em)
    {
        $this->dispatcher = $dispatcher;
        $this->em = $em;
    }

    private function filmToDTO(Film $film) {
        return new FilmDTO($film->getID(), $film->getName(), $film->getYear(), $film->getDate(), $film->getUrl());
    }

    public function execute() {
        $result = $this->em->getRepository('Film:Film')->findAll();
        $output = array_map(function(Film $film) {return $this->filmToDTO($film);}, $result);

        return $output;

//        $filmEvent = new FilmEvent($film);
//        $this->dispatcher->dispatch('film.listed', $filmEvent);
    }
}