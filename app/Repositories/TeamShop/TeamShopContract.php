<?php

namespace App\Repositories\TeamShop;


interface TeamShopContract
{
    public function create(array $input): bool;

    public function find(int $ts_id);

    public function findByUuid(string $uuid);

}