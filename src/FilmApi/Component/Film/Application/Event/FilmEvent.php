<?php

namespace FilmApi\Component\Film\Application\Event;

use FilmApi\Component\Film\Application\DTOs\FilmDTO;
use Symfony\Component\EventDispatcher\Event;

class FilmEvent extends Event
{

    const FILM_CREATED = "film.created";

    const FILM_UPDATED = "film.updated";

    const FILM_DELETED = "film.deleted";


    public $film;

    public function __construct(FilmDTO $film)
    {
        $this->film = $film;
    }
}