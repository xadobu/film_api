<?php

namespace FilmApi\Component\Film\Domain\Model;

use Ramsey\Uuid\Uuid;

class Film
{

    /**
     * @var \Ramsey\Uuid\UuidInterface
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $year;

    /**
     * @var string
     */
    private $date;

    /**
     * @var string
     */
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

    /**
     * @return \Ramsey\Uuid\UuidInterface
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param $name
     * @return Film
     */
    public function setName($name)
    {
        return new Film($name, $this->year, $this->date, $this->url);
    }

    /**
     * @param $year
     * @return Film
     */
    public function setYear($year)
    {
        return new Film($this->name, $year, $this->date, $this->url);
    }

    /**
     * @param $date
     * @return Film
     */
    public function setDate($date)
    {
        return new Film($this->name, $this->year, $date, $this->url);
    }

    /**
     * @param $url
     * @return Film
     */
    public function setUrl($url)
    {
        return new Film($this->name, $this->year, $this->date, $url);
    }


}