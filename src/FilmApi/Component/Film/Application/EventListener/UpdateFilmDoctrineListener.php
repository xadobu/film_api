<?php

namespace FilmApi\Component\Film\Application\EventListener;

use Doctrine\ORM\EntityManager;
use FilmApi\Component\Film\Application\Event\FilmEvent;

class UpdateFilmDoctrineListener
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function onFilmUpdated(FilmEvent $e)
    {
        $filmDto = $e->film;
        $film = $this->em->getRepository('Film:Film')->find($filmDto->getId());

        if ($film) {
            $film->setName($filmDto->getName());
            $film->setYear($filmDto->getYear());
            $film->setDate($filmDto->getDate());
            $film->setUrl($filmDto->getUrl());
            $this->em->flush();
        }
    }
}