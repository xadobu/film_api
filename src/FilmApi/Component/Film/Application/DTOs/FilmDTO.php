<?php

namespace FilmApi\Component\Film\Application\DTOs;

class FilmDTO
{
    private $id;
    private $name;
    private $year;
    private $date;
    private $url;

    public function __construct($id, $name, $year, $date, $url)
    {
        $this->id = $id;
        $this->name = $name;
        $this->year = $year;
        $this->date = $date;
        $this->url = $url;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getYear()
    {
        return $this->year;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getUrl()
    {
        return $this->url;
    }
}