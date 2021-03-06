<?php

namespace RiotQuest\Tests\Endpoints;

use PHPUnit\Framework\TestCase;
use RiotQuest\Client;
use RiotQuest\Components\Collections\League;
use RiotQuest\Components\Collections\LeagueEntryList;
use RiotQuest\Contracts\LeagueException;

/**
 * Class LeagueTest
 * @package RiotQuest\Tests\Endpoints
 */
class LeagueTest extends TestCase
{

    /**
     * Test the single league ID endpoint
     *
     * @throws LeagueException
     */
    public function testRequestSingleLeague()
    {
        // League ID
        $collection = Client::league('euw')->id('159026101e0-2cb7-11e9-9a42-c81f66dd2a8f');

        $this->assertInstanceOf(League::class, $collection);
    }

    /**
     * @throws LeagueException
     */
    public function testLeagueEntries() {
        $collection = Client::league('euw')->entries('RANKED_SOLO_5x5', 'DIAMOND', 'I', 1);

        $this->assertInstanceOf(LeagueEntryList::class, $collection);
    }

    /**
     * Test the apex league endpoints
     *
     * @throws LeagueException
     */
    public function testRequestApexLeagues()
    {
        $collection1 = Client::league('euw')->challenger('RANKED_SOLO_5x5');
        $collection2 = Client::league('euw')->master('RANKED_SOLO_5x5');
        $collection3 = Client::league('euw')->grandmaster('RANKED_SOLO_5x5');

        $this->assertInstanceOf(League::class, $collection1);
        $this->assertInstanceOf(League::class, $collection2);
        $this->assertInstanceOf(League::class, $collection3);
    }

    /**
     * Test positions for summoner endpoint
     *
     * @throws LeagueException
     */
    public function testRequestPositions()
    {
        // Summoner ID
        $collection = Client::league('euw')->positions('GtmkO-wba00dtOkpaQhQzlHa1PT9cE7nFohDuikJn0fscL4');

        $this->assertInstanceOf(LeagueEntryList::class, $collection);
    }

}
