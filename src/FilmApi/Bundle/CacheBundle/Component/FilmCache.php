<?php

namespace FilmApi\Bundle\CacheBundle\Component;

use Doctrine\Common\Cache\CacheProvider;
use Doctrine\Common\Cache\FilesystemCache;
use FilmApi\Component\Film\Application\Service\ListFilms\ListFilms;

class FilmCache
{
    private $decoratedObject;
    private $cache;

    public function __construct(ListFilms $decoratedObject, CacheProvider $cache)
    {
        $this->decoratedObject = $decoratedObject;
        $this->cache = $cache;
    }

    public function execute() {
        var_dump("cached!");
        if($resultString = $this->cache->fetch("listedFilms")) {
            $result = unserialize($resultString);
        } else {
            $result = $this->decoratedObject->execute();
            $serializedFilms = serialize($result);
            $this->cache->save("listedFilms", $serializedFilms);
        }
        return $result;
    }
}