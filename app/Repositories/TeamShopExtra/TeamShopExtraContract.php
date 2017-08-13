<?php

namespace App\Repositories\TeamShopExtra;

use App\Models\TeamShopExtra;

interface TeamShopExtraContract
{
    public function create(array $input): bool;

    public function find(int $ts_id): TeamShopExtra;

    public function getPriceByUserIdAndTId(int $user_id,int $ts_id): float;
}