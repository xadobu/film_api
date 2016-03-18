<?php

namespace FilmApi\Component\Film\Application\Service\CreateFilm;

use FilmApi\Component\Film\Application\DTOs\FilmDTO;
use FilmApi\Component\Film\Application\Event\FilmEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class CreateFilmUseCase
{
    private $dispatcher;

    public function __construct(EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function execute(FilmDTO $film) {
        $filmEvent = new FilmEvent($film);
        $this->dispatcher->dispatch(FilmEvent::FILM_CREATED, $filmEvent);
    }
}