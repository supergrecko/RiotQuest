<?php

namespace RiotQuest\Components\Framework\Client;

use RiotQuest\Components\Framework\Endpoints\Champion;
use RiotQuest\Components\Framework\Endpoints\Code;
use RiotQuest\Components\Framework\Endpoints\League;
use RiotQuest\Components\Framework\Endpoints\Mastery;
use RiotQuest\Components\Framework\Endpoints\Match;
use RiotQuest\Components\Framework\Endpoints\Spectator;
use RiotQuest\Components\Framework\Endpoints\Status;
use RiotQuest\Components\Framework\Endpoints\Summoner;
use RiotQuest\Contracts\LeagueException;

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
     * @throws LeagueException
     */
    public static function boot(): void {
        Application::getInstance()->load();
    }

    public static function setLocale(string $locale): void {
        Application::getInstance()->setLocale($locale);
    }

    public static function setProvider(string $provider): void {
        Application::getInstance()->setProvider($provider);
    }

    /**
     * Access Champion V3 endpoints
     *
     * @param $region
     * @param int $ttl
     * @return Champion
     */
    public static function champion(string $region, $ttl = 3600): Champion
    {
        return new Champion($region, $ttl);
    }

    /**
     * Access Champion Mastery V4 endpoints
     *
     * @param $region
     * @param int $ttl
     * @return Mastery
     */
    public static function mastery(string $region, $ttl = 3600): Mastery
    {
        return new Mastery($region, $ttl);
    }

    /**
     * Access League V4 endpoints
     *
     * @param $region
     * @param int $ttl
     * @return League
     */
    public static function league(string $region, $ttl = 3600): League
    {
        return new League($region, $ttl);
    }

    /**
     * Access LOL Status V3 endpoints
     *
     * @param $region
     * @param int $ttl
     * @return Status
     */
    public static function status(string $region, $ttl = 3600): Status
    {
        return new Status($region, $ttl);
    }

    /**
     * Access Match V4 endpoints
     *
     * @param $region
     * @param int $ttl
     * @return Match
     */
    public static function match(string $region, $ttl = 3600): Match
    {
        return new Match($region, $ttl);
    }

    /**
     * Access Spectator V4 endpoints
     *
     * @param $region
     * @param int $ttl
     * @return Spectator
     */
    public static function spectator(string $region, $ttl = 3600): Spectator
    {
        return new Spectator($region, $ttl);
    }

    /**
     * Access Summoner V4 endpoints
     *
     * @param $region
     * @param int $ttl
     * @return Summoner
     */
    public static function summoner(string $region, $ttl = 3600): Summoner
    {
        return new Summoner($region, $ttl);
    }

    /**
     * Access Third Party Code V4 endpoint
     *
     * @param $region
     * @param int $ttl
     * @return Code
     */
    public static function code(string $region, $ttl = 3600): Code
    {
        return new Code($region, $ttl);
    }

    /**
     * @return bool
     * @todo
     * @throws LeagueException
     */
    public static function stub(): void
    {
        throw new LeagueException("Unsupported Endpoint.");
    }

    /**
     * @return bool
     * @todo
     * @throws LeagueException
     */
    public static function tournament(): void 
    {
        throw new LeagueException("Unsupported Endpoint.");
    }

}
