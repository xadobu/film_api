<?php

namespace FilmApi\Component\FilmCache;

use Doctrine\Common\Cache\CacheProvider;
use FilmApi\Component\Film\Application\Service\ListFilms\ListFilms;

class FilmCache
{
    private $decoratedObject;
    private $cache;
    const CACHE_KEY = "listedFilms";

    public function __construct(ListFilms $decoratedObject, CacheProvider $cache)
    {
        $this->decoratedObject = $decoratedObject;
        $this->cache = $cache;
    }

    public function execute() {
        if($resultString = $this->cache->fetch(FilmCache::CACHE_KEY)) {
            $result = unserialize($resultString);
        } else {
            $result = $this->decoratedObject->execute();
            $serializedFilms = serialize($result);
            $this->cache->save(FilmCache::CACHE_KEY, $serializedFilms);
        }
        return $result;
    }
}