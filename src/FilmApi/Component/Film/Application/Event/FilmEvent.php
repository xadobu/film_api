<?php

namespace FilmApi\Component\Film\Application\Event;

use FilmApi\Component\Film\Application\DTOs\FilmDTO;
use Symfony\Component\EventDispatcher\Event;

class FilmEvent extends Event
{
    public $film;

    public function __construct(FilmDTO $film)
    {
        $this->film = $film;
    }
}