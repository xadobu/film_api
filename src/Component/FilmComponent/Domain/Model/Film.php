<?php

namespace FilmApi\Component\FilmComponent\Domain\Model;

class Film
{
    private $name;
    private $year;
    private $date;
    private $url;

    /**
     * Film constructor.
     * @param $name
     * @param $year
     * @param $date
     * @param $url
     */
    public function __construct($name, $year, $date, $url)
    {
        $this->name = $name;
        $this->year = $year;
        $this->date = $date;
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }
}