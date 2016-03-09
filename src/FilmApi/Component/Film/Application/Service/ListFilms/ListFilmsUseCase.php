<?php

namespace FilmApi\Component\Film\Application\Service\ListFilms;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class ListFilmsUseCase
{
    private $dispatcher;

    public function __construct(EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function execute() {

    }
}