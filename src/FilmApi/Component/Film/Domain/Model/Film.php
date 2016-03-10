<?php

namespace FilmApi\Component\Film\Domain\Model;

use Ramsey\Uuid\Uuid;

class Film
{
    private $id;
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
        $this->id = Uuid::uuid4();
        $this->name = $name;
        $this->year = $year;
        $this->date = $date;
        $this->url = $url;
    }

    public function getId()
    {
        return $this->id;
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

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }


}