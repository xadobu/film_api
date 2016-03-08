<?php

namespace FilmApi\Component\Film\Event;

use Symfony\Component\EventDispatcher\Event;

class FilmEvent extends Event
{
    public $film;

    public function __construct($film)
    {
        $this->film = $film;
    }
}