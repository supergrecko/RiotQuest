<?php

namespace RiotQuest\Components\Framework\Collections;

/**
 * Class LeaguePosition
 *
 * @see https://developer.riotgames.com/api-methods/#league-v4/GET_getAllLeaguePositionsForSummoner
 *
 * @property string $queueType
 * @property string $summonerName
 * @property string $position
 * @property boolean $hotStreak
 * @property MiniSeries $miniSeries
 * @property int $wins
 * @property boolean $veteran
 * @property int $losses
 * @property string $rank
 * @property string $leagueId
 * @property boolean $inactive
 * @property boolean $freshBlood
 * @property string $leagueName
 * @property string $tier
 * @property string $summonerId
 * @property int $leaguePoints
 *
 * @package RiotQuest\Components\Framework\Collections
 */
class LeaguePosition extends Collection
{

    public function getWinrate()
    {
        return $this['wins'] / ($this['wins'] + $this['losses']) * 100;
    }

    public function getLeagueName()
    {
        return sprintf("%s %s %d LP", $this['tier'], $this['rank'], $this['leaguePoints']);
    }

    public function getGamesPlayed()
    {
        return $this['wins'] + $this['losses'];
    }

}
