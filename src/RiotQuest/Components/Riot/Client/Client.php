<?php

namespace RiotQuest\Components\Riot\Client;

use RiotQuest\Components\RateLimit\Application;
use RiotQuest\Components\RateLimit\Endpoint;
use RiotQuest\Components\Riot\Endpoints\Champion;
use RiotQuest\Components\Riot\Endpoints\Code;
use RiotQuest\Components\Riot\Endpoints\League;
use RiotQuest\Components\Riot\Endpoints\Mastery;
use RiotQuest\Components\Riot\Endpoints\Match;
use RiotQuest\Components\Riot\Endpoints\Spectator;
use RiotQuest\Components\Riot\Endpoints\Status;
use RiotQuest\Components\Riot\Endpoints\Summoner;
use Psr\SimpleCache\CacheInterface;

/**
 * Class Client
 *
 * The entire RiotQuest Framework is bundled into
 * this static class.
 *
 * @package RiotQuest\Components\Riot\Client
 */
class Client
{

    /**
     * CacheProvider for caching. Must be PSR-16 compliant
     *
     * @var CacheInterface
     */
    protected static $cache;

    /**
     * Set rate limits for the given TOURNAMENT and STANDARD
     * keys
     *
     * @var array
     */
    protected static $limits;

    /**
     * The API keys
     *
     * @var array
     */
    protected static $keys = [
        'STANDARD' => null,
        'TOURNAMENT' => null
    ];

    /**
     * Initialize the entire application, this way RiotQuest
     * doesn't interfere with your program until you actually
     * load being using it.
     *
     * @param CacheInterface $cache
     * @param mixed ...$keys
     */
    public static function initialize(CacheInterface $cache, ...$keys)
    {
        static::$cache = $cache;
        foreach ($keys as $key) {
            static::$keys[$key->getType()] = $key;
        }
        Application::enable();
        Endpoint::enable();
    }

    /**
     * Get the set rate limits
     *
     * @param $key
     * @return array
     */
    public static function getLimits($key)
    {
        return static::$keys[$key] ? static::$keys[$key]->getLimits() : [];
    }

    /**
     * Hit an API region and endpoint
     *
     * @param $region
     * @param $endpoint
     * @param $lim
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public static function hit($region, $endpoint, $lim)
    {
        Application::hit($region);
        Endpoint::hit($region, $endpoint, null, $lim);
    }

    /**
     * Determine whether an API region and endpoint can be hit or not
     *
     * @param $region
     * @param $endpoint
     * @return bool
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public static function available($region, $endpoint)
    {
        return Endpoint::available($region, $endpoint) && Application::available($region);
    }

    /**
     * Get cacheprovider
     *
     * @return CacheInterface
     */
    public static function getCache()
    {
        return static::$cache;
    }

    /**
     * Get API keys
     *
     * @return array
     */
    public static function getKeys()
    {
        return static::$keys;
    }

    public static function champion($region, $ttl = 3600)
    {
        return new Champion($region, $ttl);
    }

    public static function mastery($region, $ttl = 3600)
    {
        return new Mastery($region, $ttl);
    }

    public static function league($region, $ttl = 3600)
    {
        return new League($region, $ttl);
    }

    public static function status($region, $ttl = 3600)
    {
        return new Status($region, $ttl);
    }

    public static function match($region, $ttl = 3600)
    {
        return new Match($region, $ttl);
    }

    public static function spectator($region, $ttl = 3600)
    {
        return new Spectator($region, $ttl);
    }

    public static function summoner($region, $ttl = 3600)
    {
        return new Summoner($region, $ttl);
    }

    public static function code($region, $ttl = 3600)
    {
        return new Code($region, $ttl);
    }

    public static function stub()
    {

    }

    public static function tournament()
    {

    }

}
