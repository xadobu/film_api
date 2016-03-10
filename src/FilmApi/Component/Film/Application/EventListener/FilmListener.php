<?php

namespace FilmApi\Component\Film\Application\EventListener;

use FilmApi\Component\Film\Application\Event\FilmEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

interface FilmListener
{

    public function createFilm(FilmEvent $e);

    public function updateFilm(FilmEvent $e);

    public function deleteFilm(FilmEvent $e);
}