<?php

namespace FilmApi\Component\Film\Domain\Event;

use Symfony\Component\EventDispatcher\Event;

class FilmEvent extends Event
{
    public $film;

    public function __construct($film)
    {
        $this->film = $film;
    }
}