<?php

namespace FilmApi\Component\Film\Application\DTOs;

use JsonSerializable;

class FilmDTO implements JsonSerializable
{
    private $id;
    private $name;
    private $year;
    private $date;
    private $url;

    public function __construct($id = null, $name = null, $year = null, $date = null, $url = null)
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

    public function jsonSerialize()
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "year" => $this->year,
            "date" => $this->date,
            "url" => $this->url
        ];
    }
}