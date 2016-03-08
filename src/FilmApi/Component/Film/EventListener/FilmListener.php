<?php

namespace FilmApi\Component\Film\EventListener;

use FilmApi\Component\Film\Event\FilmEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

abstract class FilmListener
{

    protected $dispatcher;

    public function __construct(EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;

        $this->dispatcher->addListener('film.created', array($this, 'createFilm'));
        $this->dispatcher->addListener('film.edited', array($this, 'updateFilm'));
        $this->dispatcher->addListener('film.deleted', array($this, 'deleteFilm'));
    }

    public abstract function createFilm(FilmEvent $e);

    public abstract function updateFilm(FilmEvent $e);

    public abstract function deleteFilm(FilmEvent $e);
}