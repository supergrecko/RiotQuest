<?php

namespace RiotQuest\Components\Framework\Collections;

/**
 * Class BannedChampionList
 *
 * @see https://developer.riotgames.com/api-methods/#spectator-v4/GET_getFeaturedGames
 *
 * @list BannedChampion
 *
 * @package RiotQuest\Components\Framework\Collections
 */
class BannedChampionList extends Collection
{

    /**
     * Get the list of banned Champions in this list
     *
     * @return array
     */
    public function getListIds()
    {
        return $this->map(function (BannedChampion $e) {
            return $e->championId;
        });
    }

}
