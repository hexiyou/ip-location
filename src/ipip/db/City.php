<?php

/**
 * @site https://www.ipip.net
 * @desc Parse IP library in ipdb format
 * @copyright IPIP.net
 */

namespace Gai871013\IpLocation\ipip\db;

class City
{
    public $reader = NULL;

    public function __construct($db)
    {
        $this->reader = new Reader($db);
    }

    public function find($ip, $language)
    {
        return $this->reader->find($ip, $language);
    }

    public function findMap($ip, $language)
    {
        return $this->reader->findMap($ip, $language);
    }

    public function findInfo($ip, $language)
    {
        $map = $this->findMap($ip, $language);
        if (NULL === $map)
        {
            return NULL;
        }

        return new CityInfo($map);
    }
}