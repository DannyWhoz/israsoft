<?php

namespace App\Modules\Player\Db;

use App\Modules\Auth\Dto\SaveUserDto;
use Illuminate\Support\Facades\DB;

class PlayerDb implements IPlayerDb
{
    public function createPlayer(SaveUserDto $dto): int
    {
        return DB::table(self::TABLE)->insertGetId([
            'created_at' => now(),
            'updated_at' => now(),
            'name' => $dto->name,
            'surname' => $dto->surname,
            'callsign' => $dto->callsign,
            'emailPlayer' => $dto->userDto->email,
            'phone' => $dto->number,
            'price' => null,
            'team_id' => 1002,
        ]);
    }

    public function getById(int $id): array
    {
        return DB::table(self::TABLE)
            ->where('id', $id)
            ->get()
            ->first();
    }

    public function getCountPlayers(): int
    {
        return DB::table(self::TABLE)
            ->get()
            ->count();
    }

}