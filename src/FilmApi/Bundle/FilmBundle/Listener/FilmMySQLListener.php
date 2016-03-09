<?php

namespace FilmApi\Bundle\FilmBundle\Listener;

use Doctrine\ORM\EntityManager;
use FilmApi\Component\Film\Domain\Event\FilmEvent;
use FilmApi\Component\Film\Domain\EventListener\FilmListener;

class FilmMySQLListener extends FilmListener
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function createFilm(FilmEvent $e)
    {
        $this->em->persist($e->film);
    }

    public function updateFilm(FilmEvent $e)
    {
        $this->em->persist($e->film);
    }

    public function deleteFilm(FilmEvent $e)
    {
        $this->em->remove($e->film);
    }
}