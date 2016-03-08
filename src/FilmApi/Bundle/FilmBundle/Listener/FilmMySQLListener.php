<?php

namespace FilmApi\Bundle\FilmBundle\Listener;

use Doctrine\ORM\EntityManager;
use FilmApi\Component\Film\Event\FilmEvent;
use FilmApi\Component\Film\EventListener\FilmListener;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class FilmMySQLListener extends FilmListener
{
    private $em;

    public function __construct(EventDispatcherInterface $dispatcher, EntityManager $em)
    {
        parent::__construct($dispatcher);
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