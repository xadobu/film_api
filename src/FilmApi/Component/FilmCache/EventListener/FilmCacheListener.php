<?php

namespace FilmApi\Component\FilmCache\EventListener;

use Doctrine\Common\Cache\CacheProvider;
use FilmApi\Component\Film\Application\Event\FilmEvent;
use FilmApi\Component\FilmCache\FilmCache;

class FilmCacheListener
{

    private $cache;

    public function __construct(CacheProvider $cache)
    {
        $this->cache = $cache;
    }

    public function onFilmCreated(FilmEvent $e)
    {
        $this->deleteFilmCache();
    }

    public function onFilmDeleted(FilmEvent $e)
    {
        $this->deleteFilmCache();

    }

    public function onFilmUpdated(FilmEvent $e)
    {
        $this->deleteFilmCache();

    }

    private function deleteFilmCache()
    {
        $this->cache->delete(FilmCache::CACHE_KEY);
    }
}