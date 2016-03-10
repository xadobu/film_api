<?php

namespace FilmApi\Component\Film\Application\EventListener;

use Doctrine\ORM\EntityManager;
use FilmApi\Component\Film\Application\DTOs\FilmDTO;
use FilmApi\Component\Film\Application\Event\FilmEvent;
use FilmApi\Component\Film\Domain\Model\Film;

class CreateFilmDoctrineListener
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    private function filmFromDTO(FilmDTO $filmDTO)
    {
        return new Film($filmDTO->getName(), $filmDTO->getYear(), $filmDTO->getDate(), $filmDTO->getUrl());
    }

    public function onFilmCreated(FilmEvent $e)
    {
        $this->em->persist($this->filmFromDTO($e->film));
        $this->em->flush();
    }
}