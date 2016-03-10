<?php

namespace FilmApi\Component\Film\Application\EventListener;

use Doctrine\ORM\EntityManager;
use FilmApi\Component\Film\Application\DTOs\FilmDTO;
use FilmApi\Component\Film\Application\Event\FilmEvent;
use FilmApi\Component\Film\Domain\Model\Film;

class FilmDoctrineListener implements FilmListener
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

    public function createFilm(FilmEvent $e)
    {
        $this->em->persist($this->filmFromDTO($e->film));
        $this->em->flush();
    }

    public function updateFilm(FilmEvent $e)
    {
        $filmRepository = $this->em->getRepository('Film:Film');
        //$this->em->flush($this->filmFromDTO($e->film));
    }

    public function deleteFilm(FilmEvent $e)
    {
        $this->em->remove($this->filmFromDTO($e->film));
        $this->em->flush();
    }
}