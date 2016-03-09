<?php

namespace FilmApi\Component\Film\Application\Service\UpdateFilm;

use FilmApi\Component\Film\Application\DTOs\FilmDTO;
use FilmApi\Component\Film\Application\Event\FilmEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class UpdateFilmUseCase
{
    private $dispatcher;

    public function __construct(EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function execute(FilmDTO $film) {
        $filmEvent = new FilmEvent($film);
        $this->dispatcher->dispatch('film.updated', $filmEvent);
    }
}