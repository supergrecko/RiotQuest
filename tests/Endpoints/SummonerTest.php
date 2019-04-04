<?php

namespace RiotQuest\Tests\Endpoints;

use PHPUnit\Framework\TestCase;
use RiotQuest\Client;
use RiotQuest\Components\Framework\Collections\Summoner;

class SummonerTest extends TestCase
{

    /**
     * Makes sure that the summoner by name endpoint works
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     * @throws \ReflectionException
     * @throws \RiotQuest\Contracts\RiotQuestException
     */
    public function testRequestByName()
    {
        $collection = Client::summoner('euw')->name('mm yes ok not ok');

        $this->assertInstanceOf(Summoner::class, $collection);
    }

    /**
     * Make sure that the summoner by summoner id works
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     * @throws \ReflectionException
     * @throws \RiotQuest\Contracts\RiotQuestException
     */
    public function testRequestById()
    {
        $collection = Client::summoner('euw')->id('GtmkO-wba00dtOkpaQhQzlHa1PT9cE7nFohDuikJn0fscL4');

        $this->assertInstanceOf(Summoner::class, $collection);
    }

    /**
     * Make sure that the summoner by account id endpoint works
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     * @throws \ReflectionException
     * @throws \RiotQuest\Contracts\RiotQuestException
     */
    public function testRequestByAccount()
    {
        $collection = Client::summoner('euw')->account('BfLfuDhG64nRnrs4f-mjHwWlk4iXTadzgixzxah_GzbI3Lk');

        $this->assertInstanceOf(Summoner::class, $collection);
    }

    /**
     * Make sure that the summoner by puuid endpoint works
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     * @throws \ReflectionException
     * @throws \RiotQuest\Contracts\RiotQuestException
     */
    public function testRequestByUnique()
    {
        $collection = Client::summoner('euw')->unique('d5YAQNue_6Ba49Ry1GunSgowlRAKLyOeM6zgpfQOK8uYm9HwT4LKU8zX4Dk9U40V0bNqHKQ9m2XG-w');

        $this->assertInstanceOf(Summoner::class, $collection);
    }

}