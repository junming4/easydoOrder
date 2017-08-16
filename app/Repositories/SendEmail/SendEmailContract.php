<?php

namespace App\Repositories\TeamShop;

use App\Models\TeamShop;

interface TeamShopContract
{
    public function create(array $input): bool;

    public function find(int $ts_id);
}