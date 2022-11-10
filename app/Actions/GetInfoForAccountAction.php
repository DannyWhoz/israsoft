<?php

namespace App\Actions;

use App\Models\Player;

class GetInfoForAccountAction
{
    public function get(int $id)
    {
        $player = Player::find($id);
        $games = $player->games;
        return [
            'player' => $player,
            'games' => $games,
        ];
    }
}