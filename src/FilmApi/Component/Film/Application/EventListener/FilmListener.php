<?php

namespace FilmApi\Component\Film\Application\EventListener;

use FilmApi\Component\Film\Application\Event\FilmEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

abstract class FilmListener extends EventSubscriberInterface
{

    protected $dispatcher;

    public static function getSubscribedEvents()
    {
        return array(
            'film.created' => 'createFilm',
            'film.edited' => 'updateFilm',
            'film.deleted' => 'deleteFilm'
        );
    }

    public abstract function createFilm(FilmEvent $e);

    public abstract function updateFilm(FilmEvent $e);

    public abstract function deleteFilm(FilmEvent $e);
}