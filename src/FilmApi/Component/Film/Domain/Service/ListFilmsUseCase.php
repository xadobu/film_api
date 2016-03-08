<?php

namespace FilmApi\Component\FilmComponent\Domain\Service;

use FilmApi\Component\FilmComponent\Domain\Model\Film;
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