<?php


namespace Varandas\Crlib;


interface ICrlibOperations
{
    public function getCards();

    public function getClans($filters);
    public function getClan($clan_tag);
    public function getClanMembers($clan_tag);
    public function getClanWarLog($clan_tag);
    public function getClanCurrentWar($clan_tag);

    public function getPlayer($player_tag);
    public function getPlayerUpcomingChest($player_tag);
    public function getPlayerBattleLog($player_tag);

    public function getTournaments($filters);
    public function getTournament($tournament_tag);

    public function getLocations();
    public function getLocation($location_id);
    public function getLocationClanRankings($location_id);
    public function getLocationPlayerRankings($location_id);
    public function getLocationClanWarRankings($location_id);

    public function getGlobalTournaments();
    public function getGlobalRankingForTournament($tournament_tag);
}