<?php


namespace Varandas\Crlib;

use Varandas\Crlib\Communications\Endpoint;

class CrlibOperations implements ICrlibOperations
{
    /**
     * @var Http
     */
    private $http;

    public function __construct($authorization_token)
    {
        $this->http = new Http($authorization_token);
    }

    public function getCards()
    {
        return $this->http->getResource(Endpoint::CARDS);
    }

    public function getClans($filter)
    {
        return $this->http->getResource(Endpoint::CLANS, $filter);
    }

    public function getClan($clan_tag)
    {
        return $this->http->getResource(Endpoint::CLANS . '/' . urlencode($clan_tag));
    }

    public function getClanMembers($clan_tag)
    {
        return $this->http->getResource(Endpoint::CLANS . '/' . urlencode($clan_tag) . '/members');
    }

    public function getClanWarLog($clan_tag)
    {
        return $this->http->getResource(Endpoint::CLANS . '/' . urlencode($clan_tag) . '/warlog');
    }

    public function getClanCurrentWar($clan_tag)
    {
        return $this->http->getResource(Endpoint::CLANS . '/' . urlencode($clan_tag) . '/currentwar');
    }

    public function getPlayer($player_tag)
    {
        return $this->http->getResource(Endpoint::PLAYERS . '/' . urlencode($player_tag));
    }

    public function getPlayerUpcomingChest($player_tag)
    {
        return $this->http->getResource(Endpoint::PLAYERS . '/' . urlencode($player_tag) . '/upcomingchests');
    }

    public function getPlayerBattleLog($player_tag)
    {
        return $this->http->getResource(Endpoint::PLAYERS . '/' . urlencode($player_tag) . '/battlelog');
    }

    public function getTournaments($filters)
    {
        return $this->http->getResource(Endpoint::TOURNAMENTS, $filters);
    }

    public function getTournament($tournament_tag)
    {
        return $this->http->getResource(Endpoint::TOURNAMENTS . '/' . urlencode($tournament_tag));
    }

    public function getLocations()
    {
        return $this->http->getResource(Endpoint::LOCATIONS);
    }

    public function getLocation($location_id)
    {
        return $this->http->getResource(Endpoint::LOCATIONS . '/' . $location_id);
    }

    public function getLocationClanRankings($location_id)
    {
        return $this->http->getResource(Endpoint::LOCATIONS . '/' . $location_id . '/rankings/clans');
    }

    public function getLocationPlayerRankings($location_id)
    {
        return $this->http->getResource(Endpoint::LOCATIONS . '/' . $location_id . '/rankings/players');
    }

    public function getLocationClanWarRankings($location_id)
    {
        return $this->http->getResource(Endpoint::LOCATIONS . '/' . $location_id . '/rankings/clanwars');
    }

    public function getGlobalTournaments()
    {
        return $this->http->getResource(Endpoint::GLOBAL_TOURNAMENTS);
    }

    public function getGlobalRankingForTournament($tournament_tag)
    {
        return $this->http->getResource(Endpoint::LOCATIONS . '/global/rankings/tournaments/' . $tournament_tag);
    }
}