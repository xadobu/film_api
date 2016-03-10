<?php

namespace FilmApi\Component\Film\Application\EventListener;

use Doctrine\ORM\EntityManager;
use FilmApi\Component\Film\Application\Event\FilmEvent;

class DeleteFilmDoctrineListener
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function onFilmDeleted(FilmEvent $e)
    {
        $film = $this->em->getRepository('Film:Film')->find($e->film->getId());
        if ($film) {
            $this->em->remove($film);
            $this->em->flush();
        }
    }
}