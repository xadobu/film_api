<?php

namespace FilmApi\Component\FilmComponent\Domain\Service;

use FilmApi\Component\Film\Domain\Model\Film;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class CreateFilmUseCase
{
    private $dispatcher;

    public function __construct(EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function execute(Film $film) {
        $this->dispatcher->dispatch('film.created', $film);
    }
}